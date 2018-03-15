<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'penilai/realisasi/';
	
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('my_helper');
        $this->load->model('realisasi_m', 'data');
		signin();
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Penilaian Realisasi Uraian Tugas';
		$data['record'] 	= $this->data->get_all();
        $data['content'] 	= $this->folder.'default';
        $data['bulan'] 	    = $this->data->get_bulan();
        $data['periode'] 	= $this->data->get_periode();
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }

    public function get_detail()
	{
        //$nip                = $this->session->userdata('nip');
        $bulan              = $this->input->post('bulan');
        $periode            = $this->input->post('periode');
        $data['record']		= $this->data->get_detail($bulan, $periode);
        $this->load->view('realisasi/detail', $data);
    }

    public function get_uraian()
	{
        $nip                = $this->input->post('nip');
        $nama               = $this->get_profil($this->input->post('nip'));
        $bulan              = $this->input->post('bulan');
        $periode            = $this->input->post('periode');
        $data['nip']        = $this->input->post('nip');
        $data['nama']       = $this->get_profil($this->input->post('nip'))->nama;
        $data['record']		= $this->data->get_uraian($nip, $bulan, $periode);
        $data['bulan']      = bulan($bulan);
        $data['periode']    = $periode;
        $this->load->view('realisasi/modal', $data);
    }
    
    public function detail($nip=null,$tahun=null)
	{   
        $data['head'] 		= 'Detail Uraian Tugas';
        $data['record'] 	= $this->data->get_detail($nip, $tahun);
        $data['nama'] 	    = $this->get_profil($nip)->nama;
        $data['nip'] 	    = $nip;
		$data['content'] 	= $this->folder.'realisasi';
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
            $col[] = $row->periode;
            $col[] = '<a class="btn btn-default btn-xs btn-flat btn-block">'.status($row->nip, $row->periode).'</a>';
            
            //add html for action
            if( !$row->status){
                $col[] = '<a class="btn btn-xs btn-flat btn-info" title="Detail" href="'.site_url('penilai/realisasi/detail/'.$row->nip.'/'.date('Y')).'"><i class="fa fa-search"></i></a> <a class="btn btn-xs btn-flat btn-success" href="'.site_url('penilai/realisasi/approved/'.$row->nip.'/'.$row->periode).'" data-toggle="tooltip" title="Approve"><i class="fa fa-check"></i></a>
                <a class="btn btn-xs btn-flat btn-danger" href="'.site_url('penilai/realisasi/rejected/'.$row->nip.'/'.$row->periode).'" data-toggle="tooltip" title="Reject"><i class="fa fa-times"></i></a>';
            }else{
                $col[] = '<a class="btn btn-xs btn-flat btn-info" title="Detail" href="'.site_url('penilai/realisasi/detail/'.$row->nip.'/'.date('Y')).'"><i class="fa fa-search"></i></a>';

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

    public function approved($nip=null,$tahun=null){
        $update = $this->db->update('realisasi', array('status'=>'1','updated_at'=>date("Y-m-d H:i:s")), array('nip'=>$nip,'periode'=>$tahun));
        if($update){
            redirect('penilai/realisasi');
        }
    }

    public function rejected($nip=null,$tahun=null){
        $update = $this->db->update('realisasi', array('status'=>'2','updated_at'=>date("Y-m-d H:i:s")), array('nip'=>$nip,'periode'=>$tahun));
        if($update){
            redirect('penilai/realisasi');
        }
    }

    public function save_modal()
    {
            $detail = $this->input->post('detail_id');
			$result = array();
			foreach($detail AS $key => $val){
				if($_POST['detail_id'][$key] != ''){
					$result[] = array(
					 "detail_id"  => $_POST['detail_id'][$key],
                     "uraian_id"  => $_POST['uraian_id'][$key],
                     "hasil"  => $_POST['hasil'][$key],
					);
				}
			}
			//$insert = $this->data->insert($data);
			$this->db->update_batch('uraian_realisasi', $result, 'detail_id');    
        
            helper_log("edit", "Menambah Nilai Hasil Detail Uraian Tugas");
            echo json_encode(array("success" => TRUE));
    }

}
