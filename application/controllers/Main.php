<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('model_pengguna'); 
	}

	public function index(){
		$response['app_name'] = 'Vanameid';  
		$response['version'] = '1.0';  
		$response['term_of_service'] = 'https://vaname.id/main/term_of_service';  
		$response['privacy_policy'] = 'https://vaname.id/main/privacy_policy';  
		$response['support'] = 'support@vaname.id';  
		$this->output_json($response, 200); 
	} 
 
	public function privacy_policy(){  
		$this->load->view("privacy_policy");
	} 
	public function term_of_service(){  
		$this->load->view("term_of_service");
	} 

	public function get_pdf_agreement($token = '') { 
		$this->load->model('model_investasi'); 
		$data['data_user'] = $this->model_investasi->get_user_data_by_token($token);
		if(isset($data['data_user']->name)){
			$this->load->view('pdf/perjanjian', $data);
		}else{
			echo "data tidak ditemukan";
		}
	}   

	public function transparansi($id = 0) {  
		$this->load->model('model_transparansi'); 
		$data['transparansi'] = $this->model_transparansi->get($id); 
		$this->load->view("webview_transparansi", $data);
	}   
}