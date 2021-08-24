<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->admin_login) {
			redirect(site_url('indonesia'));
		}   
	}

	public function index() {    
		$data['js'] = array(
			'assets/plugins/raphael/raphael.min.js', 
			'assets/plugins/morris.js/morris.min.js' 
		); 
		$css = array(
			'assets/plugins/morris.js/morris.css'
		);  
		$this->load->view('admin/layout/header', array('menu' => 'dashboard', 'title' => 'Dashboard Admin', 'css' => $css));
		$this->load->view('admin/dashboard', $data);
	}



}