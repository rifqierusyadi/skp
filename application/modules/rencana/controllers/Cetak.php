<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'rencana/cetak/';
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->helper('my_helper');
		$this->load->helper('my_helper');
		$this->load->model('cetak_m', 'data');
		signin();
		//group(array('1','2','3'));
	}
	
	//halaman index
	public function index()
	{
		$id = $this->uri->segment(3);
		$data['head'] 		= 'Laporan Registrasi Diklat';
		//$data['record'] 	= $this->data->get_cetak();
		//$data['pengelola'] 	= $this->data->get_pengelola();
		//$data['pangkat'] 	= $this->data->get_pangkat();
		//$data['eselon'] 	= $this->data->get_eselon();
		//$data['ktpu'] 		= $this->data->get_ktpu();
		//$data['content'] 	= $this->folder.'detail';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('report/cetak/default', $data);
	}

	public function formulir()
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
		
		
		$data['head'] 		= 'Formulir Sasaran Kerja Pegawai Negeri Sipil';
		$data['profil'] 	= $profil_json;
		$data['penilai'] 	= $penilai_json;
		$data['atasan'] 	= $atasan_json;
		$data['record'] 	= $this->data->get_uraian();
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('rencana/cetak/default', $data);
	}

	public function detail()
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
		
		
		$data['head'] 		= 'Formulir Sasaran Kerja Pegawai Negeri Sipil';
		$data['profil'] 	= $profil_json;
		$data['penilai'] 	= $penilai_json;
		$data['atasan'] 	= $atasan_json;
		$data['record'] 	= $this->data->get_uraian();
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('rencana/cetak/detail', $data);
	}

	// public function get_filter()
	// {
	// 	$id = $this->uri->segment(3);
	// 	$pengelola = $this->input->post('pengelola');
	// 	$eselon = $this->input->post('eselon');
	// 	$pangkat = $this->input->post('pangkat');
	// 	$pendidikan = $this->input->post('pendidikan');

	// 	$data['head'] 		= 'Laporan Registrasi Diklat';
	// 	$data['record'] 	= $this->data->get_filter($pengelola, $eselon, $pangkat, $pendidikan);
	// 	$data['pengelola'] 	= $this->data->get_pengelola();
	// 	$data['pangkat'] 	= $this->data->get_pangkat();
	// 	$data['eselon'] 	= $this->data->get_eselon();
	// 	$data['ktpu'] 		= $this->data->get_ktpu();
	// 	//$data['content'] 	= $this->folder.'detail';
	// 	$data['style'] 		= $this->folder.'style';
	// 	$data['js'] 		= $this->folder.'js';
		
	// 	$this->load->view('report/cetak/filter', $data);
	// }
}
