<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	
	public $folder = 'referensi/instansi/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('instansi_m', 'data');
		signin();
		group(array('1'));
	}
	
	//halaman index
	public function index()
	{   
        $data['head'] 		= 'Referensi Instansi';
		$data['record'] 	= FALSE;
		$data['content'] 	= $this->folder.'default';
		$data['style'] 		= $this->folder.'style';
		$data['js'] 		= $this->folder.'js';
		
		$this->load->view('template', $data);
	}
}
