<?php 
class Pasien extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MPasien');
    $this->load->helper('url');
    
    if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "pasien"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_pasien'] = $this->MPasien->get_data();
		$this->template->load('template_admin_rs','rs/pasien/index',$data);

  }

  public function add_edit($id=''){

    $data['pasien'] = "";
    if($id != '') {
        $get_data_pasien = $this->MPasien->get_data_detail($id);
        $data['pasien'] = $get_data_pasien;
    } else {
      //Membuat kombinasi Noor RM secara unik
      $no_rm = "RM-".date("dmy").rand(1000,9999);
      //menampung kedalam variabel yang akan dikirim
      $data['no_rm'] = $no_rm;               
    }
    
    $this->template->load('template_admin_rs','rs/pasien/add_edit',$data);

  }

  public function add_edit_save($id=''){

    $name = $this->input->post('name');
    $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('tlp');
    $no_rekam_medis = $this->input->post('no_rekam_medis');
    $jk = $this->input->post('jk');
    
    if($id == '') {
        $data = array(
            'nama_pasien'   => $name,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jk,
            'alamat' => $alamat,
            'no_tlp'    => $no_telp,
            'no_rekam_medis' => $no_rekam_medis
        );
        $add_pasien = $this->MPasien->add_pasien($data);
    } else {
      $data = array(
        'nama_pasien'   => $name,
        'tgl_lahir' => $tgl_lahir,
        'jenis_kelamin' => $jk,
        'alamat' => $alamat,
        'no_tlp'    => $no_telp,
        'no_rekam_medis' => $no_rekam_medis
      );
      $edit_pasien = $this->MPasien->edit_pasien($data, $id);
    }

    redirect("pasien/index");

}

}

?>