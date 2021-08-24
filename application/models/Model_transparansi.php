<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transparansi extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->pegawai_id = $this->session->pegawai_id;
		$this->admin_id = $this->session->admin_id;
		$this->tabel = 'transparansi';
	}

	public function count() {
		return $this->db->get($this->tabel)->num_rows();
	}

	public function insert($data = array()) { 
		$this->db->insert($this->tabel, $data);
		return $this->db->insert_id();
	}

	public function update($data = array(), $id) {
		$this->db->where('id', $id);
		return $this->db->update($this->tabel, $data);
	} 
	public function update_active() { 
		return $this->db->update($this->tabel, array("active_now" => 0));
	} 

	public function get($id) {
		return $this->db->where('id', $id)->get($this->tabel)->row();
	} 

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete($this->tabel);
	}

	public function show($limit = 0, $offset = 0) { 
		$query = $this->db->get($this->tabel); 
		return $query->result();
	}  

	public function show_selected() { 
		$this->db->select("id, title, short_desc, thumbnail,  DATE_FORMAT(published_date,'%d/%m/%Y %H:%i') as published_date");
		$query = $this->db->get($this->tabel); 
		return $query->result();
	}  
 
	public function getLatestID() {
		$this->db->select_max('id');
		return $this->db->get($this->tabel)->result();
	}
}