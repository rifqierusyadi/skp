<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataskp_model extends CI_Model {

	public $table = 'skp_tahunan';
	public function get_new()
	{
		$record = new stdClass();
		$record->tahun ='';
		$record->nip = '';
		$record->nama= '';
		$record->jabatan = '';
		$record->unitkerja = '';
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