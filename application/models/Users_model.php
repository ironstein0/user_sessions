<?php
class Users_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_users() {
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function get_user($id) {
		$query = $this->db->query('SELECT * FROM users WHERE id = ?', array($id));
		return get_object_vars($query->row());
	}

	public function create_user($name, $access_type = 'USER') {
		$data = array('name' => $name, 'access_type' => $access_type);
		return $this->db->insert('users', $data);
	}
}