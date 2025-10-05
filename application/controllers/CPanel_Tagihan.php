<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class CPanel_Tagihan extends CI_Controller
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
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            // $this->load->view('tagihan/index.php', $data);
            $this->load->view('tagihan/index_dev.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function indexDev()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/index_dev.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function SyncPage()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/sinkronisasi_datasiswa_oncard_to_tagihan/index.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function JenisTagihan()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/jenis_tagihan.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function BalanceCash()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/withdrawal/index.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function BalanceTransfer()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/withdrawal/balance_transfer.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function OncardBalance()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/withdrawal/oncard_balance.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function OncardBalanceDev()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/withdrawal/oncard_balance_new.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function HistoriWithdrawal()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/withdrawal/history.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function getTransactionsFee()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $function = 'CPanel_Admin';
            $role = $this->session->userdata('_permission');
            
            $oncardUserID = $this->session->userdata('_oncard_user_id');

            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $getInstansiID = $this->Home_model->getSelectData("*","users", "WHERE id=$oncardUserID")->result();

            $idins = '';
            foreach($getInstansiID as $row){
                $idins = $row->instansi_id;
            }

            $getData = $this->Home_model->getSelectData("*, transactions_biller.created_at tglTerbuat,transactions_biller.status statusTerbuat, transactions_biller.id tbID,(SELECT account.bank_account_number FROM account WHERE account.instansi_id=transactions_biller.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) akunBank,(SELECT account.bank_account_name FROM account WHERE account.instansi_id=transactions_biller.instansi_id AND account_level='agency' AND account_type='business' AND bank_account_number is not null) namaBank ,(SELECT account.customers_name FROM account WHERE account.user_id=transactions_biller.user_billed_id) userPengguna, (SELECT balance FROM account WHERE account.instansi_id=transactions_biller.instansi_id AND account.account_level='owner' AND account.account_type='billing') saldoBillingFee, instansi.nama namaINSTANSI","transactions_biller,instansi", "WHERE transactions_biller.instansi_id=instansi.id AND instansi.deleted_at IS NULL AND transactions_biller.instansi_id IS NOT NULL AND transactions_biller.status='success' AND transactions_biller.is_done=0 AND transactions_biller.instansi_id=$idins")->result();
            echo json_encode(array("status"=>true,"data"=>$getData,"message"=>"Data berhasil diambil.","o_user_id"=>$oncardUserID,"o_instansi_id"=>$idins));
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister/login.php', $data);
        }
    }
    
    public function ManageTagihan()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/manage_tagihan.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function AddModifyTagihan()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $data['idJenisTagihan'] = $this->uri->segment(3);

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/manage_tagihan_manage.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function TagihanByJenis()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $data['idJenisTagihan'] = $this->uri->segment(3);

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/manage_tagihan_by_jenis.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function TagihanSiswaByNIS()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $data['idJenisTagihan'] = $this->uri->segment(3);

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/siswa/manage_tagihan_siswa_by_nis.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function PelajarPage()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/siswa/index.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function ListTunggakan()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/list_tunggakan.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function ListSeluruhTagihan()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/list_pembayaran_tagihan.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function ListSeluruhTagihanOld()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/list_pembayaran_tagihan_lama.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function ListSeluruhTagihanFilter()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            $data['_instansi_name'] = $this->session->userdata('_instansi_name');

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/tagihan/list_pembayaran_tagihan_filter.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function generateCard()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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

            $this->load->view('tagihan/template/header.php', $data);
            // $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/agency/___render_kartu_apps.php', $data);
            // $this->load->view('tagihan/agency/___render_kartu_pmak.php', $data);
            // $this->load->view('tagihan/agency/___render_kartu_smanpintar.php', $data);
            // $this->load->view('tagihan/agency/___render_kartu_ppdi.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function renderKartu()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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

            $this->load->view('tagihan/template/header.php', $data);
            // $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/agency/___render_kartu.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $this->load->view('loginregister_tagihan/login.php', $data);
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



    // ----------------------------------------- DASHBOARD WHATSAPP ---------------------------------------- //
    
    
    public function WarehouseManagement()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/agency/warehouse_management.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    // ----------------------------------------- DASHBOARD WHATSAPP ---------------------------------------- //
    
    
    public function Wapage()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            
            if($uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252'){
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/template/navigation_wapage.php', $data);
                $this->load->view('tagihan/tagihan/whatsapp_panel.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }else {
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_error.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function Wapage_TestKirim()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            
            if($uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb' || $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252'){
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/template/navigation_wapage.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_testKirim.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }else {
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_error.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function Wapage_CreateSession()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            
            if($uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb'|| $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252'){
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/template/navigation_wapage.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_createsession.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }else {
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_error.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function Wapage_BulkMessage()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            
            if($uidSetted=='1f3ade3e-5a26-4018-8a97-a8a00919ba85' || $uidSetted=='c45a75db-8e85-42a0-a319-cd88b45be75e' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'|| $uidSetted=='dfc7d58d-1899-419b-a0da-cf70372e79bb'|| $uidSetted=='c1018983-c245-436e-89a6-a34b2c969252'){
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/template/navigation_wapage.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_bulkmessage.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }else {
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/agency/whatsapp_panel_error.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function Wapage_BulkMessageBroadcast()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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
            
            if($uidSetted=='df87596a-bfc8-4584-9660-cd089d942e44' || $uidSetted=='b865730e-4005-48b4-9011-163651ab1415'){
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/template/navigation_wapage.php', $data);
                $this->load->view('tagihan/whatsapp_panel_bulkmessage_broadcast.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }else {
                $this->load->view('tagihan/template/header.php', $data);
                $this->load->view('tagihan/tagihan/whatsapp_panel_error.php', $data);
                $this->load->view('tagihan/template/footer.php', $data);
            }

        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function renderKartuGeneral()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $role = $this->session->userdata('_permission');
            $function = 'CPanel_Tagihan';
            
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

            $this->load->view('tagihan/template/header.php', $data);
            // $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/agency/___render_kartu_general.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function Profil()
    {
        if ($this->session->userdata('_token') && ($this->session->userdata('_permission')=='agency'||$this->session->userdata('_permission')=='seller')) {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/_all/pengaturan.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/agensi_page.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function IpaymuPanel()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/ipaymu_page.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function IpaymuCreateInvoice()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/ipaymu_page_create_invoice.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function IpaymuHistoryInvoice()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/ipaymu_page_history_invoice.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function IpaymuPanelDetail()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/ipaymu_page_detail.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function getInfoTagihan()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='organisasi') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $idInstansiLogined = $this->session->userdata('_oncard_user_id');
            
            $getData = $this->Home_model->getSelectData2nd("*","withdrawal", "WHERE status='progress' AND user_oncard_requested_id=$idInstansiLogined AND deleted_at is null")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function getInfoTagihanHistori()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='organisasi') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $idInstansiLogined = $this->session->userdata('_oncard_user_id');
            
            $getData = $this->Home_model->getSelectData2nd("*","withdrawal", "WHERE user_oncard_requested_id=$idInstansiLogined AND deleted_at is null ORDER BY created_at DESC")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function saveInfoWithdrawal()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='organisasi') {
            
            $nominalTagihan = $this->input->post('nominalTagihan');
            $noted = $this->input->post('noted');
            $instansi_id = $this->input->post('instansi_id');
            $user_id = $this->input->post('user_id');
            $uuid = $this->generateShortUUID(20);
            
            $checkIFExist = $this->Home_model->getSelectData2nd("*","withdrawal", "WHERE uuid='$uuid'")->result();

            date_default_timezone_set('Asia/Jakarta');

            if($checkIFExist){
                echo json_encode(array("status"=>false,"data"=>[],"message"=>"Retry Again!"));
                return false;
            }else {
                $dataXXX = array(
                    'instansi_id'  => $instansi_id,
                    'user_oncard_requested_id'  => $user_id,
                    'uuid'  => $uuid,
                    'nominal'  => $nominalTagihan,
                    'noted'  => $noted,
                    'status'  => 'progress',
                    'created_at'  => date("Y-m-d H:i:s"),
                    'updated_at'  => date("Y-m-d H:i:s"),
                );

                $resultInsert = $this->Home_model->insertData2nd("withdrawal",$dataXXX);
                $inserted_id = $this->db->insert_id();
                $newData = $this->Home_model->getSelectData2nd("*","withdrawal", "WHERE id=$inserted_id")->result();

                if($resultInsert){
                    echo json_encode(array("status"=>true,"data"=>$newData,"message"=>"Request pencairan berhasil dibuat!"));
                }else {
                    echo json_encode(array("status"=>false,"data"=>[],"message"=>"Terjadi kesalahan. [22]"));
                }
            }
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    private function generateShortUUID($length = 20) {
        // Generate a standard UUID (hexadecimal string)
        $uuid = bin2hex(random_bytes(16));
        
        // Return the first $length characters
        return substr($uuid, 0, $length);
    }
    
    public function getDataAgensiAll()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');
            
            $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, (SELECT balance from account WHERE account.instansi_id=instansi.id AND account.account_level='owner') punyaoncard","instansi,users", "WHERE instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function getDataAgensiAllIpaymu()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $strDate = $this->uri->segment(3);
            
            if($strDate){
                $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, 
                (SELECT SUM(JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))) 
                    FROM payment_gateways WHERE payment_gateways.instansi_id=instansi.id 
                    AND payment_gateways.status_id=10 AND is_done=0 AND payment_gateways.created_at BETWEEN
                    CONCAT('$strDate', ' 00:00:00') AND
                    CONCAT('$strDate', ' 23:59:59')
                ) jumlah_saldo_available_ipaymu, (
                    SELECT 
                        GROUP_CONCAT(payment_gateways.id)
                    FROM payment_gateways 
                    WHERE 
                        payment_gateways.instansi_id = instansi.id 
                        AND payment_gateways.status_id = 10 
                        AND is_done = 0 
                        AND payment_gateways.created_at BETWEEN 
                            CONCAT('$strDate', ' 00:00:00') 
                            AND CONCAT('$strDate', ' 23:59:59')
                ) payment_gateway_ids","instansi,users", "WHERE instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
                echo json_encode(array("status"=>true,"data"=>$getData,"date"=>"Creating invoice at ".$strDate));
            }else {
                $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, (SELECT SUM(JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))) FROM payment_gateways WHERE payment_gateways.instansi_id=instansi.id AND payment_gateways.status_id=10 AND is_done=0) jumlah_saldo_available_ipaymu","instansi,users", "WHERE instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
                echo json_encode(array("status"=>true,"data"=>$getData));
            }
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function getDatePoolInCurrentMonth()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $firstdate = $this->input->post('firstdate');
            $lastdate = $this->input->post('lastdate');
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
                AND pg.is_done = 0
                AND pg.instansi_id IN ($instansi_id_pool)
            GROUP BY dates.date
            ORDER BY dates.date;");

            // $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, (SELECT SUM(JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))) FROM payment_gateways WHERE payment_gateways.instansi_id=instansi.id AND payment_gateways.status_id=10 AND is_done=0) jumlah_saldo_available_ipaymu","instansi,users", "WHERE instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData->result()));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function getDataAgensiDetail()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $idInstansi = $this->uri->segment(3);
            
            $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI","instansi,users", "WHERE instansi.id=$idInstansi AND instansi.id=users.instansi_id AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function getAllPaymentGatewaysPendingPayment()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $idInstansi = $this->uri->segment(3);
            
            $getData = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE status=0 ORDER BY created_at DESC")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function getDataAgensiAllIpaymuHistoryInvoice()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            $idInstansi = $this->uri->segment(3);
            
            $getData = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE status=1 ORDER BY created_at DESC")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function createInvoie()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');

            
            $invoice = $this->input->post('invoice');
            $list_instansi = $this->input->post('list_instansi');
            $pg_ids = $this->input->post('pg_ids');
            $html = $this->input->post('html');
            $date_given = $this->input->post('date_given');
            
            $checkIFExist = $this->Home_model->getSelectData("*","payment_gateways_invoices", "WHERE date_invoice = '$date_given' AND status=0")->result();

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
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function updateStatusInvoicePaymentGateways()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function tambahAgensi()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='owner') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/agensi_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/siswa_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function SiswaAllRender()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/siswa_list_all.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function General()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/general_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function Membership()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/membership_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function creditManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/credit_card_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function GeneralAllRender()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/general_list_all.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function MembershipAllRender()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/membership_list_all.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function WD()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/withdrawal.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function WDStakeHolders()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/WD_Stakeholder.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function sector_a()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            // $this->load->view('tagihan/template/navigation.php', $data);
            
            $this->load->view('tagihan/owner/rangkuman_balance.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
            
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function DownloadModules()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/download_modules.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function SebaranSaldo()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/sebaran_saldo.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function getDataAgensiAllIpaymuEachInstansi()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
            $role = $this->session->userdata('_permission');
            $idUSERINSTANSI = $this->session->userdata('_user_id');
            $data['namaLengkap'] = $this->session->userdata('_user');

            $getData = $this->Home_model->getSelectData("*, instansi.id idINSTANSI, (SELECT SUM(JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.total')) - JSON_UNQUOTE(JSON_EXTRACT(payment_gateways.response, '$.fee'))) FROM payment_gateways WHERE payment_gateways.instansi_id=instansi.id AND payment_gateways.status_id=10 AND is_done=0) jumlah_saldo_available_ipaymu","instansi,users", "WHERE instansi.id=users.instansi_id AND users.id=$idUSERINSTANSI AND users.role='agensi' AND instansi.deleted_at IS NULL")->result();
            echo json_encode(array("status"=>true,"data"=>$getData));
            


        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function Merchant()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/kantin_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function siswaManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/siswa_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function generalManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/general_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    
    public function membershipManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/membership_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function kantinManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/kantin_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }

    public function Saldo()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/riwayat_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function Mutasi_Transaksi_Siswa()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/mutasi_transaksi.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function PrintStruk()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/_all/printstruk.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    public function PrintStrukAuto()
    {
        if ($this->session->userdata('_token')) {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/_all/printstruk_auto.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function Mutasi_Transaksi_General()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/mutasi_transaksi_general.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function Mutasi_Transaksi_Kantin()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='agency') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/mutasi_transaksi_kantin.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function Mutasi_Withdrawal()
    {
        if ($this->session->userdata('_token') && ($this->session->userdata('_permission')=='agency'||$this->session->userdata('_permission')=='seller')) {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/_all/mutasi_withdrawal.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/transaksi.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function TransaksiTrial()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/transaksi_trial.php', $data); //transaksi tanpa logic free adminfee <=2000 rupiah
            // $this->load->view('tagihan/transaksi_hold.php', $data); //transaksi akan di freeze dulu halamannya dengan "UNDERMAINTANANCE"
            
            // $this->load->view('tagihan/transaksi_trial_new.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    public function Produk()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/product_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    
    public function NominalList()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/nominal_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    public function NominalListManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/nominal_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    public function Riwayat()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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
            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/riwayat_list.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
        }
    }
    public function produkManage()
    {
        if ($this->session->userdata('_token') && $this->session->userdata('_permission')=='seller') {
            
            $function = '';
            $function = 'CPanel_Tagihan';
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

            $this->load->view('tagihan/template/header.php', $data);
            $this->load->view('tagihan/template/navigation.php', $data);
            $this->load->view('tagihan/product_add.php', $data);
            $this->load->view('tagihan/template/footer.php', $data);
        } else {
            $data['levelUser'] = "";
            $this->load->view('loginregister_tagihan/login.php', $data);
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
            $this->load->view('tagihan/_pesan_otomatis/broadcast_saldo_info.php');   
    }
    

}
