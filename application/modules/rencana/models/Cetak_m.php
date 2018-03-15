<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_m extends MY_Model
{
	public $table = 'uraian'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
	//ajax datatable
    public $column_order = array(); //set kolom field database pada datatable secara berurutan
    public $column_search = array(); //set kolom field database pada datatable untuk pencarian
    public $order = array('id' => 'asc'); //order baku 
	
	public function __construct()
	{
		$this->timestamps = TRUE;
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
	

    public function get_uraian($periode=null)
    {
        $this->db->where('nip', $this->session->userdata('nip'));
        $this->db->where('deleted_at', NULL);
        $this->db->where('periode', $periode);
        $this->db->order_by('id','ASC');
        $query = $this->db->get('uraian');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_periode()
    {
        $now = date('Y');
        $before = $now-1;
        $tahun = $before;
        $dropdown[''] = 'Pilih Periode Waktu';
        for($tahun; $tahun <= $now; $tahun++ ){
            $dropdown[$tahun] = $tahun;
        }
        return $dropdown; 
    }

    public function get_realisasi($nip=null, $periode=null, $bulan=null)
    {
        $this->db->select('a.id, b.nip, b.periode, b.status, a.uraian_id, b.uraian, a.bulan, a.kuantitas, a.satuan, a.ak, a.biaya, a.keterangan');
        $this->db->from('uraian_detail a');
        $this->db->join('uraian b','a.uraian_id = b.id','LEFT');
        $this->db->where('b.nip', $nip);
        $this->db->where('a.bulan', $bulan);
        $this->db->where('b.periode', $periode);
        $this->db->where('a.deleted_at', NULL);
        $this->db->where('b.status', 1);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    public function get_skp($nip=null, $periode=null)
    {
        $this->db->select('a.id, b.nip, b.periode, b.status, a.uraian_id, b.uraian, a.bulan, a.kuantitas, a.satuan, a.ak, a.biaya, a.keterangan');
        $this->db->from('uraian_detail a');
        $this->db->join('uraian b','a.uraian_id = b.id','LEFT');
        $this->db->where('b.nip', $nip);
        $this->db->where('b.periode', $periode);
        $this->db->where('a.deleted_at', NULL);
        $this->db->where('b.status', 1);
        $this->db->group_by('b.uraian');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }
}