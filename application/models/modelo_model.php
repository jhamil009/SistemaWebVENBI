<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_model extends CI_Model {

	public function listar()
	{
		$this->db->select('*');
		$this->db->from('modelo');
		$this->db->where('estado', 1);
		return $this->db->get();
	}	
	public function listaDesabilitados()
	{
		$this->db->select('*');
		$this->db->from('modelo');
		$this->db->where('estado', 0);
		return $this->db->get();
	}	
	public function agregar($data)
	{
		$this->db->insert('modelo',$data);	
	}
	public function recuperarInfo($idmodelo)
	{
		$this->db->select('*');
		$this->db->from('modelo');		
		$this->db->where('idModelo',$idmodelo);
		return $this->db->get();	
	}	
	public function modificar($idmodelo, $data)
	{		
		$this->db->where('idModelo',$idmodelo);
		$this->db->update('modelo',$data);
	}	
	public function desabilitar($idmodelo, $data)
	{		
		$this->db->where('idModelo',$idmodelo);
		$this->db->update('modelo',$data);
	}
}
