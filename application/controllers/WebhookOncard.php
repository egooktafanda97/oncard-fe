<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');


class WebhookOncard extends CI_Controller
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

            $data = [];
            $data['role'] = $roleText;
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            $this->load->view('user/template/header.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/_all/webhook_index.php', $data);
            $this->load->view('user/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    function validateNumberManually(){
        
        $nomor = $this->uri->segment(3);

        $dataSending = Array();
        $dataSending["api_key"] = "8ZGPHI48OIOCWELQ";
        $dataSending["number_key"] = "8TACM06XRWl6X7aJ";
        $dataSending["phone_no"] = $nomor;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/validate_number',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // $response = json_decode($response,true);

        echo $response;
    }

    function validateNumber($str){
        $dataSending = Array();
        $dataSending["api_key"] = "8ZGPHI48OIOCWELQ";
        $dataSending["number_key"] = "8TACM06XRWl6X7aJ";
        $dataSending["phone_no"] = $str;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/validate_number',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response,true);

        return $response['status'];
    }

    function sendMessage(){
        $curl = curl_init();

        $nomor = $this->input->post('nomor');
        $pesan = $this->input->post('pesan');

        // $nomor = $this->uri->segment(3);
        // $pesan = "Assalamualaikum... Hai!";

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "api_key": "8ZGPHI48OIOCWELQ",
            "number_key": "8TACM06XRWl6X7aJ",
            "phone_no": "'.$nomor.'",
            "message": "'.$pesan.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
    
    function sendMessageWatzap(){

        if ($this->session->userdata('_token')) {
            
            $curl = curl_init();

            $nomor = $this->input->post('noWA');
            $pesan = $this->input->post('pesan');
            $vaSet = $this->input->post('vaSet');
            $kodeInstansi = $this->input->post('kodeInstansi');

            $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

            $apiKey = '';
            $numberKey = '';
            foreach($getData->result() as $row){
                $apiKey = $row->api_key;
                $numberKey = $row->number_key;
            }
            // if($kodeInstansi=='467.598.080'){
            //     $apiKey = 'R6VBPELQ3NY6M2R1';
            //     $numberKey = '7a1JHGAPoLPUSLVn';
            // }

            if($kodeInstansi=='7C2.203.C67'){
                $pesan.= '4. Topup Saldo Belanja
Transfer ke Rekening Bank Riau Kepri Syariah  8253144442 A.N Tabungan Belanja Santri PPSR 2 dan Kirim bukti Transfer ke Nomor Whatsapp  082283921284 (Opi)';
            }else if($kodeInstansi=='4CC.C91.193') {
                $pesan.= '4. Topup Saldo Belanja
Transfer ke Rekening Bank Riau Kepri Syariah 825-31-22221 A.N Tabungan Belanja Santri dan Kirim bukti Transfer ke Nomor Whatsapp  081275022029 (Dara)';
            }else {
//                 $pesan .= '
// 4. Ketik : Topup_'.$vaSet.'
// _Untuk melakukan topup menggunakan payment gateway yang telah disediakan_';
            }
            

            $dataSending = Array();
            $dataSending["api_key"] = $apiKey;
            $dataSending["number_key"] = $numberKey;
            $dataSending["phone_no"] = $nomor;
            $dataSending["message"] = $pesan;

            // $f = $this->validateNumber($nomor);

            // if($f!=200){
            //     echo var_dump('Nomor tidak terdaftar!  -> '.$f);
            //     return;
            // }


            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dataSending),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            echo json_encode(array("status"=>true));

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    function CheckConnectivity(){

        if ($this->session->userdata('_token')) {

            $idData = $this->uri->segment(3);
            $getData;

            if($idData){
                $getData = $this->Home_model->getSelectData(
                    "*",
                    "watzap_master_token",
                    "WHERE status='aktif' AND nomor_wa IS NOT NULL AND id=$idData  GROUP BY nomor_wa"
                );
            }else {
                $getData = $this->Home_model->getSelectData(
                    "*",
                    "watzap_master_token",
                    "WHERE status='aktif' AND nomor_wa IS NOT NULL GROUP BY nomor_wa"
                );
            }
            
            $responses = [];
            
            foreach ($getData->result() as $row) {
                $apiKey = $row->api_key;
                $numberKey = $row->number_key;
                $nomorWA = $row->nomor_wa;
            
                $dataSending = [
                    "api_key" => $apiKey,
                    "number_key" => $numberKey,
                    "phone_no" => '6285264397615',
                    // "phone_no" => $nomorWA,
                    "message" => 'Cek Status Layanan Servis : '.$row->inisial. ' berhasil ✅'
                ];
            
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($dataSending),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                ));
            
                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
            
                // Parse response
                $responseData = $err ? ['status' => 'error', 'message' => $err] : json_decode($response, true);
            
                $konektifitas = 'OFF';
                if (isset($responseData['status']) && $responseData['status'] === '200') {
                    $konektifitas = 'ON';
                } elseif (isset($responseData['status']) && $responseData['status'] == '1005') {
                    $konektifitas = 'OFF';
                } elseif (isset($responseData['message']) && $responseData['message'] === 'Invalid WhatsApp Number') {
                    $konektifitas = 'OFF';
                }
            
                date_default_timezone_set("Asia/Jakarta");
                
                // Update DB with konektifitas and timestamp
                $this->db->where('nomor_wa', $nomorWA);
                $this->db->where('nomor_wa IS NOT NULL', null, false); // tambahkan kondisi NOT NULL
                $this->db->update('watzap_master_token', [
                    'konektifitas' => $konektifitas,
                    'konektifitas_cek' => date("Y-m-d H:i:s")
                ]);

            
                // Store response for output
                $responses[] = [
                    "nomor_wa" => $nomorWA,
                    "response" => $responseData,
                    "last_update" => date("Y-m-d H:i:s")
                ];
            }
            
            // Return all responses
            echo json_encode([
                "status" => "done",
                "results" => $responses
            ]);
            
            

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }

    function sendMessageAbsenKelengkapan(){

        $curl = curl_init();

        $nomor = $this->input->post('noWA');
        $pesan = $this->input->post('pesan');
        $kodeInstansi = $this->input->post('kodeInstansi');

        // $allowedNumbers = ['6285264397615', '6281376195659'];//FOR DEBUG PURPOSES
        // if(!in_array($nomor, $allowedNumbers)) {
        //     echo json_encode(array("status"=>false,"message"=>"Service is unavailable for this number : ".$nomor));
        //     return false;
        // }

        $allowedInstansi = ['4', '18'];
        if(!in_array($kodeInstansi, $allowedInstansi)) {
            echo json_encode(array(
                "status" => false,
                "message" => "Anda tidak memiliki akses terhadap service ini."
            ));
            return false;
        }

        $getInstansi = $this->Home_model->getSelectData("*","instansi", "WHERE id=$kodeInstansi");
        foreach($getInstansi->result() as $row){
            $getIDINSTANSI = $row->kode_instansi;
        }

        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$getIDINSTANSI'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        
        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $dataSending["phone_no"] = $nomor;
        $dataSending["message"] = $pesan;

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        echo json_encode(array("status"=>true));

        date_default_timezone_set("Asia/Jakarta");
        $dataXXX = array(
            'time'  => date("Y-m-d H:i:s"),
            'nomor'  => $nomor,
            'pesan'  => 'Notif tidak melakukan absensi : '.$kodeInstansi,
            'json'  => $pesan
        );
        $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
    }
    

    function sendMessageWatzapNoAuth(){

        echo json_encode(array("status"=>false,"message"=>"Service is unavailable!"));
        return false;

        // if ($this->session->userdata('_token')) {
            
            $curl = curl_init();

            $nomor = $this->input->post('noWA');
            $pesan = $this->input->post('pesan');
            $kodeInstansi = $this->input->post('kodeInstansi');

            $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

            $apiKey = '';
            $numberKey = '';
            foreach($getData->result() as $row){
                $apiKey = $row->api_key;
                $numberKey = $row->number_key;
            }
            // if($kodeInstansi=='467.598.080'){
            //     $apiKey = 'R6VBPELQ3NY6M2R1';
            //     $numberKey = '7a1JHGAPoLPUSLVn';
            // }

            $dataSending = Array();
            $dataSending["api_key"] = $apiKey;
            $dataSending["number_key"] = $numberKey;
            $dataSending["phone_no"] = $nomor;
            $dataSending["message"] = $pesan;

            // $f = $this->validateNumber($nomor);

            // if($f!=200){
            //     echo var_dump('Nomor tidak terdaftar!  -> '.$f);
            //     return;
            // }


            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dataSending),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            echo json_encode(array("status"=>true));

        // } else {
        //     $data['levelUser'] = "";
        //     $this->load->view('loginregister/login.php', $data);
        // }
    }
    
    function sendMessageWatzapNoAuthIpaymu(){

        // if ($this->session->userdata('_token')) {

            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            
            $curl = curl_init();

            $nomor = $data['noWA'];
            $pesan = $data['pesan'];
            $kodeInstansi = $data['kodeInstansi'];

            // var_dump($kodeInstansi);
            // die();

            $getDataKodeInstansi = $this->Home_model->getSelectData("*","instansi", "WHERE id=$kodeInstansi");

            $getKode = '';

            foreach($getDataKodeInstansi->result() as $row){
                $getKode = $row->kode_instansi;
            }

            $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$getKode'");

            $apiKey = '';
            $numberKey = '';
            foreach($getData->result() as $row){
                $apiKey = $row->api_key;
                $numberKey = $row->number_key;
            }
            // if($kodeInstansi=='467.598.080'){
            //     $apiKey = 'R6VBPELQ3NY6M2R1';
            //     $numberKey = '7a1JHGAPoLPUSLVn';
            // }

            $dataSending = Array();
            $dataSending["api_key"] = $apiKey;
            $dataSending["number_key"] = $numberKey;
            $dataSending["phone_no"] = $nomor;
            $dataSending["message"] = $pesan;

            // $f = $this->validateNumber($nomor);

            // if($f!=200){
            //     echo var_dump('Nomor tidak terdaftar!  -> '.$f);
            //     return;
            // }


            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dataSending),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            echo json_encode(array("status"=>true));

        // } else {
        //     $data['levelUser'] = "";
        //     $this->load->view('loginregister/login.php', $data);
        // }
    }
    
    
    function sendMessageWatzapNoAuthAppScript() {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        // Validate required fields
        if (empty($data['noWA']) || empty($data['pesan']) || empty($data['kodeInstansi'])) {
            echo json_encode(["success" => false, "message" => "Missing required parameters"]);
            return;
        }
    
        $kodeInstansi = $data['kodeInstansi'];
        
        // Get API credentials from database
        $getDataKodeInstansi = $this->Home_model->getSelectData("kode_instansi", "instansi", "WHERE id='$kodeInstansi'");
        $getKode = $getDataKodeInstansi->row()->kode_instansi ?? '';
        
        $getData = $this->Home_model->getSelectData("*", "watzap_master_token", "WHERE kode_instansi='$getKode'");
        $apiKey = $getData->row()->api_key ?? '';
        $numberKey = $getData->row()->number_key ?? '';
    
        // Prepare payload
        $dataSending = [
            "api_key" => $apiKey,
            "number_key" => $numberKey,
            "phone_no" => $data['noWA'],
            "message" => $data['pesan']
        ];
    
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($dataSending),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json']
        ]);
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        // Return consistent response format
        $decoded = json_decode($response, true) ?? [];
        echo json_encode([
            "success" => ($httpCode === 200 && ($decoded['status'] ?? false)),
            "message" => $decoded['message'] ?? "API request failed"
        ]);
    }

    function sendMessageWatzapNoAuthBroadcastNotifyBroadcast(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        $curl = curl_init();

        $nomor = $data['noWA'];
        $pesan = $data['pesan'];
        
        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='467.598.080XXX'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        
        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $dataSending["phone_no"] = $nomor;
        $dataSending["message"] = $pesan;

        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_encode(array("status"=>true));
    }
    
    function sendMessageWatzapOTP(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        $curl = curl_init();

        // Check if token exists in the data array before accessing it
        if (!isset($data['token'])) {
            echo json_encode(array("status" => false, "message" => "Field token is required"));
            return false;
        }

        if ($data['token'] !== '9177815291160511921888185') {
            echo json_encode(array("status" => false, "message" => "Access denied!"));
            return false;
        }

        $nomor = $data['whatsapp_number'];
        $otp = $data['otp'];

        $pesan = '*PENTING & RAHASIA*
Berikut kode OTP untuk reset password Anda pada aplikasi QRION :
`'.$otp.'`

Kode ini akan expired dan tidak bisa digunakan setelah 10 menit.
> _Silahkan laporkan langsung ke administrator sistem apabila terdapat kejanggalan dalam pesan ini!_';
        
        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='467.598.080'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        
        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $dataSending["phone_no"] = $nomor;
        $dataSending["message"] = $pesan;

        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo json_encode(array("status"=>true,"data"=>json_decode($response),"no"=>$nomor,"otp"=>$otp));


        $dataXXX = [
            'channel' => 'send-otp-forgot-password',
            'data'    => json_encode($data),
            'no_telepon'=>$nomor,
            'status'  => 'success',
        ];


        $resultInsert = $this->Home_model->insertData("push_notification_logs", $dataXXX);
    }
    
    function sendMessageWatzapImage(){

        if ($this->session->userdata('_token')) {
            
            $curl = curl_init();

            $nomor = $this->input->post('noWA');
            $pesan = $this->input->post('pesan');
            $kodeInstansi = $this->input->post('kodeInstansi');
            $gambar = $this->input->post('gambar');

            $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

            $apiKey = '';
            $numberKey = '';
            foreach($getData->result() as $row){
                $apiKey = $row->api_key;
                $numberKey = $row->number_key;
            }
            // if($kodeInstansi=='467.598.080'){
            //     $apiKey = 'R6VBPELQ3NY6M2R1';
            //     $numberKey = '7a1JHGAPoLPUSLVn';
            // }

            $dataSending = Array();
            $dataSending["api_key"] = $apiKey;
            $dataSending["number_key"] = $numberKey;
            $dataSending["phone_no"] = $nomor;
            $dataSending["message"] = $pesan;
            $dataSending["url"] = $gambar;
            $dataSending["separate_caption"] = "0";

            // $f = $this->validateNumber($nomor);

            // if($f!=200){
            //     echo var_dump('Nomor tidak terdaftar!  -> '.$f);
            //     return;
            // }


            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.watzap.id/v1/send_image_url',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>json_encode($dataSending),
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            echo json_encode(array("status"=>true));

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    function whookTESTING(){

            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            
            date_default_timezone_set("Asia/Jakarta");

            
            $sender = $data['data']['chat_id'];
            $sender = explode("@",$sender);
            $message = $data['data']['message_body'];
            $message = strtolower($message);
            $message = str_replace(" ","",$message);
            $message = str_replace('*', '', $message); // Remove the asterisks

            $nomorAkun = explode("_",$message);

            
            
            // ------------

            $data_nama = '';
            $data_ttl = '';
            $data_saldo = '';
            $instansiID = '';

            $textMessage = $message;


            //=========== SINTAKS 0 ===============//
            if($nomorAkun[0]=='topup'){


                
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for ($i = 0; $i < 6; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }

                

                $getData = $this->Home_model->getSelectData("*, account.instansi_id IDINSTANSI","account,siswa", "WHERE account.account_number='$nomorAkun[1]' AND account.user_id=siswa.user_id");
                
                $getDataGeneral = $this->Home_model->getSelectData("*, account.instansi_id IDINSTANSI","account,general", "WHERE account.account_number='$nomorAkun[1]' AND account.user_id=general.user_id");

                $data_nama = '';
                $data_ttl = '';
                $data_saldo = '';
                $instansiID = '';

                $cardID = '';
                

                if($getData->result()){
                    foreach($getData->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $instansiID = $row->IDINSTANSI;
                        $cardID = $row->card_id;
                    }

                    if($instansiID==2 || $instansiID==3 ){ //lock layanan topup utk syafaturrasul
                        if($instansiID==2){
                            $textMessage = '*TOPUP SALDO*

Transfer ke Rekening Bank Riau Kepri Syariah  8253144442 A.N Tabungan Belanja Santri PPSR 2 dan Kirim bukti Transfer ke Nomor Whatsapp  082283921284 (Opi)

Terimakasih banyak atas kerjasamanya.';    
                        }else if($instansiID==3){
                            $textMessage = '*TOPUP SALDO*

Transfer ke Rekening Bank Riau Kepri Syariah 825-31-22221 A.N Tabungan Belanja Santri dan Kirim bukti Transfer ke Nomor Whatsapp  081275022029 (Dara)

Terimakasih banyak atas kerjasamanya.';    
                        }
                    }else {
                        $textMessage = '*TOPUP SALDO*

Nama : '.$data_nama.',
Link : '.base_url().'InitiatePayment/make/'.$sender[0].'/'.$nomorAkun[1].'/'.$randomString.'

.';    
                    }

                    if($cardID==null || $cardID==''){
                        $textMessage = '*KARTU TIDAK TERKONEKSI*
Untuk saat ini proses topup tidak bisa dilakukan, karena kartu Ananda belum terkoneksi. Silahkan hubungi pihak instansi/sekolah.';
                    }

                    

                    //TEMPORARILY MAINTANANCE
//                     $textMessage = '*MAINTANANCE - TOPUP SALDO*
// Mohon maaf Bapak/Ibu, untuk sementara ini fitur topup saldo dari Payment Gateway sedang dalam perbaikan (dalam waktu 2x60 menit).';    
                    
                    
                    // date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);

                }
                
                else if($getDataGeneral->result()){
                    foreach($getDataGeneral->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $instansiID = $row->IDINSTANSI;
                    }

                    if($instansiID==2 || $instansiID==3 ){ //lock layanan topup utk syafaturrasul

                        if($instansiID==2){
                            $textMessage = '*TOPUP SALDO*

Transfer ke Rekening Bank Riau Kepri Syariah  8253144442 A.N Tabungan Belanja Santri PPSR 2 dan Kirim bukti Transfer ke Nomor Whatsapp  082283921284 (Opi)

Terimakasih banyak atas kerjasamanya.';    
                        }else if($instansiID==3){
                            $textMessage = '*TOPUP SALDO*

Transfer ke Rekening Bank Riau Kepri Syariah 825-31-22221 A.N Tabungan Belanja Santri dan Kirim bukti Transfer ke Nomor Whatsapp  081275022029 (Dara)

Terimakasih banyak atas kerjasamanya.';    
                        }
                        
                    }else {
                        $textMessage = '*TOPUP SALDO*

Nama : '.$data_nama.',
Link : '.base_url().'InitiatePayment/make/'.$sender[0].'/'.$nomorAkun[1].'/'.$randomString.'

.';
                    }
                    

                    // date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);

                }else {

                    date_default_timezone_set("Asia/Jakarta");

                    $dataXXX = array(
                        'time'  => date("Y-m-d H:i:s"),
                        'nomor'  => $sender[0],
                        'pesan'  =>"error topup command - no data found",
                        'json'  => $json
                    );
                    $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    return false;

                }
            }


            //=========== SINTAKS 1 ===============//
            if($nomorAkun[0]=='ceksaldo'){

                $getData = $this->Home_model->getSelectData("account.customers_name, siswa.tanggal_lahir, account.balance, account.instansi_id IDINSTANSI","account,siswa", "WHERE account.account_number='$nomorAkun[1]' AND account.user_id=siswa.user_id");
                $getDataGeneral = $this->Home_model->getSelectData("account.customers_name, general.tanggal_lahir, account.balance, account.instansi_id IDINSTANSI","account,general", "WHERE account.account_number='$nomorAkun[1]' AND account.user_id=general.user_id");

                if($getData->result()){
                    foreach($getData->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $instansiID = $row->IDINSTANSI;
                    }

//                     $textMessage = 'Terimakasih sudah menghubungi kami
// Berikut adalah saldo dari :
// Nama : '.$data_nama.',
// Tanggal Lahir : '.$data_ttl.'

// *Rp'.number_format($data_saldo,2,",",".").'*

// *⏰ INFO TERBARU*
// 1. Disarankan kepada seluruh wali santri untuk *TIDAK* lagi memberikan uang tunai kepada santri pada saat kunjungan
// 2. Uang belanja santri diharapkan untuk *transfer langsung* ke no. rekening Tabungan Belanja Santri

// _Apakah pesan ini telah membantu?_
// _Kiranya dapat membalas chat ini dengan mengatakan Ya._
// Terimakasih banyak atas kerjasamanya.';
    $textMessage = '*CEK SALDO*

Berikut adalah saldo dari :
Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

*Rp'.number_format($data_saldo,2,",",".").'*

Terimakasih banyak atas kerjasamanya.';

                    date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);

                }
                
                else if($getDataGeneral->result()){
                    foreach($getDataGeneral->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $instansiID = $row->IDINSTANSI;
                    }

//                     $textMessage = 'Terimakasih sudah menghubungi kami
// Berikut adalah saldo dari :
// Nama : '.$data_nama.',
// Tanggal Lahir : '.$data_ttl.'

// *Rp'.number_format($data_saldo,2,",",".").'*

// *⏰ INFO TERBARU KHUSUS WALI SANTRI*
// 1. Disarankan kepada seluruh wali santri untuk *TIDAK* lagi memberikan uang tunai kepada santri pada saat kunjungan
// 2. Uang belanja santri diharapkan untuk *transfer langsung* ke no. rekening Tabungan Belanja Santri

// _Apakah pesan ini telah membantu?_
// _Kiranya dapat membalas chat ini dengan mengatakan Ya._
// Terimakasih banyak atas kerjasamanya.';
                    $textMessage = '*CEK SALDO*

Berikut adalah saldo dari :
Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

*Rp'.number_format($data_saldo,2,",",".").'*

Terimakasih banyak atas kerjasamanya.';

                    date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);

                }
            }




            //=========== SINTAKS 2 ===============//
            else if (strpos($message, "belanja1") !== false) {

                date_default_timezone_set("Asia/Jakarta");
                $today = date("Y-m-d");
                $todayindo = date("d-m-Y");

                $accountID = '';

                $getData = $this->Home_model->getSelectData("account.customers_name, siswa.tanggal_lahir, account.balance ,account.id akunID, account.instansi_id IDINSTANSI","account,siswa", "WHERE account.account_number=$nomorAkun[1] AND account.user_id=siswa.user_id");
                $getDataGeneral = $this->Home_model->getSelectData("account.customers_name, general.tanggal_lahir, account.balance,account.id akunID, account.instansi_id IDINSTANSI","account,general", "WHERE account.account_number=$nomorAkun[1] AND account.user_id=general.user_id");

                if($getData->result()){
                    foreach($getData->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $accountID = $row->akunID;
                        $instansiID = $row->IDINSTANSI;
                    }

                    $textMessage = '*RIWAYAT TRANSAKSI HARI INI*

Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

Tanggal : '.$todayindo.'
---
';

                    $num = 1;
                    $getRiwayatTransaksi = $this->Home_model->getSelectData("invoice,credit_amount,description,(SELECT account.customers_name FROM account WHERE account.id=mutasi.credit_account_id AND mutasi.credit_account_id IS NOT NULL) tujuan, SUM(debit_amount) pengeluaran, DATE_FORMAT(created_at,'%H:%i:%s') waktuw","mutasi", "WHERE account_id=$accountID AND created_at BETWEEN '$today 00:00:00' AND '$today 23:59:59' GROUP BY invoice ORDER BY created_at ASC");
                    if($getRiwayatTransaksi->result()){
                    foreach($getRiwayatTransaksi->result() as $rom){
                        $state = '';
                        $nominal = '';
                        $additional_message = '';
                        $invo = strtolower($rom->invoice);
                        if (strpos($invo, "topup") !== false) {
                            $state = 'Pengisian saldo';
                            $nominal = $rom->credit_amount;
                            $additional_message = '---';
                        }
                        if (strpos($invo, "shopping") !== false) {
                            $state = 'Belanja';
                            $nominal = $rom->pengeluaran;
                            $additional_message = 'di '. $rom->tujuan;
                        }
                        if (strpos($invo, "wd") !== false) {
                            $state = 'Penarikan saldo';
                            $nominal = $rom->pengeluaran;
                            $additional_message = 'Perihal '.$rom->description;
                        }
                        $textMessage.='
'.$num++.'. '.$state.' : *Rp'.number_format($nominal,2,",",".").'*
    ```'.$rom->waktuw.' WIB```
    '.$additional_message.'

';
                    }
                    }else {
                    $textMessage.='TIDAK ADA TRANSAKSI.
';   
                    }

                    
                    $textMessage.='---

SALDO TERKINI
*Rp'.number_format($data_saldo,2,",",".").'*

Terimakasih banyak atas kerjasamanya.';

                    date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);
                }
                else if($getDataGeneral->result()){
                    foreach($getDataGeneral->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $accountID = $row->akunID;
                        $instansiID = $row->IDINSTANSI;
                    }

                    $textMessage = '*RIWAYAT TRANSAKSI HARI INI*

Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

Tanggal : '.$todayindo.'
---
';

                    $num = 1;
                    $getRiwayatTransaksi = $this->Home_model->getSelectData("invoice,credit_amount,description,(SELECT account.customers_name FROM account WHERE account.id=mutasi.credit_account_id AND mutasi.credit_account_id IS NOT NULL) tujuan, SUM(debit_amount) pengeluaran, DATE_FORMAT(created_at,'%H:%i:%s') waktuw","mutasi", "WHERE account_id=$accountID AND created_at BETWEEN '$today 00:00:00' AND '$today 23:59:59' GROUP BY invoice ORDER BY created_at ASC");
                    if($getRiwayatTransaksi->result()){
                    foreach($getRiwayatTransaksi->result() as $rom){
                        $state = '';
                        $nominal = '';
                        $additional_message = '';
                        $invo = strtolower($rom->invoice);
                        if (strpos($invo, "topup") !== false) {
                            $state = 'Pengisian saldo';
                            $nominal = $rom->credit_amount;
                            $additional_message = '---';
                        }
                        if (strpos($invo, "shopping") !== false) {
                            $state = 'Belanja';
                            $nominal = $rom->pengeluaran;
                            $additional_message = 'di '. $rom->tujuan;
                        }
                        if (strpos($invo, "wd") !== false) {
                            $state = 'Penarikan saldo';
                            $nominal = $rom->pengeluaran;
                            $additional_message = 'Perihal '.$rom->description;
                        }
                        $textMessage.='
'.$num++.'. '.$state.' : *Rp'.number_format($nominal,2,",",".").'*
    ```'.$rom->waktuw.' WIB```
    '.$additional_message.'

';
                    }
                }else {
                    $textMessage.='TIDAK ADA TRANSAKSI.
';   
                }

                    
                    $textMessage.='---

SALDO TERKINI
*Rp'.number_format($data_saldo,2,",",".").'*

Terimakasih banyak atas kerjasamanya.';

                    date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);
                }

                
            }


            //=========== SINTAKS 3 ===============//
            else if (strpos($message, "belanja2") !== false) {

                date_default_timezone_set("Asia/Jakarta");
                $today = date("Y-m-d");
                $todayindo = date("d-m-Y");

                $threeDaysAgo = date('Y-m-d', strtotime($today . ' - 2 days'));

                $accountID = '';

                $getData = $this->Home_model->getSelectData("account.customers_name, siswa.tanggal_lahir, account.balance,account.id akunID, account.instansi_id IDINSTANSI","account,siswa", "WHERE account.account_number='$nomorAkun[1]' AND account.user_id=siswa.user_id");
                $getDataGeneral = $this->Home_model->getSelectData("account.customers_name, general.tanggal_lahir, account.balance,account.id akunID, account.instansi_id IDINSTANSI","account,general", "WHERE account.account_number='$nomorAkun[1]' AND account.user_id=general.user_id");

                if($getData->result()){
                    foreach($getData->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $accountID = $row->akunID;
                        $instansiID = $row->IDINSTANSI;
                    }

                    $textMessage = '*RIWAYAT TRANSAKSI DARI 2 HARI LALU*

Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

Tanggal : '.$threeDaysAgo.' s/d '.$today.'
---
';

                    $num = 1;
                    $getRiwayatTransaksi = $this->Home_model->getSelectData("invoice,credit_amount,description,(SELECT account.customers_name FROM account WHERE account.id=mutasi.credit_account_id AND mutasi.credit_account_id IS NOT NULL) tujuan, SUM(debit_amount) pengeluaran, DATE_FORMAT(created_at,'%d/%m/%Y %H:%i:%s') waktuw","mutasi", "WHERE account_id=$accountID AND created_at BETWEEN '$threeDaysAgo 00:00:00' AND '$today 23:59:59' GROUP BY invoice ORDER BY created_at ASC");
                    if($getRiwayatTransaksi->result()){
                    foreach($getRiwayatTransaksi->result() as $rom){
                        $state = '';
                        $nominal = '';
                        $additional_message = '';
                        $invo = strtolower($rom->invoice);
                        if (strpos($invo, "topup") !== false) {
                            $state = 'Pengisian saldo';
                            $nominal = $rom->credit_amount;
                            $additional_message = '---';
                        }
                        if (strpos($invo, "shopping") !== false) {
                            $state = 'Belanja';
                            $nominal = $rom->pengeluaran;
                            $additional_message = 'di '. $rom->tujuan;
                        }
                        if (strpos($invo, "wd") !== false) {
                            $state = 'Penarikan saldo';
                            $nominal = $rom->pengeluaran;
                            $additional_message = 'Perihal '.$rom->description;
                        }
                        $textMessage.='
'.$num++.'. '.$state.' : *Rp'.number_format($nominal,2,",",".").'*
    ```'.$rom->waktuw.' WIB```
    ```'.$additional_message.'```
';
                    }
                }else {
                    $textMessage.='TIDAK ADA TRANSAKSI.
';   
                }

                    
                    $textMessage.='---

SALDO TERKINI
*Rp'.number_format($data_saldo,2,",",".").'*

Terimakasih banyak atas kerjasamanya.';

                    date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);
                }
                else if($getDataGeneral->result()){
                    foreach($getDataGeneral->result() as $row){
                        $data_nama = $row->customers_name;
                        $data_ttl = $row->tanggal_lahir;
                        $data_saldo = $row->balance;
                        $accountID = $row->akunID;
                        $instansiID = $row->IDINSTANSI;
                    }

                    $textMessage = '*RIWAYAT TRANSAKSI DARI 2 HARI LALU*

Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

Tanggal : '.$threeDaysAgo.' s/d '.$today.'
---
';

                    $num = 1;
                    $getRiwayatTransaksi = $this->Home_model->getSelectData("invoice,credit_amount,description,(SELECT account.customers_name FROM account WHERE account.id=mutasi.credit_account_id AND mutasi.credit_account_id IS NOT NULL) tujuan, SUM(debit_amount) pengeluaran, DATE_FORMAT(created_at,'%d/%m/%Y %H:%i:%s') waktuw","mutasi", "WHERE account_id=$accountID AND created_at BETWEEN '$threeDaysAgo 00:00:00' AND '$today 23:59:59' GROUP BY invoice ORDER BY created_at ASC");
                    if($getRiwayatTransaksi->result()){
                        foreach($getRiwayatTransaksi->result() as $rom){
                            $state = '';
                            $nominal = '';
                            $additional_message = '';
                            $invo = strtolower($rom->invoice);
                            if (strpos($invo, "topup") !== false) {
                                $state = 'Pengisian saldo';
                                $nominal = $rom->credit_amount;
                                $additional_message = '---';
                            }
                            if (strpos($invo, "shopping") !== false) {
                                $state = 'Belanja';
                                $nominal = $rom->pengeluaran;
                                $additional_message = 'di '. $rom->tujuan;
                            }
                            if (strpos($invo, "wd") !== false) {
                                $state = 'Penarikan saldo';
                                $nominal = $rom->pengeluaran;
                                $additional_message = 'Perihal '.$rom->description;
                            }
                            $textMessage.='
    '.$num++.'. '.$state.' : *Rp'.number_format($nominal,2,",",".").'*
        ```'.$rom->waktuw.' WIB```
        '.$additional_message.'
    ';
                        }
                    }else {
                        $textMessage.='TIDAK ADA TRANSAKSI.
';   
                    }

                    
                    $textMessage.='---

SALDO TERKINI
*Rp'.number_format($data_saldo,2,",",".").'*

Terimakasih banyak atas kerjasamanya.';

                    date_default_timezone_set("Asia/Jakarta");

                    // $dataXXX = array(
                    //     'time'  => date("Y-m-d H:i:s"),
                    //     'nomor'  => $sender[0],
                    //     'pesan'  => $textMessage,
                    //     'json'  => $json
                    // );
                    // $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);
                    $this->sendMessssageWEBHOOK($sender[0],$textMessage,$instansiID);
                }
                
            }

    }

    function sendMessssageWEBHOOK($sendersss, $textMessage,$instansiID) {

        $curl = curl_init();

        $kodeInstansi = '';

        $getData = $this->Home_model->getSelectData("*,instansi.kode_instansi KODEINSTANSI","instansi", "WHERE instansi.id=$instansiID");
        
        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $kodeInstansi = $row->KODEINSTANSI;
        }

        $getData2 = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");
        foreach($getData2->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        // if($kodeInstansi=='467.598.080'){
        //     $apiKey = 'R6VBPELQ3NY6M2R1';
        //     $numberKey = '7a1JHGAPoLPUSLVn';
        // }

        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $dataSending["phone_no"] = $sendersss;
        $dataSending["message"] = $textMessage;

        // $f = $this->validateNumber($sendersss);

        // if($f!=200){
        //     echo var_dump('Nomor '.$sendersss.' tidak terdaftar!');

        //     date_default_timezone_set("Asia/Jakarta");

        //     $dataXXX = array(
        //         'nomor'  => $sendersss,
        //         'messages'  => $textMessage,
        //         'status'  => $f,
        //         'time'  => date("Y-m-d H:i:s"),
        //     );
        //     $resultInsert = $this->Home_model->insertData("watzap_debug_failed_send",$dataXXX);

            
        //     return;
        // }

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

    }
    
    
    function sendMessssageWEBHOOKKustom($sendersss, $textMessage,$min,$max,$now,$kodeInstansi) {

        $curl = curl_init();

        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        // if($kodeInstansi=='467.598.080'){
        //     $apiKey = 'R6VBPELQ3NY6M2R1';
        //     $numberKey = '7a1JHGAPoLPUSLVn';
        // }

        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $dataSending["phone_no"] = $sendersss;
        $dataSending["message"] = $textMessage;

        // $f = $this->validateNumber($sendersss);

        // if($f!=200){
        //     echo var_dump('Nomor '.$sendersss.' tidak terdaftar!');

        //     date_default_timezone_set("Asia/Jakarta");

        //     $dataXXX = array(
        //         'nomor'  => $sendersss,
        //         'messages'  => $textMessage,
        //         'status'  => $f,
        //         'time'  => date("Y-m-d H:i:s"),
        //     );
        //     $resultInsert = $this->Home_model->insertData("watzap_debug_failed_send",$dataXXX);

            
        //     return;
        // }

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        date_default_timezone_set("Asia/Jakarta");

        $dataXXX = array(
            'time'  => date("Y-m-d H:i:s"),
            'nomor'  => $sendersss,
            'pesan'  => 'Broadcast : '.$kodeInstansi,
            'json'  => 'NOT SET YET'
        );
        $resultInsert = $this->Home_model->insertData("watzap_debug",$dataXXX);

        
        // if($response){
            echo json_encode(array("status"=>"true","data_ke"=>$now,"message"=>"Terkirim ke nomor : ".$sendersss));
        // }

        

    }

    function whook_set(){

        $kodeInstansi = $this->uri->segment(3);
    
        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        // if($kodeInstansi=='467.598.080'){
        //     $apiKey = 'R6VBPELQ3NY6M2R1';
        //     $numberKey = '7a1JHGAPoLPUSLVn';
        // }

        $dataSending = Array();
        $dataSending["api_key"] = $apiKey; 
        $dataSending["number_key"] = $numberKey;
        $dataSending["endpoint_url"] = base_url()."WebhookOncard/whookTESTING";
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/set_webhook',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response."--->".$numberKey;
    }
    
    function whook_force_unset(){

        $kodeInstansi = $this->uri->segment(3);
    
        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        // if($kodeInstansi=='467.598.080'){
        //     $apiKey = 'R6VBPELQ3NY6M2R1';
        //     $numberKey = '7a1JHGAPoLPUSLVn';
        // }

        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/unset_webhook',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    function whook_unset(){

        $kodeInstansi = $this->uri->segment(3);
    
        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        // if($kodeInstansi=='467.598.080'){
        //     $apiKey = 'R6VBPELQ3NY6M2R1';
        //     $numberKey = '7a1JHGAPoLPUSLVn';
        // }

        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/unset_webhook',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        $m = curl_close($curl);
        
        // $this->whook_set();
        
    }
    
    function whook_get(){
        $kodeInstansi = $this->uri->segment(3);
    
        $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");

        $apiKey = '';
        $numberKey = '';
        foreach($getData->result() as $row){
            $apiKey = $row->api_key;
            $numberKey = $row->number_key;
        }
        // if($kodeInstansi=='467.598.080'){
        //     $apiKey = 'R6VBPELQ3NY6M2R1';
        //     $numberKey = '7a1JHGAPoLPUSLVn';
        // }
        $dataSending = Array();
        $dataSending["api_key"] = $apiKey;
        $dataSending["number_key"] = $numberKey;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/get_webhook',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    function sendBroadcastBerkala(){

        $kodeInstansi = $this->uri->segment(3);

        $dataArray = array();

        $getData = $this->Home_model->getSelectData("*","instansi", "WHERE kode_instansi='$kodeInstansi'");

        $idInstansi = '';
        $namaInstansi = '';
        foreach($getData->result() as $row){
            $idInstansi = $row->id;
            $namaInstansi = $row->nama;
        }

        $noms = 1;

        $getSiswa = $this->Home_model->getSelectData("*","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND (telp_ortu!='0' OR telp_ortu!=0) AND siswa.deleted_at IS NULL ORDER BY siswa.created_at ASC");
        foreach($getSiswa->result() as $row){
            $getNoTelp = $row->telp_ortu;

            $firstThreeCharacters = substr($getNoTelp, 0, 3);

            if($firstThreeCharacters=='628'){
                $newObject = array(
                    'urut' => $noms++,
                    'nama' => $row->nama_lengkap,
                    'tgllahir' => $row->tanggal_lahir,
                    'alamat' => $row->alamat_lengkap,
                    'account_number' => $row->account_number,
                    'nomor' => $row->telp_ortu,
                    'saldo' => $row->balance,
                );
                $dataArray[] = $newObject; // Add the new object to the array
            }
            
        }

        $rangemin = 0;
        $rangemax = 10;
        
        $arraySend = [];
        for($i=0; $i < count($dataArray);$i++){

            if ($dataArray[$i]['urut'] >= $rangemin && $dataArray[$i]['urut'] <= $rangemax) {

                $randomNumber = rand(0, 10);
                $greetings = ["Bismillahirrahmanirrahim, Assalamualaikum.","Bismillah!","Bismillah, Assalamu'alaikum","Selamat pagi!", "Selamat siang!", "Selamat sore!", "Selamat malam!", "Assalamu'alaikum warahmatullahi wabarakatuh", "Assalamu'alaikum wr. wb.", "Assalamu'alaikum!", "Assalamualaikum!"];
                $personal = ["Bpk","Ibu yang terhormat","Bapak yang terhormat","Bapak/Ibu", "Bapak", "Ibu", "Bpk/Ibu", "Ayahanda", "Ibunda", "bapak ibu","Ayah / Bunda"];
                $messages = '*Pusat Informasi '.$namaInstansi.'.*
===============================
'.$greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,

===============================
SALDO TERKINI
*Rp'.number_format($dataArray[$i]['saldo'],2,",",".").'*
===============================

Kami juga ingin menginformasikan bahwa '.$personal[$randomNumber].' dapat mengetahui informasi seputar keuangan Ananda dengan mengirim / membalas pesan ke nomor ini dengan beberapa format dibawah ini :
1. Ketik : *CekSaldo_'.$dataArray[$i]["account_number"].'*
_Untuk mengetahui saldo terakhir_

2. Ketik : *Belanja1_'.$dataArray[$i]["account_number"].'*
_Untuk mendapatkan aktifitas belanja pada hari ini_

3. Ketik : *Belanja2_'.$dataArray[$i]["account_number"].'*
_Untuk mendapatkan aktifitas belanja dalam 2 hari yang lalu_

4. Ketik : *Topup_'.$dataArray[$i]["account_number"].'*
_Untuk melakukan topup menggunakan payment gateway yang tersedia_

_Apakah pesan ini membantu '.$personal[$randomNumber].'?_
_Kiranya '.$personal[$randomNumber].' dapat membalas chat ini dengan mengatakan Ya._

Terimakasih.

===============================
Mohon di *SAVE* nomor ini dengan nama *Pusat Informasi '.$namaInstansi.'*';

$messagesKartuSantri = '*###PEMBAYARAN KARTU SANTRI###*
*Pusat Informasi Pesantren.*
===============================
'.$greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,

Terimakasih atas kerjasamanya.

===============================
Mohon di *SAVE* nomor ini dengan nama *Pusat Informasi '.$namaInstansi.'*';

                $newObject = array(
                    'nama' => $dataArray[$i]['nama'],
                    'tgllahir' => $dataArray[$i]['tgllahir'],
                    'alamat' => $dataArray[$i]['alamat'],
                    'nomor' => $dataArray[$i]['nomor'],
                    'account_number' => $dataArray[$i]['account_number'],
                    'delay' => $randomNumber,
                    'pesan' => $messages,
                    'saldo' => $dataArray[$i]['saldo'],
                );
                $arraySend[] = $newObject;
                
                // $this->sendMessssageWEBHOOK($dataArray[$i]['nomor'],$messages);
            }

            
        }
        
        echo json_encode(array("rows"=>count($dataArray),"range"=>$rangemin."-".$rangemax,"data"=>$arraySend));

    }


    // BROADCAST CUSTOME

    function sendBroadcastBerkalaKustom(){

        $kodeInstansi = $this->uri->segment(3);
        
        $batasBawah = $this->input->post('end');
        $batasAtas = $this->input->post('start');
        $endPoint = $this->input->post('endPoint');
        $pesan = $this->input->post('pesan');

        $dataArray = array();

        $getData = $this->Home_model->getSelectData("*","instansi", "WHERE kode_instansi='$kodeInstansi'");

        $idInstansi = '';
        $namaInstansi = '';
        foreach($getData->result() as $row){
            $idInstansi = $row->id;
            $namaInstansi = $row->nama;
        }

        $noms = 1;

        if($endPoint=='broadcastSaldoSiswa'||$endPoint=='sendSiswa'||$endPoint=='PesanInisiasiTagihan' || $endPoint=='sendSiswaPlainTemplate'){

            // $getSiswa = $this->Home_model->getSelectData("*, siswa.instansi_id IDINSTANSI","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND (telp_ortu!='0' OR telp_ortu!=0) AND telp_ortu LIKE '628%' AND siswa.deleted_at IS NULL ORDER BY siswa.created_at ASC");
            if($idInstansi==3){
                $getSiswa = $this->Home_model->getSelectData("*, siswa.instansi_id IDINSTANSI","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND telp_ortu LIKE '628%' AND  siswa.deleted_at IS NULL  ORDER BY siswa.created_at ASC");
            }else {
                $getSiswa = $this->Home_model->getSelectData("*, siswa.instansi_id IDINSTANSI","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND telp_ortu LIKE '628%' AND siswa.deleted_at IS NULL  ORDER BY siswa.created_at ASC");
            }
            
            foreach($getSiswa->result() as $row){
                $getNoTelp = $row->telp_ortu;

                $firstThreeCharacters = substr($getNoTelp, 0, 3);

                if($firstThreeCharacters=='628'){
                    $newObject = array(
                        'urut' => $noms++,
                        'nama' => $row->nama_lengkap,
                        'tgllahir' => $row->tanggal_lahir,
                        'alamat' => $row->alamat_lengkap,
                        'account_number' => $row->account_number,
                        'nomor' => $row->telp_ortu,
                        'nis' => $row->nis,
                        'pin' => $row->pin,
                        'instansi_id' => $row->IDINSTANSI,
                        'saldo' => $row->balance,
                    );
                    $dataArray[] = $newObject; // Add the new object to the array
                }
                
            }

        }
        else if($endPoint=='sendSiswa'){

            //THE ORIGINAL ONE!
            // $getSiswa = $this->Home_model->getSelectData("*, siswa.instansi_id IDINSTANSI","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND (telp_ortu!='0' OR telp_ortu!=0) AND telp_ortu LIKE '628%' AND siswa.deleted_at IS NULL ORDER BY siswa.created_at ASC");
            $getSiswa = $this->Home_model->getSelectData("*, siswa.instansi_id IDINSTANSI","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND (telp_ortu!='0' OR telp_ortu!=0) AND telp_ortu LIKE '628%' AND siswa.deleted_at IS NULL AND siswa.id BETWEEN 13106 AND 13220 ORDER BY siswa.created_at ASC");
            foreach($getSiswa->result() as $row){
                $getNoTelp = $row->telp_ortu;

                $firstThreeCharacters = substr($getNoTelp, 0, 3);

                if($firstThreeCharacters=='628'){
                    $newObject = array(
                        'urut' => $noms++,
                        'nama' => $row->nama_lengkap,
                        'tgllahir' => $row->tanggal_lahir,
                        'alamat' => $row->alamat_lengkap,
                        'account_number' => $row->account_number,
                        'nomor' => $row->telp_ortu,
                        'nis' => $row->nis,
                        'pin' => $row->pin,
                        'instansi_id' => $row->IDINSTANSI,
                        'saldo' => $row->balance,
                    );
                    $dataArray[] = $newObject; // Add the new object to the array
                }
                
            }

        }
        else if($endPoint=='broadcastTransferBRKS'){

            $getSiswa = $this->Home_model->getSelectData("*","siswa,account", "WHERE siswa.user_id=account.user_id AND siswa.instansi_id=$idInstansi AND (telp_ortu!='0' OR telp_ortu!=0) AND siswa.deleted_at IS NULL ORDER BY siswa.created_at ASC");
            foreach($getSiswa->result() as $row){
                $getNoTelp = $row->telp_ortu;

                $firstThreeCharacters = substr($getNoTelp, 0, 3);

                if($firstThreeCharacters=='628'){
                    $newObject = array(
                        'urut' => $noms++,
                        'nama' => $row->nama_lengkap,
                        'tgllahir' => $row->tanggal_lahir,
                        'alamat' => $row->alamat_lengkap,
                        'account_number' => $row->account_number,
                        'nomor' => $row->telp_ortu,
                        'saldo' => $row->balance,
                    );
                    $dataArray[] = $newObject; // Add the new object to the array
                }
                
            }

        }
        else if($endPoint=='sendGeneral'){

            $getSiswa = $this->Home_model->getSelectData("*","general,account", "WHERE general.user_id=account.user_id AND general.instansi_id=$idInstansi AND general.jabatan!='Kartu Kredit' AND (telpon!='0' OR telpon!=0) AND general.deleted_at IS NULL ORDER BY general.created_at ASC");
            foreach($getSiswa->result() as $row){
                $getNoTelp = $row->telpon;

                $firstThreeCharacters = substr($getNoTelp, 0, 3);

                if($firstThreeCharacters=='628'){

                    // if($getNoTelp=='6281320996169' || $getNoTelp=='6285259875754'){
                 
                        $newObject = array(
                            'urut' => $noms++,
                            'nama' => $row->nama_lengkap,
                            'tgllahir' => $row->tanggal_lahir,
                            'alamat' => $row->alamat_lengkap,
                            'account_number' => $row->account_number,
                            'nomor' => $row->telpon,
                            'saldo' => $row->balance,
                        );
                        $dataArray[] = $newObject; // Add the new object to the array

                    // }
                }
                
            }

        }
        else if($endPoint=='broadcastInisiasiAkunGeneral'){

            $getSiswa = $this->Home_model->getSelectData("*","general,users", "WHERE general.user_id=users.id AND general.instansi_id=$idInstansi AND general.jabatan!='Kartu Kredit' AND telpon LIKE '628%' AND general.deleted_at IS NULL ORDER BY general.created_at ASC");
            foreach($getSiswa->result() as $row){
                $getNoTelp = $row->telpon;

                $firstThreeCharacters = substr($getNoTelp, 0, 3);

                if($firstThreeCharacters=='628'){

                    // if($getNoTelp=='6281320996169' || $getNoTelp=='6285259875754'){
                 
                        $newObject = array(
                            'urut' => $noms++,
                            'nama' => $row->nama_lengkap,
                            'username' => $row->username,
                            'tgllahir' => $row->tanggal_lahir,
                            'alamat' => $row->alamat_lengkap,
                            'nomor' => $row->telpon
                        );
                        $dataArray[] = $newObject; // Add the new object to the array

                    // }
                }
                
            }

        }

        $rangemin = $batasBawah;
        $rangemax = $batasAtas;
        
        $arraySend = [];
        for($i=0; $i < count($dataArray);$i++){

            if ($dataArray[$i]['urut'] >= $rangemin && $dataArray[$i]['urut'] <= $rangemax) {

                $randomNumber = rand(0, 10);
                $greetings = ["Bismillahirrahmanirrahim, Assalamualaikum.","Bismillah!","Bismillah, Assalamu'alaikum","Assalamualaikum..", "Assalamualaikum", "AssalamuAlaikum.", "Selamat malam!", "Assalamu'alaikum warahmatullahi wabarakatuh", "Assalamu'alaikum wr. wb.", "Assalamu'alaikum!", "Assalamualaikum!"];
                $personal = ["Bpk","Ibu yang terhormat","Bapak yang terhormat","Bapak/Ibu", "Bapak", "Ibu", "Bpk/Ibu", "Ayahanda", "Ibunda", "bapak ibu","Ayah / Bunda"];

                $khususTopup = '';

                //Kirim Pesan Poin 4 Khusus ke PPSR DIBEDAKAN!!!
                if($idInstansi==2){
                    $khususTopup = '4. Topup Saldo Belanja

Transfer ke Rekening Bank Riau Kepri Syariah  8253144442 A.N Tabungan Belanja Santri PPSR 2 dan Kirim bukti Transfer ke Nomor Whatsapp  082283921284 (Opi)

Terimakasih banyak atas kerjasamanya.';
                }else if($idInstansi==3){
                    $khususTopup = '4. Topup Saldo Belanja

Transfer ke Rekening Bank Riau Kepri Syariah 825-31-22221 A.N Tabungan Belanja Santri dan Kirim bukti Transfer ke Nomor Whatsapp  081275022029 (Dara)

Terimakasih banyak atas kerjasamanya.';
                }else {
                    $khususTopup = '4. Ketik : *Topup_'.$dataArray[$i]["account_number"].'*
_Untuk melakukan topup menggunakan payment gateway yang telah disediakan_';
                }
                
                $messages = '*Pusat Informasi '.$namaInstansi.'*
===============================
'.$greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,

===============================
SALDO TERKINI
*Rp'.number_format($dataArray[$i]['saldo'],2,",",".").'*
===============================

Kami juga ingin menginformasikan bahwa '.$personal[$randomNumber].' dapat mengetahui informasi seputar keuangan Ananda dengan mengirim / membalas pesan ke nomor ini dengan beberapa format dibawah ini :
1. Ketik : *CekSaldo_'.$dataArray[$i]["account_number"].'*
_Untuk mengetahui saldo terakhir_

2. Ketik : *Belanja1_'.$dataArray[$i]["account_number"].'*
_Untuk mendapatkan aktifitas belanja pada hari ini_

3. Ketik : *Belanja2_'.$dataArray[$i]["account_number"].'*
_Untuk mendapatkan aktifitas belanja dalam 2 hari yang lalu_

'.$khususTopup.'

_Apakah pesan ini membantu '.$personal[$randomNumber].'?_
_Kiranya '.$personal[$randomNumber].' dapat membalas chat ini dengan mengatakan Ya._

Terimakasih.

===============================
Mohon di *SAVE* nomor ini dengan nama *Pusat Informasi '.$namaInstansi.'.*';
                

            $messagesTransferBRKS = '*INFORMASI UPDATE*
===============================
'.$greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,

Bapak/Ibu wali santri yang kami hormati, saat ini sudah bisa melakukan top uang uang belanja santri tanpa konfirmasi pada host pondok pesantren.

##*NOMOR REKENING*##
       *'.$dataArray[$i]["account_number"].'*

Beberapa langkahnya sangatlah mudah, ikuti langkah berikut ini :

1. Mengunjungi Bank Riau Kepri Syariah terdekat,
2. Menuju ke Teller Bank dengan membawa nomor rekening Ananda (nomor rekening yang tertera diatas ini),
3. Sampaikan lalu tunggu beberapa saat agar Teller Bank mencari data Ananda tersebut,
4. Bpk/ibu menyebutkan nominal uang yang akan ditransfer ke tabungan belanja Ananda,
5. Selesai. Proses berhasil dan Bpk/Ibu akan mendapatkan pesan notifikasi balasan langsung dari Whatsapp Bot.

_Apakah pesan ini membantu '.$personal[$randomNumber].'?_
_Kiranya '.$personal[$randomNumber].' dapat membalas chat ini dengan mengatakan Ya._

Terimakasih.

===============================
Mohon di *SAVE* nomor ini dengan nama *Pusat Informasi '.$namaInstansi.'*';
            


// KIRIM NOTIF BROADCAST INISIASI TAGIHAN
    $messagePesanInisiasiTagihan = $greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,
Sekarang Bayar Tagihan Pendidikan Lebih Mudah Dengan Virtual Account!

Berikut langkah mudah agar Anda terintegrasi dengan data Anak anda :
1. Kunjungi link saku.oncard.id,
2. Pada tombol *Registrasi*, masukkan informasi data diri Anda yang valid,
3. Lanjutkan dengan proses Login dengan akun yang berhasil terdaftar sebelumnya,
4. Tambahkan data anak dengan tekan tombol *Tambahkan Anak*, lalu isi data :
- Nomor billing : `'.$dataArray[$i]["account_number"].'`
- NIS : `'.$dataArray[$i]["nis"].'`
- PIN : `'.$dataArray[$i]["pin"].'`
- Telefon : `'.$dataArray[$i]["nomor"].'`
5. Jika data cocok / match, Anda akan terhubung dengan data Anak anda dengan segera.

Jika ada pertanyaan silahkan hubungi *Admin '.$namaInstansi.'*

Terimakasih.';

            if($endPoint=='broadcastSaldoSiswa'){
                $messages = $messages;
            }
            else if($endPoint=='broadcastTransferBRKS'){
                $messages = $messagesTransferBRKS;
            }
            else if($endPoint=='sendSiswaPlainTemplate'){
                // $messages = $pesan.'';
                $messages = $pesan.'

Silahkan lakukan penambahan data anak / user dengan detail sbb :
- Nama : *`'.$dataArray[$i]["nama"].'`*
- Account Number : *`'.$dataArray[$i]["account_number"].'`*
- PIN : *`'.$dataArray[$i]["pin"].'`* 
';
            }
            else if($endPoint=='PesanInisiasiTagihan'){
                $messages = $messagePesanInisiasiTagihan;
            }
            else if($endPoint=='sendGeneral'){
                $messages = '*Broadcast | Pusat Informasi '.$namaInstansi.'.*
===============================
Bapak/Ibu *'.$dataArray[$i]['nama'].'*,

'.$pesan;
            }
            else if($endPoint=='broadcastInisiasiAkunGeneral'){
                $messages = '*Inisiasi Akun General di '.$namaInstansi.'.*

Assalamualaikum warrahmatullahi Wabarakatuh.

Bapak Ibu Guru dan Karyawan '.$namaInstansi.', Berikut kami kirimkan Akses log in aplikasi absen.

Nama : '.$dataArray[$i]["nama"].'
Username : '.$dataArray[$i]["username"].'
Password : 123456

Informasi ini bersifat rahasia, mohon tidak diberitahu kepada siapapun. Terimakasih

Wassalamualaikum Warrahmatullah. 
#TeamQrion';
            }
            else {
//                 $messages = '*Broadcast | Pusat Informasi '.$namaInstansi.'.*
// ===============================
// '.$greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,

// '.$pesan.'

// _..................................._

// Kami juga ingin menginformasikan bahwa '.$personal[$randomNumber].' dapat mengetahui informasi seputar keuangan Ananda dengan mengirim / membalas pesan ke nomor ini dengan beberapa format dibawah ini :
// 1. Ketik : *CekSaldo_'.$dataArray[$i]["account_number"].'*
// _Untuk mengetahui saldo terakhir_

// 2. Ketik : *Belanja1_'.$dataArray[$i]["account_number"].'*
// _Untuk mendapatkan aktifitas belanja pada hari ini_

// 3. Ketik : *Belanja2_'.$dataArray[$i]["account_number"].'*
// _Untuk mendapatkan aktifitas belanja dalam 2 hari yang lalu_

// 4. Ketik : *Topup_'.$dataArray[$i]["account_number"].'*
// _Untuk melakukan topup menggunakan payment gateway yang telah disediakan_

// _Apakah pesan ini membantu '.$personal[$randomNumber].'?_
// _Kiranya '.$personal[$randomNumber].' dapat membalas chat ini dengan mengatakan Ya._

// Terimakasih.

// ===============================
// Mohon di *SAVE* nomor ini dengan nama *Pusat Informasi '.$namaInstansi.'.*';


                $messages = '*Broadcast | Pusat Informasi '.$namaInstansi.'.*
===============================
'.$greetings[$randomNumber].' '.$personal[$randomNumber].' dari Ananda *'.$dataArray[$i]['nama'].'*,

'.$pesan.'

1. Ketik : *CekSaldo_'.$dataArray[$i]["account_number"].'*
_Untuk mengetahui saldo terakhir_

2. Ketik : *Belanja1_'.$dataArray[$i]["account_number"].'*
_Untuk mendapatkan aktifitas belanja pada hari ini_

3. Ketik : *Belanja2_'.$dataArray[$i]["account_number"].'*
_Untuk mendapatkan aktifitas belanja dalam 2 hari yang lalu_

4. Ketik : *Topup_'.$dataArray[$i]["account_number"].'*
_Untuk melakukan topup menggunakan payment gateway yang telah disediakan_

_Apakah pesan ini membantu '.$personal[$randomNumber].'?_
_Kiranya '.$personal[$randomNumber].' dapat membalas chat ini dengan mengatakan Ya._

Terimakasih.

===============================
Mohon di *SAVE* nomor ini dengan nama *Pusat Informasi '.$namaInstansi.'.*';
            }

                $newObject = array(
                    'no_urut' => $dataArray[$i]['urut'],
                    'min_max' => $rangemin.'-'.$rangemax,
                    'nama' => $dataArray[$i]['nama'],
                    'tgllahir' => $dataArray[$i]['tgllahir'],
                    'alamat' => $dataArray[$i]['alamat'],
                    'nomor' => $dataArray[$i]['nomor'],
                    'account_number' => $dataArray[$i]['account_number'],
                    'delay' => $randomNumber,
                    'pesan' => $messages,
                    'saldo' => $dataArray[$i]['saldo'],
                );
                $arraySend[] = $newObject;
                
                $this->sendMessssageWEBHOOKKustom($dataArray[$i]['nomor'],$messages,$rangemin,$rangemax,$dataArray[$i]['urut'],$kodeInstansi);
            }

            
        }
        
        echo json_encode(array("rows"=>count($dataArray),"range"=>$rangemin."-".$rangemax,"data"=>$arraySend));

    }

    function sendMessageWatzapKhususBank(){


        $json_data = file_get_contents('php://input');

        $data = json_decode($json_data);

        // $account_number = $this->input->post('account_number');
        // $token = $this->input->post('token');
        // $amount = $this->input->post('amount');
        // $id_trx_bank = $this->input->post('id_trx_bank');
        // $id_channel = $this->input->post('id_channel');
        // echo $account_number.' '.$token.' '.$amount.' '.$id_trx_bank.' '.$id_channel;

        if ($data->tokenKu=='9177815291160511921888185') {
            
            

            $descriptions = '-';

            $account_number = $data->account_number;
            $token = $data->token;
            $amount = $data->amount;
            $id_trx_bank = $data->id_trx_bank;
            $id_channel = $data->id_channel;
            $descriptions = $data->description;
            $pecah_descriptions = explode(',', $descriptions);
            
            $getDataToken = $this->Home_model->getSelectData("*","token_request", "WHERE client_secret='$token'");
            $getDataChannel = $this->Home_model->getSelectData("*","channel_bank", "WHERE channel=$id_channel");
            $getDataPenggunaSiswa = $this->Home_model->getSelectData("*","account,siswa,instansi", "WHERE account.account_number='".$account_number."' AND account.user_id=siswa.user_id AND account.instansi_id=instansi.id");
            $getDataPenggunaGeneral = $this->Home_model->getSelectData("*","account,general,instansi", "WHERE account.account_number='".$account_number."' AND account.user_id=general.user_id AND account.instansi_id=instansi.id");

            $namaUser = '';
            $namaUser2 = 'RERERRE';
            $nomor = '';
            $kodeInstansi = '';

            $pesan = '';

            $namaBank = 'Bank';

            if($getDataToken->num_rows() > 0){

                foreach($getDataChannel->result() as $row){
                    $namaBank = $row->inisial." ".$row->description;
                }
    
                // if($getDataPenggunaSiswa->num_rows() > 0){
                    foreach($getDataPenggunaSiswa->result() as $row){
                        $nomor = $row->telp_ortu;
                        $namaUser = $row->nama_lengkap;
                        $kodeInstansi = $row->kode_instansi;
                    }
                // }
                
                // if($getDataPenggunaGeneral->num_rows() > 0){
                    foreach($getDataPenggunaGeneral->result() as $row){
                        $nomor = $row->telpon;
                        $namaUser = $row->nama_lengkap;
                        $kodeInstansi = $row->kode_instansi;
                    }
                // }

                if($namaUser==''){
                    return;
                }
    
    
                $apiKey = '';
                $numberKey = '';
                $getData = $this->Home_model->getSelectData("*","watzap_master_token", "WHERE kode_instansi='$kodeInstansi'");
                foreach($getData->result() as $row){
                    $apiKey = $row->api_key;
                    $numberKey = $row->number_key;
                }
                // if($kodeInstansi=='467.598.080'){
                //     $apiKey = 'R6VBPELQ3NY6M2R1';
                //     $numberKey = '7a1JHGAPoLPUSLVn';
                // }
    
                date_default_timezone_set("Asia/Jakarta");
                
    
$pesan = 'Halo Bpk/ibu wali dari '.$namaUser.',

Transfer Anda sebesar *Rp'.number_format($amount,2,",",".").'* telah berhasil diproses!

📅 Tanggal: '.date("d-m-Y").'
⏰ Jam: '.date("H:i:s").' WIB
👤 Nama Penerima: '.$namaUser.'
💼 '.$pecah_descriptions[0].'
🏦 Bank Pengirim: '.$pecah_descriptions[2].'
🏦 Bank Penerima: '.$namaBank.'
📄 Referensi Transfer: '.$id_trx_bank.'
📄 Tambahan : '.$descriptions.'

💰 Jumlah Transfer: Rp'.number_format($amount,2,",",".").'


Terimakasih, semoga transaksi Anda membawa keberkahan! ';
    
                $dataSending = Array();
                $dataSending["api_key"] = $apiKey;
                $dataSending["number_key"] = $numberKey;
                $dataSending["phone_no"] = $nomor;
                $dataSending["message"] = $pesan;
    
                // $f = $this->validateNumber($nomor);
    
                // if($f!=200){
                //     echo var_dump('Nomor tidak terdaftar!');
                //     return;
                // }
    

                $curl = curl_init();
    
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($dataSending),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                ));
    
                $response = curl_exec($curl);
    
                curl_close($curl);
                // echo $response;
                echo json_encode(array("status"=>true));
    

            }else {
                echo json_encode(array("status"=>false,"message"=>"token program tidak valid!"));
            }

            
        }else {
            echo json_encode(array("status"=>false,"message"=>"tokenKu tidak valid!"));
        }
    }
    
    
    function testionic(){


        // $json_data = file_get_contents('php://input');

        // $data = json_decode($json_data);

        // $account_number = $data->username;
        // $password = $data->password;

        $account_number = $this->input->post('username');

        echo json_encode(array("status"=>true." ". $account_number));

    }

}


?>