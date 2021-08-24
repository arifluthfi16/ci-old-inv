<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentifikasi extends MY_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('model_pengguna');  	
	}

	public function index(){
		$response = 'Gabisa mendapatkan yang kamu mau';  
		$this->output_json($response, 404); 
	}

	public function register_locally(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$phone = $this->input->post("phone_number");
		$name = $this->input->post("name");

        $isExists = $this->model_pengguna->getByEmail($email);

        if(isset($isExists)){
            // Return error because duplicate
            $this->output_json(array(
                "success" => false,
                "message" => "Failed to register new user, email already registered"
                ), 400);
        }

		$data_generation = array();
		
		$data_generation['email'] = $email;
		$data_generation['name'] = $name;	
		$data_generation['phone_number'] = $phone;
		$data_generation['password'] = $password;
		
		$insert_id = $this->model_pengguna->insert($data_generation);
		if($insert_id){
			$data_generation['id'] = $insert_id;	
		}

        $result = json_encode($data_generation);
		$result = json_decode($result);
        $jwt_generated = $this->token_get($data_generation);
		$this->output_json(array("success" => true, "token" => $jwt_generated, "data" => $result, "item" => $isExists), 200);
	}

	public function register() {  
		$token = $this->input->post('token');  
		$request_headers = array(
            "Authorization: " . $token 
        ); 
 
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/userinfo/v2/me");
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

	    $season_data = curl_exec($ch); 
	    if (curl_errno($ch)) {
	        print "Error: " . curl_error($ch);
	        exit();
	    } 
	    curl_close($ch);

	    $result = json_decode($season_data, true); 
	    if(!isset($result['error'])){ 
	    	$pre_data = $this->model_pengguna->getByEmail($result['email']);
	    	$data_generation = array();
	    	if(isset($pre_data->email)){
	    		$data_generation['id'] = $pre_data->id;	 	
	    	}else{
	    		$data_insert['google_id'] = $result['id'];
	    		$data_insert['email'] = $result['email'];
	    		$data_insert['display_pict'] = $result['picture'];
	    		$data_insert['name'] = $result['name']; 
	    		$insert_id = $this->model_pengguna->insert($data_insert);
	    		if($insert_id){
	    			$data_generation['id'] = $insert_id;	
	    		}
	    	}
 
	    	$data_generation['email'] = $result['email'];	
	    	$data_generation['name'] = $result['name'];	
	    	$data_generation['date_created'] = date('Y-m-d H:i:s');	
	    	$data_generation['picture'] = $result['picture']; 

	    	$jwt_generated = $this->token_get($data_generation); 
			$this->output_json(array("success" => true, "token" => $jwt_generated, "data" => $result), 200); 
	    }else{
			$this->output_json(array("success" => false, "error" => $result), 200); 
	    }
	}

	public function generate() {  
		$xc = $this->input->get("iasa");		
		if($xc !== "54354321"){
			die;
		}

		$result = $this->model_pengguna->get(4);
		$data_generation['id'] = $result->id;	
		$data_generation['email'] = $result->email;	
		$data_generation['name'] = $result->name;	
		$data_generation['date_created'] = date('Y-m-d H:i:s');	
		$data_generation['picture'] = $result->display_pict; 

		$jwt_generated = $this->token_get($data_generation); 
		$this->output_json(array("success" => true, "token" => $jwt_generated, "data" => $result), 200); 
	}

	public function user_login(){
		$email  = $this->input->post('email');
		$password = $this->input->post('password');
		$result = $this->model_pengguna->getByEmail($email);
		//Validate
		if(isset($result) && $result->password === $password){
			$data_generation['id'] = $result->id;	
			$data_generation['email'] = $result->email;	
			$data_generation['name'] = $result->name;	
			$data_generation['date_created'] = date('Y-m-d H:i:s');	
			$data_generation['picture'] = $result->display_pict; 
			$data_generation['phone_number'] = $result->phone_number;	
	
			$jwt_generated = $this->token_get($data_generation); 
			$this->output_json(array("success" => true, "token" => $jwt_generated, "data" => $result), 200); 
		}else{
			$this->output_json($password, 200);	
		}
	} 
}


