<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'dashboard/';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_m', 'data');
		$this->load->helper('my_helper');
		signin();
	}
	
	public function index()
	{
		$data['head'] 		= 'Dashboard';
		$data['record'] 	= $this->data->get_all();
		$data['content'] 	= $this->folder.'default';
		//$data['style'] 	= $this->folder.'style';
		//$data['js'] 		= $this->folder.'js';
		$this->load->view('template', $data);
	}
}