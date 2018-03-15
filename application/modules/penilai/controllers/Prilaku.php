<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prilaku extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'penilai/prilaku/';
	
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('my_helper');
        $this->load->model('prilaku_m', 'data');
		signin();
	}
	
	//halaman index
	public function index()
	{
		$data['head'] 		= 'Penilaian Perilaku Kinerja';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
    }
    
    public function detail($nip=null,$tahun=null)
	{   
        $find = $this->db->get_where('prilaku', array('nip'=>$nip,'periode'=>$tahun))->row();
        if($find){
            $record = $this->db->get_where('prilaku',array('nip'=>$nip,'periode'=>$tahun))->row();
        }else{
            $record = FALSE;
        }

        var_dump($record);
        $data['head'] 		= 'Penilaian Prilaku Kinerja '.$tahun;
        $data['record'] 	= $record;
        $data['nama'] 	    = $this->get_profil($nip)->nama;
        $data['nip'] 	    = $nip;
        $data['periode'] 	= $tahun;
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
            $col[] = '<a class="btn btn-xs btn-flat btn-primary" title="Detail" href="'.site_url('penilai/prilaku/detail/'.$row->nip.'/'.$row->periode).'"><i class="fa fa-plus"></i> Penilaian</a>';

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
        $update = $this->db->update('uraian', array('status'=>'1','updated_at'=>date("Y-m-d H:i:s")), array('nip'=>$nip,'periode'=>$tahun));
        if($update){
            redirect('penilai/uraian');
        }
    }

    public function rejected($nip=null,$tahun=null){
        $update = $this->db->update('uraian', array('status'=>'2','updated_at'=>date("Y-m-d H:i:s")), array('nip'=>$nip,'periode'=>$tahun));
        if($update){
            redirect('penilai/uraian');
        }
    }

    public function simpan()
    {
            $data = array(
                'nip' => $this->input->post('nip'),
                'periode' => $this->input->post('periode'),
                'pelayanan' => $this->input->post('pelayanan'),
                'integritas' => $this->input->post('integritas'),
                'komitmen' => $this->input->post('komitmen'),
                'disiplin' => $this->input->post('disiplin'),
                'kerjasama' => $this->input->post('kerjasama'),
                'kepemimpinan' => $this->input->post('kepemimpinan')
            );

            $find = $this->db->get_where('prilaku', array('nip'=>$this->input->post('nip'),'periode'=>$this->input->post('periode')))->row();
            if(!$find){
                $insert = $this->db->insert('prilaku', $data);
			    helper_log("add", "Menambah Nilai Prilaku");
            }else{
                $insert = $this->db->update('prilaku', $data, array('nip'=>$this->input->post('nip'), 'periode'=>$this->input->post('periode')));
			    helper_log("edit", "Menambah Nilai Prilaku");
            }

            redirect('penilai/prilaku');
    }
}
