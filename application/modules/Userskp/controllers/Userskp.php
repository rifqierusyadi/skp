<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userskp extends CI_Controller {

	public $title = "USER SKP ONLINE";
	public $subtitle = " USER SKP ONLINE";
	public $folderview = "userskponline/userskp_view";
	public $folderform = "userskponline/userskp_form";

	
	public function __construct()
	{
		parent::__construct();
		//untuk memanggil model dengan nama alias database
		$this->load->model('Userskp_model','database');
	}
	
	private function _data()
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'pangkat' => $this->input->post('pangkat'),
			'golongan_ruang' => $this->input->post('golongan_ruang'),
			'jabatan' => $this->input->post('jabatan'),
			'unitkerja' => $this->input->post('unitkerja'),
			'keterangan' => $this->input->post('keterangan'),
			'created_date' => date("Y-m-d h:i:s",time()+60*60*6),
			'created_id' => 'ID',
			'updated_at' => date("Y-m-d h:i:s",time()+60*60*6),
			'updated_id' => 'ID',
			'deleted_at' => date("Y-m-d h:i:s",time()+60*60*6),
			'deleted_id' => 'ID',
			'active' => $this->input->post('active'),
		);
		return $data;
	}
	
	
	public function index()
	{
		$data['judul'] = $this->title;
		$data['sub'] = $this->subtitle;
		$data['record'] = $this->database->get_data();
		$data['content'] = $this->folderview;
		
		$this->load->view('template', $data);
	}
	
	public function created()
	{
		$data['judul'] = 'Buat Data '.$this->title;
		$data['sub'] = $this->subtitle;
		$data['record'] = $this->database->get_new();
		$data['action'] = 'userskp/save';
		$data['content'] = $this->folderform;
		
		$this->load->view('template', $data);
	}
	
	public function save()
	{
		if($this->_validation()){
			$data = $this->_data();
			$this->database->simpan($data);
			redirect('userskp');
		}else{
			$this->created();
		}
	}
	
	public function updated()
	{
		$id = $this->uri->segment(3);
		
		$data['judul'] = 'Ubah Data '.$this->title;
		$data['sub'] = $this->subtitle;
		$data['record'] = $this->database->get_id($id);
		$data['action'] = 'userskp/edit/'.$id;
		
		$data['content'] = $this->folderform;
		
		$this->load->view('template', $data);
	}
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		if($this->_validation($id)){
			$data = $this->_data();
			$this->database->ubah($id, $data);
			redirect('userskp');
		}else{
			$this->updated();
		}
	}
	
	public function deleted()
	{
		$id = $this->uri->segment(3);
		
		$this->database->hapus($id);
		redirect('userskp');
	}
	
	private function _validation($id=null)
	{
		$this->load->library('form_validation');
	
		if(isset($id)){
			$this->form_validation->set_rules('nip','Masukan NIPnya valid','trim|required|min_length[18]|max_length[18]|callback_cek_nip');
		}else{
			$this->form_validation->set_rules('nip','Masukan NIP Valid','trim|required|min_length[18]|max_length[18]|is_unique[skp_online_users.NIP]');
		}
	
		$this->form_validation->set_rules('password','Masukan password min 8 karakter','trim|required|min_length[8]|max_length[100]|required');
		$this->form_validation->set_rules('email','Email unit kerja','trim|valid_email');
		$this->form_validation->set_rules('nama_lengkap','nama lengkap pegawai','required');
		$this->form_validation->set_rules('pangkat','Pangkat Pegawai','required');
		$this->form_validation->set_rules('golongan_ruang','Golongan Ruang Pegawai','required');
		$this->form_validation->set_rules('jabatan','jabatan Pegawai','required');
		$this->form_validation->set_rules('unitkerja','Unit Kerja Pegawai','required');
		$this->form_validation->set_rules('keterangan','keterangan');
		$this->form_validation->set_rules('active','active');
		
		$this->form_validation->set_message('required','{field} kada boleh kosong!');
		$this->form_validation->set_message('valid_email','{field} format email salah!');
		$this->form_validation->set_message('is_unique','{field} sudah ada yg sama!');
										
		return $this->form_validation->run(); //true sama, false
		
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