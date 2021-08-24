<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();  
		 
		$this->load->model('model_investasi'); 
		$this->load->model('model_transparansi'); 
		$this->config_upload = array(
		    'upload_path' => FCPATH . 'uploads/gambar/',
		    'allowed_types' => "png|jpg|jpeg",
		    'file_ext_tolower' => TRUE, 
		    'encrypt_name' => TRUE
		); 
	}

	public function index(){
		$response = ':D hehe';  
		$this->output_json($response, 404); 
	} 	  

	public function get_user_info(){
		$data_jwt = $this->token_post();
		$user = $this->model_pengguna->get($data_jwt->id); 
		$crowdfund = $this->model_investasi->get_active_crowdfund(); 
		$my_investasi_data = $this->model_investasi->get_my_user_id($data_jwt->id, $crowdfund->id);

		$output['user_id'] = $user->id;
		$output['display_pict'] = $user->display_pict;
		$output['name'] = $user->name;
		$output['email'] = $user->email;
		$output['phone_number'] = $user->phone_number;
		$output['verified'] = $user->verified;
		$output['title'] = $crowdfund->title;
		$output['need'] = $crowdfund->need;
		$output['earn'] = $crowdfund->earn;
		$output['support_phone'] = '08112342087';
		$output['support_email'] = 'support@vaname.id';
		$output['active_now'] = $crowdfund->active_now;
		$output['xtoken'] = isset($my_investasi_data->xtoken) ? $my_investasi_data->xtoken : null;
		$output['my_curr_fund'] = isset($my_investasi_data->fund) ? $my_investasi_data->fund : 0;
		$this->output_json($output, 200);
	}

	public function get_info(){ 
		$data_jwt = $this->token_post();
		$data = $this->model_investasi->get_active_crowdfund();  
		$this->output_json($data, 200);
	} 

	public function update_current_fund(){ 
		$data_jwt = $this->token_post();
		$user_id = $data_jwt->id;
		$this->form_validation->set_rules('fund', 'fund', 'trim|required|numeric|greater_than_equal_to[10000000]');

		$crowdfund_id = $this->model_investasi->get_active_crowdfund()->id;
		$my_investasi_data = $this->model_investasi->get_my_user_id($user_id, $crowdfund_id);
		$fund = $this->input->post("fund");

		if ($this->form_validation->run() == false) { 
			$errors_obj_message = $this->form_validation->error_array(); 
			$this->output_json(array("sukses" => -1, "errors" => $errors_obj_message), 200);
		}  

		$update = false;
		if($this->input->post("insert") && !isset($my_investasi_data->id)){
			$change_fund = $fund; 
			$data_insert_investasi['crowdfund_id'] = $this->model_investasi->get_active_crowdfund()->id;  
			$data_insert_investasi['user_id'] = $user_id;   
			$data_insert_investasi['fund'] = $fund;   
			$data_insert_investasi['xtoken'] = hash('sha256', $user_id . $data_insert_investasi['crowdfund_id']);  
			$data_insert_investasi['fund'] = $fund;   
			 
			$update = $this->model_investasi->insert($data_insert_investasi); 
		}else{
			$change_fund = $fund - $my_investasi_data->fund; 
			$update = $this->model_investasi->update(array("fund" => $fund), $my_investasi_data->id);
		}

		if($update){  
			$this->model_investasi->update_earn($change_fund, $crowdfund_id); 
			$this->output_json(array(
				"sukses" => 1,
				"update_fund" => $fund,
				"change_fund" => "$change_fund",
			), 200);
		} 

		$this->output_json(array(
			"sukses" => 0 
		), 200);

	}

	public function kyc() {   
		$data_jwt = $this->token_post();
		$user_id = $data_jwt->id;
		$this->form_validation->set_rules('phone', 'nomor telepon', 'trim|required|numeric|min_length[9]');
		$this->form_validation->set_rules('fund', 'fund', 'trim|required|numeric|greater_than_equal_to[10000000]');

		$data_update = array();
		$upload_path_url = base_url() . 'uploads/gambar/';
		if(!is_dir($this->config_upload['upload_path'])) mkdir($this->config_upload['upload_path'], 0755, TRUE);  
		$this->load->library('upload', $this->config_upload);  
		$error_uploading = false;
		if($this->upload->do_upload('identity_image')){
			$data_upload = $this->upload->data(); 
			$data_update['identity_image'] = $data_upload['file_name'];
		}  else{
			$error_uploading = strip_tags($this->upload->display_errors());
		}
		if ($this->form_validation->run() == false || $error_uploading) { 
			$errors_obj_message = $this->form_validation->error_array();
			if($error_uploading){
				$errors_obj_message["identity_image"] = $error_uploading;
			}
			$this->output_json(array("sukses" => -1, "errors" => $errors_obj_message), 200);
		} else {	    
			$data_update['verified'] = 1;       
			$data_update['phone_number'] = $this->input->post('phone');       
			$data_insert_investasi['crowdfund_id'] = $this->model_investasi->get_active_crowdfund()->id;  
			$data_insert_investasi['user_id'] = $user_id;   
			$data_insert_investasi['fund'] = $this->input->post('fund');   
			$data_insert_investasi['xtoken'] = hash('sha256', $user_id . $data_insert_investasi['crowdfund_id']);   
			$update = $this->model_pengguna->update($data_update, $user_id);
			$my_investasi_data = $this->model_investasi->get_my_user_id($user_id, $data_insert_investasi['crowdfund_id']);
			if(isset($my_investasi_data->id)){
				$insert = $this->model_investasi->update($data_insert_investasi, $my_investasi_data->id);
				$change_fund =$data_insert_investasi['fund'] - $my_investasi_data->fund; 
				$this->model_investasi->update_earn($change_fund, $data_insert_investasi['crowdfund_id']); 
			}else{
				$insert = $this->model_investasi->insert($data_insert_investasi);
				$this->model_investasi->update_earn($data_insert_investasi['fund'], $data_insert_investasi['crowdfund_id']);
			}
			if($insert) {  
				$data_user = $this->model_pengguna->get($user_id); 
				$this->output_json(array("sukses" => 1, "insert_id" => $insert, "email" => $data_user->email), 200); 
			} else {
				$this->output_json(array("sukses" => 0), 200);
			} 
		} 
	} 

	public function show_investor_data() { 
		$data_jwt = $this->token_post();	
		$crowd_data = $this->model_investasi->get_active_crowdfund();
		$investor_data = $this->model_investasi->show_by_crowdid($crowd_data->id);

		$data['info'] = $crowd_data;
		$data['data'] = $investor_data;
		$this->output_json($data, 200);
	}   

	public function show_transparansi_data() { 
		$data_jwt = $this->token_post(); 
		$transparansi = $this->model_transparansi->show_selected(); 
		$data['data'] = $transparansi;
		$this->output_json( $data, 200);
	}    
}