<?php
class Session_validity_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_sessions() {
		$query = $this->db->get('session_validity');
		return $query->result_array();
	}

	public function session_exists($session_id) {
		$query = $this->db->query(
			'SELECT * FROM session_validity WHERE session_id = ?', array($session_id));
		return $query->num_rows() > 0;
	}

	public function session_valid($session_id) {
		return $this->get_session($session_id)['valid'];
	}

	public function get_session($session_id) {
		$query = $this->db->query(
			'SELECT * FROM session_validity WHERE session_id = ?', array($session_id));
		return get_object_vars($query->row());
	}

	public function create_session($session_id) {
		$data = array('session_id' => $session_id, 'valid' => TRUE);
		return $this->db->insert('session_validity', $data);
	}

	public function destroy_session($session_id) {
		if ($this->session_exists($session_id)) {
			$this->db->delete('session_validity', array('session_id' => $session_id));
		}
	}

	public function invalidate_all_sessions() {
		$this->db->query("UPDATE session_validity SET valid = 'false'");
	}
}