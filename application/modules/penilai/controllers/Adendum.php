<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adendum extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'penilai/adendum/';
	
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
		$data['head'] 		= 'Persetujuan Adendum Uraian Tugas';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }
    
    public function detail($nip=null,$tahun=null)
	{   
        $data['head'] 		= 'Detail Adendum Uraian Tugas';
        $data['record'] 	= $this->data->get_detail($nip, $tahun);
        $data['nama'] 	    = $this->get_profil($nip)->nama;
        $data['nip'] 	    = $nip;
		$data['content'] 	= $this->folder.'uraian';
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
            $col[] = $this->get_profil($row->nip)->jabatan;
            $col[] = $this->get_profil($row->nip)->unker;
            $col[] = $row->periode;
            
            //add html for action
            $col[] = '<a class="btn btn-xs btn-flat btn-info" title="Detail" href="'.site_url('penilai/adendum/detail/'.$row->nip.'/'.$row->periode).'"><i class="fa fa-search"></i></a>';

           
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
        $profil_url = 'https://simpeg.kalselprov.go.id/api/identitas?nip='.$id;
		//$profil_url = 'http://localhost/pegawai/api/identitas?nip='.$id;
		$profil = file_get_contents($profil_url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
		if($profil){
			$profil_json = json_decode($profil);
        }
        
        return $profil_json[0];
    }

    public function approved($id=null,$bulan=null){
        $data = array();
        $find = $this->db->get_where('uraian_adendum', array('uraian_id'=> $id, 'bulan'=>$bulan))->row();
        
        if($find){
            $data['uraian_id'] = $find->uraian_id;
            $data['bulan'] = $find->bulan;
            $data['uraian'] = $find->uraian;
            $data['kuantitas'] = $find->kuantitas;
            $data['satuan'] = $find->satuan;
            $data['ak'] = $find->ak;
            $data['biaya'] = $find->biaya;
            $update = $this->db->update('uraian_detail', $data, array('uraian_id'=>$id,'bulan'=>$bulan));
            $this->db->update('uraian_adendum', array('status'=>1),array('uraian_id'=>$id,'bulan'=>$bulan));
        }

        if($update){
            redirect('penilai/adendum');
        }else{
            $this->index();
        }
    }

    public function rejected($nip=null,$tahun=null){
        $update = $this->db->update('uraian', array('status'=>'2','updated_at'=>date("Y-m-d H:i:s")), array('nip'=>$nip,'periode'=>$tahun));
        if($update){
            redirect('penilai/uraian');
        }
    }
}
