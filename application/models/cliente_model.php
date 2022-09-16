<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {
	
	//CRUD de Clientes
	public function listar()
	{		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('tipoUsuario', 'cliente');
		$this->db->where('estado', 1);
		$this->db->order_by('nombres', 'asc');
		return $this->db->get();
	}
	public function listaDesabilitados()
	{		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('tipoUsuario', 'cliente');
		$this->db->where('estado', 0);
		$this->db->order_by('nombres', 'asc');
		return $this->db->get();
	}
	public function agregar($data)
	{
		$this->db->insert('usuario',$data);				
	}
	public function recuperarInfo($idcliente)
	{
		$this->db->select('*');
		$this->db->from('usuario');        
		$this->db->where('tipoUsuario', 'cliente');		
		$this->db->where('idUsuario',$idcliente);
		return $this->db->get();
	}
	public function modificar($idcliente, $data)
	{						
		$this->db->where('idUsuario',$idcliente);
		$this->db->update('usuario',$data);
	}
	public function desabilitar($idcliente, $data)
	{		
		$this->db->where('idUsuario',$idcliente);
		$this->db->update('usuario',$data);
	}	
}
