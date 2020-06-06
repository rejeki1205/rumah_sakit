<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->session->set_flashdata("halaman", "");
    $this->load->model('mLogin');
}

    public function index(){

        $this->load->view('login/login');
    }

    function aksi(){

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $check_login = $this->mLogin->getUser($username, $password);

        if ($check_login) {

            $data_user = array(
                'id'		=> $check_login[0]->id,
                'username'	=> $check_login[0]->username,
                'email' 	=> $check_login[0]->email,
                'role'      => $check_login[0]->role,
            );

            $data = array(
                'last_login' => date("Y-m-d H:i:s")
            );

            $this->db->where('id', $check_login[0]->id);

            $this->db->update('user', $data);


            $this->session->set_userdata($data_user);
            $this->session->set_userdata('logged_in',$check_login);
            redirect('admin');	
            			
        } else {
            redirect('auth'); 
        }
    }
    
    function logout(){

		session_destroy();
		redirect('auth');
        
	}
}

?>