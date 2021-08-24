<?php
class Logout extends MY_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('model_pengguna');
	}

	public function index(){
		$response = 'Failed request';  
		$this->output_json($response, 404); 
	}
 
	public function destroy() {
		$session = array('admin_id', 'admin_login', 'admin');
		
		$this->session->unset_userdata($session);
		$response = array('sukses' => true); 
		redirect(base_url('login')); 
	}
}