<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talla_model extends CI_Model {

	
	public function recuperarInfoTalla38($idproducto)
	{
		$this->db->select('T.idTalla, T.nombreTalla, S.cantidad , P.idProducto');
		$this->db->from('stock S');
		$this->db->join('talla T', 'T.idTalla = S.idTalla');
		$this->db->join('producto P', 'P.idProducto = S.idProducto');
		$this->db->where('P.idProducto',$idproducto);
		$this->db->where('T.idTalla','1');
		return $this->db->get();
	}
	public function recuperarInfoTalla39($idproducto)
	{
		$this->db->select('T.idTalla, T.nombreTalla, S.cantidad , P.idProducto');
		$this->db->from('stock S');
		$this->db->join('talla T', 'T.idTalla = S.idTalla');
		$this->db->join('producto P', 'P.idProducto = S.idProducto');
		$this->db->where('P.idProducto',$idproducto);
		$this->db->where('T.idTalla', '2');
		return $this->db->get();
	}
	public function recuperarInfoTalla40($idproducto)
	{
		$this->db->select('T.idTalla, T.nombreTalla, S.cantidad , P.idProducto');
		$this->db->from('stock S');
		$this->db->join('talla T', 'T.idTalla = S.idTalla');
		$this->db->join('producto P', 'P.idProducto = S.idProducto');
		$this->db->where('P.idProducto',$idproducto);
		$this->db->where('T.idTalla','3');
		return $this->db->get();
	}
	public function recuperarInfoTalla41($idproducto)
	{
		$this->db->select('T.idTalla, T.nombreTalla, S.cantidad , P.idProducto');
		$this->db->from('stock S');
		$this->db->join('talla T', 'T.idTalla = S.idTalla');
		$this->db->join('producto P', 'P.idProducto = S.idProducto');
		$this->db->where('P.idProducto',$idproducto);
		$this->db->where('T.idTalla', '4');
		return $this->db->get();
	}
	public function recuperarInfoTalla42($idproducto)
	{
		$this->db->select('T.idTalla, T.nombreTalla, S.cantidad , P.idProducto');
		$this->db->from('stock S');
		$this->db->join('talla T', 'T.idTalla = S.idTalla');
		$this->db->join('producto P', 'P.idProducto = S.idProducto');
		$this->db->where('P.idProducto',$idproducto);
		$this->db->where('T.idTalla', '5');
		return $this->db->get();
	}
}
