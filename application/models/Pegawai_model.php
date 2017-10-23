<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function get_new()
	{
		$record = new stdClass();
		$record->nama = '';
		$record->alamat = '';
		$record->email = '';
		return $record;
	}
	
	public function get_data()
	{
		return $this->db->get('pegawai')->result();
	}
	
	public function get_id($id)
	{
		return $this->db->where('id',$id)->get('pegawai')->row();
	}
	
	public function simpan($data)
	{
		return $this->db->insert('pegawai', $data);
	}
	
	public function ubah($id, $data)
	{
		return $this->db->where('id',$id)->update('pegawai', $data);
	}
	
	public function hapus($id)
	{
		return $this->db->where('id',$id)->delete('pegawai');
	}
}