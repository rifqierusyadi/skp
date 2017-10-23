<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	/**
	 * code by rifqie rusyadi
	 * email rifqie.rusyadi@gmail.com
	 */
	public $folder = 'auth/';
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('dashboard_m', 'data');
		//signin();
	}
	
	public function index()
	{
		$this->load->view('auth/default');
	}
}