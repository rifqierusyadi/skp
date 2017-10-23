<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $title = "USER SKP ONLINE";
	public $subtitle = " USER SKP ONLINE";
	public $folderform = "login/login_form";

	
	private function _data()
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'password' => $this->input->post('password'),	
		);
		return $data;
	}
	
	
		public function index()
	{
		$this->load->model('pegawai_model','data');
		
		$data['judul'] = 'Buat Data Pegawai';
		$data['sub'] = 'Badan Kepegawaian Daerah';
		$data['record'] = $this->data->get_new();
		$data['action'] = 'login/masuk';
		
		$this->load->view('pegawai_form', $data);
	}
	
	public function masuk()
	{
		$id = $this->uri->segment(3);
		
		$data['judul'] = 'Ubah Data '.$this->title;
		$data['sub'] = $this->subtitle;
		$data['record'] = $this->database->get_id($id);
		$data['action'] = 'dashboard/index'.$id;
		
		$data['content'] = $this->folderform;
		
		$this->load->view('login_form', $data);
	}


	public function cek_nip($str)
	{
	$id = $this->uri->segment(3);
	$nip = $this->database->get_nip($str,$id);
	if($nip){
			$this->form_validation->set_message('cek_nip','{field} sudah ada kodenya');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}