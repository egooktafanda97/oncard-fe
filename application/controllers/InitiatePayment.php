<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class InitiatePayment extends CI_Controller
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


    public function make()
    { 
        $sender = $this->uri->segment(3);
        $accountNumber = $this->uri->segment(4);
        
        $data['errormsg'] = "";
        redirect('InitiatePayment/inquiry/'.$sender.'/'.$accountNumber, 'refresh');
    }

    public function inquiry()
    { 
        // if ($this->session->userdata('_token')) {
            
            $function = '';

            $data['sender'] = $this->uri->segment(3);
            $data['accountNumber'] = $this->uri->segment(4);
            $accNum = $this->uri->segment(4);
            $uid = $this->session->userdata('_user_uid');

            $kd = '';
            $getData = $this->Home_model->getSelectData("instansi.id idINS, instansi.kode_instansi,account.customers_name,instansi.nama","account,instansi", "WHERE account.instansi_id=instansi.id AND account.account_number=$accNum");
            foreach($getData->result() as $row){
                $data['kodeInstansi'] = $row->kode_instansi;
                $data['namaCustomer'] = $row->customers_name;
                $data['namaInstansi'] = $row->nama;
                $kd= $row->idINS;
            }
            
            $data['__token'] = $this->session->userdata('_token');
            $data['function'] = $function;
            $data['namaLengkap'] = $this->session->userdata('_user');

            if($kd==2 || $kd==3 ){
                $this->load->view('payment_gateway/blocked', $data);
            }else {
                $this->load->view('payment_gateway/index', $data);
            }

            // $this->load->view('payment_gateway/index', $data);

        // } else {
        //     $data['levelUser'] = "";
        //     redirect('Welcome', 'refresh');
        // }
    }

}
