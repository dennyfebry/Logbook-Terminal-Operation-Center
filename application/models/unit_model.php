<?php
class unit_model extends CI_Model{
    
    //ambil data mahasiswa dari database
    function get_unit_list($limit, $start){
		$this->db->order_by("tanggal", "desc");
		$sql = $this->db->get('tabel_unit',$limit, $start); 
		return $sql;
        // $query = $this->db->get('tabel_unit', $limit, $start);
        // return $query;
    }

    function get_akun_list($limit, $start){
        $query = $this->db->get('users', $limit, $start);
        return $query;
    }
} 