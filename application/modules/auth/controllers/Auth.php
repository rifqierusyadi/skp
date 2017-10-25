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

	public function login()
	{
		$validation = array(
			array('field'=>'email', 'rules'=>'required|valid_email'),
			array('field'=>'password','rules'=>'required')
		);
		
		$this->form_validation->set_rules($validation);
		if($this->form_validation->run() == TRUE){
			//$email_post = $this->input->post('email');
			//$pass_post = $this->input->post('password');
			$json = array();
			//$url = 'http://localhost/pegawai/api/auth?email=admin@admin.com';
			$url = 'https://simpeg.kalselprov.go.id/api/auth?email='.$this->input->post('email');
			$data = file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
			if($data){
				$json = json_decode($data);
				$email_post = $json[0]->email;
				$pass_post = $this->input->post('password');
			}else{
				$this->session->set_flashdata('flasherror','Email/Password Tidak Ditemukan');
				$this->index();
			}
			if($this->_resolve_user_login($email_post, $pass_post, $json)){
				
				//$user_ID = $this->_get_userID($email_post);
				//$username = $this->_get_username($email_post);
				$ip_address = $this->input->ip_address();
				//$level = $this->_get_level($email_post);
				
				$create_session = array(
					//'userID'=> $user_ID,
					'username' => $json[0]->username,
					'name' => $json[0]->name,
					'ip_address'=> $ip_address,
					'signin' => TRUE,
					'level' => $json[0]->class
				);
				
				$this->session->set_userdata($create_session);
				//helper_log("login", "Login Pada Sistem");
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('flasherror','Email/Password Tidak Ditemukan.');
				$this->index();
			}
		}else{
			$this->session->set_flashdata('flasherror', validation_errors('<div class="error">', '</div>'));
			$this->index();
		}
	}

	private function _resolve_user_login($email_post, $pass_post, $json)
	{
		//$hash = str_replace('\\','',$json['password']);
		$hash = $json[0]->password;
		return $this->_verify_password_hash($pass_post, $hash);
    }
    
    private function _verify_password_hash($pass_post, $hash)
	{
		return password_verify($pass_post, $hash);	
	}

	public function logout()
	{
		$this->session->unset_userdata('userID');
		$this->session->unset_userdata('password');
		$this->session->sess_destroy();
		//helper_log("logout", "Logout Pada Sistem");
		redirect('login');
	}

	// public function text()
	// {
	// 	$json = array();
	// 	$url = 'https://simpeg.kalselprov.go.id/api/auth?email=admin@admin.com';
	// 	$data = file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
	// 	$json = json_decode($data);
	// 	$email_post = $json['email'];
	// 	var_dump($json[0]->password);
	// }
}