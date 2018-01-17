<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'profil/profil/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_m', 'data');
		signin();
		//group(array('1'));
	}
	
	//halaman index
	public function index()
	{
		$profil_json = array();
		$penilai_json = array();
		$atasan_json = array();
		
		$get_data = $this->db->get_where('pegawai', array('nip'=>$this->session->userdata('nip')))->row();
		
		$profil_url = 'https://simpeg.kalselprov.go.id/api/identitas?nip='.$this->session->userdata('nip');
		//$profil_url = 'http://localhost/simpeg3/api/identitas?nip='.$this->session->userdata('nip');
		$profil = file_get_contents($profil_url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
		if($profil){
			$profil_json = json_decode($profil);
		}


		if($get_data){
			if($get_data->penilai){
				$penilai_url = 'https://simpeg.kalselprov.go.id/api/identitas?nip='.$get_data->penilai;
				//$penilai_url = 'http://localhost/simpeg3/api/identitas?nip='.$get_data->penilai;
				$penilai = file_get_contents($penilai_url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
				if($penilai){
					$penilai_json = json_decode($penilai);
				}
			}
	
			if($get_data->atasan){
				$atasan_url = 'https://simpeg.kalselprov.go.id/api/identitas?nip='.$get_data->atasan;
				//$atasan_url = 'https://localhost/simpeg3/api/identitas?nip='.$get_data->atasan;
				$atasan = file_get_contents($atasan_url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
				if($atasan){
					$atasan_json = json_decode($atasan);
				}
			}
		}
		
	
		//var_dump($this->session->userdata('nip'));
		
		$data['head'] 		= 'Data Profil';
		$data['profil'] 	= $profil_json;
		$data['penilai'] 	= $penilai_json;
		$data['atasan'] 	= $atasan_json;
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function created()
	{
		$data['head'] 		= 'Tambah Data Profil';
		$data['record'] 	= $this->data->get_new();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['instansi']	= $this->data->get_instansi();
		
		$this->load->view('template', $data);
	}
	
	public function updated($id=null)
	{
		
		$data['head'] 		= 'Ubah Data Profil';
		$data['record'] 	= $this->data->get_id($id);
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['instansi']	= $this->data->get_instansi();
		
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
			$col[] = $row->profil;
			$col[] = $row->unker;
            $col[] = $row->instansi;
            //add html for action
            $col[] = '<a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('profilupdated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
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
        $kode = $this->data->get_kode();
		$data = array(
				'instansi_id' => $this->input->post('instansi'),
                'unker_id' => $this->input->post('unker'),
				'parent_id' => $this->input->post('parent'),
				'kode' => $kode,
				'profil' => $this->input->post('profil'),
				'upt' => $this->input->post('upt'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'telpon' => $this->input->post('telpon')
            );
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			helper_log("add", "Menambah Data Profil");
        }
    }
    
    public function ajax_update($id=null)
    {
        $data = array(
				'instansi_id' => $this->input->post('instansi'),
                'unker_id' => $this->input->post('unker'),
				'parent_id' => $this->input->post('parent'),
				'profil' => $this->input->post('profil'),
				'upt' => $this->input->post('upt'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'telpon' => $this->input->post('telpon')
            );
		
        if($this->validation($id)){
            $this->data->update($data, $id);
			helper_log("edit", "Merubah Data Profil");
        }
    }
    
    public function ajax_delete($id=null)
    {
        $this->data->delete($id);
		helper_log("trash", "Menghapus Data Profil");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			helper_log("trash", "Menghapus Data Profil");
        }
        echo json_encode(array("status" => TRUE));
    }
	
	private function validation($id=null)
    {
        //$id = $this->input->post('id');
		$data = array('success' => false, 'messages' => array());
        
		if(!isset($id)){
			$this->form_validation->set_rules("instansi", "Instansi Kerja", "trim|required");
			$this->form_validation->set_rules("unker", "Unit Kerja", "trim|required");
			$this->form_validation->set_rules("profil", "Satuan Kerja", "trim|required");
			$this->form_validation->set_rules("parent", "Satuan Kerja Induk", "trim");
		}else{
			$this->form_validation->set_rules("instansi", "Instansi Kerja", "trim|required");
			$this->form_validation->set_rules("unker", "Unit Kerja", "trim|required");
			$this->form_validation->set_rules("profil", "Satuan Kerja", "trim|required");
			$this->form_validation->set_rules("parent", "Satuan Kerja Induk", "trim");
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
	
	public function get_unker(){
		//echo 'hallo';
        $record = $this->data->get_id($this->uri->segment(4));
        $instansi = $this->input->post('instansi');
        $unker = $this->data->get_unker($instansi);
        if(!empty($unker)){
            //$selected = (set_value('unker')) ? set_value('unker') : '';
			$selected = set_value('unker', $record->unker_id);
            echo form_dropdown('unker', $unker, $selected, "class='form-control select2' name='unker' id='unker'");
        }else{
            echo form_dropdown('unker', array(''=>'Pilih Unit Kerja'), '', "class='form-control select2' name='unker' id='unker'");
        }
    }
	
	public function get_profil(){
        $record = $this->data->get_id($this->uri->segment(4));
        $instansi = $this->input->post('instansi');
		$unker = $this->input->post('unker');
        $parent = $this->data->get_parent($instansi, $unker);
        if(!empty($parent)){
            //$selected = (set_value('parent')) ? set_value('parent') : '';
			$selected = set_value('parent', $record->parent_id);
            echo form_dropdown('parent', $parent, $selected, "class='form-control select2' name='parent' id='parent'");
        }else{
            echo form_dropdown('parent', array(''=>'Pilih Satuan Kerja Induk'), '', "class='form-control select2' name='parent' id='parent'");
        }
    }
	
//	public function update_kodex(){
//		$query = $this->data->get_record();
//		foreach($query as $row){
//			$kodex = $this->data->get_kode();
//			$data = array(
//                'kodex' => $kodex
//            );
//			$this->data->update($data, $row->id);
//		}
//	}
//	
//	public function update_parent(){
//		$query = $this->data->get_parents();
//		
//		foreach($query as $row){
//			if($row->parent_id == 0){
//				$data = array(
//					'parent' => null
//				);
//				$this->data->update($data, $row->id);
//			}else{
//				$parent = $this->data->get_parent_id($row->parent_id);
//				$data = array(
//                'parent' => $parent
//				);
//				$this->data->update($data, $row->id);
//			}
//		}
//	}
}
