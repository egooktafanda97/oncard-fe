<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class ManifestasiKartu extends CI_Controller
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
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        
            $data = [];

            var_dump('belum ada halaman.');
          
            // $this->load->view('user/template/header_pgri.php', $data);
            // // $this->load->view('user/template/navigation.php', $data);
            // $this->load->view('user/agency/___render_kartu_apps_pgri.php', $data);
            // // $this->load->view('user/template/footer.php', $data);
        
    }

    public function get_data(){
        $token = $this->uri->segment(3);
        if($token=='123131831312316312625375582'){
            $getData = $this->Home_model->getSelectData("*","datacenter_kartu", "ORDER BY created_at DESC")->result();

            echo json_encode(array("status"=>true,"data"=>$getData));
        }else {
            echo json_encode(array("status"=>false,"message"=>"Token akses salah!"));
        }
        
    }
    
    public function datatafaqquh(){
        
            $instansi = $this->uri->segment(3);
            $getData = $this->Home_model->getSelectData("*","datacenter_temporary", "WHERE label='$instansi' AND tipe='santri' ORDER BY id ASC")->result();

            echo json_encode(array("status"=>true,"data"=>$getData));
        
    }
    
    public function datatafaqquhgeneral(){
        
            $instansi = $this->uri->segment(3);
            $getData = $this->Home_model->getSelectData("*","datacenter_temporary", "WHERE label='$instansi' AND tipe='general' ORDER BY id ASC")->result();

            echo json_encode(array("status"=>true,"data"=>$getData));
        
    }

    public function add_kartu(){

        $tokenKu = $this->input->post('tokenKu');
       
        if ($tokenKu=='123131831312316312625375582') {
            
            $kodekartu = $this->input->post('card_id');

            $dataXXX = array(
                'card_id'  => $kodekartu
            );

            $resultInsert = $this->Home_model->insertData("datacenter_kartu",$dataXXX);

            if($resultInsert){
                echo json_encode(array("status"=>true,"message"=>"Kartu berhasil bergabung dalam sistem Oncard"));
            }else {
                echo json_encode(array("status"=>false,"message"=>"Kartu sudah ada sebelumnya! Tidak bisa ditambahkan lagi. Hubungi admin."));
            }
            
        }else {
            echo json_encode(array("status"=>false,"message"=>"Token akses salah!"));
        }
    }

}

