<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	
	
	public function index()
	{
		$this->load->model('pegawai_model','data');
		
		$data['judul'] = 'Daftar Pegawai';
		$data['sub'] = 'Badan Kepegawaian Daerah';
		$data['record'] = $this->data->get_data();
		
		$this->load->view('pegawai_view', $data);
	}
	
	public function created()
	{
		$this->load->model('pegawai_model','data');
		
		$data['judul'] = 'Buat Data Pegawai';
		$data['sub'] = 'Badan Kepegawaian Daerah';
		$data['record'] = $this->data->get_new();
		$data['action'] = 'pegawai/save';
		
		$this->load->view('pegawai_form', $data);
	}
	
	public function save()
	{
		$this->load->model('pegawai_model','data');
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
		);
		
		$this->data->simpan($data);
		redirect('pegawai');
	}
	
	public function updated()
	{
		$this->load->model('pegawai_model','data');
		
		$id = $this->uri->segment(3);
		
		$data['judul'] = 'Ubah Data Pegawai';
		$data['sub'] = 'Badan Kepegawaian Daerah';
		$data['record'] = $this->data->get_id($id);
		$data['action'] = 'pegawai/edit/'.$id;
		
		$this->load->view('pegawai_form', $data);
	}
	
	public function edit()
	{
		$this->load->model('pegawai_model','data');
		$id = $this->uri->segment(3);
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
		);
		
		$this->data->ubah($id, $data);
		redirect('pegawai');
	}
	
	public function deleted()
	{
		$this->load->model('pegawai_model','data');
		$id = $this->uri->segment(3);
		
		$this->data->hapus($id);
		redirect('pegawai');
	}
}
