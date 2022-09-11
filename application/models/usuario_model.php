<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	//Tipo de usuario admin
	public function validarAdmin($login,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');		
		$this->db->where('nombreUsuario',$login);
		$this->db->where('password',$password);		
		return $this->db->get();
	}

	//Tipo de usuario cliente
	public function validarCliente($login,$password)
	{
		$this->db->select('*');
		$this->db->from('usuario');		
		$this->db->where('password',$password);
		$this->db->where('nombreUsuario',$login);
		$this->db->or_where('email',$login);		
		return $this->db->get();
	}
}
