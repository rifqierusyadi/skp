<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'referensi/pangkat/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pangkat_m', 'data');
		signin();
		group(array('1'));
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Referensi Golongan Pangkat';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function created()
	{
		$data['head'] 		= 'Tambah Referensi Golongan Pangkat';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function updated($id)
	{
		$data['head'] 		= 'Ubah Referensi Golongan Pangkat';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
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
            $col[] = $row->kode;
			$col[] = $row->golongan;
			$col[] = $row->pangkat;
            
            //add html for action
            $col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('referensi/pangkat/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
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
	
	public function ajax_save()
    {
        $data = array(
                'pangkat' => $this->input->post('pangkat')
            );
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			helper_log("add", "Menambah Referensi Golongan Pangkat");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
                'pangkat' => $this->input->post('pangkat')
            );
		
        if($this->validation($id)){
            $this->data->update($data, $id);
			helper_log("edit", "Merubah Referensi Golongan Pangkat");
        }
    }
    
    public function ajax_delete($id)
    {
        $this->data->delete($id);
		helper_log("trash", "Menghapus Referensi Golongan Pangkat");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			helper_log("trash", "Menghapus Referensi Golongan Pangkat");
        }
        echo json_encode(array("status" => TRUE));
    }
	
	private function validation($id=null)
    {
        //$id = $this->input->post('id');
		$data = array('success' => false, 'messages' => array());
        
		if(!isset($id)){
			$this->form_validation->set_rules("kode", "Kode Golongan Pangkat", "trim|required|is_unique[ref_pangkat.kode]");
			$this->form_validation->set_rules("golongan", "Nama Golongan", "trim|required|is_unique[ref_pangkat.golongan]");
			$this->form_validation->set_rules("pangkat", "Nama Pangkat", "trim|required|is_unique[ref_pangkat.pangkat]");
		}else{
			$this->form_validation->set_rules("kode", "Kode Golongan Pangkat", "trim|required");
			$this->form_validation->set_rules("golongan", "Nama Golongan", "trim|required");
			$this->form_validation->set_rules("pangkat", "Nama Pangkat", "trim|required");
		}
        
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        
        if($this->form_validation->run()){
            $data['success'] = true;
        }else{
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
        return $this->form_validation->run();
    }
	
	public function ajax_csfr()
    {
        echo json_encode(array("token" => $this->security->get_csrf_token_name(), "key"=>$this->security->get_csrf_hash()));
    }
}
