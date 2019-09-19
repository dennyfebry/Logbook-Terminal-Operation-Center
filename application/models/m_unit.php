<?php
class m_unit extends CI_Model {

	public function akun() {
		$sql = $this->db->query("SELECT * FROM users");
		return $sql;
	}

	public function get_unit()
	{
		$this->db->select('tanggal');
		$this->db->from('tabel_unit');
		$sql = $this->db->get();
		return $sql;
	}

  	public function unit() {
		$this->db->from($this->tabel_unit);
		$this->db->order_by("tanggal", "desc");
		$sql = $this->db->get(); 
		return $sql->result();
	}

  	public function amc() {
		$this->db->where("tabel_unit");
		$sql = $this->db->query("SELECT * FROM tabel_unit WHERE unit = 'AMC' ORDER BY tanggal DESC;");
		return $sql;
	}

	public function pkppk() {
		$this->db->where("tabel_unit");
		$sql = $this->db->query("SELECT * FROM tabel_unit WHERE unit = 'PKPPK' ORDER BY tanggal DESC;");
		return $sql;
	}

	public function avsec() {
		$this->db->where("tabel_unit");
		$sql = $this->db->query("SELECT * FROM tabel_unit WHERE unit = 'AVSEC' ORDER BY tanggal DESC;");
		return $sql;
	}

	function simpan($data){
		$this->db->insert('tabel_unit',$data);
	}

	function edit($id_unit){
		$this->db->where("id_unit",$id_unit);
		return $this->db->get('tabel_unit');
	}

	function hapus($id_unit){
		$this->db->where("id_unit",$id_unit);
		$this->db->delete('tabel_unit');
	}

	function update($id_unit,$data){
		$this->db->where("id_unit",$id_unit);
		$this->db->update('tabel_unit',$data);
	}

	function simpan_akun($data){
		$this->db->insert('users',$data);
	}

	function edit_akun($id_user){
		$this->db->where("id_user",$id_user);
		return $this->db->get('users');
	}

	function hapus_akun($id_user){
		$this->db->where("id_user",$id_user);
		$this->db->delete('users');
	}

	function update_akun($id_user,$data){
		$this->db->where("id_user",$id_user);
		$this->db->update('users',$data);
	}

    function search($date1,$date2){
		$this->db->where('tanggal',$date1);
		$this->db->where('tanggal',$date2);
        $sql = $this->db->query("SELECT * FROM tabel_unit WHERE tanggal between '$date1' and '$date2' ORDER BY tanggal DESC");
        return $sql;
    }
}