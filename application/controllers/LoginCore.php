<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCore extends CI_Controller {

	public function __construct(){
          parent::__construct();
          $this->load->model('Agivest_model');
          $this->load->model('Home_model');
          $this->load->helper('cookie');
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->library('form_validation');
          $this->load->helper('string');
          $this->load->library('upload');
        //   $this->load->library('encrypt');

     }

	public function index(){   
        if($this->session->userdata('_token')){      
        $data['errormsg'] = "";    
        redirect('CPanel_Core/index', 'refresh');
        }else{
        $data['errormsg'] = "";
        $this->load->view('loginregister_core/login',$data); 
        }
    }

    public function loginByPass(){   
        $data['errormsg'] = "";
          $this->load->view('loginregister_core/login_bypass',$data);
    }

  private function allowCors()
    {
        // Replace with your frontend application's URL
        $allowedOrigins = [
            'http://localhost:8100', // Example for a local Ionic app
            'https://oncard.id/',
        ];

        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        if (in_array($origin, $allowedOrigins)) {
            header('Access-Control-Allow-Origin: ' . $origin);
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
            header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
            header('Access-Control-Allow-Credentials: true');
        }
    }
  
  public function selectLogin(){
    
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      
      $sess_array = array();   
      
      if($username!='' && $password!=''){
          //Check berdasarkan username
          $result = $this->Agivest_model->getData($username,md5($password));
          if($result){
            //Status
            $statusUser = '';
               
            foreach($result as $row){
              $sess_array = array(          
                'id_user'  => $row->id,
                'username'  => $row->username,
                'namaLengkap' =>$row->nama_lengkap,
                'id_mitra' =>$row->id_mitra,
                'role' =>$row->role
              );
              $statusUser = $row->role;
            }
            
            
            $this->session->set_userdata($statusUser, $sess_array);
            
            echo json_encode(array( "status" => "true","message" => "Login berhasil!", "data" => $sess_array) );
            
          }else{
            echo json_encode(array( "status" => "false","message" => "Kombinasi username dan password tidak benar!", "data" => $sess_array) );
          }
      }else {
          echo json_encode(array( "status" => "false","message" => "Username dan password harus diisi!", "data" => $sess_array) );
      }
      
    
  }
  public function loginActions()
  {
      $posts = $this->input->post();

   
      $headers  = [
          'Content-Type: application/json'
      ];

      // curl_request berasal dari function curl funsi_helper.php  
      $_url = 'https://api2.oncard.id/api/auth/login';
      $result = curl_request($_url, $headers, $posts);
      
      if ($result['status'] == 200) { 
          $this->session->set_userdata([
              "_token" => $result['result']['access_token'],
              "_permission" => $result['result']['permission'],
              "_user" => $result['result']['user']['username'],
              "_instansi_name" => $result['result']['user']['name'],
              "_user_id" => $result['result']['user']['id'],
              "_user_uid" => $result['result']['user']['uuid'],
              "_organisasi_id" => $result['result']['user']['network_identity'],
          ]);
      }
      echo json_encode($result);
  }
  
  
  public function LoginActionsByPass()
  {
      $posts = $this->input->post();

      $gettoken = $posts['tokens'];
   
      $headers  = [
          'Content-Type: application/json'
      ];

      $headers[] = 'Authorization: Bearer '.$gettoken;

      // curl_request berasal dari function curl funsi_helper.php  
      $_url = api_url('api/v1/auth/super');
    //   echo var_dump($headers);
    //   return false;
      $result = curl_request($_url, $headers, $posts);
      if ($result['status'] == 200) { 
          $this->session->set_userdata([
              "_token" => $result['result']["data"]['access_token'],
              "_permission" => $result['result']["data"]['permission'],
              "_user" => $result['result']["data"]['users']['username'],
              "_user_id" => $result['result']["data"]['users']['id'],
              "_user_uid" => $result['result']["data"]['users']['uid'],
          ]);
      }
      echo json_encode($result);
  }

  public function loginActionsByPassRoot()
  {
      $posts = $this->input->post();

    //   echo var_dump($posts);
    //   return false;

    $getUser = $posts['username'];
    $getPass = $posts['email'];

      $getData = $this->Home_model->getSelectData("*","users", "WHERE username='$getUser' AND email='$getPass'")->result();
      if($getData){
        foreach($getData as $row){
            $posts = [];

            $decrypted_text = $this->encrypt->decode($row->password);

            $posts['username'] = $row->username;
            $posts['password'] = $row->password;
            $posts['remember_me'] = "true";
            // echo var_dump($posts);
        }
      }else {
        echo var_dump("error!");
        return false;
      }
      
    //   return false;
      $headers  = [
          'Content-Type: application/json'
      ];

      // curl_request berasal dari function curl funsi_helper.php  
      $_url = api_url('api/v1/auth/login');
      $result = curl_request($_url, $headers, $posts);
      if ($result['status'] == 200) { 
          $this->session->set_userdata([
            "_token" => $result['result']['access_token'],
            "_private_token" => $result['result']['private-key'],
            "_permission" => $result['result']['permission'],
            "_user" => $result['result']['users']['user_identity'],
            "_instansi_name" => $result['result']['users']['name'],
            "_user_id" => $result['result']['users']['id'],
            "_user_uid" => $result['result']['users']['uuid'],
            "_oncard_user_id" => $result['result']['users']['oncard_user_id'],
          ]);
      }
      echo json_encode($result);
  }


  public function LoginMunguMobileAppsMaya(){   
      $username = $this->input->post('username');
      $password = $this->input->post('pass');
      

    if( $username == '' || $password == '' ){
      echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
    }else{
      $result = $this->Agivest_model->getData($username,md5($password));

      if($result){  
        $result2 = $this->Agivest_model->getData($username,md5($password));
       
         $emparray = array();
         if($result2){  
           foreach($result2 as $row){
              $emparray = array(          
                'idUser'  => $row->idUser,
                'username' => $row->username,
                'namaLengkap' =>$row->namaLengkap,
                'alamat' =>$row->alamatUser,
                'levelUser' =>$row->levelUser,
                'jenisKelamin' =>$row->jenisKelamin
              );
            }
            echo json_encode(array( "status" => "true","message" => "Login successfully!", "datalol" => $emparray) );
         }
         
     }else{ 
      echo json_encode(array( "status" => "false","message" => "Invalid username or password!") );
    }
  }
   
}

  function logout(){
    $this->session->unset_userdata('userSession');    
    session_destroy();
    redirect('Welcome/index', 'refresh');
  }

  function logoutUser(){
    $this->session->unset_userdata('admin');    
    $this->session->unset_userdata('perusahaan');    
    $this->session->unset_userdata('plasma');    
    session_destroy();
    redirect('LoginCore/index', 'refresh');
  }

  function logoutEmployee(){
    
    $this->session->unset_userdata('loginedShoppers');    
    
    redirect('Welcome/homepage', 'refresh');
  }

  function logoutDistributor(){
    
    $this->session->unset_userdata('loginedDistributor');    
    
    redirect('Welcome/homepage', 'refresh');
  }

  function logoutHQ(){
    
    $this->session->unset_userdata('loginedDistributor');    
    
    redirect('Welcome/homepage', 'refresh');
  }

  function logoutPenambak(){
    $this->session->unset_userdata('siswaSession');    
    session_destroy();
    redirect('Welcome/index', 'refresh');
  }

  function logoutAdmin(){
    $this->session->unset_userdata('adminSession');    
    session_destroy();
    redirect('Welcome/index', 'refresh');
  }
  
  function verify($verificationText=NULL){
      $noRecords = $this->Email_model->verifyEmailAddress($verificationText);
      if ($noRecords > 0){
        $data['errormsg'] = "ok"; 
        $this->load->view('loginregister/login', $data);
      }else{
        $data['errormsg'] = "failed"; 
        $this->load->view('loginregister/login', $data);
      }
  }

}
