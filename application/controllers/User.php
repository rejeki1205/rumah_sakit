<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct(){

    parent::__construct();
    $this->load->library('session');
    $this->load->model('mUser');
    
    if ($this->session->userdata('logged_in')=="") {
        redirect('auth');
    }
    
    $this->session->set_flashdata("halaman", "user"); //mensetting menuKepilih atau menu aktif
    
}

    public function index(){
        
        $get_data = $this->mUser->getUser();
        $data['user'] = $get_data;
        $this->template->load('template_admin_rs','rs/user/master_user',$data);

    }

    Public function search_user(){
        // Ambil data data yang dikirim via ajax post
        $kata_kunci = $this->input->post('keyword');
        // jalankan query
        $data['user'] = $this->mUser->get_user_cari($kata_kunci);
       
        // membungkus hasil query model kedalam variabel $hasil
        $hasil = $this->load->view('rs/user/list_datauser',$data);
    
        // variabel hasil dikonversi kedalam objek json sebagai respon ke Ajax
        echo json_encode($hasil); 
     }    

    public function add_edit_user($id=''){

        $id_user_session = $this->session->userdata('id');
        $data['userItem'] = "";
        if($id != '') {
            $get_data_item = $this->mUser->getUserItem($id);
            $data['userItem'] = $get_data_item;
        }

        $get_data = $this->mUser->getUser();
        $data['user'] = $get_data;
        
        $this->template->load('template_admin_rs','rs/user/add_edit_master_user',$data);

    }

    public function delete_data($id=''){
        $this->db->where('id', $id);

        $this->db->delete('user');

        $get_data = $this->mUser->getUser();
        $data['user'] = $get_data;
        
        $this->template->load('template_admin','rs/user/master_user',$data);

    }

    public function change_password($id=''){

        $id_user_session = $this->session->userdata('id');

        $password = $this->input->post('new_password');
        $password = md5($password);

        $data = array(
            'password'   => $password,
            'updated_date' => date("Y-m-d H:i:s"),
            'updated_by' => $id_user_session
            
        );
        $this->db->where('id', $id);

        $this->db->update('user', $data);
        
        redirect("auth/logout");

    }

    public function check_user_auto() {
        $role = trim($this->input->post('role'));
        
        $count = $this->mUser->cek_username_auto($role);
        $count = $count[0]->tot + 1;
        echo $count;
    }

    public function proses_simpan() {

        $this->form_validation->set_rules('txt_nama', 'Nama', 'required|max_length[50]');
        $this->form_validation->set_rules('txt_username', 'Username ', 'required|max_length[10]');
        $this->form_validation->set_rules('txt_no_hp', 'Nomor HP', 'numeric|min_length[10]');
        $this->form_validation->set_rules('txt_email', 'Alamat Email', 'required|valid_email');
        $this->form_validation->set_rules('txt_password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('txt_konfirm_password', 'Konfirmasi Password', 'required|min_length[5]|matches[txt_password]');

        if($this->form_validation->run() == FALSE) {
            $status   = "INVALID";
            $message = validation_errors();
            echo $status.$message; // <- respon yang dikembalikan ke view (ajax)
        }
        else { 

            $nama     = trim($this->input->post('txt_nama')); 
            $username = trim($this->input->post('txt_username')); 
            $no_hp    = trim($this->input->post('txt_no_hp'));
            $email    = trim($this->input->post('txt_email'));
            $password = md5(trim($this->input->post('txt_password')));
            $level    = trim($this->input->post('opt_role_askes'));

                                //script dilanjut ke halaman berikutnya
                // pengecekan username ke database : 
                $cek_username = $this->mUser->cek_username($username);

                if($cek_username->num_rows() >= 1) {
                    $status  = "INVALID";
                    $message = "USERNAME TELAH TERDAFTAR"; 
                    echo $status.$message; // <- respon yang dikembalikan ke view (ajax)
                } // tutup username sudah digunakan

                else {
                    //insert ke database 
                    $this->mUser->insert_user($nama,$username,$no_hp,$email,$password,$level);
                    $status = "VALID";
                    echo $status; // <- respon yang dikembalikan ke view (ajax)
                } // tutup else username OK

        } // tutup else validasi sukses

    } // tutup method function
     

    public function add_edit_user_save($id=''){

        $id_user_session = $this->session->userdata('id');

        $name = $this->input->post('username');
        $email = $this->input->post('email');
        $password = md5($name);

        if($id == '') {
            $data = array(
                'username'   => $name,
                'email' => $email,
                'password' => $password,
                'created_date' => date("Y-m-d H:i:s"),
                'created_by' => $id_user_session,
                'updated_date' => date("Y-m-d H:i:s"),
                'updated_by' => $id_user_session
                
            );
            $this->db->insert('user',$data);
        } else {
            $data = array(
                'username'   => $name,
                'email' => $email,
                'updated_date' => date("Y-m-d H:i:s"),
                'updated_by' => $id_user_session
                
            );

            $this->db->where('id', $id);

            $this->db->update('user', $data);
        }

        $get_data = $this->mUser->getUser();
        $data['user'] = $get_data;
        $this->template->load('template_admin','rs/user/master_user',$data);

    }


}

?>