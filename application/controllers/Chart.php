<?php 
class Chart extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MPasien');
		$this->load->helper('url');

		if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "chart"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_pasien_bar'] = $this->MPasien->qry_bar_char_by_umur();
    $data['data_pasien_pie'] = $this->MPasien->qry_jk_pasien();
		$this->template->load('template_admin_rs','rs/chart/index',$data);

  }

}

?>