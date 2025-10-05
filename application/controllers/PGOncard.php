<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class PGOncard extends CI_Controller
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
            // $this->load->view('user/_all/vcall_index.php', $data);
          
    }

    
    
    public function notification()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        
            $data = [];
            $this->load->view('payment_gateway/notification.php', $data);
          
    }
    public function success_notification()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        
            $data = [];
            $this->load->view('payment_gateway/notification.php', $data);
          
    }
    public function failed_notification()
    { //KHUSUS UNTUK CETAK KARTU SAJA!
        
            $data = [];
            $this->load->view('payment_gateway/notification.php', $data);
          
    }

   

}
