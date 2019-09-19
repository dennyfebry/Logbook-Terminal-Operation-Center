<?php
class c_avsec extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_unit');
		$this->load->helper(array('form', 'url'));
		// $this->load->model('unit_model');
		// $this->load->library('pagination');
	}

	function index(){
		$data['title'] = "Unit AVSEC";
		$data['sql'] = $this->m_unit->avsec();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('avsec/index', $data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function add() {
		$data['op'] = 'tambah';
		$data['title'] = "Data Unit";	
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('avsec/form',$data);
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
			$this->load->view('avsec/form_edit',$data);
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
		redirect('c_avsec/index');
	}

	public function hapus($id_unit){
		$this->m_unit->hapus($id_unit);
		redirect('c_avsec');
	}

	function laporan(){
		$data['title'] = "Laporan";
		$data['sql'] = $this->m_unit->get_unit();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('avsec/laporan', $data);
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
			$this->load->view('avsec/hasil_laporan', $data);
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

    public function upload($id_unit) {
		$data['title'] = "Data Unit";
		$data['sql'] = $this->m_unit->edit($id_unit);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('avsec/form_upload',$data);
		}
		else{
			redirect('c_login/index');
		}
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
        redirect('c_avsec/index');
   
    }

}