<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model {
	
	//Cantidad total de usuarios registrados
	public function cantidadUsuariosRegistrados()
	{		
		  $this->db->from('usuario');		
		  $this->db->where('estado', 1);
   		return $this->db->count_all_results();
	}
	//cantidad de aministradores
	public function cantidadAdmin()
  {
  	$this->db->from('usuario');
	  $this->db->where('tipoUsuario', 'administrador');
	  $this->db->where('estado', 1);
 		return $this->db->count_all_results();
  }
  //cantidad de clientes
	public function cantidadCliente()
  {
  	$this->db->from('usuario');
	  $this->db->where('tipoUsuario', 'cliente');
	  $this->db->where('estado', 1);
 		return $this->db->count_all_results();
  }
  //cantidad de modelos
  public function cantidadModelo()
  {
  	$this->db->from('modelo');		
	  $this->db->where('estado', 1);
 		return $this->db->count_all_results();
  }
  //cantidad de productos
	public function cantidadProducto()
  {
  	$this->db->from('producto');		
	  $this->db->where('estado', 1);
 		return $this->db->count_all_results();
  }
}