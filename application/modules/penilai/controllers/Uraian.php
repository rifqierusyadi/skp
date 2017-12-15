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
		$id = $this->input->post('id');
        $data['record']		= $this->data->get_data($id);
        $data['detail']		= $this->data->get_detail($id);
		$this->load->view('uraian/detail', $data);
	}
	
	public function created()
	{
		$data['head'] 		= 'Tambah Penilaian Uraian Tugas';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function updated($id)
	{
		$data['head'] 		= 'Ubah Penilaian Uraian Tugas';
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
            $col[] = $row->nip;
            $col[] = $this->get_profil($row->nip)->nama;
            $col[] = $this->get_profil($row->nip)->jabatan;;
            $col[] = date('Y');
            $col[] = status($row->nip, date('Y'));
            
            //add html for action
            $col[] = '<a class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#uraian-modal" data-id="'.$row->id.'" id="getUraian" title="Detail"><i class="glyphicon glyphicon-search"></i></a> <a class="btn btn-xs btn-flat btn-success" onclick="edit_data();" href="'.site_url('penilaian/uraian/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-check"></i></a>
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
	
	public function ajax_save()
    {
        $data = array(
                'nip' => $this->session->userdata('nip'),
                'periode' => date('Y'),
                'uraian' => $this->input->post('uraian'),
                'kuantitas' => $this->input->post('kuantitas'),
                'output' => $this->input->post('output')
            );
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			helper_log("add", "Menambah Penilaian Uraian Tugas");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
            'nip' => $this->session->userdata('nip'),
            'periode' => date('Y'),
            'uraian' => $this->input->post('uraian'),
            'kuantitas' => $this->input->post('kuantitas'),
            'output' => $this->input->post('output')
        );
		
        if($this->validation($id)){
            $this->data->update($data, $id);
			helper_log("edit", "Merubah Penilaian Uraian Tugas");
        }
    }
    
    public function ajax_delete($id)
    {
        $this->data->delete($id);
		helper_log("trash", "Menghapus Penilaian Uraian Tugas");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			helper_log("trash", "Menghapus Penilaian Uraian Tugas");
        }
        echo json_encode(array("status" => TRUE));
    }
	
	private function validation($id=null)
    {
        //$id = $this->input->post('id');
		$data = array('success' => false, 'messages' => array());
        
        $this->form_validation->set_rules("uraian", "Penilaian Uraian Tugas", "trim|required");
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
	
	public function save_modal()
    {
        $data = array(
                'uraian_id' => $this->input->post('uraian_id'),
                'nip' => $this->session->userdata('nip'),
                'periode' => date('Y'),
                'bulan' => $this->input->post('bulan'),
                'uraian' => $this->input->post('uraian'),
                'output' => $this->input->post('output'),
                'satuan' => $this->input->post('satuan'),
                'ak' => $this->input->post('ak'),
                'biaya' => $this->input->post('biaya'),
                'keterangan' => $this->input->post('keterangan'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->db->insert('uraian_detail', $data);
            helper_log("add", "Menambah Detail Penilaian Uraian Tugas");
            echo json_encode(array("status" => TRUE));
    }

    public function delete_modal($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->update('uraian_detail', $data, array('id'=>$id));
		helper_log("trash", "Menghapus Detail Penilaian Uraian Tugas");
        echo json_encode(array("status" => TRUE));
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
