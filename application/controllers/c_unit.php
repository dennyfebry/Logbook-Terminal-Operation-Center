<?php
class c_unit extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_unit');
		$this->load->helper(array('form', 'url'));
		$this->load->model('unit_model');
		$this->load->library('pagination');
	}

	function index(){
		$data['title'] = "Dashboard";
		$config['base_url'] = site_url('c_unit/index'); //site url
        $config['total_rows'] = $this->db->count_all('tabel_unit'); //total row
        $config['per_page'] = 7;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['sql'] = $this->unit_model->get_unit_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('admin', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	function akun(){
		$data['title'] = "Managemen User";
		// $data['sql']=$this->m_unit->akun();
		$config['base_url'] = site_url('c_unit/akun'); //site url
        $config['total_rows'] = $this->db->count_all('users'); //total row
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['sql'] = $this->unit_model->get_akun_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('akun', $data);
		}
		else{
			redirect('c_login/index');
		}
	}


	
	function amc(){
		$data['title'] = "Unit AMC";
		$data['sql'] = $this->m_unit->amc();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('admin_unit', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	function pkppk(){
		$data['title'] = "Unit PKPPK";
		$data['sql'] = $this->m_unit->pkppk();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('admin_unit', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	function avsec(){
		$data['title'] = "Unit AVSEC";
		$data['sql'] = $this->m_unit->avsec();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('admin_unit', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	function laporan(){
		$this->load->helper('form');
		$data['title'] = "Laporan";
		$data['sql'] = $this->m_unit->get_unit();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('laporan', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	function hasil_laporan(){
		// $this->load->helper('form');	
		$data =array(
		$g_dob_from = $this->input->get('g_dob_from'),
        $g_dob_to = $this->input->get('g_dob_to'),
        $g_unid = $this->input->get('g_unid')
   		 );

        if ($g_dob_from) {
            $this->db->where('tanggal >=',$g_dob_from);
            $data['g_dob_from'] = $g_dob_from;
        }else{
            $data['g_dob_from'] = "";
        }

        if ($g_dob_to) {
            $this->db->where('tanggal <=',$g_dob_to);
            $data['g_dob_to'] = $g_dob_to;
        }else{
            $data['g_dob_to'] = "";
        }

        $data['g_unid'] = $g_unid; 

        if ($g_unid) {
            $this->db->where('unit',$g_unid);
            $data['g_unid'] = $g_unid;
        }else{
            $data['g_unid'] = "";
        }

        $query = $this->db->get('tabel_unit')->result_array();
        $jml=count($query);
        $data['jml'] = $jml;
        $data['isi'] = $query;
        $data['title'] = "Laporan";
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('hasil_laporan', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	 public function export_pdf(){
        // $this->load->helper(['form', 'notification']);
        $g_dob_from = $this->input->post('g_dob_from');
        $g_dob_to = $this->input->post('g_dob_to');
        $g_unid = $this->input->post('g_unid');

        $data['title'] = 'Rekap Laporan';
        if ($g_dob_from) {
            $this->db->where('tanggal >=',$g_dob_from);
            $data['g_dob_from'] = $g_dob_from;
        }else{
            $data['g_dob_from'] = "All";
        }

        if ($g_dob_to) {
            $this->db->where('tanggal <=',$g_dob_to);
            $data['g_dob_to'] = $g_dob_to;
        }else{
            $data['g_dob_to'] = "All";
        }

        $data['g_unid'] = $g_unid; 

        if ($g_unid) {
            $this->db->where('unit',$g_unid);
            $data['g_unid'] = $g_unid;
        }else{
            $data['g_unid'] = "All";
        }
        $query = $this->db->get('tabel_unit')->result_array();
        $jml=count($query);
        $data['jml'] = $jml;
        $data['isi'] = $query;

        $html = $this->load->view('view_report_pdf', $data,true);
        // echo '<pre>';print_r($html);exit;

        $this->load->library('Pdf');
        $pdf = $this->pdf->load();
        $pdf->AddPage('P', // L - landscape, P - portrait
            '', '', '', '',
            10, // margin_left
            10, // margin right
            5, // margin top
            10, // margin bottom
            5, // margin header
            15); // margin footer
        
        // $pdf->setFooter('{PAGENO} / {nb}');
        $pdf->WriteHTML($html);
        $pdf->Output();
        exit;
    }

	public function add() {
		$data['op'] = 'tambah';
		$data['title'] = "Data Unit";	
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function edit($id_unit) {
		$data['op'] = 'edit';
		$data['title'] = "Data Unit";
		$data['sql'] = $this->m_unit->edit($id_unit);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_edit',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function upload($id_unit) {
		$data['title'] = "Data Unit";
		$data['sql'] = $this->m_unit->edit($id_unit);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_upload',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function edit_unit($id_unit) {
		$data['op'] = 'edit';
		$data['title'] = "Data Unit";
		$data['sql'] = $this->m_unit->edit($id_unit);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_edit_unit',$data);
		}
		else{
			redirect('c_login/index');
		}
	}
	
	public function simpan(){
		$op = $this->input->post('op');
		$id_unit = $this->input->post('id_unit');
		$tanggal = $this->input->post('tanggal');
        $shift = $this->input->post('shift');
        $waktu_awal = $this->input->post('waktu_awal');
        $waktu_akhir = $this->input->post('waktu_akhir');
        $kegiatan = $this->input->post('kegiatan');
        $unit = $this->input->post('unit');
		$data = array(
			'tanggal' => $tanggal,
			'shift' => $shift,
			'waktu_awal' => $waktu_awal,
			'waktu_akhir' => $waktu_akhir,
			'kegiatan' => $kegiatan,
			'unit' => $unit
			);
		if($op=="tambah"){
			$this->m_unit->simpan($data);
		}
		else{
			$this->m_unit->update($id_unit,$data);
		}
		redirect('c_unit/index');
	}

	function doupload() {
        $nama = @$_POST['id_unit'];
        $units = @$_POST['unit'];
		$name_array = array();
        $count = count($_FILES['userfile']['size']);
        foreach($_FILES as $key=>$value)
        for($s=0; $s<=$count-1; $s++) {
                $_FILES['userfile']['name']=$value['name'][$s];
                $_FILES['userfile']['type']    = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error']       = $value['error'][$s];
                $_FILES['userfile']['size']    = $value['size'][$s];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg';
                $config['file_name']			= $units.'-'.$nama;
                $this->load->library('upload', $config);
                $this->upload->do_upload();
                // $data = $this->upload->data();
                // $name_array[] = $data['file_name'];
        }
        redirect('c_unit/index');
   
    }

	public function hapus($id_unit){
		$this->m_unit->hapus($id_unit);
		redirect('c_unit');
	}

	public function add_akun() {
		$data['op'] = 'tambah';
		$data['title'] = "Data User";	
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('akun_form',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function edit_akun($id_user) {
		$data['op'] = 'edit';
		$data['title'] = "Data User";
		$data['sql'] = $this->m_unit->edit_akun($id_user);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('akun_form_edit',$data);
		}
		else{
			redirect('c_login/index');
		}
	}
	
	public function simpan_akun(){
		$op = $this->input->post('op');
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
        $username = $this->input->post('user');
        $password = md5($this->input->post('pass'));
        $level = $this->input->post('level');
		$data = array(
			'nama_user' => $nama_user,
			'username' => $username,
			'password' => $password,
			'level' => $level
			);
		if($op=="tambah"){
			$this->m_unit->simpan_akun($data);
		}
		else{
			$this->m_unit->update_akun($id_user,$data);
		}
		redirect('c_unit/akun');
	}

	public function hapus_akun($id_user){
		$this->m_unit->hapus_akun($id_user);
		redirect('c_unit/akun');
	}


    function search_date(){
        $date1 = $this->input->post('date1'); //YYYY-MM-DD
        $date2 = $this->input->post('date2');
        // $unit = $this->input->post('unit');
        $data['d1'] = $date1;
        $data['d2'] = $date2;
        if($date1 == "" || $date2 == ""){
        	$data['sql'] = $this->m_unit->unit();
        }
        else{
        	$data['sql'] = $this->m_unit->search($date1,$date2);
        }
        $data['title'] = "Laporan";
        $this->load->view('hasil_laporan',$data);
    }

}