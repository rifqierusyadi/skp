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
	}
	
	//halaman index
	public function index()
	{
		$id = $this->uri->segment(3);
		$data['head'] 		= 'Laporan Registrasi Diklat';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('report/cetak/default', $data);
	}

	public function formulir($periode=null)
	{
		$data['periode'] 	= $this->data->get_periode();

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
		$data['record'] 	= $this->data->get_uraian($periode);
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('rencana/cetak/default', $data);
	}

	public function get_formulir($periode=null)
	{
		$periode = $this->input->post('periode');
		$data['periode'] 	= $this->data->get_periode();
		$data['record'] 	= $this->data->get_uraian($periode);
		$this->load->view('rencana/cetak/default_result', $data);
	}

	public function detail($periode=null)
	{
		$data['periode'] 	= $this->data->get_periode();

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

	public function get_detail($periode=null)
	{
		$periode = $this->input->post('periode');
		$data['periode'] 	= $this->data->get_periode();
		$data['record'] 	= $this->data->get_uraian($periode);
		$this->load->view('rencana/cetak/detail_result', $data);
	}

	public function realisasi($periode=null)
	{
		$data['periode'] 	= $this->data->get_periode();

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
		$data['record'] 	= $this->data->get_uraian($periode);
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('rencana/cetak/realisasi', $data);
	}

	public function get_realisasi($periode=null, $bulan=null)
	{
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$nip = $this->session->userdata('nip');
		$data['periode'] 	= $this->data->get_periode();
		$data['record'] 	= $this->data->get_realisasi($nip, $periode, $bulan);
		$data['tahun']		= $periode;
		$data['bulan']		= bulan($bulan);
		$this->load->view('rencana/cetak/realisasi_result', $data);
	}

	public function skp($periode=null)
	{
		$data['periode'] 	= $this->data->get_periode();

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
		$data['record'] 	= $this->data->get_uraian($periode);
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('rencana/cetak/skp', $data);
	}

	public function get_skp($periode=null, $bulan=null)
	{
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$nip = $this->session->userdata('nip');
		$data['periode'] 	= $this->data->get_periode();
		$data['record'] 	= $this->data->get_skp($nip, $periode);
		$data['tahun']		= $periode;
		$data['bulan']		= bulan($bulan);
		$this->load->view('rencana/cetak/skp_result', $data);
	}
}
