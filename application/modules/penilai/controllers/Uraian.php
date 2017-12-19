<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uraian extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'penilai/uraian/';
	
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('my_helper');
        $this->load->model('uraian_m', 'data');
		signin();
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Penilaian Uraian Tugas';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }
    
    public function get_uraian()
	{
		$id = $this->input->post('id');
		$data['record']		= $this->data->get_data($id);
		$this->load->view('uraian/modal', $data);
    }
    
    public function get_detail()
	{
        $nip = $this->uri->segment(3);
        $tahun = $this->uri->segment(4);
        
        $data['head'] 		= 'Penilaian Uraian Tugas';
        $data['record']		= $this->data->get_data($id);
        $data['detail']		= $this->data->get_detail($id);
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function ajax_list()
    {
        $record	= $this->data->get_datatables();
        $data 	= array();
        $no 	= $_POST['start'];
		
        foreach ($record as $row) {
            $no++;
            $col = array();
            $col[] = '<input type="checkbox" class="data-check" value="'.$row->id.'">';
            $col[] = $row->nip;
            $col[] = $this->get_profil($row->nip)->nama;
            $col[] = $this->get_profil($row->nip)->jabatan;;
            $col[] = date('Y');
            $col[] = status($row->nip, date('Y'));
            
            //add html for action
            $col[] = '<a class="btn btn-xs btn-flat btn-info" title="Detail" href="'.site_url('uraian/detail/'.$row->nip.'/'.date('Y')).'" target="_blank"><i class="glyphicon glyphicon-search"></i></a> <a class="btn btn-xs btn-flat btn-success" onclick="edit_data();" href="'.site_url('penilaian/uraian/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-check"></i></a>
                  <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-minus"></i></a>';
 
            $data[] = $col;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->data->count_all(),
                        "recordsFiltered" => $this->data->count_filtered(),
                        "data" => $data,
                );
        
		echo json_encode($output);
    }

    private function get_profil($id)
	{
        $profil_json = array();
        
		$profil_url = 'http://localhost/pegawai/api/identitas?nip='.$id;
		$profil = file_get_contents($profil_url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
		if($profil){
			$profil_json = json_decode($profil);
        }
        
        return $profil_json[0];
    }
}
