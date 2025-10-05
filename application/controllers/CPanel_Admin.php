<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class CPanel_Admin extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Agivest_model');
        $this->load->model('Home_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('html');
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
    }

    protected $statsSent = 0;

    //-------------------------Tampilan Dashboard-------------------------------------------------


    public function index()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            if($role=='host'||$role=='organisasi'){
                $this->load->view('loginregister/login.php');
                return false;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/index.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function GetAccessThen()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/owner/access_banned.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function generateCardOld()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            
            $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/agency/___render_kartu_apps.php', $data);
            $this->load->view('user/agency/___render_kartu_alazharsb.php', $data);
            // $this->load->view('user/agency/___render_kartu_alfatih.php', $data);
            // $this->load->view('user/agency/___render_kartu_alfatih_sma.php', $data);
            // $this->load->view('user/agency/___render_kartu_pmak.php', $data);
            // $this->load->view('user/agency/___render_kartu_smanpintar.php', $data);
            // $this->load->view('user/agency/___render_kartu_ppsb.php', $data);
            // $this->load->view('user/agency/___render_kartu_almuslimun.php', $data);
            // $this->load->view('user/agency/___render_kartu_ppdi.php', $data);
            // $this->load->view('user/agency/___render_kartu_sapos.php', $data);
            // $this->load->view('user/agency/___render_kartu_apps_pgri.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function generateCard()
    {
        if ($this->session->userdata('_token')) {
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $username = $this->session->userdata('_user');
            $roleText = ($role == 'agency') ? 'Host' : (($role == 'seller') ? 'Merchant' : $role);

            $data = [
                'role' => $roleText,
                'function' => $function,
                'namaLengkap' => $this->session->userdata('_user')
            ];

            // Get the last segment of the URL
            $cardView = $username;

            // Sanitize and validate to prevent malicious access
            $allowedViews = [
                'ppsr' => '___render_kartu_apps',
                'ppsrputra' => '___render_kartu_apps',
                'alazharsb' => '___render_kartu_alazharsb',
                'smp.alfatih'   => '___render_kartu_alfatih',
                'pmalkautsar'      => '___render_kartu_pmak',
                'smanpintar'      => '___render_kartu_smanpintar',
                'ppsb'      => '___render_kartu_ppsb',
                'almuslimun'      => '___render_kartu_almuslimun',
                'ppdi'      => '___render_kartu_ppdi',
                'mts.muda'      => '___render_kartu_mts.muda',
                'yayasan.assajadah'      => '___render_kartu_yayasan.assajadah',
                'mantanjungpinang'      => '___render_kartu_mantanjungpinang',
                // 'alfaruqi'      => '___render_kartu_alfaruqi',
                'alfaruqi'      => '___render_kartu_alfaruqi',
                'tk.labschool'      => '___render_kartu_tk.labschool',
                // Add more as needed
            ];
            
            $activeCardView = 'user/agency/___render_kartu_alazharsb'; // default

            if (array_key_exists($cardView, $allowedViews)) {
                $activeCardView = 'user/agency/' . $allowedViews[$cardView];
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view($activeCardView . '.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    
    
    public function renderKartu()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/agency/___render_kartu.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Wa()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $noWA = $this->input->post('noWA');
            $pesan = $this->input->post('pesan');
            $timeTerakhir = $this->input->post('timeTerakhir');

            $majorse = [];
            $majorse = $this->CheckNumberWA($noWA);

            $jsonData = "$majorse";

            // Decode the JSON data
            $data = json_decode($jsonData);

            // Check if the decoding was successful
            if ($data === null) {
                // echo json_encode(array("status"=>false));
                return false;
            } else {
                // You can access the JSON values like this:

                $status = $data->status;

                if($status==true){

                    
                    $timenumber = $timeTerakhir;
                    $timenumber+= 45;

                    $notRegistered = $data->not_registered;
                    $registered = $data->registered;

                    
                    if($registered!=[]){


                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://api.fonnte.com/send',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => array(
                        'target' => $noWA,
                        'message' => $pesan,
                        // 'url' => 'https://md.fonnte.com/images/wa-logo.png',
                        'schedule' => $timenumber,
                        // 'delay' => '43',
                        'countryCode' => '62'
                        ),
                        CURLOPT_HTTPHEADER => array(
                            'Authorization: VLZonuz20R5ZeWq6zz2X'
                        ),
                        ));
                
                        $response = curl_exec($curl);
                
                        curl_close($curl);
                        // echo $response;
                        echo json_encode(array("status"=>true,"not_registered"=>$notRegistered,"registered"=>$registered,"time_sent"=>$timenumber));
                    }else {
                        echo json_encode(array("status"=>"FAKTAP","not_registered"=>$notRegistered,"registered"=>$registered));
                    }
                }else {
                    // echo json_encode(array("status"=>false));
                }

            }

            // echo $majorse;
            
            
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function CheckNumberWA($nomor){
        $curl = curl_init();

        $outputValsss = "";
        
        $awalan = substr($nomor, 0, 2);
        $output_str = substr($nomor, 2);
        
        if($awalan=='08'){
            $outputValsss = $nomor;
        }else if($awalan=='62'){
            $outputValsss = "0".$output_str;
        }else {
            echo json_encode(array("status"=>false));
        }

        // echo $outputValsss;

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/validate',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $outputValsss,
        'countryCode' => '62'
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: VLZonuz20R5ZeWq6zz2X'
        ),
        ));

        $response = curl_exec($curl);
        return $response;
        // echo json_encode(array("response"=>$response,"nomor"=>$outputValsss));

    }

    public function RequestGenerateQRIS()
    {
        if ($this->session->userdata('_token')) {
            $input = json_decode(file_get_contents('php://input'), true);
            $billNumber = $input['billNumber'];
            $amount = $input['amount'];
            
            // 2. Get input
            $input = json_decode(file_get_contents('php://input'), true);
            $billNumber = $input['billNumber'] ?? '';
            $amount = $input['amount'] ?? 0;
            
            // 3. Prepare request
            $requestBody = [
                'pokok' => strval($amount),
                'denda' => "0",
                'amount' => strval($amount),
                'tahun' => date('Y'),
                'jenis' => "10",
                'billNumber' => strval($billNumber),
                'expiredDate' => (time() + 3600) * 1000, // 1 hour from now
                'kode_transaksi' => "1"
            ];
            
            // $clientId = '8ed9adfb-0982-4b3f-b724-773ebe524014';
            // $keyX = '8ed9adfb09824b3fb724qportal773ebe524014';

            $clientId = '6695c411-70a2-4319-bde3-81385d9368f2';
            $keyX = 'c41170a2431bqp0rt4lprodde381385d9368f2';
            
            $timestamp = round(microtime(true) * 1000); // Current time in milliseconds
            
            $jsonPayload = json_encode($requestBody, JSON_UNESCAPED_SLASHES);

            $escapedJson = addcslashes($jsonPayload, '"');

            $signatureData = $clientId . ':"'. $escapedJson .'":' . $timestamp;
            
            $signature = hash_hmac('sha256', $signatureData, $keyX);
            
            $ch = curl_init("https://pg.qrion.id/api/qris/brks/generateqris");
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $jsonPayload,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'client-id: ' . $clientId,
                    'timestamp: ' . $timestamp,
                    'signature: ' . $signature
                ],
                CURLOPT_TIMEOUT => 30
            ]);
            
            $response = curl_exec($ch);
            $curlError = curl_error($ch);
            curl_close($ch);
            
            // 6. Handle response
            if ($curlError) {
                echo json_encode([
                    'status_code' => '500',
                    'message' => 'Connection error: ' . $curlError
                ]);
                return;
            }
            
            // Directly forward the QRIS API response
            // echo $response;
            // 6. Return API response with debug info
            $apiResponse = json_decode($response, true) ?? [];
            echo json_encode([
                'api_response' => $apiResponse,
                'status_code' => $apiResponse['status_code'] ?? $httpCode,
                'message' => $apiResponse['message'] ?? 'API response processed'
            ]);

            
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Unauthorized access'
            ]);
        }
    }

    // ----------------------------------------- DASHBOARD WHATSAPP ---------------------------------------- //
    
    
    public function WarehouseManagement()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/agency/warehouse_management.php', $data);
            $this->load->view('user/template/footer.php', $data);

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    // ----------------------------------------- DASHBOARD WHATSAPP ---------------------------------------- //
    
    
    public function Wapage()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            if($uidSetted=='6ba203e6-6cb7-4fce-9fe2-8dd923f19232' || $uidSetted=='39138110-0e08-4353-b9a2-aca525130a46' || $uidSetted=='b30fb5e9-4f23-4aa2-8f67-54d0c1a84831' || $uidSetted== '8961df74-d4aa-4679-bb2e-e2c89df6f5fc' || $uidSetted=='840ef870-1eb1-4914-9470-83bebb31fa31' || $uidSetted=='deda2d35-2b70-4a0b-8f22-3f769d654e6a' || $uidSetted=='ccd2a03c-e1d2-4b31-9ef9-24ac51c20e35' || $uidSetted=='215f760c-57fe-4743-8cf5-98ef764ad1dc'|| $uidSetted=='c97bd681-d2e1-40d8-9b08-607fdff06290' || $uidSetted=='d5b68e3f-c30a-4aff-84e7-406b90081c0f' || $uidSetted=='d6329b48-e587-43be-a589-aff62a39d9f0' || $uidSetted=='3bf1144a-a727-414d-ab9f-9f0cfc335ab9' || $uidSetted=='98989a0a-145a-475c-852c-8072815b5d03' || $uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'  ||  $uidSetted=='33564871-c460-4b3b-b1f5-97fe0948080d' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252' || $uidSetted=='6e345882-1617-43a2-9b44-0b029e482bd5' || $uidSetted=='07eb7530-abfa-4d0a-a693-045bb0915c6f'){
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/template/navigation_wapage.php', $data);
                $this->load->view('user/agency/whatsapp_panel.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }else {
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/agency/whatsapp_panel_error.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Wapage_TestKirim()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            if($uidSetted=='6ba203e6-6cb7-4fce-9fe2-8dd923f19232' || $uidSetted=='39138110-0e08-4353-b9a2-aca525130a46' || $uidSetted=='b30fb5e9-4f23-4aa2-8f67-54d0c1a84831' || $uidSetted== '8961df74-d4aa-4679-bb2e-e2c89df6f5fc' || $uidSetted=='840ef870-1eb1-4914-9470-83bebb31fa31' || $uidSetted=='deda2d35-2b70-4a0b-8f22-3f769d654e6a' || $uidSetted=='ccd2a03c-e1d2-4b31-9ef9-24ac51c20e35' || $uidSetted=='215f760c-57fe-4743-8cf5-98ef764ad1dc'|| $uidSetted=='c97bd681-d2e1-40d8-9b08-607fdff06290' || $uidSetted=='d5b68e3f-c30a-4aff-84e7-406b90081c0f' || $uidSetted=='d6329b48-e587-43be-a589-aff62a39d9f0' || $uidSetted=='3bf1144a-a727-414d-ab9f-9f0cfc335ab9' || $uidSetted=='98989a0a-145a-475c-852c-8072815b5d03' || $uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'  ||  $uidSetted=='33564871-c460-4b3b-b1f5-97fe0948080d' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252' || $uidSetted=='6e345882-1617-43a2-9b44-0b029e482bd5' || $uidSetted=='07eb7530-abfa-4d0a-a693-045bb0915c6f'){
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/template/navigation_wapage.php', $data);
                $this->load->view('user/agency/whatsapp_panel_testKirim.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }else {
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/agency/whatsapp_panel_error.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Wapage_CreateSession()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            if($uidSetted=='6ba203e6-6cb7-4fce-9fe2-8dd923f19232' || $uidSetted=='39138110-0e08-4353-b9a2-aca525130a46' || $uidSetted=='b30fb5e9-4f23-4aa2-8f67-54d0c1a84831' || $uidSetted== '8961df74-d4aa-4679-bb2e-e2c89df6f5fc' || $uidSetted=='840ef870-1eb1-4914-9470-83bebb31fa31' || $uidSetted=='deda2d35-2b70-4a0b-8f22-3f769d654e6a' || $uidSetted=='ccd2a03c-e1d2-4b31-9ef9-24ac51c20e35' || $uidSetted=='215f760c-57fe-4743-8cf5-98ef764ad1dc'|| $uidSetted=='c97bd681-d2e1-40d8-9b08-607fdff06290' || $uidSetted=='d5b68e3f-c30a-4aff-84e7-406b90081c0f' || $uidSetted=='d6329b48-e587-43be-a589-aff62a39d9f0' || $uidSetted=='3bf1144a-a727-414d-ab9f-9f0cfc335ab9' || $uidSetted=='98989a0a-145a-475c-852c-8072815b5d03' || $uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'  ||  $uidSetted=='33564871-c460-4b3b-b1f5-97fe0948080d' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252' || $uidSetted=='6e345882-1617-43a2-9b44-0b029e482bd5' || $uidSetted=='07eb7530-abfa-4d0a-a693-045bb0915c6f'){
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/template/navigation_wapage.php', $data);
                $this->load->view('user/agency/whatsapp_panel_createsession.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }else {
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/agency/whatsapp_panel_error.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Wapage_BulkMessage()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            if($uidSetted=='6ba203e6-6cb7-4fce-9fe2-8dd923f19232' || $uidSetted=='39138110-0e08-4353-b9a2-aca525130a46' || $uidSetted=='b30fb5e9-4f23-4aa2-8f67-54d0c1a84831' || $uidSetted== '8961df74-d4aa-4679-bb2e-e2c89df6f5fc' || $uidSetted=='840ef870-1eb1-4914-9470-83bebb31fa31' || $uidSetted=='deda2d35-2b70-4a0b-8f22-3f769d654e6a' || $uidSetted=='ccd2a03c-e1d2-4b31-9ef9-24ac51c20e35' || $uidSetted=='215f760c-57fe-4743-8cf5-98ef764ad1dc'|| $uidSetted=='c97bd681-d2e1-40d8-9b08-607fdff06290' || $uidSetted=='d5b68e3f-c30a-4aff-84e7-406b90081c0f' || $uidSetted=='d6329b48-e587-43be-a589-aff62a39d9f0' || $uidSetted=='3bf1144a-a727-414d-ab9f-9f0cfc335ab9' || $uidSetted=='98989a0a-145a-475c-852c-8072815b5d03' || $uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'  ||  $uidSetted=='33564871-c460-4b3b-b1f5-97fe0948080d' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252' || $uidSetted=='6e345882-1617-43a2-9b44-0b029e482bd5' || $uidSetted=='07eb7530-abfa-4d0a-a693-045bb0915c6f'){
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/template/navigation_wapage.php', $data);
                $this->load->view('user/agency/whatsapp_panel_bulkmessage.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }else {
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/agency/whatsapp_panel_error.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Wapage_BulkMessageGeneral()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            if($uidSetted=='6ba203e6-6cb7-4fce-9fe2-8dd923f19232' || $uidSetted=='39138110-0e08-4353-b9a2-aca525130a46' || $uidSetted=='b30fb5e9-4f23-4aa2-8f67-54d0c1a84831' || $uidSetted== '8961df74-d4aa-4679-bb2e-e2c89df6f5fc' || $uidSetted=='840ef870-1eb1-4914-9470-83bebb31fa31' || $uidSetted=='deda2d35-2b70-4a0b-8f22-3f769d654e6a' || $uidSetted=='ccd2a03c-e1d2-4b31-9ef9-24ac51c20e35' || $uidSetted=='215f760c-57fe-4743-8cf5-98ef764ad1dc'|| $uidSetted=='c97bd681-d2e1-40d8-9b08-607fdff06290' || $uidSetted=='d5b68e3f-c30a-4aff-84e7-406b90081c0f' || $uidSetted=='d6329b48-e587-43be-a589-aff62a39d9f0' || $uidSetted=='3bf1144a-a727-414d-ab9f-9f0cfc335ab9' || $uidSetted=='98989a0a-145a-475c-852c-8072815b5d03' || $uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'  ||  $uidSetted=='33564871-c460-4b3b-b1f5-97fe0948080d' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252' || $uidSetted=='6e345882-1617-43a2-9b44-0b029e482bd5' || $uidSetted=='07eb7530-abfa-4d0a-a693-045bb0915c6f'){
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/template/navigation_wapage.php', $data);
                $this->load->view('user/agency/whatsapp_panel_bulkmessage_general.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }else {
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/agency/whatsapp_panel_error.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function Wapage_BulkMessageBroadcast()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $uidSetted = $this->session->userdata('_user_uid');
            
            if($uidSetted=='6ba203e6-6cb7-4fce-9fe2-8dd923f19232' || $uidSetted=='39138110-0e08-4353-b9a2-aca525130a46' || $uidSetted=='b30fb5e9-4f23-4aa2-8f67-54d0c1a84831' || $uidSetted== '8961df74-d4aa-4679-bb2e-e2c89df6f5fc' || $uidSetted=='840ef870-1eb1-4914-9470-83bebb31fa31' || $uidSetted=='deda2d35-2b70-4a0b-8f22-3f769d654e6a' || $uidSetted=='ccd2a03c-e1d2-4b31-9ef9-24ac51c20e35' || $uidSetted=='215f760c-57fe-4743-8cf5-98ef764ad1dc'|| $uidSetted=='c97bd681-d2e1-40d8-9b08-607fdff06290' || $uidSetted=='d5b68e3f-c30a-4aff-84e7-406b90081c0f' || $uidSetted=='d6329b48-e587-43be-a589-aff62a39d9f0' || $uidSetted=='3bf1144a-a727-414d-ab9f-9f0cfc335ab9' || $uidSetted=='98989a0a-145a-475c-852c-8072815b5d03' || $uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85'  ||  $uidSetted=='33564871-c460-4b3b-b1f5-97fe0948080d' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252' || $uidSetted=='6e345882-1617-43a2-9b44-0b029e482bd5' || $uidSetted=='07eb7530-abfa-4d0a-a693-045bb0915c6f'){
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/template/navigation_wapage.php', $data);
                $this->load->view('user/agency/whatsapp_panel_bulkmessage_broadcast.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }else {
                $this->load->view('user/template/header.php', $data);
                $this->load->view('user/agency/whatsapp_panel_error.php', $data);
                $this->load->view('user/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function renderKartuGeneral()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Admin';
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/agency/___render_kartu_general.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function Profil()
    {
        if ($this->session->userdata('_token') && ($this->session->userdata('_permission')=='agency'||$this->session->userdata('_permission')=='seller')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/_all/pengaturan.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    

    //OWNER SECTION
    // ===================================================================================================
    // ===================================================================================================
    // ===================================================================================================

    public function Agensi()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $username = $this->session->userdata('_user');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);

            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/agensi_page.php', $data);
            }
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function FiturManagement()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/fitur_management_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function KonektifitasWatzap()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/konektifitas_wa.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function PushNotifMain()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/push_notif_main.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function SistemMonitor()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/monitoring_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function SistemMonitorPre()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/monitoring_page_pre.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function RegistKartu()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/regis_kartu_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function MonitoringBatchFastCard()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/monitoring_batch_fast_card.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Apps()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/apps_homepage.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function AppsNext()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner' && $this->session->userdata('_token_apps')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/apps_homepage_next.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            redirect(base_url().'CPanel_Admin/Apps', 'refresh');
        }
    }
    
    
    
    public function getDataBanks()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner' && $this->session->userdata('_token_apps')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $getData = $this->Home_model->getSelectData("*","datacenter_banks", "WHERE 1=1")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));

        } else {
            $data['levelUser'] = "";
            redirect(base_url().'CPanel_Admin/Apps', 'refresh');
        }
    }
    
    
    public function CetakKartuListWait()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/cetak_kartu_list_waiting.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function DownloadPage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/download_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function DataSourceONBOARD()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }


            $modePage = $this->uri->segment(3);

            $getDataInstansi = $this->Home_model->getSelectData("*", "instansi", "WHERE deleted_at is null ORDER BY nama ASC");

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $data['instansi_data'] = $getDataInstansi->result();

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            
            if($modePage=='OncardTransaksi'){
                $this->load->view('user/'.$role.'/data_source_onboard_page_advanced.php', $data);
            }else if($modePage=='OntimeLaporan'){
                $this->load->view('user/'.$role.'/data_source_onboard_page_ontime_laporan.php', $data);
            }else {
                $this->load->view('user/'.$role.'/data_source_onboard_page_ontuition.php', $data);
            }
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function DataSourceONBOARDAdvanced()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/data_source_onboard_page_advanced.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function OrangtuaMonitoring()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ortu_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function IpaymuPanel()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ipaymu_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function IpaymuPanelBiayaPendidikan()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ipaymu_page_biaya_pendidikan.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function IpaymuCreateInvoice()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ipaymu_page_create_invoice.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function IpaymuCreateInvoiceByInstansiID()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $idInstansi = $this->uri->segment(3);
            $data['idInstansi'] = $idInstansi;

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ipaymu_page_create_invoice_by_instansi.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function ShowDataRates()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            // $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/rates_data.php', $data);
            // $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function getDataRates()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $getData = $this->db->query("WITH FilteredData AS (
                SELECT 
                    created_at,
                    updated_at
                FROM 
                    token_request
                WHERE 
                    token_request.implemets_id LIKE '%SHOPPING%' 
                ORDER BY 
                    created_at DESC
                LIMIT 10
            )
            SELECT 
                AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) AS average_time_seconds
            FROM 
                FilteredData;")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    // public function getDataEachMinute()
    // {
    //     if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
    //         $function = '';
    //         $function = 'CPanel_Admin';
    //         $role = $this->session->userdata('_permission');
            
    //         date_default_timezone_set('Asia/Jakarta');

            

    //     //     $getData = $this->db->query("SELECT 
    //     //         te.name, 
    //     //         te.instansi_id, 
    //     //         i.nama AS instansi_nama, 
    //     //         te.start, 
    //     //         te.end, 
    //     //         TIMESTAMPDIFF(SECOND, te.start, te.end) AS duration_seconds,
    //     //         k.nama_kantin AS kantin_nama
    //     //     FROM time_execute te
    //     //     LEFT JOIN instansi i ON te.instansi_id = i.id
    //     //     LEFT JOIN kantin k ON SUBSTRING_INDEX(te.name, '-', 1) = k.id
    //     //     WHERE te.end IS NOT NULL
    //     //     -- AND te.start >= NOW() - INTERVAL 10 HOUR;        
    //     //     AND te.start = NOW() ;
    //     // ")->result();

    //     // $getData = $this->db->query("SELECT 
    //     // te.name, 
    //     //     te.instansi_id, 
    //     //     i.nama AS instansi_nama, 
    //     //     te.start, 
    //     //     te.end, 
    //     //     TIMESTAMPDIFF(SECOND, te.start, te.end) AS duration_seconds,
    //     //     k.nama_kantin AS kantin_nama
    //     // FROM time_execute te
    //     // LEFT JOIN instansi i ON te.instansi_id = i.id
    //     // LEFT JOIN kantin k ON SUBSTRING_INDEX(te.name, '-', 1) = k.id
    //     // WHERE te.end IS NOT NULL
    //     // AND DATE(te.start) = CURDATE();
    //     // ")->result();


    //     $getData = $this->db->query("SELECT 
    //                     te.name, 
    //                     te.instansi_id, 
    //                     i.nama AS instansi_nama, 
    //                     te.start, 
    //                     te.end, 
    //                     TIMESTAMPDIFF(SECOND, te.start, te.end) AS duration_seconds,
    //                     k.nama_kantin AS kantin_nama
    //                 FROM time_execute te
    //                 LEFT JOIN instansi i ON te.instansi_id = i.id
    //                 LEFT JOIN kantin k ON SUBSTRING_INDEX(te.name, '-', 1) = k.id
    //                 WHERE te.end IS NOT NULL
    //                 AND te.start BETWEEN '2025-04-25 08:45:00' AND '2025-04-25 11:05:00';        
    //     ")->result();

    //         echo json_encode(array("status"=>true,"data"=>$getData));


    //     } else {
    //         $data['levelUser'] = "";
    //         $this->load->view('loginregister/login.php', $data);
    //     }
    // }
    

    public function getDataEachMinute()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {

            date_default_timezone_set('Asia/Jakarta');

            $date = $this->input->get('date'); // Format expected: 'YYYY-MM-DD'

            // Use today's date if no date is selected
            if (!$date) {
                $date = date('Y-m-d');
            }

            $getData = $this->db->query("
            SELECT 
                te.name, 
                te.instansi_id, 
                i.nama AS instansi_nama, 
                te.start, 
                te.end, 
                TIMESTAMPDIFF(SECOND, te.start, te.end) AS duration_seconds,
                k.nama_kantin AS kantin_nama,
                
                SUBSTRING_INDEX(te.name, '-', 1) AS version_trx,
                
                SUBSTRING_INDEX(SUBSTRING_INDEX(te.name, '-', 2), '-', -1) AS kantin_id_segment
            FROM time_execute te
            LEFT JOIN instansi i ON te.instansi_id = i.id
            LEFT JOIN kantin k ON SUBSTRING_INDEX(SUBSTRING_INDEX(te.name, '-', 2), '-', -1) = k.id
            WHERE te.end IS NOT NULL
            AND DATE(te.start) = ?
        ", [$date])->result();
            echo json_encode([
                "status" => true,
                "data" => $getData
            ]);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    
    public function IpaymuHistoryInvoice()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ipaymu_page_history_invoice.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function IpaymuPanelDetail()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/ipaymu_page_detail.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function getDataAgensiAll()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {
            
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            // Get the agensi data
            $getData = $this->Home_model->getSelectData(
                "*, 
                instansi.id AS idINSTANSI,
                (SELECT balance FROM account WHERE account.instansi_id = instansi.id AND account.account_level = 'owner' LIMIT 1) AS punyaoncard,
                (SELECT balance FROM account WHERE account.instansi_id = instansi.id AND account.account_level = 'owner' AND account.account_type = 'billing' LIMIT 1) AS punyaontuition",
                "instansi, users",
                "WHERE instansi.id = users.instansi_id AND users.role = 'agensi' AND instansi.deleted_at IS NULL"
            )->result();

            // Loop and enrich each instansi with package_instalations info
            foreach ($getData as &$row) {
                $row->package = $this->Home_model->getSelectData(
                    "name, status, instansi_id",
                    "package_instalations",
                    "WHERE instansi_id = {$row->idINSTANSI} ORDER BY id"
                )->result(); // You can use `row()` for a single result
            }

            echo json_encode([
                "status" => true,
                "data" => $getData
            ]);

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getAllDataSiswaOnly()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {
            
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $getData = $this->Home_model->getSelectData(
                "siswa.nama_lengkap, siswa.telp_ortu, instansi.nama AS instansi_nama, (SELECT account.account_number from account WHERE account.user_id=siswa.user_id) account_number",
                "siswa JOIN instansi ON siswa.instansi_id = instansi.id",
                "WHERE siswa.telp_ortu LIKE '628%' AND siswa.deleted_at IS NULL AND instansi.deleted_at IS NULL ORDER BY siswa.created_at ASC"
            )->result();
            

            echo json_encode([
                "status" => true,
                "data" => $getData
            ]);

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getDataAgensiAllPushNotif()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {
            
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            // Get the agensi data
            $getData = $this->Home_model->getSelectData(
                "*, 
                instansi.id AS idINSTANSI,
                (SELECT balance FROM account WHERE account.instansi_id = instansi.id AND account.account_level = 'owner' LIMIT 1) AS punyaoncard,
                (SELECT balance FROM account WHERE account.instansi_id = instansi.id AND account.account_level = 'owner' AND account.account_type = 'billing' LIMIT 1) AS punyaontuition",
                "instansi, users",
                "WHERE instansi.id = users.instansi_id AND users.role = 'agensi' AND instansi.deleted_at IS NULL"
            )->result();

            // Loop and enrich each instansi with package_instalations info
            foreach ($getData as &$row) {
                $row->package = $this->Home_model->getSelectData(
                    "name, status, instansi_id",
                    "package_instalations",
                    "WHERE instansi_id = {$row->idINSTANSI} ORDER BY id"
                )->result(); // You can use `row()` for a single result
            }

            echo json_encode([
                "status" => true,
                "data" => $getData
            ]);

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getDataAgensiAllWatzap()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {
            
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            // Get the agensi data
            $getData = $this->Home_model->getSelectData(
                "*, watzap_master_token.id watzap_id",
                "instansi, watzap_master_token, users",
                "WHERE watzap_master_token.kode_instansi=instansi.kode_instansi AND watzap_master_token.status='aktif' AND watzap_master_token.nomor_wa is not null AND instansi.id = users.instansi_id AND users.role = 'agensi' AND instansi.deleted_at IS NULL"
            )->result();

            echo json_encode([
                "status" => true,
                "data" => $getData
            ]);

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function ShowDataFCMToken()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {
            
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $instansiID = $this->uri->segment(3);

            $getData = $this->Home_model->getSelectData(
                "*",
                "users, orangtua",
                "WHERE users.id=orangtua.user_id AND users.token_firebase is not null AND users.role='wali' AND users.deleted_at is null"
            )->result();
            

            if($instansiID!='all'){
                $getDataFromTuition = $this->Home_model->getSelectData2nd(
                    "*, organisasi.name organame",
                    "wali_siswa, siswa, users, organisasi", 
                    "WHERE wali_siswa.user_id=users.id AND wali_siswa.siswa_id=siswa.id AND siswa.organisasi_id = organisasi.id AND organisasi.oncard_organisasi_id=$instansiID"
                )->result();
            }else {
                $getDataFromTuition = $this->Home_model->getSelectData2nd(
                    "*, organisasi.name organame",
                    "wali_siswa, siswa, users, organisasi", 
                    "WHERE wali_siswa.user_id=users.id AND wali_siswa.siswa_id=siswa.id AND siswa.organisasi_id = organisasi.id"
                )->result();
            }
            
            
            // Create data3 by matching on user_id <-> oncard_user_id
            $data3 = [];
            
            foreach ($getData as $d1) {
                foreach ($getDataFromTuition as $d2) {
                    if ($d1->user_id == $d2->oncard_user_id) {
                        $data3[] = [
                            'user_id' => $d1->user_id,
                            'nama_lengkap' => $d1->nama_lengkap,
                            'token_firebase' => $d1->token_firebase,
                            'nama_siswa' => $d2->nama,
                            'instansi_id' => $d2->oncard_organisasi_id,
                            'instansi_name' => $d2->organame,
                            'siswa_id' => $d2->siswa_id,
                            'siswa_program' => $d2->siswa_program,
                            // Add other fields you want
                        ];
                    }
                }
            }
            
            echo json_encode([
                "status" => true,
                "data" => $data3
            ]);
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function SendPushNotification()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {

            $input = json_decode(file_get_contents('php://input'), true);
            $title = $input['title'];
            $body = $input['body'];
            $tokens = $input['tokens']; // array of ['token' => ..., 'user' => ...] format expected

            // Step 1: Authenticate
            $loginUrl = "http://103.179.56.190:8010/api/login";
            $loginPayload = json_encode([
                'username' => 'ridhohawali3',
                'password' => 'password'
            ]);

            $ch = curl_init($loginUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $loginPayload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

            $loginResponse = curl_exec($ch);
            $loginStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $loginData = json_decode($loginResponse, true);

            if ($loginStatus !== 200 || !$loginData['success']) {
                echo json_encode(['status' => 'error', 'message' => 'Authentication failed.']);
                return;
            }

            $authToken = $loginData['token'];

            // Step 2: Send notifications and track recipients
            $recipients = [];

            foreach ($tokens as $item) {
                $targetToken = $item['token'];
                $userName = $item['user']; // e.g. "Ridho Hawali Fani"
                $instansiID = $item['instansi']; // e.g. "Ridho Hawali Fani"
                $userID = $item['user_id']; // e.g. "Ridho Hawali Fani"

                $pushUrl = "103.179.56.190:8010/api/notifications";

                $pushPayload = json_encode([
                    'title' => $title,
                    'body' => $body,
                    'device_token' => $targetToken
                ]);

                $ch = curl_init($pushUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $pushPayload);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $authToken
                ]);

                $pushResponse = curl_exec($ch);
                                
                $pushResult = json_decode($pushResponse, true);

                // In case of decoding error, fallback
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $pushResult = [
                        'raw_response' => $pushResponse
                    ];
                }

                // Add extra context
                $pushResult['instansi'] = $instansiID;
                $pushResult['user_id']  = $userID;

                $dataXXX = [
                    'channel' => 'push-notif-by-super-admin',
                    'data'    => json_encode($pushResult),
                    'status'  => 'success',
                ];

                $resultInsert = $this->Home_model->insertData("push_notification_logs", $dataXXX);
                curl_close($ch);

                $recipients[] = $userName;
            }

            echo json_encode([
                'status' => 'success',
                'token' => $targetToken,
                'title' => $title,
                'body' => $body,
                'message' => 'Process done!'
            ]);
        }
    }

    public function SendNotifyFirebase()
    {
            
            $function = '';
            $function = 'CPanel_Admin';
            
            $data = [];
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('notify_all.php', $data);
    }
    
    public function SendNotifyWATuition()
    {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('notify_all_wa.php', $data);
    }
    
    
    public function SendNotifyWAAbseniKelengkapan()
    {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('notify_all_absen_kelengkapan.php', $data);
    }
    
    public function SendNotifyWAAbseniKelengkapanViewOnlyWithoutNotify()
    {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('notify_all_absen_kelengkapan_without_notify.php', $data);
    }

    public function ShowDataFCMTokenAutoBot()
        {
            // STEP 1: Set filter date (can be dynamically set through URI segment)
            $strDate = $this->uri->segment(3);
            $tglfilter = $strDate; // Example static date
            // $tglfilter = '2025-07-01'; // Example static date

            // $getDataUsers = $this->Home_model->getSelectData(
            //     "*",
            //     "users, orangtua",
            //     "WHERE users.id = orangtua.user_id 
            //         AND users.token_firebase IS NOT NULL 
            //         AND users.role = 'wali' 
            //         AND users.deleted_at IS NULL"
            // )->result();
    
            // // STEP 3: Fetch all linked students for parents under a specific organization (ID = 2)
            // $getDataSiswa = $this->Home_model->getSelectData2nd(
            //     "*, organisasi.name organame",
            //     "wali_siswa, siswa, users, organisasi",
            //     "WHERE wali_siswa.user_id = users.id 
            //         AND wali_siswa.siswa_id = siswa.id 
            //         AND siswa.organisasi_id = organisasi.id 
            //         AND organisasi.id = 2"
            // )->result();
    
            // // STEP 4: Fetch billing data where the start date or due date matches filter
            // $getDataTagihan = $this->Home_model->getSelectData2nd(
            //     "*",
            //     "siswa, organisasi, tagihan, tagihan_user",
            //     "WHERE siswa.organisasi_id = organisasi.id 
            //         AND organisasi.id = tagihan.organisasi_id 
            //         AND tagihan.id = tagihan_user.tagihan_id 
            //         AND (tagihan.tanggal_mulai_tagihan = '$tglfilter' 
            //             OR tagihan.tanggal_jatuh_tempo = '$tglfilter')"
            // )->result();
            

            // STEP 2: Fetch all parents (users with role 'wali' and firebase token)
            $getDataUsers = $this->Home_model->getSelectData(
                "users.username, users.token_firebase,users.role, orangtua.user_id,orangtua.nama_lengkap",
                // "*",
                "users, orangtua",
                "WHERE users.id = orangtua.user_id 
                    AND users.token_firebase IS NOT NULL 
                    AND users.role = 'wali' 
                    AND users.deleted_at IS NULL"
            )->result();

            // STEP 3: Fetch all linked students for parents under a specific organization (ID = 2)
            $getDataSiswa = $this->Home_model->getSelectData2nd(
                // "*, organisasi.name organame",
                "organisasi.name organame, siswa.nama, wali_siswa.user_id, users.id, wali_siswa.siswa_id, siswa.id, siswa.organisasi_id, organisasi.id, siswa.oncard_user_id, organisasi.oncard_organisasi_id",
                "wali_siswa, siswa, users, organisasi",
                "WHERE wali_siswa.user_id = users.id 
                    AND wali_siswa.siswa_id = siswa.id 
                    AND siswa.organisasi_id = organisasi.id 
                    AND organisasi.id = 2"
            )->result();

            // STEP 4: Fetch billing data where the start date or due date matches filter
            $getDataTagihan = $this->Home_model->getSelectData2nd(
                // "*",
                "siswa.organisasi_id, organisasi.id,tagihan.nama_tagihan,tagihan_user.jumlah_tagihan, tagihan.organisasi_id, tagihan.id, tagihan_user.tagihan_id, tagihan.tanggal_mulai_tagihan,tagihan.tanggal_jatuh_tempo,siswa.oncard_siswa_id",
                "siswa, organisasi, tagihan, tagihan_user",
                "WHERE siswa.organisasi_id = organisasi.id 
                    AND organisasi.id = tagihan.organisasi_id 
                    AND tagihan.id = tagihan_user.tagihan_id 
                    AND tagihan_user.status_pembayaran!='lunas'
                    AND (tagihan.tanggal_mulai_tagihan = '$tglfilter' 
                        OR tagihan.tanggal_jatuh_tempo = '$tglfilter')
                    AND tagihan_user.deleted_at is null"
            )->result();

            // STEP 5: Grouping data by user (parent)
            $dataGrouped = [];

            foreach ($getDataUsers as $user) {
                $userId = $user->user_id;

                foreach ($getDataSiswa as $siswa) {
                    if ($siswa->oncard_user_id != $userId) continue;

                    // Match tagihan based on siswa
                    $tagihans = array_filter($getDataTagihan, function ($tag) use ($siswa) {
                        return $tag->oncard_siswa_id == $siswa->siswa_id;
                    });

                    if (empty($tagihans)) continue;

                    // Initialize group if not exists
                    if (!isset($dataGrouped[$userId])) {
                        $dataGrouped[$userId] = [
                            'user_id'        => $userId,
                            'nama_lengkap'   => $user->nama_lengkap,
                            'token_firebase' => $user->token_firebase,
                            'title'          => 'Reminder Pembayaran Tagihan',
                            'body'           => '',
                            'tokens'         => [],
                            'siswa_list'     => []
                        ];
                    }

                    // Build tagihan text per siswa
                    $tagihanText = "";
                    foreach ($tagihans as $tag) {
                        $tagihanText .= "- {$tag->nama_tagihan} sebesar Rp " . number_format($tag->jumlah_tagihan, 0, ',', '.') . " (Jatuh Tempo: {$tag->tanggal_jatuh_tempo})\n";
                    }

                    // Append to body notification
                    $dataGrouped[$userId]['body'] .= "Tagihan untuk siswa {$siswa->nama}:\n{$tagihanText}\n";

                    // Push unique tokens
                    if (!in_array($user->token_firebase, array_column($dataGrouped[$userId]['tokens'], 'token'))) {
                        $dataGrouped[$userId]['tokens'][] = [
                            'token'    => $user->token_firebase,
                            'user'     => $user->nama_lengkap,
                            'instansi' => $siswa->oncard_organisasi_id,
                            'user_id'  => $userId
                        ];
                    }

                    // Add siswa details
                    $dataGrouped[$userId]['siswa_list'][] = [
                        'nama_siswa'    => $siswa->nama,
                        'instansi_name' => $siswa->organame,
                        'siswa_id'      => $siswa->siswa_id,
                    // 'tagihan'       => array_values($tagihans)
                ];
            }
        }

        // STEP 6: Send notification to each grouped user
        foreach ($dataGrouped as $group) {
            $this->SendPushNotificationAutoBot(
                $group['title'],
                $group['body'],
                $group['tokens']
            );
        }

        // STEP 7: Return JSON response
        echo json_encode([
            "status" => true,
            "date" => $tglfilter,
        "data" => array_values($dataGrouped)
    ]);
}

    public function ShowDataFCMTokenAutoBot_1()
    {
        $getDataUsers = $this->Home_model->getSelectData(
            // Select kolom yang diinginkan dari users dan orangtua
            "users.id as user_id_ortu, users.username, users.email, users.token_firebase, users.role, 
            orangtua.id as orangtua_id,  orangtua.nama_lengkap, orangtua.jenis_kelamin, 
            orangtua.no_telepon",
            "users, orangtua",
            "WHERE users.id = orangtua.user_id 
            AND users.token_firebase IS NOT NULL 
            AND users.role = 'wali' 
            AND users.deleted_at IS NULL"
        )->result();

        echo json_encode([
            "status" => true,
            "data" => $getDataUsers
        ]);
    }

    public function ShowDataFCMTokenAutoBot_1_wa()
    {
        $getDataUsers = $this->Home_model->getSelectData(
            // Select kolom yang diinginkan dari users dan orangtua
            "users.id as user_id_ortu, users.username, users.email, users.token_firebase, users.role, 
            orangtua.id as orangtua_id,  orangtua.nama_lengkap, orangtua.jenis_kelamin, 
            orangtua.no_telepon",
            "users, orangtua",
            "WHERE users.id = orangtua.user_id 
            AND users.role = 'wali' 
            AND users.token_firebase IS NOT NULL
            AND users.deleted_at IS NULL"
        )->result();

        echo json_encode([
            "status" => true,
            "data" => $getDataUsers
        ]);
    }

    
    public function ShowDataFCMTokenAutoBot_2()
    {
        $getDataUsers = $this->Home_model->getSelectData2nd(
            "users.id as wali_user_id,
            users.name as wali_name,
            users.oncard_user_id,
            siswa.id as siswa_id,
            (SELECT siswa.user_id FROM siswa WHERE siswa.id=siswa_id) siswa_user_id,
            siswa.nama as siswa_nama,
            siswa.organisasi_id as oncard_organisasi_id,
            organisasi.name as organame,
            wali_siswa.hubungan,
            wali_siswa.status,
            wali_siswa.id as wali_siswa_id",
            "wali_siswa, siswa, users, organisasi", 
            "WHERE wali_siswa.siswa_id = siswa.id 
            AND wali_siswa.user_id = users.id 
            AND siswa.organisasi_id = organisasi.id 
            AND wali_siswa.status = 'active'"
        )->result();

        echo json_encode([
            "status" => true,
            "data" => $getDataUsers
        ]);
    }

    
    public function ShowDataFCMTokenAutoBot_3()
    {

        // HANYA MENGIRIMKAN KE INSTANSI TERTENTU, IN CASE PESANTRENDEMO ONLY RIGHT NOW!!! (organisasi_id == 2)

        date_default_timezone_set('Asia/Jakarta');
        $tglfilter = date("Y-m-d");
        // $tglfilter = '2025-09-10'; // for manually check
        
        $getDataUsers = $this->Home_model->getSelectData2nd(
            "tagihan_user.user_id, users.name, tagihan.tanggal_jatuh_tempo, tagihan.tanggal_mulai_tagihan, tagihan_user.status_pembayaran, tagihan_user.jumlah_belum_dibayarkan, tagihan.nama_tagihan",
            "tagihan_user, users, tagihan", 
            "WHERE tagihan_user.user_id = users.id
                AND tagihan_user.tagihan_id = tagihan.id
                AND tagihan_user.status_pembayaran = 'belum lunas'
                AND tagihan.deleted_at IS NULL
                AND (
                    tagihan.tanggal_mulai_tagihan = '$tglfilter'
                    OR tagihan.tanggal_jatuh_tempo = '$tglfilter'
                ) AND  (tagihan.tanggal_mulai_tagihan <= CURDATE()
                OR tagihan.tanggal_jatuh_tempo <= CURDATE())
                "
        )->result();
        
        echo json_encode([
            "status" => true,
            "data" => $getDataUsers,
            "date_given" => $tglfilter
        ]);
    }

    public function showdata_kelengkapan_from_3rd_party()
    {
        $instansiID = $this->uri->segment(3);
        $getDataUsers = $this->Home_model->getSelectData(
            // Select kolom yang diinginkan dari users dan orangtua
            "siswa.user_id,siswa.nama_lengkap, siswa.telp_ortu, (SELECT instansi.nama FROM instansi WHERE instansi.id=siswa.instansi_id) namaInstansi",
            "siswa",
            "WHERE siswa.telp_ortu LIKE '628%'
            AND siswa.deleted_at IS NULL
            AND siswa.instansi_id=$instansiID
            ORDER BY siswa.nama_lengkap ASC
            "
        )->result();

        echo json_encode([
            "status" => true,
            "data" => $getDataUsers
        ]);
    }
    
    public function showdata_kelengkapan_dataabsensi_from_3rd_party()
    {
        $instansiID = $this->uri->segment(3);
        $dateSelected = $this->uri->segment(4);
        $getDataUsers = $this->Home_model->getSelectData3rd(
            // Select kolom yang diinginkan dari users dan orangtua
            "absensi.organisasi_id,absensi.user_absensi_id,organisasi.network_identity oncard_instansi_id, (SELECT users.network_identity FROM users WHERE users.id=absensi.user_absensi_id) oncard_user_id, absensi.created_at",
            "absensi,organisasi",
            "WHERE absensi.organisasi_id=organisasi.id
            AND organisasi.network_identity=$instansiID
            AND absensi.created_at LIKE '%$dateSelected%'
            AND TIME(absensi.created_at) <= '07:30:00'
            "
        )->result();

        echo json_encode([
            "status" => true,
            "data" => $getDataUsers
        ]);
    }
    
    
    public function showdata_kelengkapan_dataabsensi_from_3rd_party_alumni()
    {
        $instansiID = $this->uri->segment(3);
        $getDataUsers = $this->Home_model->getSelectData3rd(
            // Select kolom yang diinginkan dari users dan orangtua
            "siswa_kelas.organisasi_id,siswa_kelas.sub_kelas_id,siswa_kelas.siswa_id,siswa_detail.name,users.network_identity,users.status_id",
            "siswa_kelas,siswa_detail,users,m_sub_kelas,organisasi",
            "WHERE organisasi.network_identity=$instansiID
            AND organisasi.id=siswa_kelas.organisasi_id 
            AND siswa_kelas.siswa_id=siswa_detail.id
            AND siswa_detail.user_id=users.id
            AND siswa_kelas.sub_kelas_id=m_sub_kelas.id
            AND (m_sub_kelas.name LIKE '%alumni%' OR m_sub_kelas.name LIKE '%turki%' OR m_sub_kelas.name LIKE '%abu dhabi%')
            AND users.status_id=1"
        )->result();

        echo json_encode([
            "status" => true,
            "data" => $getDataUsers
        ]);
    }


    public function getMFFMFKSSIW()
    {
        date_default_timezone_set('Asia/Jakarta');

        $instansiId = 2; // 👈 Ubah sesuai kebutuhan
        $startDate = '2025-06-01';
        $endDate = date("Y-m-d"); // Hari ini
        $batchSize = 10000;

        // Hitung total data
        $totalRows = $this->db->from('mutasi')
            ->join('instansi', 'mutasi.instansi_id = instansi.id')
            ->join('account', 'mutasi.account_id = account.id')
            ->where('instansi.id', $instansiId)
            ->where('mutasi.created_at >=', $startDate)
            ->where('mutasi.created_at <=', $endDate)
            ->count_all_results();

        $totalBatches = ceil($totalRows / $batchSize);

        if ($totalBatches === 1) {
            $query = $this->db->select('
                mutasi.*,
                instansi.nama AS instansi_nama,
                instansi.kode_instansi,
                instansi.alamat,
                account.customers_name,
                account.account_number,
                account.account_name
            ')
            ->from('mutasi')
            ->join('instansi', 'mutasi.instansi_id = instansi.id')
            ->join('account', 'mutasi.account_id = account.id')
            ->where('instansi.id', $instansiId)
            ->where('mutasi.created_at >=', $startDate)
            ->where('mutasi.created_at <=', $endDate)
            ->limit($batchSize)
            ->get();

            $getDataUsers = $query->result();

            header('Content-Type: application/json');
            header('Content-Disposition: attachment; filename="mutasi_data_' . $endDate . '_batch_1.json"');
            echo json_encode([
                "status" => true,
                "data" => $getDataUsers,
                "date_given" => $endDate
            ], JSON_PRETTY_PRINT);
            exit;
        } else {
            // Tampilkan daftar link download
            echo "<h3>Total data terlalu besar: $totalRows baris.</h3>";
            echo "<p>Silakan download setiap batch secara terpisah:</p><ul>";

            for ($batch = 0; $batch < $totalBatches; $batch++) {
                $url = base_url("CPanel_Admin/download_batch/$batch") . 
                    "?instansi_id=$instansiId&start_date=$startDate&end_date=$endDate&batchSize=$batchSize";

                echo "<li><a href='$url' target='_blank'>Download Batch " . ($batch + 1) . "</a></li>";
            }

            echo "</ul>";
        }
    }

    public function download_batch($batch = 0)
    {
        date_default_timezone_set('Asia/Jakarta');
    
        $instansiId = $this->input->get('instansi_id');
        $startDate = $this->input->get('start_date');
        $endDate = $this->input->get('end_date');
        $batchSize = $this->input->get('batchSize');
    
        if (!$instansiId || !$startDate || !$endDate) {
            show_error("Parameter instansi_id, start_date, dan end_date harus diisi.");
            return;
        }
    
        $offset = $batch * $batchSize;
    
        $query = $this->db->select('
            mutasi.*,
            instansi.nama AS instansi_nama,
            instansi.kode_instansi,
            instansi.alamat,
            account.customers_name,
            account.account_number,
            account.account_name
        ')
        ->from('mutasi')
        ->join('instansi', 'mutasi.instansi_id = instansi.id')
        ->join('account', 'mutasi.account_id = account.id')
        ->where('instansi.id', $instansiId)
        ->where('mutasi.created_at >=', $startDate)
        ->where('mutasi.created_at <=', $endDate)
        ->limit($batchSize, $offset)
        ->get();
    
        $getDataUsers = $query->result();
    
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="mutasi_data_' . $endDate . '_batch_' . ($batch + 1) . '.json"');
    
        echo json_encode([
            "status" => true,
            "instansi_id" => $instansiId,
            "batch" => $batch + 1,
            "date_from" => $startDate,
            "date_to" => $endDate,
            "data" => $getDataUsers
        ], JSON_PRETTY_PRINT);
        exit;
    }
    


    public function SendPushNotificationAutoBotMono()
    {
        $json = file_get_contents('php://input');
        $payload = json_decode($json, true);

        $title = $payload['title'];
        $body = $payload['body'];
        $tokens = $payload['tokens'];

        // Now call the internal method that actually sends the notifications
        $this->SendPushNotificationAutoBot($title, $body, $tokens);

    }
    
    public function SendPushNotificationAutoBotMonoWA()
    {
        $json = file_get_contents('php://input');
        $payload = json_decode($json, true);

        $title = $payload['title'];
        $body = $payload['body'];
        $tokens = $payload['tokens'];

        // Now call the internal method that actually sends the notifications
        $this->SendPushNotificationAutoBotWA($title, $body, $tokens);

    }
    
    public function SendPushNotificationAutoBotMonoResponseMBBRKS()
    {
        $json = file_get_contents('php://input');
        $payload = json_decode($json, true);

        $title = "Pembayaran Berhasil dari BRKS Mobile!";
        $body = 'Pembayaran Rp'.number_format($payload['body'], 0, ',', '.').' telah berhasil, silahkan cek pada Aplikasi Qrion Mobile Anda';
        $tokens = $payload['tokens'];

        // Now call the internal method that actually sends the notifications
        $this->SendPushNotificationAutoBot($title, $body, $tokens);

    }


    public function SendPushNotificationAutoBot($title, $body, $tokens)
    {
        // Step 1: Authenticate
        $loginUrl = "http://103.179.56.190:8010/api/login";
        $loginPayload = json_encode([
            'username' => 'ridhohawali3',
            'password' => 'password'
        ]);

        $ch = curl_init($loginUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $loginPayload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $loginResponse = curl_exec($ch);
        $loginStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $loginData = json_decode($loginResponse, true);

        if ($loginStatus !== 200 || !$loginData['success']) {
            echo json_encode(['status' => 'error', 'message' => 'Authentication failed.']);
            return;
        }

        $authToken = $loginData['token'];

        $no_telepon = '628';

        // Step 2: Send notifications
        foreach ($tokens as $item) {
            $targetToken = $item['token'];
            $userName = $item['user'];
            $no_telepon = $item['no_telepon']??'628';
            $usernameNya = $item['username'];
            $instansiID = $item['instansi'];
            $user_oncard_id = $item['user_oncard_id'];
            

            $pushUrl = "http://103.179.56.190:8010/api/notifications";

            $pushPayload = json_encode([
                'title' => $title,
                'body' => $body,
                'device_token' => $targetToken
            ]);

            $ch = curl_init($pushUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $pushPayload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $authToken
            ]);

            $pushResponse = curl_exec($ch);
            $pushResult = json_decode($pushResponse, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $pushResult = ['raw_response' => $pushResponse];
            }

            $pushResult['username'] = $usernameNya;
            $pushResult['nama_lengkap'] = $userName;
            $pushResult['user_oncard_id'] = $user_oncard_id;

            $dataXXX = [
                'channel' => 'push-notif-by-super-admin',
                'no_telepon' => $no_telepon,
                'data'    => json_encode($pushResult),
                'status'  => 'success',
            ];



            $this->Home_model->insertData("push_notification_logs", $dataXXX);

        }
    }
    
    
    public function SendPushNotificationAutoBotWA($title, $body, $tokens)
    {
        // Step 2: Send notifications
        foreach ($tokens as $item) {
            $targetToken = $item['token'];
            $userName = $item['user'];
            $no_telepon = $item['no_telepon'];
            $usernameNya = $item['username'];
            $instansiID = $item['instansi'];
            $user_oncard_id = $item['user_oncard_id'];
            
            $webhookUrl = base_url("WebhookOncard/sendMessageWatzapNoAuthBroadcastNotifyBroadcast");

            $waPayload = json_encode([
                'noWA' => $no_telepon,
                'pesan' => $body,
                'kodeInstansi' => $instansiID
            ]);

            $chWa = curl_init();
            curl_setopt($chWa, CURLOPT_URL, $webhookUrl);
            curl_setopt($chWa, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chWa, CURLOPT_POST, true);
            curl_setopt($chWa, CURLOPT_POSTFIELDS, $waPayload);
            curl_setopt($chWa, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);

            $responseWa = curl_exec($chWa);
            $httpCodeWa = curl_getinfo($chWa, CURLINFO_HTTP_CODE);
            curl_close($chWa);

            // Optional: log the response or handle failure
            $waLogData = [
                'channel' => 'whatsapp-via-webhook',
                'no_telepon' => $no_telepon,
                'data' => $body,
                'status' => $httpCodeWa === 200 ? 'success' : 'failed',
            ];
            $this->Home_model->insertData("push_notification_logs", $waLogData);
        }
    }



    
    
    public function getDataAgensiTrxToday()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $strDate = $this->uri->segment(3);
            $nextDate = date('Y-m-d', strtotime($strDate . ' +1 day')); // Calculate the next day

            date_default_timezone_set('Asia/Jakarta');
            
            $getData = $this->Home_model->getSelectData("
            *, instansi.id idINSTANSI, 
            (SELECT SUM(mutasi.credit_amount) FROM mutasi WHERE mutasi.instansi_id=instansi.id 
            AND mutasi.created_at BETWEEN '$strDate 00:00:00' AND '$nextDate 00:00:00' AND mutasi.description='admin fee' AND mutasi.debit_amount>100 GROUP BY mutasi.instansi_id) muted,
            (SELECT DISTINCT COUNT(mutasi.id) FROM mutasi WHERE mutasi.instansi_id=instansi.id AND mutasi.created_at BETWEEN '$strDate 00:00:00' AND '$nextDate 00:00:00' AND invoice like '%SHOPPING' GROUP BY mutasi.instansi_id) muted2
            ","instansi,users", "
            WHERE instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function getInfoTagihan()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');
            
            $getData;

            $strDate = $this->uri->segment(3);
            if($strDate){
                $getData = $this->Home_model->getSelectData2nd("*","withdrawal", "WHERE instansi_id=$strDate AND status='progress' AND deleted_at is null")->result();
            }else {
                $getData = $this->Home_model->getSelectData2nd("*","withdrawal", "WHERE status='progress' AND deleted_at is null")->result();
            }
            
            
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function updateStatusTagihan()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $noted = $this->input->post('noted');
            // $selected_payment_gateway_ids_combined = $this->input->post('selected_payment_gateway_ids_combined');

                date_default_timezone_set('Asia/Jakarta');
            
                $dataXXX = array(
                    'status'  => $status,
                    'noted_response_admin'  => $noted,
                    'updated_at'  => date('Y-m-d H:i:s'),
                );
                // $dataYYY = array(
                //     'is_done'  => 0,
                //     'props'  => "Dicairkan dengan catatan : ".$noted,
                //     'updated_at'  => date('Y-m-d H:i:s'),
                // );
                $resultInsert = $this->Home_model->updateData2nd("withdrawal",$dataXXX,"id=$id");
                // $resultInsert2 = $this->Home_model->updateData("payment_gateways",$dataYYY,"id IN($selected_payment_gateway_ids_combined)");

                if($resultInsert){
                    echo json_encode(array("status"=>true,"data"=>[],"message"=>"Success!"));
                }else {
                    echo json_encode(array("status"=>false,"data"=>[],"message"=>"Terjadi kesalahan. [23]"));
                }
          
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function getDataKartu50Max()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $getData = $this->Home_model->getSelectData("*","datacenter_kartu", "WHERE 1=1 ORDER BY created_at DESC LIMIT 50")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getDataKartuFromTo()
{
    if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
        
        $function = '';
        $function = 'CPanel_Admin';
        $role = $this->session->userdata('_permission');
        
        // Join three tables to get kartu data with account and connection history
        $getData = $this->Home_model->getSelectData(
            "dk.*, 
             a.customers_name, 
             a.balance, 
             a.limits_dates,
             a.user_id as account_user_id,
             a.instansi_id,
             i.nama as instansi_nama,
             hc.created_at as waktu_terkoneksi", 
            "datacenter_kartu dk", 
            "LEFT JOIN account a ON dk.card_id = a.card_id 
             LEFT JOIN instansi i ON a.instansi_id = i.id
             LEFT JOIN history_cards hc ON a.user_id = hc.user_id AND hc.status_connecting = 'connected'
             WHERE dk.batch='fastcard_almuslimun_sep' 
             -- WHERE dk.created_at < '2025-10-01'
             GROUP BY a.card_id,dk.card_id
             ORDER BY dk.created_at DESC"
        )->result();
        
        // Process the data to create the desired structure
        $processedData = array();
        foreach ($getData as $row) {
            $item = $row;
            
            // Create account object with the required fields
            $item->account = (object) array(
                'customers_name' => $row->customers_name,
                'balance' => $row->balance,
                'limits_dates' => $row->limits_dates,
                'user_id' => $row->account_user_id
            );
            
            // Add connection time
            $item->waktu_terkoneksi = $row->waktu_terkoneksi;
            
            // Remove the individual fields if you don't want them at the root level
            unset($item->customers_name);
            unset($item->balance);
            unset($item->limits_dates);
            unset($item->account_user_id);
            
            $processedData[] = $item;
        }
        
        echo json_encode(array("status"=>true,"data"=>$processedData));

    } else {
        $data['levelUser'] = "";
        $this->load->view('loginregister/login.php', $data);
    }
}
    public function getDataAgensiAllIpaymu()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');

            $strDate = $this->uri->segment(3);
            
            if($strDate){
                $getData = $this->Home_model->getSelectData("
                    *, 
                    instansi.id AS idINSTANSI, 
                    (
                        SELECT SUM(
                            JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
                            JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))
                        ) 
                        FROM payment_gateways 
                        WHERE 
                            payment_gateways.instansi_id = instansi.id 
                            AND payment_gateways.status_id = 10 
                            AND is_done = 0 
                            AND providers='ipaymu'
                            AND (clasification='topup' OR clasification IS NULL)
                            AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                            AND STR_TO_DATE(
                                JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.paid_at')), 
                                '%Y-%m-%d %H:%i:%s'
                            ) BETWEEN 
                                CONCAT('$strDate', ' 00:00:00') 
                                AND CONCAT('$strDate', ' 23:59:59')
                    ) AS jumlah_saldo_available_ipaymu, 
                    (
                        SELECT GROUP_CONCAT(payment_gateways.id)
                        FROM payment_gateways 
                        WHERE 
                            payment_gateways.instansi_id = instansi.id 
                            AND payment_gateways.status_id = 10 
                            AND is_done = 0 
                            AND providers='ipaymu'
                            AND (clasification='topup' OR clasification IS NULL)
                            AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                            AND STR_TO_DATE(
                                JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.paid_at')), 
                                '%Y-%m-%d %H:%i:%s'
                            ) BETWEEN 
                                CONCAT('$strDate', ' 00:00:00') 
                                AND CONCAT('$strDate', ' 23:59:59')
                    ) AS payment_gateway_ids
                ", "instansi, users", "WHERE instansi.id = users.instansi_id AND users.role = 'agensi' AND instansi_id NOT IN(4) AND instansi.deleted_at IS NULL")->result();

                echo json_encode(array("status"=>true,"data"=>$getData,"date"=>"Creating invoice at ".$strDate));
            }else {
                $getData = $this->Home_model->getSelectData(
                    "*, 
                    instansi.id AS idINSTANSI, 
                    (
                        SELECT SUM(
                            JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
                            JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))
                        ) 
                        FROM payment_gateways 
                        WHERE payment_gateways.instansi_id = instansi.id 
                        AND payment_gateways.status_id = 10 
                        AND is_done = 0 
                        AND providers='ipaymu'
                        AND (clasification='topup' OR clasification IS NULL)
                        AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                        
                    ) AS jumlah_saldo_available_ipaymu",
                    "instansi, users",
                    "WHERE 
                        instansi.id = users.instansi_id 
                        AND users.role = 'agensi' 
                        AND instansi.deleted_at IS NULL AND instansi_id NOT IN(4)"
                )->result();
                
                echo json_encode(array("status"=>true,"data"=>$getData));
            }
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }


    public function getDataAgensiAllIpaymuByMonth()
        {
            if ($this->session->userdata('_token') && $this->session->userdata('_permission') == 'owner') {

                $function = 'CPanel_Admin';
                $role = $this->session->userdata('_permission');

                $month = $this->uri->segment(3); // format: YYYY-MM (e.g., 2025-05)
                $instansi_id = $this->uri->segment(4); // ID instansi

                if ($month && $instansi_id) {
                    $startDate = $month . '-01';
                    $endDate = date("Y-m-t", strtotime($startDate)); // get last day of the month

                    $getData = $this->Home_model->getSelectData("
                        *, 
                        instansi.id AS idINSTANSI,
                        (
                            SELECT SUM(
                                JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
                                JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))
                            )
                            FROM payment_gateways 
                            WHERE 
                                payment_gateways.instansi_id = instansi.id 
                                AND payment_gateways.status_id = 10 
                                AND is_done = 0 
                                AND (clasification='topup' OR clasification IS NULL)
                                AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                                AND STR_TO_DATE(
                                    JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.paid_at')), 
                                    '%Y-%m-%d %H:%i:%s'
                                ) BETWEEN 
                                    '$startDate 00:00:00' AND '$endDate 23:59:59'
                        ) AS jumlah_saldo_available_ipaymu,
                        (
                            SELECT GROUP_CONCAT(payment_gateways.id)
                            FROM payment_gateways 
                            WHERE 
                                payment_gateways.instansi_id = instansi.id 
                                AND payment_gateways.status_id = 10 
                                AND is_done = 0 
                                AND (clasification='topup' OR clasification IS NULL)
                                AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                                AND STR_TO_DATE(
                                    JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.paid_at')), 
                                    '%Y-%m-%d %H:%i:%s'
                                ) BETWEEN 
                                    '$startDate 00:00:00' AND '$endDate 23:59:59'
                        ) AS payment_gateway_ids
                    ", 
                    "instansi, users", 
                    "WHERE 
                        instansi.id = users.instansi_id 
                        AND users.role = 'agensi' 
                        AND instansi.deleted_at IS NULL 
                        AND instansi.id = '$instansi_id'
                    ")->result();

                    echo json_encode(array(
                        "status" => true,
                        "data" => $getData,
                        "date" => "Monthly report for " . $month
                    ));
                } else {
                    echo json_encode(array(
                        "status" => false,
                        "message" => "Parameter bulan dan instansi_id dibutuhkan"
                    ));
                }

            } else {
                $data['levelUser'] = "";
                $this->load->view('loginregister/login.php', $data);
            }
        }

    
    
    public function getDataAgensiAllIpaymuBiayaPendidikan()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            $getData = $this->Home_model->getSelectData(
                "*, 
                instansi.id AS idINSTANSI, 
                (
                    SELECT account_number 
                    FROM account
                    WHERE account.instansi_id = idINSTANSI AND account_type = 'billing' AND account_level='agency' LIMIT 1
                ) AS account_number,
                (
                    SELECT account_number 
                    FROM account
                    WHERE account.instansi_id = idINSTANSI AND account_type = 'billing_cash' AND account_level='agency' LIMIT 1
                ) AS account_number_cash,
                (
                    SELECT balance 
                    FROM account
                    WHERE account.instansi_id = idINSTANSI AND account_type = 'billing' LIMIT 1
                ) AS balance,
                (
                    SELECT SUM(
                        jumlah_topup
                    ) 
                    FROM payment_gateways 
                    WHERE payment_gateways.instansi_id = instansi.id 
                    AND payment_gateways.status_id = 10 
                    AND providers='ipaymu'
                    AND clasification!='topup'
                    AND payment_method='va'
                    AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                    AND payment_gateways.invoice LIKE '%BILLER%'
                    AND (is_done = 0)
                ) AS jumlah_saldo_available_ipaymu,
                (
                    SELECT SUM(
                        JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
                        JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))
                    ) 
                    FROM payment_gateways 
                    WHERE payment_gateways.instansi_id = instansi.id 
                    AND payment_gateways.status_id = 10 
                    AND providers='ipaymu'
                    AND payment_method='plugins'
                    AND clasification!='topup'
                    AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                    AND payment_gateways.invoice LIKE '%BILLER%'
                    AND (is_done = 0)
                ) AS jumlah_saldo_original,
                (
                    SELECT GROUP_CONCAT(payment_gateways.id) 
                    FROM payment_gateways 
                    WHERE payment_gateways.instansi_id = instansi.id 
                    AND payment_gateways.status_id = 10 
                    AND providers='ipaymu'
                    AND clasification!='topup'
                    AND payment_method='plugins'
                    AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                    AND payment_gateways.invoice LIKE '%BILLER%'
                    AND (is_done = 0)
                ) AS payment_gateway_ids_combined",
                "instansi, users",
                "WHERE instansi.id = users.instansi_id 
                AND users.role = 'agensi' 
                AND instansi.deleted_at IS NULL AND instansi.id NOT IN(4)"
            )->result();
            
            echo json_encode(array("status"=>true,"data"=>$getData));

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function showmeah(){
        // Step 1: Ambil data instansi
            $getData = $this->Home_model->getSelectData("
            *, 
            instansi.id AS idINSTANSI, 
            (
                SELECT SUM(
                    JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
                    JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))
                ) 
                FROM payment_gateways 
                WHERE 
                    payment_gateways.instansi_id = instansi.id 
                    AND payment_gateways.status_id = 10 
                    AND is_done = 0
                    AND providers='ipaymu'
                    AND payment_method='plugins'
                    AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
            ) AS jumlah_saldo_available_ipaymu, 
            (
                SELECT GROUP_CONCAT(payment_gateways.id)
                FROM payment_gateways 
                WHERE 
                    payment_gateways.instansi_id = instansi.id 
                    AND payment_gateways.status_id = 10 
                    AND is_done = 0
                    AND providers='ipaymu'
                    AND payment_method='plugins'
                    AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
            ) AS payment_gateway_ids
        ", "instansi, users", "WHERE instansi.id = users.instansi_id AND users.role = 'agensi' AND instansi.deleted_at IS NULL")->result();

        // Step 2: Ambil semua list_instansi dari payment_gateways_invoices dengan status = 0
        $invoices = $this->db
            ->select('list_instansi')
            ->where('status', 0)
            ->get('payment_gateways_invoices')
            ->result();

        $totalNominalByInstansi = [];

        // Step 3: Proses JSON per baris dan kumpulkan total nominal per instansi
        foreach ($invoices as $inv) {
            $items = json_decode($inv->list_instansi, true);
            if (is_array($items)) {
                foreach ($items as $item) {
                    $id = (int)$item['instansi_id'];
                    $nominal = (int)$item['nominal'];

                    if (!isset($totalNominalByInstansi[$id])) {
                        $totalNominalByInstansi[$id] = 0;
                    }
                    $totalNominalByInstansi[$id] += $nominal;
                }
            }
        }




    // Add a bridge and button
echo "<style>body{padding:15px;}</style>";
echo "<h3>Export Data ke CSV</h3>";
echo "<p>Gunakan tombol di bawah untuk mengekspor data saldo instansi ke dalam format CSV:</p>";
echo "<a href='https://oncard.id/CPanel_Admin/exportCsvMeah'  target='_blank' style='
    display: inline-block;
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
'>Export CSV</a><hr/><h3>Detail data</h3> ";
        // Step 4: Tampilkan hasil akhir
foreach ($getData as $row) {
    $idInstansi = (int)$row->idINSTANSI;
    $namaInstansi = $row->nama;
    $totalNominal = isset($totalNominalByInstansi[$idInstansi]) ? $totalNominalByInstansi[$idInstansi] : 0;


    
    echo "Instansi ID: {$idInstansi} <br>";
    echo "Nama instansi: {$namaInstansi} <br>";
    // echo "Total Nominal dari Invoices: Rp " . number_format($totalNominal, 0, ',', '.') . "<br>";
    echo "Saldo IPaymu Tersedia: Rp " . number_format($row->jumlah_saldo_available_ipaymu, 0, ',', '.') . "<br>";
    // echo "Payment Gateway IDs: {$row->payment_gateway_ids} <br>";
    echo "<hr>";
}


    }

    public function exportCsvMeah()
        {
            // Step 1: Fetch data like before
            $getData = $this->Home_model->getSelectData("
                *, 
                instansi.id AS idINSTANSI, 
                (
                    SELECT SUM(
                        JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
                        JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))
                    ) 
                    FROM payment_gateways 
                    WHERE 
                        payment_gateways.instansi_id = instansi.id 
                        AND payment_gateways.status_id = 10 
                        AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1'
                        AND is_done = 0
                ) AS jumlah_saldo_available_ipaymu
            ", "instansi, users", "WHERE instansi.id = users.instansi_id AND users.role = 'agensi' AND instansi.deleted_at IS NULL")->result();

            $invoices = $this->db
                ->select('list_instansi')
                ->where('status', 0)
                ->get('payment_gateways_invoices')
                ->result();

            $totalNominalByInstansi = [];

            foreach ($invoices as $inv) {
                $items = json_decode($inv->list_instansi, true);
                if (is_array($items)) {
                    foreach ($items as $item) {
                        $id = (int)$item['instansi_id'];
                        $nominal = (int)$item['nominal'];

                        // Only include if nominal > 0
                        if ($nominal > 0) {
                            if (!isset($totalNominalByInstansi[$id])) {
                                $totalNominalByInstansi[$id] = 0;
                            }
                            $totalNominalByInstansi[$id] += $nominal;
                        }
                    }
                }
            }

            // Step 2: Prepare the CSV headers
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="instansi_nominal.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');

            // Step 3: Open PHP output stream for CSV
            $output = fopen('php://output', 'w');

            // Add the CSV column headers
            fputcsv($output, ['tipe_rekening', 'no_rekening', 'nama_rekening', 'jumlah']);

            // Step 4: Loop through the data and write it to the CSV
            foreach ($getData as $rowData) {
                $idInstansi = (int)$rowData->idINSTANSI;
                $saldoIpaymu = $rowData->jumlah_saldo_available_ipaymu;

                // Skip rows where the saldo Ipaymu is <= 0
                if ($saldoIpaymu <= 0) {
                    continue;
                }

                // Hardcoded data
                $tipeRekening = "W";  // Modify as necessary
                $noRekening = "8253144442";  // Modify as necessary
                $namaRekening = $rowData->nama; // Or rowData->nama_instansi, based on your table structure

                // Write the row to the CSV
                fputcsv($output, [$tipeRekening, $noRekening, $namaRekening, $saldoIpaymu]);
            }

            // Step 5: Close the output stream
            fclose($output);
            exit();
        }

    public function getDatePoolInCurrentMonth()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            // $firstdate = $this->input->post('firstdate');
            // $lastdate = $this->input->post('lastdate');
            $firstdate = '2025-05-01';
            $lastdate = '2025-05-31';
            $instansi_id_pool = $this->input->post('instansi_id_pool');

            $getData = $this->db->query("SELECT
                dates.date,
                COALESCE(COUNT(pg.id), 0) AS total_payments
            FROM (
                SELECT
                    DATE_ADD('$firstdate', INTERVAL n DAY) AS date
                FROM (
                    SELECT a.N + b.N * 10 + c.N * 100 AS n
                    FROM (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a
                    CROSS JOIN (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
                    CROSS JOIN (SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) c
                ) AS numbers
                WHERE DATE_ADD('$firstdate', INTERVAL n DAY) BETWEEN '$firstdate' AND '$lastdate'
            ) AS dates
            LEFT JOIN payment_gateways pg ON DATE(pg.created_at) = dates.date 
                AND pg.status_id = 10 
                AND JSON_UNQUOTE(JSON_EXTRACT(pg.response, '$.status_code')) = '1'
                AND pg.is_done = 0
                AND pg.invoice NOT LIKE '%BILLER%'
                AND pg.instansi_id IN ($instansi_id_pool)
            GROUP BY dates.date
            ORDER BY dates.date;");

            // $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, (SELECT SUM(JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))) FROM payment_gateways WHERE payment_gateways.instansi_id=instansi.id AND payment_gateways.status_id=10 AND is_done=0) jumlah_saldo_available_ipaymu","instansi,users", "WHERE instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData->result()));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function getDataAgensiDetail()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            $idInstansi = $this->uri->segment(3);
            
            $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI","instansi,users", "WHERE instansi.id=$idInstansi AND instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function getAllPaymentGatewaysPendingPayment()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            $idInstansi = $this->uri->segment(3);
            
            $getData = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE status=0 ORDER BY created_at DESC")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function getDataAgensiAllIpaymuHistoryInvoice()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            $idInstansi = $this->uri->segment(3);
            
            $getData = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE status=1 ORDER BY created_at DESC")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function saveKartuManifest()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            
            $cardID = $this->uri->segment(3);
            
            $checkIFExist = $this->Home_model->getSelectData("*","datacenter_kartu", "WHERE card_id = '$cardID'")->result();

            if($checkIFExist){
                echo json_encode(array("status"=>false,"data"=>[],"message"=>"Sudah ada datanya!!!"));
                return false;
            }else {
                $dataXXX = array(
                    'card_id'  => $cardID,
                );
                $resultInsert = $this->Home_model->insertData("datacenter_kartu",$dataXXX);

                if($resultInsert){
                    echo json_encode(array("status"=>true,"data"=>[],"message"=>"Kartu berhasil diregistrasikan"));
                }else {
                    echo json_encode(array("status"=>false,"data"=>[],"message"=>"Terjadi kesalahan. [22]"));
                }
            }
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function createInvoie()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            
            $invoice = $this->input->post('invoice');
            $list_instansi = $this->input->post('list_instansi');
            $pg_ids = $this->input->post('pg_ids');
            $html = $this->input->post('html');
            $date_given = $this->input->post('date_given');
            
            $checkIFExist = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE date_invoice = '$date_given' AND status=0")->result();

            date_default_timezone_set('Asia/Jakarta');
            if($checkIFExist){
                echo json_encode(array("status"=>false,"data"=>[],"message"=>"Masih ada invoice yang harus diselesaikan!"));
                return false;
            }else {
                $dataXXX = array(
                    'invoice'  => $invoice,
                    'list_instansi'  => $list_instansi,
                    'pg_ids'  => $pg_ids,
                    'html'  => $html,
                    'date_invoice'  => $date_given,
                    'created_at'  => date("Y-m-d H:i:s"),
                    'updated_at'  => date("Y-m-d H:i:s"),
                    
                );
                $resultInsert = $this->Home_model->insertData("payment_gateways_invoices",$dataXXX);

                if($resultInsert){
                    echo json_encode(array("status"=>true,"data"=>[],"message"=>"Invoice berhasil dibuat! Cek pada list penagihan sekarang juga."));
                }else {
                    echo json_encode(array("status"=>false,"data"=>[],"message"=>"Terjadi kesalahan. [22]"));
                }
            }
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    
    public function FundManagementSubmitData() {
        if (!$this->session->userdata('_token') || $this->session->userdata('_permission') != 'owner') {
            $this->load->view('loginregister/login.php', ['levelUser' => '']);
            return;
        }
    
        // Enable database transaction
        $this->db->trans_start();
    
        try {
            $invoice = $this->input->post('invoice');
            $list_instansi = $this->input->post('list_instansi');
            $pg_ids = $this->input->post('transaction_ids');
            $html = $this->input->post('html');
            $date_given = $this->input->post('date_given');
            $mode = $this->input->post('mode');
            $pin = $this->input->post('pin');
    
            // Check for pending invoices
            $checkIFExist = $this->Home_model->getSelectData(
                "*",
                "payment_gateways_invoices",
                "WHERE date_invoice = '$date_given' AND status=0"
            )->result();
    
            if ($checkIFExist) {
                echo json_encode([
                    "status" => false,
                    "message" => "Masih ada invoice yang harus diselesaikan!"
                ]);
                return;
            }
    
            date_default_timezone_set('Asia/Jakarta');

            // Step 1: Insert into payment_gateways_invoices
            $dataXXX = [
                'invoice' => $invoice,
                'list_instansi' => $list_instansi,
                'pg_ids' => $pg_ids,
                'html' => $html,
                'jenis' => $mode,
                'date_invoice' => $date_given,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'status' => 0
            ];
    
            $resultInsert = $this->Home_model->insertData("payment_gateways_invoices", $dataXXX);
            $insertId = $this->db->insert_id();
    
            if (!$resultInsert) {
                throw new Exception("Gagal menyimpan invoice.");
            }
    
            // Process based on mode
            if ($mode == 'ONCARD') {
                // For ONCARD mode, mark transactions as done
                $ids = explode(',', $pg_ids);
                $this->db->where_in('id', $ids);
                $updateResult = $this->db->update('payment_gateways', ['is_done' => 1]);
    
                if (!$updateResult) {
                    throw new Exception("Gagal update status transaksi ONCARD.");
                }
            } 
            elseif ($mode == 'ONTUITION') {

                echo json_encode([
                    "status" => true,
                    "message" => "Proses pencairan ONTUITION masih dalam tahap pengembangan.",
                    "transfer_results" => $mode == 'ONTUITION' ? $transferResults : null
                ]);

                return false;
                // Process balance transfers via API
                $transferResults = $this->processBalanceTransfersViaAPI($list_instansi, $insertId);
                
                if (!$transferResults['overall_status']) {
                    // Forward the exact error message to frontend
                    echo json_encode([
                        'status' => false,
                        'message' => $transferResults['error_message'],
                        'details' => $transferResults['details']
                    ]);
                    return;
                }
    
                // Mark original transactions as done only if all transfers succeeded
                $ids = explode(',', $pg_ids);
                $this->db->where_in('id', $ids);
                $updateResult = $this->db->update('payment_gateways', ['is_done' => 1]);
                
                if (!$updateResult) {
                    throw new Exception("Gagal update status transaksi ONTUITION.");
                }
            }
    
            // Update invoice status to success
            $this->db->where('id', $insertId);
            $updateInvoiceStatus = $this->db->update('payment_gateways_invoices', ['status' => 1]);
    
            if (!$updateInvoiceStatus) {
                throw new Exception("Gagal update status invoice.");
            }
    
            // Commit transaction
            $this->db->trans_complete();
    
            echo json_encode([
                "status" => true,
                "message" => "Invoice berhasil dibuat! Proses $mode telah selesai.",
                "transfer_results" => $mode == 'ONTUITION' ? $transferResults : null
            ]);
    
        } catch (Exception $e) {
            $this->db->trans_rollback();
            echo json_encode([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    public function FundManagementSubmitDataDev() {
        if (!$this->session->userdata('_token') || $this->session->userdata('_permission') != 'owner') {
            $this->load->view('loginregister/login.php', ['levelUser' => '']);
            return;
        }
    
        // Enable database transaction
        $this->db->trans_start();
    
        try {
        $invoice = $this->input->post('invoice');
        $list_instansi = $this->input->post('list_instansi');
        $pg_ids = $this->input->post('transaction_ids');
        $html = $this->input->post('html');
        $date_given = $this->input->post('date_given');
        $mode = $this->input->post('mode');
        $pin = $this->input->post('pin');

        // Check for pending invoices
        $checkIFExist = $this->Home_model->getSelectData(
            "*",
            "payment_gateways_invoices",
            "WHERE date_invoice = '$date_given' AND status=0"
        )->result();

        if ($checkIFExist) {
            echo json_encode([
                "status" => false,
                "message" => "Masih ada invoice yang harus diselesaikan!"
            ]);
            return;
        }

        date_default_timezone_set('Asia/Jakarta');

        // Step 1: Insert into payment_gateways_invoices
        $dataXXX = [
            'invoice' => $invoice,
            'list_instansi' => $list_instansi,
            'pg_ids' => $pg_ids,
            'html' => $html,
            'jenis' => $mode,
            'date_invoice' => $date_given,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 0
        ];

        $resultInsert = $this->Home_model->insertData("payment_gateways_invoices", $dataXXX);
        $insertId = $this->db->insert_id();

        if (!$resultInsert) {
            throw new Exception("Gagal menyimpan invoice.");
        }

        // Process based on mode
        if ($mode == 'ONCARD') {
            // For ONCARD mode, mark transactions as done
            $ids = explode(',', $pg_ids);
            $this->db->where_in('id', $ids);
            $updateResult = $this->db->update('payment_gateways', ['is_done' => 1]);

            if (!$updateResult) {
                throw new Exception("Gagal update status transaksi ONCARD.");
            }
        } 
        elseif ($mode == 'ONTUITION') {
            // Step 1: Update payment_gateways rows
            $ids = explode(',', $pg_ids);
            
            // Get transaction data for calculation
            $this->db->select('instansi_id, SUM(jumlah_topup) as total_topup');
            $this->db->from('payment_gateways');
            $this->db->where_in('id', $ids);
            $this->db->group_by('instansi_id');
            $transaction_data = $this->db->get()->result();

            error_log("Transaction data found: " . count($transaction_data));

            if (empty($transaction_data)) {
                throw new Exception("Tidak ditemukan data transaksi untuk ID yang diberikan.");
            }

            // Update payment_gateways status
            $this->db->where_in('id', $ids);
            $updatePgResult = $this->db->update('payment_gateways', ['is_done' => 1]);
            
            if (!$updatePgResult) {
                throw new Exception("Gagal update status transaksi ONTUITION.");
            }

            // Step 2: Process account updates for each instansi
            foreach ($transaction_data as $data) {
                $instansi_id = $data->instansi_id;
                $total_topup = (float)$data->total_topup;

                error_log("Processing instansi_id: $instansi_id, total_topup: $total_topup");

                // Check if accounts exist before updating
                $billing_account = $this->db->select('*')
                    ->from('account')
                    ->where('instansi_id', $instansi_id)
                    ->where('account_level', 'agency')
                    ->like('account_type', 'billing')
                    ->get()
                    ->row();

                $billing_cash_account = $this->db->select('*')
                    ->from('account')
                    ->where('instansi_id', $instansi_id)
                    ->where('account_level', 'agency')
                    ->like('account_type', 'billing_cash')
                    ->get()
                    ->row();

                if (!$billing_account) {
                    error_log("Billing account not found for instansi_id: $instansi_id");
                    throw new Exception("Billing account tidak ditemukan untuk instansi ID: $instansi_id");
                }

                if (!$billing_cash_account) {
                    error_log("Billing cash account not found for instansi_id: $instansi_id");
                    throw new Exception("Billing cash account tidak ditemukan untuk instansi ID: $instansi_id");
                }

                // DEBUG: Log current state
                error_log("=== BEFORE UPDATE ===");
                error_log("Billing balance: " . $billing_account->balance);
                error_log("Billing cash balance: " . $billing_cash_account->balance);

                // Update agency billing account (kurangi saldo)
                $this->db->set('balance', "balance - $total_topup", FALSE);
                $this->db->where('id', $billing_account->id); // Use specific ID instead of conditions
                $updateBilling = $this->db->update('account');

                error_log("Billing update: " . ($updateBilling ? 'SUCCESS' : 'FAILED'));
                error_log("Billing SQL: " . $this->db->last_query());

                // Update agency billing_cash account (tambah saldo)
                $this->db->set('balance', "balance + $total_topup", FALSE);
                $this->db->where('id', $billing_cash_account->id); // Use specific ID instead of conditions
                $updateBillingCash = $this->db->update('account');

                error_log("Billing cash update: " . ($updateBillingCash ? 'SUCCESS' : 'FAILED'));
                error_log("Billing cash SQL: " . $this->db->last_query());

                // DEBUG: Log after update
                $updated_billing = $this->db->get_where('account', ['id' => $billing_account->id])->row();
                $updated_billing_cash = $this->db->get_where('account', ['id' => $billing_cash_account->id])->row();
                
                error_log("=== AFTER UPDATE ===");
                error_log("Billing balance: " . $updated_billing->balance);
                error_log("Billing cash balance: " . $updated_billing_cash->balance);

                if (!$updateBillingCash) {
                    throw new Exception("Gagal menambah saldo agency billing_cash untuk instansi ID: $instansi_id");
                }
            }

    
                // Step 3: Update withdrawal status in different database
                $db2 = $this->load->database('second', TRUE);

                foreach ($transaction_data as $data) {
                    $instansi_id = $data->instansi_id;
                    
                    $db2->where('instansi_id', $instansi_id);
                    $db2->where('status', 'progress');
                    
                    $updateWithdrawal = $db2->update('withdrawal', [
                        'status' => 'done',
                        'updated_at' => date('Y-m-d H:i:s')  // Add this line
                    ]);

                    if (!$updateWithdrawal) {
                        throw new Exception("Gagal update status withdrawal untuk instansi ID: $instansi_id");
                    }
                }
    
                $db2->close();
            }
    
            // Update invoice status to success
            $this->db->where('id', $insertId);
            $updateInvoiceStatus = $this->db->update('payment_gateways_invoices', ['status' => 1]);
    
            if (!$updateInvoiceStatus) {
                throw new Exception("Gagal update status invoice.");
            }
    
            // Commit transaction
            $this->db->trans_complete();
    
            if ($this->db->trans_status() === FALSE) {
                throw new Exception("Transaction failed.");
            }
    
            echo json_encode([
                "status" => true,
                "message" => "Invoice berhasil dibuat! Proses $mode telah selesai."
            ]);
    
        } catch (Exception $e) {
            $this->db->trans_rollback();
            
            if (isset($db2)) {
                $db2->trans_rollback();
                $db2->close();
            }
            
            error_log("Error in FundManagementSubmitDataDev: " . $e->getMessage());
            
            echo json_encode([
                "status" => false,
                "message" => $e->getMessage()
            ]);
        }
    }
    private function processBalanceTransfersViaAPI($list_instansi,$invoiceId) {
        $institutions = json_decode($list_instansi, true);
        $results = [];
        $allSuccess = true;
        $errorMessage = '';
    
        foreach ($institutions as $inst) {
            $instansi_id = $inst['instansi_id'];
            $nominal = $inst['nominal'];
    
            try {

                // 0. Get pin
                $getPIN = $this->db->query("
                    SELECT * FROM `account` 
                    WHERE instansi_id = ? 
                    AND account_type = 'primary'
                    AND account_level = 'agency'
                    LIMIT 1
                ", [$instansi_id])->row();
    
                if (!$getPIN) {
                    throw new Exception("PIN account not found for instansi_id: $instansi_id");
                }

                $pin = $getPIN->pin;


                // 1. Get account information
                $billingAccount = $this->db->query("
                    SELECT * FROM `account` 
                    WHERE instansi_id = ? 
                    AND account_type = 'billing'
                    AND account_level = 'agency'
                    LIMIT 1
                ", [$instansi_id])->row();
    
                $billingCashAccount = $this->db->query("
                    SELECT * FROM `account` 
                    WHERE instansi_id = ? 
                    AND account_type = 'billing_cash'
                    AND account_level = 'agency'
                    LIMIT 1
                ", [$instansi_id])->row();
    
                if (!$billingAccount || !$billingCashAccount) {
                    throw new Exception("Account not found for instansi_id: $instansi_id");
                }
    
                // 2. Prepare cURL request
                $postData = [
                    'amount' => (string)number_format($nominal, 2, '.', ''),
                    'account_number_from' => $billingAccount->account_number,
                    'account_number_to' => $billingCashAccount->account_number,
                    'pin' => $pin
                ];
    
                // Debug the data being sent
                $api_url = 'https://oncard.id/app/api/transfer/transfer-balance';
                // echo "<pre>Data being sent to API for instansi $instansi_id:\n";
                // var_dump($postData);
                // var_dump($api_url);
                // echo "</pre>";

                $jsonPayload = json_encode($postData);
    
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => $api_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $jsonPayload,
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . $this->session->userdata('_token'),
                        'Content-Type: application/json',
                        'Accept: application/json',
                        'Content-Length: ' . strlen($jsonPayload)
                    ],
                    CURLOPT_VERBOSE => true, // Enable verbose output
                    CURLOPT_STDERR => fopen('php://output', 'w') // Output debug info
                ]);
    
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($httpCode === 422) {
                
                var_dump($jsonPayload);
                error_log("
                API Validation Error Details: " . print_r($response['errors'] ?? $response, true));
                throw new Exception("API validation failed: " . ($response ?? 'Unknown error'));
            }
            
            if ($err) {
                throw new Exception("Transfer API connection failed: " . $err);
            }

            $responseData = json_decode($response, true);
            
            if ($httpCode !== 200) {
                throw new Exception("API returned HTTP $httpCode");
            }
            
            if (!$responseData || !isset($responseData['status'])) {
                throw new Exception("Invalid API response format");
            }
            
            if (!$responseData['status']) {
                throw new Exception($responseData['message'] ?? 'Transfer failed without explanation');
            }

            // Record success
            $results[] = [
                'status' => true,
                'instansi_id' => $instansi_id,
                'message' => 'Transfer successful',
                'amount' => $nominal
            ];

    
            } catch (Exception $e) {
                $allSuccess = false;
                $errorMessage = $e->getMessage();
                $results[] = [
                    'status' => false,
                    'instansi_id' => $instansi_id,
                    'message' => $e->getMessage(),
                    'amount' => $nominal
                ];
                
                // Continue with next institution even if one fails
                continue;
            }
        }
    
        return [
            'overall_status' => $allSuccess,
            'error_message' => $errorMessage,
            'details' => $results
        ];
    }
    
    public function updateStatusInvoicePaymentGateways()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            
            $id = $this->input->post('id');

                date_default_timezone_set('Asia/Jakarta');
            
                $dataXXX = array(
                    'status'  => 1,
                    'updated_at'  => date('Y-m-d H:i:s'),
                );
                $resultInsert = $this->Home_model->updateData("payment_gateways_invoices",$dataXXX,"id=$id");

                if($resultInsert){

                    $getData = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE id=$id");
                    foreach($getData->result() as $row){

                        $dataYYY = array(
                            'is_done'  => 1,
                        );

                        $pg_ids = $row->pg_ids;

                        if($pg_ids){
                            $resultInsert2 = $this->Home_model->updateData("payment_gateways",$dataYYY,"id IN ($pg_ids)");

                            if($resultInsert2){
                                echo json_encode(array("status"=>true,"data"=>[],"message"=>"Invoice telah diselesaikan!"));
                            }
                        }else {
                            echo json_encode(array("status"=>true,"data"=>[],"message"=>"Invoice telah diselesaikan!"));
                        }
                        
                    }

                }else {
                    echo json_encode(array("status"=>false,"data"=>[],"message"=>"Terjadi kesalahan. [23]"));
                }
          
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function tambahAgensi()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/agensi_add.php', $data);
            }
            
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function ServerMonitoring()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/server_monitoring.php', $data);
            }
            
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function FundManagement()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/fund_management_page.php', $data);
            }
            
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function FundManagementFee()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/fund_management_page_fee.php', $data);
            }
            
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function FundManagementFeeOncard()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/fund_management_page_fee_oncard.php', $data);
            }
            
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function ActivateQMSAccount()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $username = $this->session->userdata('_user');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);

            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/activation_account_qms.php', $data);
            }
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function ListQMSAccount()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $username = $this->session->userdata('_user');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);

            if(!$this->session->userdata('_token_apps')){
                $this->load->view('user/'.$role.'/access_banned.php', $data);
            }else {
                $this->load->view('user/template/navigation.php', $data);
                $this->load->view('user/'.$role.'/list_account_qms.php', $data);
            }
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function tambahAgensiQMS()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/agensi_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }



    //AGENCY SECTION======================================================================================
    // ===================================================================================================
    // ===================================================================================================
    // ===================================================================================================

    
    public function Siswa()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $kodeInstansi = $this->session->userdata('_instansi_id');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $data['kodeInstansi'] = $kodeInstansi;

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/'.$role.'/siswa_list.php', $data);

            if($kodeInstansi==4){
                $this->load->view('user/'.$role.'/siswa_development_with_qris.php', $data);
            }else {
                $this->load->view('user/'.$role.'/siswa_development.php', $data);
            }
            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function SiswaDev()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/siswa_development.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function SiswaAllRender()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/siswa_list_all.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function General()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $kodeInstansi = $this->session->userdata('_instansi_id');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $data['kodeInstansi'] = $kodeInstansi;

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);

            if($kodeInstansi==1111111){
                $this->load->view('user/'.$role.'/general_list_with_qris.php', $data);
            }else {
                $this->load->view('user/'.$role.'/general_list.php', $data);
            }

            
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function Membership()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/membership_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function creditManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            
            $cardID = $this->uri->segment(3);
            $accountID = $this->uri->segment(4);
            $balance= '';
            $namakustomer = '';

            $getData = $this->Home_model->getSelectData("*","account", "WHERE id=$accountID");
            foreach($getData->result() as $row){
                $balance = $row->balance;
                $namakustomer = $row->customers_name;
            }

            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['cardID'] = $cardID;
            $data['balance'] = $balance;
            $data['namakustomer'] = $namakustomer;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/credit_card_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function GeneralAllRender()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/general_list_all.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function MembershipAllRender()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/membership_list_all.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function WD()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/withdrawal.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function WDStakeHolders()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/WD_Stakeholder.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function sector_a()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            
            $this->load->view('user/owner/rangkuman_balance.php', $data);
            $this->load->view('user/template/footer.php', $data);
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function count_owner_fund()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {

            $instansi_id = $this->input->post('instansi_id');
            $account_id = $this->input->post('account_id');
            $datetime = $this->input->post('datetime');
            // $now = $this->input->post('now');

            // $dateTime = new DateTime($datetime);
            // $now = new DateTime($now);

            $startDate = '';
            $endDate = '';

            date_default_timezone_set('Asia/Jakarta');

            if($datetime=='all'){
                $currentDateTime = new DateTime();


                // Format the DateTime objects to the desired format
                $startDate = '2000-01-01 00:00:00';
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }
            else if($datetime=='today'){
                $currentDateTime = new DateTime();

                $startOfDay = clone $currentDateTime;
                $startOfDay->setTime(0, 0, 0);

                // Format the DateTime objects to the desired format
                $startDate = $startOfDay->format('Y-m-d H:i:s');
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }
            
            else if($datetime=='yesterday'){
                $currentDateTime = new DateTime();
                $currentDateTime->modify('-1 day');

                $startOfDay = clone $currentDateTime;
                $startOfDay->setTime(0, 0, 0);
                $currentDateTime->setTime(23, 59, 59);

                // Format the DateTime objects to the desired format
                $startDate = $startOfDay->format('Y-m-d H:i:s');
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }
            else if($datetime=='thisWeek'){
                $currentDateTime = new DateTime();
                
                $startOfDay = clone $currentDateTime;
                $startOfDay->modify('this week Monday');
                $startOfDay->setTime(0, 0, 0);
                $currentDateTime->setTime(23, 59, 59);

                // Format the DateTime objects to the desired format
                $startDate = $currentDateTime->format('Y-m-d H:i:s');
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }

            // Format the DateTime object to the desired format
            // $formattedDate = $dateTime->format('Y-m-d H:i:s');
            // $formattedNow = $now->format('Y-m-d 00:00:00');
            
            $getData = $this->Home_model->getSelectData("SUM(debit_amount) a","mutasi", "WHERE mutasi.credit_account_id=$account_id AND mutasi.description='admin fee' AND mutasi.instansi_id=$instansi_id AND mutasi.created_at BETWEEN
            '$startDate' AND '$endDate'")->result();
            $getData2 = $this->Home_model->getSelectData("SUM(debit_amount) b","mutasi", "WHERE mutasi.debit_account_id=$account_id AND mutasi.invoice LIKE '%wd%' AND mutasi.instansi_id=$instansi_id AND mutasi.created_at BETWEEN
            '$startDate' AND '$endDate'")->result();
            $getData3 = $this->Home_model->getSelectData("balance c","account", "WHERE account.id=$account_id")->result();

            echo json_encode(array("status"=>true,"fund_all"=>$getData,"fund_debit"=>$getData2,"actual_balance_acocunt"=>$getData3,"datetime"=>$startDate.' - '.$endDate));
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function count_balancing_all()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {

            $instansi_id = $this->input->post('instansi_id');
            $datetime = $this->input->post('datetime');
            $startDate = '';
            $endDate = '';

            date_default_timezone_set('Asia/Jakarta');

            if($datetime=='all'){
                $currentDateTime = new DateTime();
                // Format the DateTime objects to the desired format
                $startDate = '2000-01-01 00:00:00';
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }
            else if($datetime=='today'){
                $currentDateTime = new DateTime();

                $startOfDay = clone $currentDateTime;
                $startOfDay->setTime(0, 0, 0);

                // Format the DateTime objects to the desired format
                $startDate = $startOfDay->format('Y-m-d H:i:s');
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }
            
            else if($datetime=='yesterday'){
                $currentDateTime = new DateTime();
                $currentDateTime->modify('-1 day');

                $startOfDay = clone $currentDateTime;
                $startOfDay->setTime(0, 0, 0);
                $currentDateTime->setTime(23, 59, 59);

                // Format the DateTime objects to the desired format
                $startDate = $startOfDay->format('Y-m-d H:i:s');
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }
            else if($datetime=='thisWeek'){
                $currentDateTime = new DateTime();
                
                $dayOfWeek = $currentDateTime->format('N');
                
                $startOfWeek = clone $currentDateTime;

                // Modify the date to the start of the week (Monday)
                $startOfWeek->modify('-' . ($dayOfWeek - 1) . ' days');

                $startOfWeek->setTime(0, 0, 0);

                // Format the DateTime objects to the desired format
                $startDate = $startOfWeek->format('Y-m-d H:i:s');
                $endDate = $currentDateTime->format('Y-m-d H:i:s');
            }else {
                $dateselecteds = explode('|', $datetime);

                $startDate = $dateselecteds[0];
                $endDate = $dateselecteds[1];

            }

            // Format the DateTime object to the desired format
            // $formattedDate = $dateTime->format('Y-m-d H:i:s');
            // $formattedNow = $now->format('Y-m-d 00:00:00');
            
            $getData = $this->Home_model->getSelectData(" SUM(CAST(debit_amount AS UNSIGNED)) a,invoice","mutasi", "WHERE invoice LIKE '%wd%' AND status_id=10 AND mutasi.instansi_id=$instansi_id AND mutasi.created_at BETWEEN
            '$startDate' AND '$endDate' GROUP BY mutasi.invoice")->result();
            $getData2 = $this->Home_model->getSelectData(" SUM(CAST(credit_amount AS UNSIGNED)) b,invoice","mutasi", "WHERE invoice LIKE '%top%' AND status_id=10 AND mutasi.instansi_id=$instansi_id AND mutasi.created_at BETWEEN
            '$startDate' AND '$endDate' GROUP BY mutasi.invoice")->result();
            // $getData3 = $this->Home_model->getSelectData("balance c","account", "WHERE account.id=$account_id")->result();

            $alltopup = 0;
            foreach($getData2 as $row){
                $alltopup+=(int)$row->b;
            }

            $allwd = 0;
            foreach($getData as $row){
                $allwd+=(int)$row->a;
            }
            echo json_encode(array("status"=>true,"wd_all"=>$allwd,"topup_all"=>$alltopup,"datetime"=>$startDate.' - '.$endDate));
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function DownloadModules()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/download_modules.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function SebaranSaldo()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/sebaran_saldo.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function getDataAgensiAllIpaymuEachInstansi()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, 
            (SELECT SUM(JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - 
            JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))) 
            FROM payment_gateways 
            WHERE payment_gateways.instansi_id=instansi.id
            AND payment_gateways.status_id=10 
            AND is_done=0 
            AND clasification='topup'
            AND providers='ipaymu' 
            AND JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.status_code')) = '1') jumlah_saldo_available_ipaymu","instansi,users", "WHERE instansi.id=users.instansi_id AND users.id=$idUSERINSTANSI AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getDataFundManagement()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner' && $this->session->userdata('_token_apps')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $getData = $this->Home_model->getSelectData("*, payment_gateways.created_at tglTerbuat, payment_gateways.id pgID,(SELECT account.bank_account_number FROM account WHERE account.instansi_id=payment_gateways.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) akunBank,(SELECT account.bank_account_name FROM account WHERE account.instansi_id=payment_gateways.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) namaBank ,(SELECT account.customers_name FROM account WHERE account.user_id=payment_gateways.user_id) userPengguna, (SELECT balance FROM account WHERE account.instansi_id=payment_gateways.instansi_id AND account.account_level='agency' AND account.account_type='billing') saldoBillingTransfer, instansi.nama namaINSTANSI","payment_gateways,instansi", "WHERE payment_gateways.instansi_id=instansi.id AND instansi.deleted_at IS NULL AND payment_gateways.instansi_id IS NOT NULL AND payment_gateways.is_done=0 AND payment_gateways.status_id=10 and payment_gateways.instansi_id NOT IN(4)")->result();
            echo json_encode(array("status"=>true,"data"=>$getData,"message"=>"Data berhasil diambil."));
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getDataFundManagementFee()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner' && $this->session->userdata('_token_apps')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $getData = $this->Home_model->getSelectData("*, transactions_biller.created_at tglTerbuat,transactions_biller.status statusTerbuat, transactions_biller.id tbID,(SELECT account.bank_account_number FROM account WHERE account.instansi_id=transactions_biller.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) akunBank,(SELECT account.bank_account_name FROM account WHERE account.instansi_id=transactions_biller.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) namaBank ,(SELECT account.customers_name FROM account WHERE account.user_id=transactions_biller.user_billed_id) userPengguna, (SELECT balance FROM account WHERE account.instansi_id=transactions_biller.instansi_id AND account.account_level='owner' AND account.account_type='billing') saldoBillingFee, instansi.nama namaINSTANSI","transactions_biller,instansi", "WHERE transactions_biller.instansi_id=instansi.id AND instansi.deleted_at IS NULL AND transactions_biller.instansi_id IS NOT NULL AND transactions_biller.admin_fee!=0 AND transactions_biller.status='success' AND transactions_biller.is_done=0 AND transactions_biller.instansi_id NOT IN(4000)")->result();
            echo json_encode(array("status"=>true,"data"=>$getData,"message"=>"Data berhasil diambil."));
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function getDataFundManagementFeeOncard()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner' && $this->session->userdata('_token_apps')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $getData = $this->Home_model->getSelectData("*, payment_gateways.created_at tglTerbuat,payment_gateways.status_id statusTerbuat, payment_gateways.id tbID,(SELECT account.bank_account_number FROM account WHERE account.instansi_id=payment_gateways.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) akunBank,(SELECT account.bank_account_name FROM account WHERE account.instansi_id=payment_gateways.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) namaBank ,(SELECT account.customers_name FROM account WHERE account.user_id=payment_gateways.user_id) userPengguna, (SELECT balance FROM account WHERE account.instansi_id=payment_gateways.instansi_id AND account.account_level='owner' AND account.account_type='billing') saldoBillingFee, instansi.nama namaINSTANSI","payment_gateways,instansi", "WHERE payment_gateways.instansi_id=instansi.id AND instansi.deleted_at IS NULL AND payment_gateways.instansi_id IS NOT NULL AND payment_gateways.administrative_fee!=0 AND payment_gateways.clasification='topup' AND payment_gateways.status_id=10 AND payment_gateways.is_done_admin_fee=0 AND payment_gateways.instansi_id NOT IN(4000)")->result();
            echo json_encode(array("status"=>true,"data"=>$getData,"message"=>"Data berhasil diambil."));
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function withdrawFundManagementFee()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner' && $this->session->userdata('_token_apps')) {
            
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $instansi_id = $this->input->post('instansi_id');
            $ids_selected = $this->session->userdata('_token_apps');
            $ids_selected = $this->input->post('ids_selected');
            $nominal = $this->input->post('nominal');

            // Start database transaction
            $this->db->trans_begin();

            try {
                // Get owner billing account balance
                $getOwnerAkunBilling = $this->Home_model->getSelectData("*", "account", "WHERE instansi_id=$instansi_id AND account_level='owner' AND account_type='billing'");
                
                $getNominalOwnerBilling = 0;
                $ownerBillingId = null;
                
                if ($getOwnerAkunBilling->num_rows() > 0) {
                    $row = $getOwnerAkunBilling->row();
                    $getNominalOwnerBilling = $row->balance;
                    $ownerBillingId = $row->id;
                }

                // Validate if owner billing account exists
                if (!$ownerBillingId) {
                    throw new Exception("Owner billing account not found");
                }

                // // Validate if sufficient balance
                // if ($nominal > $getNominalOwnerBilling) {
                //     throw new Exception("Insufficient balance in owner billing account");
                // }

                // Update selected transactions
                date_default_timezone_set('Asia/Jakarta');
                $dataXXX = array(
                    'is_done'  => '1',
                    'updated_at'  => date('Y-m-d H:i:s'),
                );
                
                $resultUpdate = $this->Home_model->updateData("transactions_biller", $dataXXX, "id IN($ids_selected) AND instansi_id=$instansi_id");
                
                if (!$resultUpdate) {
                    throw new Exception("Failed to update selected transactions");
                }

                // Update owner billing account balance
                $newBalance = 0;
                if ($nominal >= $getNominalOwnerBilling) {
                    $newBalance = 0;
                } else {
                    $newBalance = $getNominalOwnerBilling - $nominal;
                }

                $updateBalanceData = array(
                    'balance' => $newBalance,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                
                $resultBalanceUpdate = $this->Home_model->updateData("account", $updateBalanceData, "id = $ownerBillingId");
                
                if (!$resultBalanceUpdate) {
                    throw new Exception("Failed to update owner billing balance");
                }

                // Generate unique invoice number
                $invoiceNumber = $this->generateUniqueInvoiceNumber();
                
                // Insert into payment_gateways_invoices table
                $pg_invoice_data = array(
                    'invoice' => $invoiceNumber, // Unique random invoice number
                    'pg_ids' => $ids_selected,
                    'date_invoice' => date('Y-m-d'),
                    'status' => '1',
                    'list_instansi' => json_encode([
                        array(
                            'instansi_id' => $instansi_id,
                            'nominal' => $nominal
                        )
                    ]),
                    'jenis' => 'ADMIN_FEE_WD',
                    'html' => json_encode(array(
                        'transaction_ids' => $ids_selected,
                        'instansi_id' => $instansi_id,
                        'nominal' => $nominal,
                        'previous_balance' => $getNominalOwnerBilling,
                        'new_balance' => $newBalance,
                        'processed_by' => $idUSERINSTANSI,
                        'processed_at' => date('Y-m-d H:i:s'),
                        'invoice_number' => $invoiceNumber
                    )),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                // Insert the invoice data
                $resultInvoiceInsert = $this->Home_model->insertData("payment_gateways_invoices", $pg_invoice_data);
                
                if (!$resultInvoiceInsert) {
                    throw new Exception("Failed to create payment gateway invoice");
                }

                // Check if transaction was successful
                if ($this->db->trans_status() === FALSE) {
                    throw new Exception("Database transaction failed");
                }

                // Commit transaction
                $this->db->trans_commit();

                // Get updated data for response
                $getData = $this->Home_model->getSelectData("*", "transactions_biller", "WHERE id IN($ids_selected)")->result();

                echo json_encode(array(
                    "status" => true,
                    "data" => $getData,
                    "message" => "Withdrawal Berhasil!",
                    "ids_selected" => $ids_selected,
                    "instansi_id" => $instansi_id,
                    "nominal" => $nominal,
                    "previous_balance" => $getNominalOwnerBilling,
                    "new_balance" => $newBalance,
                    "invoice_number" => $invoiceNumber,
                    "invoice_id" => $resultInvoiceInsert
                ));

            } catch (Exception $e) {
                // Rollback transaction on error
                $this->db->trans_rollback();
                
                echo json_encode(array(
                    "status" => false,
                    "data" => [],
                    "message" => "Error: " . $e->getMessage(),
                    "ids_selected" => $ids_selected,
                    "instansi_id" => $instansi_id,
                    "nominal" => $nominal
                ));
            }

        } else {
            echo json_encode(array(
                "status" => false,
                "data" => [],
                "message" => "Anda tidak dibenarkan mengakses API ini!"
            ));
        }
    }

    // Helper function to generate unique invoice number
    private function generateUniqueInvoiceNumber()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $invoiceNumber = '';
        $length = 12; // Length of the invoice number
        
        // Generate random string
        for ($i = 0; $i < $length; $i++) {
            $invoiceNumber .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        // Add timestamp prefix for better uniqueness
        $invoiceNumber = 'INV-' . date('Ymd') . '-' . $invoiceNumber;
        
        // Check if invoice number already exists in database
        $checkExists = $this->Home_model->getSelectData("id", "payment_gateways_invoices", "WHERE invoice = '$invoiceNumber'");
        
        // If exists, generate again recursively
        if ($checkExists->num_rows() > 0) {
            return $this->generateUniqueInvoiceNumber();
        }
        
        return $invoiceNumber;
    }
    
    public function Merchant()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/kantin_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function siswaManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $isUpdate = '';
            
            $isUpdate = $this->uri->segment(3);
            if($isUpdate!=''){
                $data['pageMode'] = $isUpdate;
            }else {
                $data['pageMode'] = 'add';
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/siswa_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function generalManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $isUpdate = '';
            
            $isUpdate = $this->uri->segment(3);
            if($isUpdate!=''){
                $data['pageMode'] = $isUpdate;
            }else {
                $data['pageMode'] = 'add';
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/general_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function membershipManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $isUpdate = '';
            
            $isUpdate = $this->uri->segment(3);
            if($isUpdate!=''){
                $data['pageMode'] = $isUpdate;
            }else {
                $data['pageMode'] = 'add';
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/membership_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function kantinManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $isUpdate = '';
            
            $isUpdate = $this->uri->segment(3);
            if($isUpdate!=''){
                $data['pageMode'] = $isUpdate;
            }else {
                $data['pageMode'] = 'add';
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/kantin_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    public function Saldo()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/riwayat_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function Mutasi_Transaksi_Siswa()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/mutasi_transaksi.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function PrintStruk()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/_all/printstruk.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    public function PrintStrukAuto()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/_all/printstruk_auto.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function Mutasi_Transaksi_General()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/mutasi_transaksi_general.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function Mutasi_Transaksi_Kantin()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/mutasi_transaksi_kantin.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function Mutasi_Withdrawal()
    {
        if ($this->session->userdata('_token') && ($this->session->userdata('_permission')=='agency'||$this->session->userdata('_permission')=='seller')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/_all/mutasi_withdrawal.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }


    //SELLER SECTION
    // ===================================================================================================
    // ===================================================================================================
    // ===================================================================================================
    public function Transaksi()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/transaksi.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function TransaksiTrial()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/'.$role.'/transaksi_trial.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            $this->load->view('user/'.$role.'/transaksi_trial_v21.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('user/'.$role.'/transaksi_trial_new.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function TransaksiTrialDev()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/transaksi_trial_dev.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('user/'.$role.'/transaksi_trial_new.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function PriceCheck()
    {
            $this->load->view('user/_all/check_price.php');
       
    }
    
    public function TransaksiTrialV21()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');

            $instansi = $this->session->userdata('_instansi_id');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/'.$role.'/transaksi_trial_v21.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_trial_v21_with_speedtrack.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah


            if($instansi== 40000){
                $this->load->view('user/'.$role.'/transaksi_trial_v22_with_speedtrack.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            }else if($instansi== 4 || $instansi== 13 || $instansi== 25 || $instansi== 2 || $instansi== 3  || $instansi==26 || $instansi==12 || $instansi==36 || $instansi==18|| $instansi==36) {  //MODE REDIS SEARCH USER
                $this->load->view('user/'.$role.'/transaksi_trial_v22_with_speedtrack_v2.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            }else {
                $this->load->view('user/'.$role.'/transaksi_trial_v21_with_speedtrack_backup.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            }
            
            // $this->load->view('user/'.$role.'/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('user/'.$role.'/transaksi_trial_new.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function TransaksiTrialV22Dev()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/'.$role.'/transaksi_trial_v21.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_trial_v21_with_speedtrack.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            $this->load->view('user/'.$role.'/transaksi_trial_v22_with_speedtrack.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('user/'.$role.'/transaksi_trial_new.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function TransaksiTrialV21Dev()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/'.$role.'/transaksi_trial_v21.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            $this->load->view('user/'.$role.'/transaksi_trial_v21_with_speedtrack.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('user/'.$role.'/transaksi_trial_new.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function TransaksiTrialV211()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/transaksi_trial_v21_with_speedtrack.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('user/'.$role.'/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('user/'.$role.'/transaksi_trial_new.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    public function Produk()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/product_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function NominalList()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/nominal_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    public function NominalListManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $isUpdate = '';
            
            $isUpdate = $this->uri->segment(3);
            if($isUpdate!=''){
                $data['pageMode'] = $isUpdate;
            }else {
                $data['pageMode'] = 'add';
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/nominal_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    public function Riwayat()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/riwayat_list.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function RiwayatDev()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/riwayat_list.backup.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function Revenue()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/revenue.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    public function produkManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $roleText = '';
            if($role=='agency'){
                $roleText = 'Host';
            }else if($role=='seller'){
                $roleText = 'Merchant';
            }else {
                $roleText = $role;
            }

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');
            $isUpdate = '';
            
            $isUpdate = $this->uri->segment(3);
            if($isUpdate!=''){
                $data['pageMode'] = $isUpdate;
            }else {
                $data['pageMode'] = 'add';
            }

            $this->load->view('user/template/header.php', $data);
            $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/'.$role.'/product_add.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    
    public function updateDataFotoFromOutside()
    {
        
        date_default_timezone_set('Asia/Jakarta');
        
        $json_data = file_get_contents('php://input');

        $data = json_decode($json_data);

        $userID = $data->user_id;
        $url_foto = $data->url_foto;

        $dataXXX = array(
            'foto'  => $url_foto,
            'updated_at'  => date('Y-m-d H:i:s'),
        );
        $resultInsert = $this->Home_model->updateData("users",$dataXXX,"id=$userID");

        if($resultInsert){
            echo json_encode(array("status"=>200,"data"=>$data));
        }else {
            echo json_encode(array("status"=>503,"data"=>$data));
        }
    }

    public function BroadcastInfoSaldo()
    {
            $this->load->view('user/_pesan_otomatis/broadcast_saldo_info.php');   
    }

    public function DownloadAkunList($instansi_id, $model) {
        $this->load->dbutil();
        $this->load->helper('download');
        
        // Build query (same as before)
        $select_fields = "a.customers_name AS 'Nama', 
                a.account_number AS 'Account Number', 
                a.pin AS 'PIN',
                i.nama AS 'Nama Instansi'"; // Added this line

        $from_join = "FROM account a 
                    JOIN users u ON a.user_id = u.id
                    JOIN instansi i ON a.instansi_id = i.id"; // Added this join

        if ($model == 'Siswa') {
            $select_fields .= ", s.telp_ortu AS 'PHONE NUMBER ORTU'";
            $from_join .= " LEFT JOIN siswa s ON u.id = s.user_id";
        } else {
            $select_fields .= ", u.username AS 'Username', '123456' AS 'Password'";
            $select_fields .= ", s.telpon AS 'PHONE NUMBER'";
            $select_fields .= ", s.jabatan AS 'Jabatan'";
            $from_join .= " LEFT JOIN general s ON u.id = s.user_id";
        }

        
        $query = $this->db->query("
            SELECT $select_fields
            $from_join
            WHERE 
                a.instansi_id = ? 
                AND a.account_level = 'users'  
                AND a.deleted_at IS NULL
                AND u.model = ?
            ORDER BY 
                a.customers_name ASC
        ", array($instansi_id, $model));
    
        // ===== KEY CHANGES START HERE =====
        // Manually generate CSV with text formatting
        $output = '';
        
        // Add UTF-8 BOM for Excel
        $output .= "\xEF\xBB\xBF";
        
        // Add headers (force text format with leading tab)
        $headers = array();
        foreach ($query->list_fields() as $field) {
            $headers[] = '"' . str_replace('"', '""', $field) . '"';
        }
        $output .= implode("\t", $headers) . "\r\n";
        
        // Add data rows with text formatting
        foreach ($query->result_array() as $row) {
            $row_data = array();
            foreach ($row as $value) {
                // Force text format by prepending tab and wrapping in quotes
                $row_data[] = '="' . str_replace('"', '""', $value) . '"';
            }
            $output .= implode("\t", $row_data) . "\r\n";
        }
        // ===== KEY CHANGES END HERE =====
    
        // Set filename
        $filename = 'Daftar_Akun_'.$model.'_Instansi_'.$instansi_id.'_'.date('Ymd_His').'.xls';
        
        // Force download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        
        echo $output;
        exit;
    }
    

}
