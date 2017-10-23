<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $table = 'skp_online_users';
	public function get_new()
	{
		$record = new stdClass();
		$record->nip = '';
		$record->password = '';
		return $record;
	}

	public function get_id($id)
	{
		return $this->db->where('ID',$id)->get($this->table)->row();
	}
	
	public function get_data()
	{
		return $this->db->get($this->table)->result();
	}
}