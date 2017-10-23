<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userskp_model extends CI_Model {

	public $table = 'skp_online_users';
	public function get_new()
	{
		$record = new stdClass();
		$record->nip = '';
		$record->password = '';
		$record->email = '';
		$record->nama_lengkap = '';
		$record->pangkat = '';
		$record->golongan_ruang = '';
		$record->jabatan = '';
		$record->unitkerja = '';
		$record->keterangan = '';
		$record->active = '';
		return $record;
	}
	
	public function get_data()
	{
		return $this->db->get($this->table)->result();
	}
	
	public function get_id($id)
	{
		return $this->db->where('ID',$id)->get($this->table)->row();
	}
	
	public function simpan($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	public function ubah($id, $data)
	{
		return $this->db->where('ID',$id)->update($this->table, $data);
	}
	
	public function hapus($id)
	{
		return $this->db->where('ID',$id)->delete($this->table);
	}
	
	public function get_nip($str,$id)
	{
		return $this->db->where('nip',$str)->where('ID !=',$id)->get($this->table)->row();
	}
	
}