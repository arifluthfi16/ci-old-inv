<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session','form_validation','user_agent', 'database','pagination');

$autoload['drivers'] = array();
 
$autoload['helper'] = array('url', 'custom', 'form', 'jwt', "authorization", "date");

$autoload['config'] = array('jwt'); 

$autoload['language'] = array();

$autoload['model'] = array('model_pengguna','model_admin');
