<?php 
class MDokter extends CI_Model{

	//ambil data
    function get_data(){
 
        $query = $this->db->query("select * from tbl_dokter");
        return $query->result_array();

    }

    //ambil data dokter
    function get_data_sps(){
 
        $query = $this->db->query("select * from tbl_spesialis");
        return $query->result();

    }

    //ambil data param
    function get_data_detail($kode){
 
        $query = $this->db->query("select * from tbl_dokter where kode_dokter = '$kode'");
        return $query->result();

    }

    function add_dokter($data){
        $this->db->insert('tbl_dokter',$data);
    }

    function edit_dokter($data, $kode) {
        $this->db->where('kode_dokter', $kode);
        $this->db->update('tbl_dokter', $data);
    }

}
?>
	