<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_transparansi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->admin_login) {
			$this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
			redirect(site_url('indonesia'));
		}
		$this->load->model('model_transparansi');
	}

	public function index($offset = 0) {
		$css = array(
		    'assets/plugins/datatables/dataTables.bootstrap4.min.css'
		    );
		$data['js'] = array(
		    'assets/plugins/datatables/jquery.dataTables.min.js',
		    'assets/plugins/datatables/dataTables.bootstrap4.min.js' 
		    );
 
		$data['result'] = $this->model_transparansi->show();
		$data['curr_page'] = ($offset != '') ? $offset + 1: 1;
		$data['query'] = '';

		$this->load->view('admin/layout/header', array('title' => 'Kelola Transparansi', 'menu' => 'kelola_transparansi', 'css' => $css));
		$this->load->view('admin/kelola_transparansi/list', $data);
	}

	public function delete($id = 0) {
		$referred_from = $this->agent->referrer();
		$data = $this->model_transparansi->get($id);
		if($id == 0) {
			$this->session->set_flashdata('info', 'Transparansi tidak ditemukan.');
		} else { 
			if($this->model_transparansi->delete($id)) {
				$this->session->set_flashdata('sukses', 'Berhasil menghapus transparansi.');
			} else {
				$this->session->set_flashdata('error', 'Gagal menghapus transparansi.');
			} 
		}
		redirect($referred_from, 'refresh');
	}
 
	public function tambah() {
		$css = array();
		$data['js'] = array(
		    'assets/plugins/ckeditor5/ckeditor.js' 
		    );
		if($this->input->post('submit')) { 
			// validasi 
			$this->form_validation->set_rules('title', 'title', 'trim|required');   
			$this->form_validation->set_rules('short_desc', 'short_desc', 'trim|required');      
			$this->form_validation->set_rules('content', 'content', 'trim|required');     

			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/header', array('title' => 'Tambah Transparansi', 'menu' => 'kelola_transparansi'));
				$this->load->view('admin/kelola_transparansi/tambah', $data);
			} else {

				$data_tambah['title'] = $this->input->post('title'); 
				$data_tambah['short_desc'] = $this->input->post('short_desc');  
				$data_tambah['content'] = $this->input->post('content');   

				

				//upload thumbnail
				$config_upload = array(
				    'upload_path' => FCPATH . 'uploads/transparansi/',
				    'allowed_types' => "png|jpg|jpeg",
				    'file_ext_tolower' => TRUE, 
				    'encrypt_name' => TRUE
				);
				$this->load->library('upload', $config_upload);   
				$url = '';
				$error_uploading = false;
				if($this->upload->do_upload('thumbnail')){
					$data_upload = $this->upload->data();  
					$url = base_url('uploads/transparansi/' . $data_upload['file_name']);
				} else{
					$error_uploading = strip_tags($this->upload->display_errors());
				}

				if(!$error_uploading){ 
					$data_tambah['thumbnail'] = $url;   
				}

				if($this->model_transparansi->insert($data_tambah)) {
					$this->session->set_flashdata('sukses', 'Berhasil menambah transparansi.');
				} else {
					$this->session->set_flashdata('error', 'Gagal menambah transparansi.');
				}
				redirect(site_url('admin/kelola_transparansi'), 'refresh');
			}
		} else {
			$this->load->view('admin/layout/header', array('title' => 'Tambah Transparansi', 'menu' => 'kelola_transparansi'));
			$this->load->view('admin/kelola_transparansi/tambah', $data); 
		}
	}

	public function edit($id = 0) {
		$css = array();
		$data['js'] = array(
		    'assets/plugins/ckeditor5/ckeditor.js' 
		    );
		$data['transparansi'] = $this->model_transparansi->get($id);
		if(($id == 0) || (!$data['transparansi'])) {
			$this->session->set_flashdata('info', 'Transparansi tidak ditemukan.');
			redirect(site_url('admin/kelola_transparansi'), 'refresh');
		} 
		$data['id'] = $id;
		if($this->input->post('submit')) {

			$data_edit['title'] = $this->input->post('title'); 
			$data_edit['short_desc'] = $this->input->post('short_desc');  
			$data_edit['content'] = $this->input->post('content');   
    
			// validasi 
			$this->form_validation->set_rules('title', 'title', 'trim|required');   
			$this->form_validation->set_rules('short_desc', 'short_desc', 'trim|required');      
			$this->form_validation->set_rules('content', 'content', 'trim|required');       
  
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/header', array('title' => 'Edit Transparansi - ' . $data['transparansi']->title, 'menu' => 'kelola_transparansi'));
				$this->load->view('admin/kelola_transparansi/edit', $data);
			} else {

				//upload thumbnail
				$config_upload = array(
				    'upload_path' => FCPATH . 'uploads/transparansi/',
				    'allowed_types' => "png|jpg|jpeg",
				    'file_ext_tolower' => TRUE, 
				    'encrypt_name' => TRUE
				);
				$this->load->library('upload', $config_upload);   
				$url = '';
				$error_uploading = false;
				if($this->upload->do_upload('thumbnail')){
					$data_upload = $this->upload->data();  
					$url = base_url('uploads/transparansi/' . $data_upload['file_name']);
				} else{
					$error_uploading = strip_tags($this->upload->display_errors());
				}

				if(!$error_uploading){ 
					$data_edit['thumbnail'] = $url;   
				}

				if($this->model_transparansi->update($data_edit, $id)) {
					$this->session->set_flashdata('sukses', 'Berhasil mengubah transparansi.');
				} else {
					$this->session->set_flashdata('error', 'Gagal mengubah transparansi.');
				}
				redirect(site_url('admin/kelola_transparansi'), 'refresh');
			}
		} else {
			$this->load->view('admin/layout/header', array('title' => 'Edit Transparansi - ' . $data['transparansi']->title, 'menu' => 'kelola_transparansi'));
			$this->load->view('admin/kelola_transparansi/edit', $data); 
		}
	} 

	public function upload_gambar(){
		$config_upload = array(
		    'upload_path' => FCPATH . 'uploads/transparansi/',
		    'allowed_types' => "png|jpg|jpeg",
		    'file_ext_tolower' => TRUE, 
		    'encrypt_name' => TRUE
		);
		$this->load->library('upload', $config_upload);  
		$file_name = '';
		$url = '';
		$error_uploading = false;
		if($this->upload->do_upload('upload')){
			$data_upload = $this->upload->data(); 
			$file_name = $data_upload['file_name'];
			$url = base_url('uploads/transparansi/' . $data_upload['file_name']);
		}  else{
			$error_uploading = strip_tags($this->upload->display_errors());
		}
		if(!$error_uploading){
			echo json_encode(array(
				"uploaded" => 1,
				"fileName" => $file_name,
				"url" => $url 
			));
		}else{ 
			echo json_encode(array("error" => array("message" => $error_uploading )));
		}
	}

	public function get_latest_id() {
		$result = $this->model_transparansi->getLatestID();
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($result[0]));
		return $result;
	}
}