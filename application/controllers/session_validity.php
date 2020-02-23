<?php
class Session_validity extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('session_validity_model');
	}

	public function index() {
		$data['sessions'] = $this->session_validity_model->get_sessions();
		$this->load->view('session_validity/index', $data);
	}
}