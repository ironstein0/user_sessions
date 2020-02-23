<?php
class Users extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array("form", 'url'));
		$this->load->model('users_model');
	}

	public function index() {
		$data['users'] = $this->users_model->get_users();
		$this->load->view('users/index', $data);
	}

	public function view($id) {
		$query = $this->db->get('users', $id);
		$data['user'] = get_object_vars($query->row());
		$this->load->view('users/view', $data);
	}

	public function create() {
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('users/create');
		} else {
			$name = $this->input->post('name');
			$this->users_model->create_user($name);
			redirect('users');
		}
	}
}