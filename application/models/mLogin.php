<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mLogin extends CI_Model {

	public function getUser($username, $password){

		$query = $this->db->query("SELECT * FROM user where username = '$username' and password = '$password' ");
		return $query->result();

    }
    
}
?>