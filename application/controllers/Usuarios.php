<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
error_reporting(0);
class Usuarios extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }
   public function admin() {
      $data = array();
      $data['error'] = $this->session->flashdata('error');
      $this->load->view('login', $data);
   }
   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $usuario = $this->input->post('usuario');
         $contrasena = $this->input->post('contrasena');
         $this->load->model('usuario_model');
         $usuario = $this->usuario_model->usuario_por_nombre_contrasena($usuario, $contrasena);
         //$usuario = array('id' => 1, 'usuario' => 'Edgar');
         if ($usuario) {
            $usuario_data = array(
               'id' => $usuario->id,
               'usuario' => $usuario->usuario,
               //'id' => $usuario['id'],
               //'usuario' => $usuario['usuario'],
               'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            redirect('guias');
         } else {
            $this->session->set_flashdata('error', 'Usuario y/o contraseña incorrectos.'); 
            redirect('admin');
         }
      } else {
         $this->iniciar_sesion();
      }
   }
   public function logueado() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['usuario'] = $this->session->userdata('usuario');
         $this->load->view('usuarios/logueado', $data);
      }else{
         redirect('usuarios/iniciar_sesion');
      }
   }
   public function cerrar_sesion() {
      $this->session->sess_destroy();
      redirect('admin');
   }
}