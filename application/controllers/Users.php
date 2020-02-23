<?php
class Users extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url_helper');
	}

	public function index() {
		$data['users'] = $this->users_model->get_users();
		$this->load->view('users/index', $data);
	}
}