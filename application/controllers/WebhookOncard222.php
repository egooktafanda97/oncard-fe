<?php
header('Content-Type: application/json; charset=utf-8');

class WebhookOncard222 extends CI_Controller
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

    function index(){
        
    }

    function kirimpesan(){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $device = $data['device'];
        $sender = $data['sender'];
        $message = $data['message'];
        $text= $data['text']; //button text
        $member= $data['member']; //group member who send the message
        $name = $data['name'];
       
        $nomorakun = explode("_",$message);

        $data_nama = '';
        $data_ttl = '';
        $data_saldo = '';

        $textMessage = '';

        $getData = $this->Home_model->getSelectData("*","account,siswa", "WHERE account.account_number='$nomorakun[1]' AND account.user_id=siswa.user_id");

        if($getData->result()){
            foreach($getData->result() as $row){
                $data_nama = $row->customers_name;
                $data_ttl = $row->tanggal_lahir;
                $data_saldo = $row->balance;
            }

            $textMessage = 'Terimakasih sudah menghubungi kami
Berikut adalah saldo dari :
Nama : '.$data_nama.',
Tanggal Lahir : '.$data_ttl.'

*Rp'.number_format($data_saldo,2,",",".").'*

_Apakah pesan ini telah membantu?_
_Kiranya dapat membalas chat ini dengan mengatakan Ya._
Terimakasih banyak atas kerjasamanya.';
        }else {
            $textMessage = 'Maaf! Nomor akun tidak cocok dengan data yang kami miliki. Mohon di cek kembali.';
            return false;
        }

        function sendFonnte($target, $data) {


            $curl = curl_init();
        
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.fonnte.com/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => array(
                    'target' => $target,
                    'message' => $data['message'],
                    'url' => $data['url'],
                    'filename' => $data['filename'],
                ),
              CURLOPT_HTTPHEADER => array(
                "Authorization: VLZonuz20R5ZeWq6zz2X"
              ),
            ));
        
            $response = curl_exec($curl);
        
            curl_close($curl);
        
            return $response;
        }

        $reply = [
            "message" => "$textMessage",
        ];
        
 
        sendFonnte($sender, $reply);
        
        
    }


}


?>