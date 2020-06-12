<?php 
class PasienResep extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MPemeriksaan');
    $this->load->helper('url');
    
    if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "pasienresep"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_pasien'] = $this->MPemeriksaan->get_data();
		$this->template->load('template_admin_rs','rs/pasien_resep/index',$data);

  }

  public function detil_pasien($id_pemeriksaan){
    $data['data_pasien'] = $this->MPemeriksaan->get_data_detail($id_pemeriksaan);
    $data['data_obat'] = $this->MPemeriksaan->get_data_obat($id_pemeriksaan);

    $this->template->load('template_admin_rs','rs/pasien_resep/add_edit',$data);
  }

  public function getobat(){
    $search = $this->input->get("search");
    $data_obat = $this->MPemeriksaan->cari_data_obat($search);
    $data['data_obat'] = $data_obat;
    $this->load->view('rs/pasien_resep/data_obat', $data);
  }

  public function add_obat($id_pemeriksaan){
    $data_insert = array(
      "id_data_pemeriksaan" => $id_pemeriksaan,
      "kode_barang"         => $this->input->post("id_obat"),
      "qty"                 => $this->input->post("qty"),
      "status"              => $this->input->post("status"),
      "tanggal"             => date("Y-m-d H:i:s")
    );
    $this->MPemeriksaan->tambah_obat($data_insert);
    redirect("PasienResep/detil_pasien/".$id_pemeriksaan);
  }

}

?>