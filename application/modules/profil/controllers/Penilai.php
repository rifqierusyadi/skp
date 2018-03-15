<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilai extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'profil/penilai/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('penilai_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	//halaman index
	public function index()
	{
		$json = array();
		$url = 'https://simpeg.kalselprov.go.id/api/identitas?nip='.$this->session->userdata('nip');
		//$url = 'http://localhost/simpeg3/api/identitas?nip='.$this->session->userdata('nip');
		$penilai = file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
		if($penilai){
			$json = json_decode($penilai);
		}
		//var_dump($this->session->userdata('nip'));
		
		$data['head'] 		= 'Data Profil';
		$data['record'] 	= FALSE;
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		$data['penilai'] 	= $json;
		
		$this->load->view('template', $data);
	}
	
	public function saved()
	{
		$find = $this->db->get_where('pegawai', array('nip'=>$this->session->userdata('nip')))->row();
		
		$data = array(
			'penilai' => $this->input->post('nip'),
			'nip' => $this->session->userdata('nip')
		);
	
		//if($this->validation()){
			if(!$find){
				$insert = $this->db->insert('pegawai', $data);
				helper_log("add", "Menambah Data Penilai");
				redirect('profil');
			}else{
				$this->db->update('pegawai', $data, array('id'=>$find->id));
				helper_log("edit", "Merubah Data Penilai");
				redirect('profil');
			}
		//}
	}
	
	private function validation($id=null)
    {
        //$id = $this->input->post('id');
		$this->form_validation->set_rules("nip", "NIP", "trim|required");
        return $this->form_validation->run();
    }
}
