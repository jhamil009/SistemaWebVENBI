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
		$lista=$this->producto_model->listar();
		$data['productos']=$lista;	

		$this->load->view('inc2/head.php');
        $this->load->view('inc2/nav.php');
        $this->load->view('web-catalogo.php',$data);        
        $this->load->view('inc2/footer.php');        
	}	
	public function detalleProducto()
	{
		$data = array();

		$idproducto=$_POST['idproducto'];
		$tallas=$this->producto_model->productoDetalleTalla($idproducto);
		$producto=$this->producto_model->recuperarInfo($idproducto);
		$data['productoTallas']=$tallas;
		$data['productoInfo']=$producto;

		$this->load->view('inc2/head.php');
        $this->load->view('inc2/nav.php');
        $this->load->view('web-detalleProducto.php',$data);        
        $this->load->view('inc2/footer.php');  
	}
	public function compras()
	{
		$idusuario=$this->session->userdata('idusuario');
		$lista=$this->venta_model->listarComprasCliente($idusuario);
		$data['compras']=$lista;	

		$this->load->view('inc2/head.php');
        $this->load->view('inc2/nav.php');
        $this->load->view('web-compras.php',$data);        
        $this->load->view('inc2/footer.php');  
	}
}