<?php
class c_login extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_login');
	}

	public function index() {
		$data["title"] = "Halaman Login";
		$this->load->view('v_login', $data);
	}
	
	public function ceklogin(){
		if(isset($_POST['login'])){
			$user = $this->input->post('user',true);
			$pass = md5($this->input->post('pass',true));
			$cek = $this->m_login->proseslogin($user, $pass);
			$hasil = count($cek);
			if($hasil > 0){
				$yglogin = $this->db->get_where('users',array('username'=>$user, 'password' => $pass))->row();
				$data = array(
					'udhmasuk' => true,
					'nama' => $yglogin->nama_user,
					'username' => $yglogin->username,
					'level' => $yglogin->level
				);
				$this->session->set_userdata($data);
				if($yglogin->level == 'Admin'){
					redirect('c_unit');
				}
				else if($yglogin->level == 'AMC'){
					redirect('c_amc/index');
				}
				else if($yglogin->level == 'PKPPK'){
					redirect('c_pkppk/index');
				}
				else if($yglogin->level == 'AVSEC'){
					redirect('c_avsec/index');
				}
				else{
					redirect('c_login/index');
				}
			}
			else{
				$this->session->set_flashdata('info','Username/Password Anda Salah!');
				redirect('c_login/index');
			}
		}
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect('c_index/index');
	}
}