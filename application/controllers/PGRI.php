<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class PGRI extends CI_Controller
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
          
            $this->load->view('user/template/header_pgri.php', $data);
            // $this->load->view('user/template/navigation.php', $data);
            $this->load->view('user/agency/___render_kartu_apps_pgri.php', $data);
            // $this->load->view('user/template/footer.php', $data);
        
    }

    public function get_data(){
        $getData = $this->Home_model->getSelectData("*","watzap_pgri_data", "WHERE status='aktif' AND url_foto!='' AND url_qrcode!='' AND batch=3 ORDER BY dateCreated DESC")->result();

        echo json_encode(array("status"=>true,"data"=>$getData));
    }
    public function get_data_kta(){
        $getData = $this->Home_model->getSelectData("*","watzap_pgri_data", "WHERE status='aktif' ORDER BY dateCreated ASC")->result();

        echo json_encode(array("status"=>true,"data"=>$getData));
    }

}
