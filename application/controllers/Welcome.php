<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->helper('date');

    }

	public function index()
	{
        $data;

        $getData = $this->Home_model->getSelectData("users.foto, instansi.nama","users, instansi", "WHERE users.role='agensi' and users.instansi_id=instansi.id AND instansi.deleted_at is null AND instansi.id!=4 ORDER BY instansi.created_at DESC")->result();
        
        $data['datasekolah'] = $getData;
        
		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/index.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}

    public function validateNumberOncard()
	{
        $data = '';

		// $this->load->view('user/template/header.php', $data);
        // $this->load->view('user/template/navigation.php', $data);
        $this->load->view('user/_all/validate_number.php', $data);
        // $this->load->view('user/template/footer.php', $data);
	}
    
    
    public function demotemplatedesa()
	{
        $data = '';

        $template = $this->uri->segment(3);

        if($template == 1){
            $this->load->view('user/_all/t_desa.php', $data);
        }else if($template == 2){
            $this->load->view('user/_all/t_desa_2.php', $data);
        }else if($template == 3){
            $this->load->view('user/_all/t_desa_3.php', $data);
        }else {
            $this->load->view('user/_all/t_desa.php', $data);
        }

        
	}

	public function about()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/about.php', $data);
        // $this->load->view('landingpage/template/slider_testi_2.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
	public function kontak()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/kontak.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
	
    public function produk_kartudigitalsantri()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/produk_kartudigitalsantri.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    public function produk_pembayaranspp()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/produk_pembayaranspp.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    public function produk_psb()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/produk_psb.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    public function produk_poskantin()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/produk_poskantin.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    
    public function partner_brks()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/partner_brks.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    
    public function partner_wa()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/partner_wa.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    public function partner_pg()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/partner_pg.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    public function promo()
	{
        $data = '';

		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/promo.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}


    public function prphoenix_get_konten(){
        header('Access-Control-Allow-Origin: *');
        $token = $this->uri->segment(3);
        $slug = $this->uri->segment(4);
        if($token=='181119ssjxx1717118FF22__2282111_1291'){
            if($slug){
                if($slug=='top4'){
                    $getData = $this->Home_model->getSelectData("*","datacenter_konten", "ORDER BY dateCreated DESC LIMIT 4")->result();
                }else {
                    $getData = $this->Home_model->getSelectData("*","datacenter_konten", "WHERE slug='$slug' ORDER BY dateCreated DESC")->result();
                }
                
            }else {
                $getData = $this->Home_model->getSelectData("*","datacenter_konten", "ORDER BY dateCreated DESC")->result();
            }
            

            echo json_encode(array("status"=>true,"data"=>$getData));
        }else {
            echo json_encode(array("status"=>false,"message"=>"Token akses salah!"));
        }
        
    }
    
    
    public function prphoenix_delete_konten(){
        header('Access-Control-Allow-Origin: *');
        $token = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        if($token=='181119ssjxx1717118FF22__2282111_1291'){
            
            $hapusUser = $this->Home_model->deleteData("datacenter_konten","id=$id");

            echo json_encode(array("status"=>true,"message"=>"Berhasil dihapus!"));
        }else {
            echo json_encode(array("status"=>false,"message"=>"Token akses salah!"));
        }
        
    }

    public function prphoenix_insert_konten(){

        header('Access-Control-Allow-Origin: *');
        
        // get foto
        $config['upload_path'] = './assets_oncard/images/konten_sisfo';
        $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf|webp';
        $config['max_size'] = '5242880';  //2MB max
      
        $config['file_name'] = $_FILES['fotopost']['name'];

        $token = $this->input->post('tokenKu', true);
        
        if($token=='181119ssjxx1717118FF22__2282111_1291'){
  
            $this->upload->initialize($config);
        
            $judul = $this->input->post('judul', true);
            $oke = preg_replace('/[^A-Za-z0-9\  ]/', '', $judul);
            $out = explode(" ",$oke);
            $slug = implode("-",$out);
            $datenow = date('YmdHis');
            
            if (!empty($_FILES['fotopost']['name'])) {
                if ( $this->upload->do_upload('fotopost') ) {
                    $foto = $this->upload->data();

                    date_default_timezone_set('Asia/Jakarta');

                    $waktu = date("Y-m-d H:i:s");
        
                    $data = array(
                        'judul' => $this->input->post('judul', true),
                        'slug' => $slug.'-'.$datenow,
                        'isi' => $this->input->post('isi_konten', true),
                        'penulis' => 'Administrator Sisfo Oncard',
                        'dateCreated' => $waktu,
                        'thumbnail'       => base_url().'assets_oncard/images/konten_sisfo/'.$foto['file_name'],
                        );
        
                    $resultInsert = $this->db->insert('datacenter_konten',$data);;
                    
                    if($resultInsert){
                        echo json_encode(array("status"=>true,"message"=>'Selamat! Data berhasil disimpan!'));
                    }

                }else {
                    die("gagal upload");
                }
            }else {
                echo json_encode(array("status"=>false,"message"=>'Oops! Gagal dalam menyimpan data.'));
            }

        }else {

        }
    }

    public function konten()
	{
        $data = '';
        
		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/konten.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
    
    public function konten_detail()
	{
        $data = '';
        
		$this->load->view('landingpage/template/header.php', $data);
        $this->load->view('landingpage/template/navigation.php', $data);
        $this->load->view('landingpage/pages/konten_detail.php', $data);
        // $this->load->view('landingpage/template/slider_testi_1.php', $data);
        $this->load->view('landingpage/template/footer.php', $data);
	}
}
