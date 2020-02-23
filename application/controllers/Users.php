<?php
class Users extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// for sessions to work, changes were made to the `Session Variables` 
		// section under the config.php file
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array("form", 'url'));
		$this->load->model('users_model');
	}

	public function index() {
		$data['users'] = $this->users_model->get_users();
		$this->load->view('users/index', $data);
	}

	public function view($id) {
		$user = $this->users_model->get_user($id);
		$data['user'] = $user;
		if ($user['access_type'] === 'ADMIN') {
			// render admin user view
			$this->load->view('users/admin', $data);
		} else {
			// render non-admin user view
			$this->load->view('users/view', $data);
		}
	}

	public function create() {
		$this->form_validation->set_rules('name', 'Name', 'required'); // name required

		if ($this->form_validation->run() === FALSE) {
			// validation failed
			$this->load->view('users/create');
		} else {
			// validation successfull
			$name = $this->input->post('name');
			$this->users_model->create_user($name);
			redirect('users');
		}
	}

	public function kill_all() {

	}
}