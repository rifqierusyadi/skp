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
	

    public function get_uraian()
    {
        $this->db->where('nip', $this->session->userdata('nip'));
        $this->db->where('deleted_at', NULL);
        $this->db->order_by('id','ASC');
        $query = $this->db->get('uraian');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return FALSE;
        }
    }
}