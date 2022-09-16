<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	//CRUD de Administradores
	public function listar()
	{		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('tipoUsuario', 'administrador');
		$this->db->where('estado', 1);
		$this->db->order_by('nombres', 'asc');
		return $this->db->get();
	}
	public function listaDesabilitados()
	{		
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('tipoUsuario', 'administrador');
		$this->db->where('estado', 0);
		$this->db->order_by('nombres', 'asc');
		return $this->db->get();
	}	
	public function agregar($data)
	{
		$this->db->insert('usuario',$data);
	}
	public function recuperarInfo($idempleado)
	{
		$this->db->select('*');
		$this->db->from('usuario');        
		$this->db->where('tipoUsuario', 'administrador');
		$this->db->where('idUsuario',$idempleado);
		return $this->db->get();
	}
	public function modificar($idempleado, $data)
	{				
		$this->db->where('idUsuario',$idempleado);
		$this->db->update('usuario',$data);
	}
	public function desabilitar($idempleado, $data)
	{		
		$this->db->where('idUsuario',$idempleado);
		$this->db->update('usuario',$data);
	}	
}