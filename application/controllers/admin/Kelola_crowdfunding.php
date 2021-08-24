<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_crowdfunding extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->admin_login) {
			$this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
			redirect(site_url('indonesia'));
		}
		$this->load->model('model_crowdfunding');
	}

	public function index($offset = 0) {
		$css = array(
		    'assets/plugins/datatables/dataTables.bootstrap4.min.css'
		    );
		$data['js'] = array(
		    'assets/plugins/datatables/jquery.dataTables.min.js',
		    'assets/plugins/datatables/dataTables.bootstrap4.min.js' 
		    );
 
		$data['result'] = $this->model_crowdfunding->show();
		$data['curr_page'] = ($offset != '') ? $offset + 1: 1;
		$data['query'] = '';

		$this->load->view('admin/layout/header', array('title' => 'Kelola Crowdfunding', 'menu' => 'kelola_crowdfunding', 'css' => $css));
		$this->load->view('admin/kelola_crowdfunding/list', $data);
	}

	public function delete($id = 0) {
		$referred_from = $this->agent->referrer();
		$data = $this->model_crowdfunding->get($id);
		if($id == 0) {
			$this->session->set_flashdata('info', 'Crowdfunding tidak ditemukan.');
		} else {
			if($data->active_now == 1) {
				$this->session->set_flashdata('info', 'Tidak bisa menghapus crowd funding yang sedang aktif.');
			} else {
				if($this->model_crowdfunding->delete($id)) {
					$this->session->set_flashdata('sukses', 'Berhasil menghapus crowdfunding.');
				} else {
					$this->session->set_flashdata('error', 'Gagal menghapus crowdfunding.');
				}
			}
		}
		redirect($referred_from, 'refresh');
	}
 
	public function tambah() {
		if($this->input->post('submit')) { 
			// validasi 
			$this->form_validation->set_rules('title', 'title', 'trim|required');   
			$this->form_validation->set_rules('need', 'need', 'trim|required|numeric');     
			$this->form_validation->set_rules('desc', 'desc', 'trim|required');     

			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/header', array('title' => 'Tambah Crowdfunding', 'menu' => 'kelola_crowdfunding'));
				$this->load->view('admin/kelola_crowdfunding/tambah');
			} else {

				$data['title'] = $this->input->post('title'); 
				$data['need'] = $this->input->post('need');  
				$data['desc'] = $this->input->post('desc');  

				if($this->input->post('active_now')){
					$this->model_crowdfunding->update_active();
					$data['active_now'] = 1;
				} 

				if($this->model_crowdfunding->insert($data)) {
					$this->session->set_flashdata('sukses', 'Berhasil menambah crowdfunding.');
				} else {
					$this->session->set_flashdata('error', 'Gagal menambah crowdfunding.');
				}
				redirect(site_url('admin/kelola_crowdfunding'), 'refresh');
			}
		} else {
			$this->load->view('admin/layout/header', array('title' => 'Tambah Crowdfunding', 'menu' => 'kelola_crowdfunding'));
			$this->load->view('admin/kelola_crowdfunding/tambah'); 
		}
	}

	public function edit($id = 0) {
		$data['crowdfunding'] = $this->model_crowdfunding->get($id);
		if(($id == 0) || (!$data['crowdfunding'])) {
			$this->session->set_flashdata('info', 'Crowdfunding tidak ditemukan.');
			redirect(site_url('admin/kelola_crowdfunding'), 'refresh');
		} 
		$data['id'] = $id;
		if($this->input->post('submit')) {

			$data_edit['title'] = $this->input->post('title'); 
			$data_edit['earn'] = $this->input->post('earn');  
			$data_edit['desc'] = $this->input->post('desc');  
			$data_edit['need'] = $this->input->post('need');  

			if($this->input->post('active_now')){
				$this->model_crowdfunding->update_active();
				$data_edit['active_now'] = 1;
			}    
			// validasi 
			$this->form_validation->set_rules('title', 'title', 'trim|required');   
			$this->form_validation->set_rules('earn', 'earn', 'trim|required|numeric');     
			$this->form_validation->set_rules('desc', 'desc', 'trim|required');   
			$this->form_validation->set_rules('need', 'need', 'trim|required');   
  
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/header', array('title' => 'Edit Crowdfunding - ' . $data['crowdfunding']->title, 'menu' => 'kelola_crowdfunding'));
				$this->load->view('admin/kelola_crowdfunding/edit', $data);
			} else {

				if($this->model_crowdfunding->update($data_edit, $id)) {
					$this->session->set_flashdata('sukses', 'Berhasil mengubah crowdfunding.');
				} else {
					$this->session->set_flashdata('error', 'Gagal mengubah crowdfunding.');
				}
				redirect(site_url('admin/kelola_crowdfunding'), 'refresh');
			}
		} else {
			$this->load->view('admin/layout/header', array('title' => 'Edit Crowdfunding - ' . $data['crowdfunding']->title, 'menu' => 'kelola_crowdfunding'));
			$this->load->view('admin/kelola_crowdfunding/edit', $data); 
		}
	} 

	public function get_latest_id() {
		$result = $this->model_crowdfunding->getLatestID();
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($result[0]));
		return $result;
	}
}