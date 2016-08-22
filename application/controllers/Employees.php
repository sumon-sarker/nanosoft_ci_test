<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function index($pageNum=0){
		$this->load->model('Employee');
		$this->load->library('pagination');

		$config['base_url'] = base_url().'employees/index';
		$config['total_rows'] = $this->Employee->GetTotal();
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = false;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$offset = 0;
		if (is_numeric($pageNum)) {
			if ($pageNum>1) {
				--$pageNum;
			}
			$offset = $config['per_page'] * $pageNum;
		}

		$data['employees'] = $this->Employee->GetAll($config['per_page'],$offset);
		$this->load->view('common/header');
		$this->load->view('Employees/index',$data);
		$this->load->view('common/footer');
	}

	public function view($id=0){
		$data['employee'] = null;
		if (is_numeric($id)) {
			$this->load->model('Employee');
			$query 	= $this->db->query("SELECT * FROM employees WHERE id=?",$id);
			$res  	= $query->result();
			if(count($res)){
				$data['employee'] = $res[0];
			}
		}
		$this->load->view('common/header');
		$this->load->view('Employees/view',$data);
		$this->load->view('common/footer');
	}

	public function edit($id=0){
		$this->load->helper('form');

		$data['employee'] = null;
		if (is_numeric($id)) {
			$this->load->model('Employee');
			$query 	= $this->db->query("SELECT * FROM employees WHERE id=?",$id);
			$res  	= $query->result();
			if(count($res)){
				$data['employee'] = $res[0];
			}
		}

		if ($this->input->post('first_name')) {
			$datas = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'designation' => $this->input->post('designation'),
				'email' => $this->input->post('email')
			);
			if($this->Employee->Update($id,$datas)){
				$this->session->set_flashdata('msg', 'Employee Successfully Updated!');
				redirect('employees');
			}
		}

		$this->load->view('common/header');
		$this->load->view('Employees/edit',$data);
		$this->load->view('common/footer');
	}

	public function add(){
		$this->load->helper('form');
		if ($this->input->post('first_name')) {
			$this->load->model('Employee');
			$datas = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'designation' => $this->input->post('designation'),
				'email' => $this->input->post('email')
			);
			if($this->Employee->Insert($datas)){
				$this->session->set_flashdata('msg', 'Employee Successfully added!');
				redirect('employees');
			}
		}

		$this->load->view('common/header');
		$this->load->view('Employees/add');
		$this->load->view('common/footer');
	}

	public function delete($id){
		if (is_numeric($id)) {
			$this->load->model('Employee');
			if ($this->Employee->Delete($id)) {
				$this->session->set_flashdata('msg', 'Employee successfully Deleted!');
			}else{
				$this->session->set_flashdata('msg', 'Employee Deletion Failed!');
			}
		}else{
			$this->session->set_flashdata('msg', 'Invalid actions!');
		}
		redirect('employees');
	}

	public function set_attendances($pageNum=0){
		$this->load->model('Employee');
		$this->load->library('pagination');

		$config['base_url'] = base_url().'employees/set_attendances';
		$config['total_rows'] = $this->Employee->GetTotal();
		$config['per_page'] = 20;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = false;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$offset = 0;
		if (is_numeric($pageNum)) {
			if ($pageNum>1) {
				--$pageNum;
			}
			$offset = $config['per_page'] * $pageNum;
		}

		$data['employees'] 	= $this->Employee->GetAll($config['per_page'],$offset);
		$data['attendances']= $this->Employee->GetAllAttandances($config['per_page'],$offset);
		$this->load->view('common/header');
		$this->load->view('Employees/set_attendances',$data);
		$this->load->view('common/footer');
	}

	public function attendance_update(){
		if (isset($_POST['id']) && isset($_POST['status'])) {
			$this->load->model('Employee');
			return $this->Employee->Attendance($_POST);
		}
		return false;
	}

	public function view_attendances(){
		$this->load->helper('form');
		$this->load->model('Employee');

		$set_date = date('Y-m-d');

		if ($this->input->post('start_date')) {
			$start 	= $this->input->post('start_date');
			$end 		=	$this->input->post('end_date');
			$graph['graph'] 	= $this->Employee->GetMultipleDateGraphdata($start,$end);
			$set_date = array($start,$end);
		}else{
			$today = date('Y-m-d');
			$graph['graph']		= $this->Employee->GetSingleDateGraphdata($today);
		}

		$graph['search_date'] = $set_date;

		$this->load->view('common/header');
		$this->load->view('Employees/view_attendances',$graph);
		$this->load->view('common/footer');
	}

	private function makeFormat(){

	}

}
