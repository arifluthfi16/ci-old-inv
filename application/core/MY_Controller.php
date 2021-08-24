<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
	}

	protected function output_json($message, $status){
		header('Access-Control-Allow-Origin: https://smartpesantren.com');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		header("Access-Control-Allow-Credentials: true");
		$this->output
		        ->set_status_header($status)
		        ->set_content_type('application/json', 'utf-8')
		        ->set_output(json_encode($message, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		        ->_display();
		exit;
	}


	protected function token_get($tokenData) { 
        $token = AUTHORIZATION::generateToken($tokenData);  
        return $token;
    }

    protected function token_post() {

		$headers = $this->input->request_headers();

			$conditions = array_key_exists('Authorization', $headers) && !empty($headers['Authorization']) || array_key_exists('authorization', $headers) && !empty($headers['authorization']);
			if ($conditions) {
				$tokens = (isset($headers['Authorization'])) ? $headers['Authorization'] : $headers['authorization'];
				$jwt = explode( ' ', $tokens)[1];

				try { 
					$decodedToken = AUTHORIZATION::validateToken($jwt);
					// $this->output_json($decodedToken->id, 401); 
					if ($decodedToken != false) {  
							return $decodedToken;
					}
				} catch (Exception $e) { 
					$this->output_json($e, 401); 
				}

			}else{
				$this->output_json("Unauthorized", 401); 
			}
			
	}  

}