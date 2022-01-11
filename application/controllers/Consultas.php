<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $this->template->set_partial('view_js', 'js/grafica_sistema.js', array(), TRUE, FALSE);
                $this->template->build('consultas_descargas');
	}
        public function total()
	{                 
            $this->template->set_partial('view_js', 'js/grafica_total.js', array(), TRUE, FALSE);
            $this->template->build('consultas_descargas_total');
	}
        public function accesos_tabla()
	{   
            $this->template->set_partial('utils_js', 'js/utils.js', array(), TRUE, FALSE);
            $this->template->set_partial('view_js', 'js/accesos_tabla.js', array(), TRUE, FALSE);
            $this->template->build('accesos_tabla');
	}
        public function accesos_grafica()
	{                 
            $this->template->set_partial('utils_js', 'js/utils.js', array(), TRUE, FALSE);
            $this->template->set_partial('view_js', 'js/accesos_grafica.js', array(), TRUE, FALSE);
            $this->template->build('accesos_grafica');
	}
}
