<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahan extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'rencana/tambahan/';
	
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('my_helper');
        $this->load->model('tambahan_m', 'data');
		signin();
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Realisasi Uraian Tugas Tambahan';
        $data['record'] 	= $this->data->get_all();
        $data['bulan'] 	    = $this->data->get_bulan();
        $data['periode'] 	= $this->data->get_periode();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }
    
    public function get_detail()
	{
        $nip = $this->session->userdata('nip');
        $bulan = $this->input->post('bulan');
        $periode = $this->input->post('periode');
        $data['record']		= $this->data->get_detail($nip, $bulan, $periode);
        $this->load->view('tambahan/detail', $data);
    }
    
    public function detail_tambahan($id=null)
	{   
        $data['head'] 		= 'Detail Realisasi Uraian Tugas Tambahan';
		$data['record'] 	= $this->data->get($id);
		$data['content'] 	= $this->folder.'tambahan';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }

    public function in_tambahan()
	{
        $uraian = $this->input->post('uraian');
        $detail = $this->input->post('detail');
        $data['record']	 = $this->data->get_data($uraian);
        $data['uraian']  = $uraian;
        $data['detail']  = $detail;
		$this->load->view('tambahan/modal', $data);
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
            $col[] = $row->tambahan;
            $col[] = $row->kuantitas;
            $col[] = $row->satuan;
            $col[] = '<button class="btn btn-flat btn-sm btn-block bg-gray disabled color-palette" data-toggle="modal" data-target="#detail-modal" data-id="'.$row->id.'" id="getDetail">'.tambahan($row->id).' <i class="fa fa-file-text-o"></i></button>';
            $col[] = $row->periode;
            
            //add html for action
            if(!$row->status){
                $col[] = '<a class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#tambahan-modal" data-id="'.$row->id.'" id="getUraian" title="Uraian"><i class="glyphicon glyphicon-plus"></i></a> <a class="btn btn-xs btn-flat btn-default" title="Detail" href="'.site_url('rencana/tambahan/detail_tambahan/').$row->id.'"><i class="glyphicon glyphicon-search"></i></a> <a class="btn btn-xs btn-flat btn-warning" onclick="edit_data();" href="'.site_url('rencana/tambahan/updated/'.$row->id).'" data-toggle="tooltip" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            }elseif($row->status == 2){
                $col[] = '<a class="btn btn-xs btn-flat btn-default" title="Detail" href="'.site_url('rencana/tambahan/detail_tambahan/').$row->id.'"><i class="glyphicon glyphicon-search"></i></a> <a class="btn btn-xs btn-flat btn-danger" data-toggle="tooltip" title="Hapus" onclick="deleted('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            }else{
                $col[] = '<a class="btn btn-xs btn-flat btn-default" title="Detail" href="'.site_url('rencana/tambahan/detail_tambahan/').$row->id.'"><i class="glyphicon glyphicon-search"></i></a> ';
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
                'tambahan' => $this->input->post('tambahan'),
                'kuantitas' => $this->input->post('kuantitas'),
                'satuan' => $this->input->post('satuan')
            );
        
        if($this->validation()){
            $insert = $this->data->insert($data);
			helper_log("add", "Menambah Realisasi Uraian Tugas");
        }
    }
    
    public function ajax_update($id)
    {
        $data = array(
            'nip' => $this->session->userdata('nip'),
            'periode' => $this->input->post('periode'),
            'tambahan' => $this->input->post('tambahan'),
            'kuantitas' => $this->input->post('kuantitas'),
            'satuan' => $this->input->post('satuan')
        );
		
        if($this->validation($id)){
            $this->data->update($data, $id);
			helper_log("edit", "Merubah Realisasi Uraian Tugas");
        }
    }
    
    public function ajax_delete($id)
    {
        $this->data->delete($id);
		helper_log("trash", "Menghapus Realisasi Uraian Tugas");
        echo json_encode(array("status" => TRUE));
    }
    
    public function ajax_delete_all()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->data->delete($id);
			helper_log("trash", "Menghapus Realisasi Uraian Tugas");
        }
        echo json_encode(array("status" => TRUE));
    }
	
	private function validation($id=null)
    {
        //$id = $this->input->post('id');
		$data = array('success' => false, 'messages' => array());
        
        $this->form_validation->set_rules("tambahan", "Realisasi Uraian Tugas", "trim|required");
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
                'uraian_id' => $this->input->post('uraian'),
                'detail_id' => $this->input->post('detail'),
                'kuantitas' => $this->input->post('kuantitas'),
                'ak' => $this->input->post('ak'),
                'biaya' => $this->input->post('biaya'),
                'nilai' => $this->input->post('nilai'),
                'keterangan' => $this->input->post('keterangan')
            );

            $find = $this->db->get_where('uraian_tambahan',array('uraian_id'=>$this->input->post('uraian'),'detail_id'=>$this->input->post('detail')))->row();
            
            if($find > 0){
                $update = $this->db->update('uraian_tambahan', $data, array('uraian_id'=>$this->input->post('uraian'),'detail_id'=>$this->input->post('detail')));
                helper_log("edit", "Merubah Realisasi Uraian Tugas");
                echo json_encode(array("status" => TRUE));
            }else{
                //var_dump('Hallo');
                $insert = $this->db->insert('uraian_tambahan', $data);
                helper_log("add", "Menambah Realisasi Uraian Tugas");
                echo json_encode(array("status" => TRUE));
            }
    }

    public function reset_tambahan()
    {           
        $delete = $this->db->delete('uraian_tambahan', array('uraian_id'=>$this->input->post('uraian'),'detail_id'=>$this->input->post('detail')));
        //helper_log("delete", "Menghapus Realisasi Uraian Tugas");
        echo json_encode(array("status" => TRUE));
    }

    // public function delete_modal($id)
    // {
    //     $data = array(
    //         'deleted_at' => date('Y-m-d H:i:s')
    //     );
    //     $this->db->update('tambahan_detail', $data, array('id'=>$id));
	// 	helper_log("trash", "Menghapus Detail Realisasi Uraian Tugas");
    //     echo json_encode(array("status" => TRUE));
    // }
}
