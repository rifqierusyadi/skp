<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $title = "USER SKP ONLINE";
	public $subtitle = " USER SKP ONLINE";
	public $folderview = "dashboard/dashboard_view";
	

	public function index()
	{
		$data['judul'] = $this->title;
		$data['sub'] = $this->subtitle;
		$data['content'] = $this->folderview;
		
		$this->load->view('template',$data);
	}

}