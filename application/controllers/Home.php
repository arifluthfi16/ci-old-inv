<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {   
		$data['js'] = array(
			'assets/plugins/badger-accordion/badger-accordion.min.js',
			'assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js',
			'assets/js/axios.min.js',
			'assets/plugins/jvectormap/jquery-jvectormap-asia-merc.js'
		); 
		$css = array(
			'assets/plugins/badger-accordion/badger-accordion.css',
			'assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css'
		);  

		$this->load->model("model_faq");

		$data['data_faq_keuangan'] = $this->model_faq->showByCategory('keuangan');
		$data['data_faq_budidaya'] = $this->model_faq->showByCategory('budidaya');
		$data['data_faq_keamanan'] = $this->model_faq->showByCategory('keamanan');

		$this->load->view('layout/header', array('title' => 'Vanameid Indonesia', 'css' => $css));
		$this->load->view('home', $data);
	}
}
