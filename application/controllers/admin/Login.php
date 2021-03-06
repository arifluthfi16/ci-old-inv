<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('model_admin');
		if($this->agent->is_robot()) {
			$this->output->set_status_header('404');
		}
	}

	public function index() {
		$this->load->view('admin/login/login');
	}

	public function check() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$result = $this->model_admin->getLogin($username);
		if($result) { 
			$result = $result[0];	
			if(password_verify($password, $result->password)) { 
				$session_data = array(
						'admin_id' => $result->id,
						'admin_login' => true,
						'admin' => true,
					);
				$this->session->set_userdata($session_data); 
				if($result->hak_akses == 'admin'){
					redirect(site_url('admin/dashboard')); 
				}else{
					redirect(site_url('staff/dashboard'));					
				}	
			} else {
				$this->session->set_flashdata('warning', 'Email atau Password salah.');
				redirect(site_url('indonesia'), 'refresh');
			}
		} else {
			$this->session->set_flashdata('warning', 'Pengguna tidak ditemukan.');
			redirect(site_url('indonesia'), 'refresh');
		}
	}

	public function destroy() {
		$session = array('user_id', 'user_login', 'user');
		$this->session->unset_userdata($session);
		$this->session->set_flashdata('warning','Anda berhasil logout!');
		redirect(site_url('indonesia'));
	}

}