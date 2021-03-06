<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adendum extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'rencana/adendum/';
	
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('my_helper');
        $this->load->model('adendum_m', 'data');
		signin();
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Adendum Uraian Tugas';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }
    
    public function get_adendum()
	{
		$id = $this->input->post('id');
		$data['record']		= $this->data->get_data($id);
		$this->load->view('adendum/modal', $data);
    }
    
    public function get_detail()
	{
		$id = $this->input->post('id');
        $data['record']		= $this->data->get_data($id);
        $data['detail']		= $this->data->get_detail($id);
		$this->load->view('adendum/detail', $data);
    }
    
    public function detail_adendum($id=null)
	{   
        $data['head'] 		= 'Detail Adendum Uraian Tugas';
		$data['record'] 	= $this->data->get($id);
		$data['content'] 	= $this->folder.'adendum';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }
	
	public function created()
	{
		$data['head'] 		= 'Tambah Adendum Uraian Tugas';
        $data['record'] 	= $this->data->get_new();
        $data['periode'] 	= $this->data->get_periode();
		$data['content'] 	= $this->folder.'form';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
	
	public function updated($id)
	{
		$data['head'] 		= 'Ubah Adendum Uraian Tugas';
        $data['record'] 	= $this->data->get_id($id);
        $data['periode'] 	= $this->data->get_periode();
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
            $col[] = $row->uraian;
            $col[] = '<button class="btn btn-flat btn-sm btn-block bg-gray disabled color-palette" data-toggle="modal" data-target="#detail-modal" data-id="'.$row->id.'" id="getDetail">'.uraian($row->id).' <i class="fa fa-file-text-o"></i></button>';
            $col[] = $row->kuantitas;
            $col[] = $row->satuan;
            $col[] = $row->ak;
            $col[] = rupiah($row->biaya);
            $col[] = $row->periode;
            
            //add html for action
            if(!$row->status){
                $col[] = '<a class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#adendum-modal" data-id="'.$row->id.'" id="getUraian" title="Uraian"><i class="glyphicon glyphicon-plus"></i></a> <a class="btn btn-xs btn-flat btn-default" title="Detail" href="'.site_url('rencana/adendum/detail_adendum/').$row->id.'"><i class="glyphicon glyphicon-search"></i></a> <a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('rencana/adendum/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            }elseif($row->status == 2){
                $col[] = '<a class="btn btn-xs btn-flat btn-default" title="Detail" href="'.site_url('rencana/adendum/detail_adendum/').$row->id.'"><i class="glyphicon glyphicon-search"></i></a> <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            }else{
                $col[] = '<a class="btn btn-xs btn-flat btn-default" title="Detail" href="'.site_url('rencana/adendum/detail_adendum/').$row->id.'"><i class="glyphicon glyphicon-search"></i></a> ';
            }
            
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
                'periode' => $this->input->post('periode'),
                'uraian' => $this->input->post('uraian'),
                'kuantitas' => $this->input->post('kuantitas'),
                'satuan' => $this->input->post('satuan'),
                'ak' => $this->input->post('ak'),
                'biaya' => $this->input->post('biaya')
            );
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			helper_log("add", "Menambah Adendum Uraian Tugas");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
            'nip' => $this->session->userdata('nip'),
            'periode' => $this->input->post('periode'),
            'uraian' => $this->input->post('uraian'),
            'kuantitas' => $this->input->post('kuantitas'),
            'satuan' => $this->input->post('satuan'),
            'ak' => $this->input->post('ak'),
            'biaya' => $this->input->post('biaya')
        );
		
        if($this->validation($id)){
            $this->data->update($data, $id);
			helper_log("edit", "Merubah Adendum Uraian Tugas");
        }
    }
    
    public function ajax_delete($id)
    {
        $this->data->delete($id);
		helper_log("trash", "Menghapus Adendum Uraian Tugas");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			helper_log("trash", "Menghapus Adendum Uraian Tugas");
        }
        echo json_encode(array("status" => TRUE));
    }
	
	private function validation($id=null)
    {
        //$id = $this->input->post('id');
		$data = array('success' => false, 'messages' => array());
        
        $this->form_validation->set_rules("adendum", "Adendum Uraian Tugas", "trim|required");
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
                'bulan' => $this->input->post('bulan'),
                'uraian' => $this->input->post('uraian'),
                'kuantitas' => $this->input->post('kuantitas'),
                'satuan' => $this->input->post('satuan'),
                'ak' => $this->input->post('ak'),
                'biaya' => $this->input->post('biaya'),
                'keterangan' => $this->input->post('keterangan'),
                'status' =>0,
                'created_at' => date('Y-m-d H:i:s')
            );

            //if($this->valid_modal()){
                $find = $this->db->get_where('uraian_adendum',array('uraian_id'=>$this->input->post('uraian_id'), 'deleted_at'=>NULL, 'bulan'=>$this->input->post('bulan')))->row();
                if($find){
                    $update = $this->db->update('uraian_adendum', $data, array('uraian_id'=>$this->input->post('uraian_id'),'bulan'=>$this->input->post('bulan')));
                    helper_log("edit", "Merubah Detail Adendum Uraian Tugas");
                    echo json_encode(array("success" => TRUE));
                }else{
                    $insert = $this->db->insert('uraian_adendum', $data);
                    helper_log("add", "Menambah Detail Adendum Uraian Tugas");
                    echo json_encode(array("success" => TRUE));
                }
                
            //}
    }

    public function delete_modal($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->update('uraian_adendum', $data, array('id'=>$id));
		helper_log("trash", "Menghapus Detail Adendum Uraian Tugas");
        echo json_encode(array("status" => TRUE));
    }

    private function valid_modal($id=null)
    {
        //$id = $this->input->post('id');
		$data = array('success' => false, 'messages' => array());
        
        //$this->form_validation->set_rules("bulan", "Bulan Adendum Uraian Tugas", "trim|required|callback_cek_bulan");
        $this->form_validation->set_rules("kuantitas", "Jumlah Output", "trim|required");
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

    public function cek_bulan($str)
    {
        $find = $this->db->get_where('uraian_adendum',array('uraian_id'=>$this->input->post('uraian_id'), 'deleted_at'=>NULL, 'bulan'=>$str))->row();
        if ($find)
        {
                $this->form_validation->set_message('cek_bulan', 'Adendum Uraian Tugas Untuk {field} Tersebut Sudah Ada.');
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }

}
