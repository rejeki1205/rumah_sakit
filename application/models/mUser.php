<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mUser extends CI_Model {

	public function getUser(){

		$query = $this->db->query("SELECT * FROM user");
		return $query->result();

	}
	
	public function getUserItem($id){

		$query = $this->db->query("SELECT * FROM user where id='$id'");
		return $query->result();

	}
	
	function get_user_cari($kata_kunci){
		// menampilkan hanya 10 user terbaru
		$query = $this->db->query("SELECT * FROM user 
								   where username like '%$kata_kunci%' or name like '%$kata_kunci%' 
								   ORDER BY id DESC limit 0, 10");
		return $query->result();
   
  }
  
  function insert_user($nama,$username,$no_hp,$email,$password, $level) {

	$data_simpan = array ( 
	 'name'      => $nama,
	 'username'  => $username,
	 'no_hp'    => $no_hp,
	 'email'     => $email,
	 'password'    => $password,
	 'role'   => $level,
	 'status_user' => 'aktif'  );

	$this->db->insert('user', $data_simpan);
 	} // tutup fucntion                                    
	// script berlanjut ke halaman berikutnya
	function cek_username($username) {
		$query=$this->db->query("SELECT * FROM user where username = '$username'");
		return $query;
	} // tutup fucntion

	function cek_username_auto($role) {
		$query=$this->db->query("SELECT count(*) as tot FROM user where role = '$role'");
		return $query->result();
	} // tutup fucntion
	
    
}
?>