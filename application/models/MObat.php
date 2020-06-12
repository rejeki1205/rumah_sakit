<?php 
class MObat extends CI_Model{

	//ambil data
    function get_data(){
 
        $query = $this->db->query("select * from tbl_obat");
        return $query->result_array();

    }

    //ambil data param
    function get_data_detail($kode){
 
        $query = $this->db->query("select * from tbl_obat where id = '$kode'");
        return $query->result();

    }

    function add_obat($data){
        $this->db->insert('tbl_obat',$data);
    }

    function edit_obat($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_obat', $data);
    }

}
?>
	