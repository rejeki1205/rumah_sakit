<?php 
class Dokter extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MDokter');
    $this->load->helper('url');
    $this->load->library('upload');

    if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "dokter"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_dokter'] = $this->MDokter->get_data();
		$this->template->load('template_admin_rs','rs/dokter/index',$data);

  }

  public function add_edit($kode=''){

    $data['dokter'] = "";
    $data['data_sps_dokter'] = $this->MDokter->get_data_sps();
    if($kode != '') {
        $get_data_dokter = $this->MDokter->get_data_detail($kode);
        $data['dokter'] = $get_data_dokter;
    } else {
      //Membuat kombinasi Noor RM secara unik
      $kode_dokter = "DK-".date("dmyhis").rand(1000,9999);
      //menampung kedalam variabel yang akan dikirim
      $data['kode_dk'] = $kode_dokter;               
    }

    
    $this->template->load('template_admin_rs','rs/dokter/add_edit',$data);

  }

  public function add_edit_save($kode=''){

    $name = $this->input->post('nama');
    $tgl_lahir = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
    $tempat_lahir = $this->input->post('tempat_lahir');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('hp');
    $kode_dokter = $this->input->post('kode');
    $sps = $this->input->post('sps');
    $jk = $this->input->post('jk');
    $status_dokter = $this->input->post("status");
    $no_izi = $this->input->post("no_izin");
    $tgl_join = date("Y-m-d", strtotime($this->input->post("tgl_join")));

    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[5]|max_length[50]');
    $this->form_validation->set_rules('sps', 'Spesialis ', 'required');
    $this->form_validation->set_rules('hp', 'Nomor HP', 'numeric|min_length[10]|max_length[14]');
    $this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
    $this->form_validation->set_rules('status', 'Status Dokter', 'required');
    $this->form_validation->set_rules('no_izin', 'Nomor Izin', 'required|min_length[5]|max_length[20]');
      
      if($this->form_validation->run() == FALSE) {

        $data['dokter'] = "";
        $data['data_sps_dokter'] = $this->MDokter->get_data_sps();
        if($kode != '') {
            $get_data_dokter = $this->MDokter->get_data_detail($kode);
            $data['dokter'] = $get_data_dokter;
        } else {
          //Membuat kombinasi Noor RM secara unik
          $kode_dokter = "DK-".date("dmyhis").rand(1000,9999);
          //menampung kedalam variabel yang akan dikirim
          $data['kode_dk'] = $kode_dokter;               
        }

        $this->template->load('template_admin_rs','rs/dokter/add_edit',$data);

      }
      else { 
        $config['upload_path'] = APPPATH . 'uploads';  // lokasi direktori upload
        $config['allowed_types'] = 'jpeg|jpg|gif|png|rar|zip|7zip|txt|mp4|avi|mkv'; // tipe file yang diizinkan
        $config['max_size'] = '10240';  //ukuran maksimum file
        $this->upload->initialize($config); 
        if (! $this->upload->do_upload('foto') ) {
        //gagal mengupload file, keterangan eror disimpan kedalam variabel respon
          $respon = $this->upload->display_errors();
          $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" 
          role="alert" style="width:30%">
            Failed Upload Eror : ' . $respon . ' 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect("dokter/index");
        }
        else { //sukses mengupload file, informasi file disimpan dalam variabel respon
          $respon =$this->upload->data();
          $this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible fade show" 
          role="alert" style="width:30%">
            Success Upload 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        }
        
        if($kode == '') {
            $data = array(
                'kode_dokter'   => $kode_dokter,
                'nama_dokter'   => $name,
                'tanggal_lahir' => $tgl_lahir,
                'tempat_lahir' => $tempat_lahir,
                'jenis_kelamin' => $jk,
                'alamat_tinggal' => $alamat,
                'no_hp'    => $no_hp,
                'kode_spesialis'    => $sps,
                'no_izin' =>$no_izi,
                'tgl_join'  => $tgl_join,
                'status_dokter' => $status_dokter
            );
            $add_dokter = $this->MDokter->add_dokter($data);
        } else {
          $data = array(
            'kode_dokter'   => $kode_dokter,
            'nama_dokter'   => $name,
            'tanggal_lahir' => $tgl_lahir,
            'tempat_lahir' => $tempat_lahir,
            'jenis_kelamin' => $jk,
            'alamat_tinggal' => $alamat,
            'no_hp'    => $no_hp,
            'kode_spesialis'    => $sps,
            'no_izin' =>$no_izi,
            'tgl_join'  => $tgl_join,
            'status_dokter' => $status_dokter
          );
          $edit_dokter = $this->MDokter->edit_dokter($data, $kode);
        }

        redirect("dokter/index");
      }

}

}

?>