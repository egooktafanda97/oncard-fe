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
            $this->load->view('user/'.$role.'/agensi_page.php', $data);
            $this->load->view('user/template/footer.php', $data);
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
            $this->load->view('user/'.$role.'/siswa_list.php', $data);
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
            $this->load->view('user/'.$role.'/general_list.php', $data);
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
    
    public function Kantin()
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

    

}
