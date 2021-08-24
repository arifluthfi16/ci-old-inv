<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_investasi extends MY_Model {

	public function __construct() {
		parent::__construct();
		$this->pegawai_id = $this->session->pegawai_id;
		$this->tabel = 'investor';  
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
	
	public function update_earn($earn, $id) {
		$e_id = $this->db->escape($id);
		$e_earn = $this->db->escape($earn);
		return $this->db->query("UPDATE `crowdfunding` SET earn = earn + $e_earn WHERE id = $e_id");
	} 

	public function get($id) {
		return $this->db->where('id', $id)->get($this->tabel)->row();
	} 

	public function get_my_user_id($user_id, $crowdfund_id) {
		return $this->db->where('user_id', $user_id)->where('crowdfund_id', $crowdfund_id)->get($this->tabel)->row();
	} 
	public function get_active_crowdfund() {
		return $this->db->where('active_now', 1)->get("crowdfunding")->row();
	} 

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete($this->tabel);
	}
 
	public function show_by_crowdid($crowdfund_id, $limit = 0, $offset = 0) {
		$this->db->select("investor.*, users.name, users.email");
		$this->db->join("users", "users.id = investor.user_id", "left");
		$this->db->where('crowdfund_id', $crowdfund_id);
		if($limit != 0) {
			$query = $this->db->limit($limit, $offset)->get($this->tabel);
		} else {
			$query = $this->db->get($this->tabel);
		}
		return $query->result();
	}

	public function get_user_data_by_token($xtoken) {
		$this->db->select("crowdfunding.id as cf_id, fund, time_submited, title, desc, name, email, phone_number, xtoken");
		$this->db->join("users", "users.id = investor.user_id");
		$this->db->join("crowdfunding", "crowdfunding.id = investor.crowdfund_id");
		$this->db->where("xtoken", $xtoken);
		return $this->db->get($this->tabel)->row();
	}
 
	public function getLatestID() {
		$this->db->select_max('id');
		return $this->db->get($this->tabel)->result();
	}
}