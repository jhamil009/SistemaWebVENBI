<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda extends CI_Controller {

	public function index()
	{			       
        $lista=$this->producto_model->productosNuevos();
		$data['productosNuevos']=$lista;	

		$this->load->view('inc2/head.php');
        $this->load->view('inc2/nav.php');
        $this->load->view('web-index.php',$data);        
        $this->load->view('inc2/footer.php');        
	}

	public function catalogo()
	{				
		$data = array();
        // Obtener productos de la base de datos
        $data['producto']=$this->producto_model->obtenerFila();

		$this->load->view('inc2/head.php');
        $this->load->view('inc2/nav.php');
        $this->load->view('web-catalogo.php',$data);        
        $this->load->view('inc2/footer.php');        
	}
}