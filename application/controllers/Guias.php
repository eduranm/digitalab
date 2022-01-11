<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Guias extends CI_Controller {
    
    public function __construct() {
      parent::__construct();
      $this->load->database();
   }    

    public function index()
    {   
        $data = array();
	$data['mensaje']= $this->session->flashdata('mensaje');
        $data['usuario'] = $this->session->userdata('usuario');
        $parse['template']['body'] = $this->load->view('guias',$data, TRUE);
        $parse['template']['partials']['utils_js'] = $this->load->view('js/utils.js', array(), TRUE);
        $parse['template']['partials']['view_js'] = $this->load->view('js/guias.js', array(), TRUE);
        $this->parser->parse('layouts/default_unam',$parse);
    }
    
    public function edicion(){
        if(!$this->session->userdata('usuario'))
            redirect('admin');

	if(!$this->session->userdata('id_recurso'))
            redirect('guias');
        
        $data = array();
        $data['usuario'] = $this->session->userdata('usuario');
        
        if($this->session->userdata('nombre_recurso')){
            $data['id_recurso'] = $this->session->userdata('id_recurso');
            $data['nombre_recurso'] = $this->session->userdata('nombre_recurso');
            $data['descripcion'] = $this->session->userdata('descripcion');
            $data['nombre_guia'] = $this->session->userdata('nombre_guia');
            $data['enlace_guia'] = $this->session->userdata('enlace_guia');
            $data['enlace_recurso'] = $this->session->userdata('enlace_recurso');
        }
        
        $parse['template']['body'] = $this->load->view('actualiza_guia',$data, TRUE);
//        $parse['template']['partials']['utils_js'] = $this->load->view('js/utils.js', array(), TRUE);
        $parse['template']['partials']['view_js'] = $this->load->view('js/actualiza_guia.js', array(), TRUE);
        $this->parser->parse('layouts/default_unam',$parse);
    }
    
    public function preedicion(){
        if ($this->input->post()){
            $_SESSION['id_recurso'] = $this->input->post('id_recurso');
            $_SESSION['nombre_recurso'] = $this->input->post('nombre_recurso');
            $_SESSION['descripcion'] = $this->input->post('descripcion');
            $_SESSION['nombre_guia'] = $this->input->post('nombre_guia');
            $_SESSION['enlace_guia'] = $this->input->post('enlace_guia');
            $_SESSION['enlace_recurso'] = $this->input->post('enlace_recurso');            
            redirect('guias/edicion');
        }        
    }
    
    public function actualiza(){
        if ($this->input->post()) {
            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['archivo']['tmp_name'];
                $fileName = $_FILES['archivo']['name'];
                $fileSize = $_FILES['archivo']['size'];
                $fileType = $_FILES['archivo']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                
                $uploadFileDir = 'docs/guias/';
                $dest_path = $uploadFileDir . $fileName;
                
                move_uploaded_file($fileTmpPath, $dest_path);
            }
            
            if($fileName && $this->input->post('nombre_archivo')!='' || $this->input->post('nombre_guia') == ''){
                unlink('docs/guias/'.$this->input->post('nombre_archivo'));
            }
            
            if($fileName)
                $enlace_guia = $fileName;
            else
                if($this->input->post('nombre_guia') == '')
                    $enlace_guia='';
                else
                    $enlace_guia = $this->input->post('nombre_archivo');
            
            $data = array(
                'id_recurso' => $this->input->post('id_recurso'),
                'nombre_recurso' => $this->input->post('nombre_recurso'),
                'descripcion' => $this->input->post('descripcion'),
                'nombre_guia' => $this->input->post('nombre_guia'),
                'enlace_guia' => $enlace_guia,
                'enlace_recurso' => $this->input->post('enlace_recurso')                
            );
            
            $this->load->model('guias_model');
            $this->guias_model->update($data);
            
	    unset($_SESSION['id_recurso']);
            $this->session->set_flashdata('mensaje', 'Se actualizó el recurso '.$this->input->post('nombre_recurso'));
            redirect('/guias');
        }
    }
}