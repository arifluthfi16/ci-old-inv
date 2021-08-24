<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_faq extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->pegawai_id = $this->session->pegawai_id;
		$this->admin_id = $this->session->admin_id;
		$this->tabel = 'faq';
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
	
	public function get($id) {
		return $this->db->where('id', $id)->get($this->tabel)->row();
	} 

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete($this->tabel);
	}

	public function show($limit = 0, $offset = 0) { 
    	if($limit != 0) {
			$query = $this->db->limit($limit, $offset)->get($this->tabel);
		} else {
			$query = $this->db->get($this->tabel);
		}
		return $query->result();
	}  
 
	public function showByCategory($category = '', $limit = 0, $offset = 0) { 
		$this->db->where('kategori', $category);
    	if($limit != 0) {
			$query = $this->db->limit($limit, $offset)->get($this->tabel);
		} else {
			$query = $this->db->get($this->tabel);
		}
		return $query->result();
	}  
 
  
}