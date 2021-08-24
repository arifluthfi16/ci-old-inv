<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_pengguna extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->admin_login) {
			$this->session->set_flashdata('warning', 'Silahkan login untuk melanjutkan.');
			redirect(site_url('indonesia'));
		}
		$this->load->model('model_pengguna');
	}

	public function index($offset = 0) {
		$css = array(
		    'assets/plugins/datatables/dataTables.bootstrap4.min.css'
		    );
		$data['js'] = array(
		    'assets/plugins/datatables/jquery.dataTables.min.js',
		    'assets/js/lozad.min.js',
		    'assets/plugins/datatables/dataTables.bootstrap4.min.js',
		    );
 
		$data['result'] = $this->model_pengguna->show();

		$data['curr_page'] = ($offset != '') ? $offset + 1: 1;
		$data['query'] = '';

		$this->load->view('admin/layout/header', array('title' => 'Kelola Pengguna', 'menu' => 'kelola_pengguna', 'css' => $css));
		$this->load->view('admin/kelola_pengguna/list', $data);
	}

	public function delete($id = 0) {
		$referred_from = $this->agent->referrer();
		if($id == 0) {
			$this->session->set_flashdata('info', 'Pengguna tidak ditemukan.');
		} else {
			if($id == $this->session->admin_id) {
				$this->session->set_flashdata('info', 'Tidak bisa menghapus diri sendiri.');
			} else {
				if($this->model_pengguna->delete($id)) {
					$this->session->set_flashdata('sukses', 'Berhasil menghapus pengguna.');
				} else {
					$this->session->set_flashdata('error', 'Gagal menghapus pengguna.');
				}
			}
		}
		redirect($referred_from, 'refresh');
	}
 
	public function tambah() {
		if($this->input->post('submit')) { 
			// validasi

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required'); 
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_cek_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('cpassword', 'Konfirmasi Password', 'trim|required|matches[password]');   

			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/header', array('title' => 'Tambah Pengguna', 'menu' => 'kelola_pengguna'));
				$this->load->view('admin/kelola_pengguna/tambah');
			} else {

				$data['name'] = $this->input->post('nama'); 
				$data['email'] = $this->input->post('email');
				$data['password'] = encrypt_password($this->input->post('password'));   

				if($this->model_pengguna->insert($data)) {
					$this->session->set_flashdata('sukses', 'Berhasil menambah pengguna.');
				} else {
					$this->session->set_flashdata('error', 'Gagal menambah pengguna.');
				}
				redirect(site_url('admin/kelola_pengguna'), 'refresh');
			}
		} else {
			$this->load->view('admin/layout/header', array('title' => 'Tambah Pengguna', 'menu' => 'kelola_pengguna'));
			$this->load->view('admin/kelola_pengguna/tambah'); 
		}
	}

	public function edit($id = 0) {

		$data['pengguna'] = $this->model_pengguna->get($id);
		if(($id == 0) || (!$data['pengguna'])) {
			$this->session->set_flashdata('info', 'Pengguna tidak ditemukan.');
			redirect(site_url('admin/kelola_pengguna'), 'refresh');
		} 

		
		$data['id'] = $id;
		if($this->input->post('submit')) {

			$data_edit['name'] = $this->input->post('nama'); 
			$data_edit['email'] = $this->input->post('email');    
			$data_edit['phone_number'] = $this->input->post('phone_number');    

			// validasi

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('phone_number', 'Whatsapp', 'trim|required|numeric');
 
			if($data['pengguna']->email != $data_edit['email']) {
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_cek_email');
			}  
			if($this->input->post('password') != '') {
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('cpassword', 'Konfirmasi Password', 'trim|required|matches[password]');
				$data_edit['password'] = encrypt_password($this->input->post('password'));
			}
 
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/header', array('title' => 'Edit Pengguna - ' . $data['pengguna']->name, 'menu' => 'kelola_pengguna'));
				$this->load->view('admin/kelola_pengguna/edit', $data);
			} else {

				if($this->model_pengguna->update($data_edit, $id)) {
					$this->session->set_flashdata('sukses', 'Berhasil mengubah pengguna.');
				} else {
					$this->session->set_flashdata('error', 'Gagal mengubah pengguna.');
				}
				redirect(site_url('admin/kelola_pengguna'), 'refresh');
			}
		} else {
			$this->load->view('admin/layout/header', array('title' => 'Edit Pengguna - ' . $data['pengguna']->name, 'menu' => 'kelola_pengguna'));
			$this->load->view('admin/kelola_pengguna/edit', $data); 
		}
	
	}

	// Helper functions
	public function get_latest_id() {
		$result = $this->model_pengguna->getLatestID();
		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($result[0]));
		return $result;
	}

	// callback username dan password
	public function cek_username($username) {
		if($this->model_pengguna->cek_username($username)) {
			$this->form_validation->set_message('cek_username', 'Username sudah ada yang menggunakan.');
			return false;
		} else {
			return true;
		}
	}

	public function cek_email($email) {
		if($this->model_pengguna->getByEmail($email)) {
			$this->form_validation->set_message('cek_email', 'Email sudah ada yang menggunakan.');
			return false;
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('email' => $email)));
			return true;
		}
	}
}