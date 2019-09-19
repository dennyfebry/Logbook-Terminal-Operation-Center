<?php
class c_index extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_unit');
		$this->load->helper(array('form', 'url'));
		$this->load->model('unit_model');
		$this->load->library('pagination');
	}

	function index(){
		$data['title'] = "Dashboard";
		$config['base_url'] = site_url('c_index/index'); //site url
        $config['total_rows'] = $this->db->count_all('tabel_unit'); //total row
        $config['per_page'] = 10;  //show record per halaman
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
		// $data['sql']=$this->m_unit->unit();
		$this->load->view('index', $data);
	}

        function search_date(){
        $date1 = $this->input->post('date1'); //YYYY-MM-DD
        $date2 = $this->input->post('date2');
        if($date1 == "" || $date2 == ""){
                $data['sql'] = $this->m_unit->unit();
        }
        else{
                $data['sql'] = $this->m_unit->search($date1,$date2);
        }
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = "Laporan";
        $this->load->view('index',$data);
    }

}