<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

use RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Restserver extends RestController {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('ModelBase');
    }
    
    public function table_get($table = ''){
        $array = array('hola', 'mundo');
        $this->ModelBase->table = $table;
        $this->response($this->ModelBase->findAll());
    }
        
}
