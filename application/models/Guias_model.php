<?php

class Guias_model extends CI_Model { 
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }
   public function update($data){
        $this->db->where('id_recurso', $data['id_recurso']);
        $this->db->update('tc_guia_recursos', $data);
   }
}

