<?php 
class MPasien extends CI_Model{

	//ambil data
    function get_data(){
 
        $query = $this->db->query("select * from tbl_pasien");
        return $query->result_array();

    }

    //ambil data param
    function get_data_detail($id){
 
        $query = $this->db->query("select * from tbl_pasien where id_pasien = '$id'");
        return $query->result();

    }

    function add_pasien($data){
        $this->db->insert('tbl_pasien',$data);
    }

    function edit_pasien($data, $id) {
        $this->db->where('id_pasien', $id);
        $this->db->update('tbl_pasien', $data);
    }

    function qry_bar_char_by_umur() { 
        $data = $this->db->query("SELECT CASE 
        WHEN umur <= 20 THEN '0 - 20' 
        WHEN umur BETWEEN 21 and 24 THEN '20 - 24'               
        WHEN umur BETWEEN 25 and 30 THEN '25 - 30'               
        WHEN umur >= 30 THEN 'diatas 30'               
        WHEN umur IS NULL THEN '(NULL)'           
        END as range_umur, COUNT(*) AS jumlah 
 
        FROM (select id_pasien, nama_pasien, tgl_lahir, TIMESTAMPDIFF(YEAR, (STR_TO_DATE(tgl_lahir, '%Y-%m-%d')), CURDATE()) AS umur                    
        from tbl_pasien)  as dummy_table          
        GROUP BY range_umur           
        ORDER BY range_umur");     
        return $data->result();   
    }
    
    function qry_jk_pasien() {     
        $data = $this->db->query("SELECT CASE
        WHEN jenis_kelamin = 'l' THEN 'Laki-laki'
        WHEN jenis_kelamin = 'p' THEN 'Perempuan'
        END as jenis_kelamin, COUNT(*) as 'jumlahnya'                                
        FROM tbl_pasien GROUP BY jenis_kelamin");     
        return $data->result();   
    }

}
?>
	