<?php
class Usuario_model extends CI_Model { 
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }
   public function usuario_por_nombre_contrasena($nombre, $contrasena){
      $this->db->select('id, usuario');
      $this->db->from('tb_usuarios');
      $this->db->where('usuario', $nombre);
      $this->db->where('contrasena', $contrasena);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
   }
}

