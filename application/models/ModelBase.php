<?php

class ModelBase extends CI_Model{
    
    public $table = '';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function findAll(){
        
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();
        
        return $query->result();
    }
}

