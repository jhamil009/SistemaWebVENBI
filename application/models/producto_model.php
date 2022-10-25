<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

	public function listar()
	{
		$this->db->select('P.foto, M.nombreModelo, P.descripcion, P.color, P.precioUnitario, P.stockTotal, P.fechaRegistro, P.fechaActualizacion, P.idUser, P.idProducto');
		$this->db->from('producto P');
		$this->db->join('modelo M', 'M.idModelo = P.idModelo');		
		$this->db->where('P.estado', 1);
		$this->db->where('M.estado', 1);
		
		return $this->db->get();
	}
	public function listaDesabilitados()
	{
		$this->db->select('P.foto, M.nombreModelo, P.descripcion, P.color, P.precioUnitario, P.stockTotal, P.fechaRegistro, P.fechaActualizacion, P.idUser, P.idProducto');
		$this->db->from('producto P');
		$this->db->join('modelo M', 'M.idModelo = P.idModelo');		
		$this->db->where('P.estado', 0);
		$this->db->where('M.estado', 1);
		
		return $this->db->get();
	}	
	public function agregar($data, $tallaN38, $tallaN39, $tallaN40, $tallaN41, $tallaN42)
    {
    	$this->db->trans_start();

		$this->db->insert('producto',$data);
		$idproducto=$this->db->insert_id();

		$data1['idProducto']=$idproducto;
		$data1['idTalla']=1;
		$data1['cantidad']=$tallaN38;
		$this->db->insert('stock',$data1);

		$data2['idProducto']=$idproducto;
		$data2['idTalla']=2;
		$data2['cantidad']=$tallaN39;
		$this->db->insert('stock',$data2);

		$data3['idProducto']=$idproducto;
		$data3['idTalla']=3;
		$data3['cantidad']=$tallaN40;
		$this->db->insert('stock',$data3);

		$data4['idProducto']=$idproducto;
		$data4['idTalla']=4;
		$data4['cantidad']=$tallaN41;
		$this->db->insert('stock',$data4);

		$data5['idProducto']=$idproducto;
		$data5['idTalla']=5;
		$data5['cantidad']=$tallaN42;
		$this->db->insert('stock',$data5);
		
		$this->db->trans_complete();

		if($this->db->trans_complete()===FALSE)
		{
			return false;			
		}		
    }
	public function recuperarInfo($idproducto)
	{
		$this->db->select('*');
		$this->db->from('producto P');
		$this->db->join('modelo M', 'M.idModelo = P.idModelo');
		$this->db->where('P.idProducto',$idproducto);
		return $this->db->get();	
	}
	public function modificar($idproducto, $data, $qty38, $qty39, $qty40, $qty41, $qty42)
	{
		$this->db->trans_start();		

		$this->db->where('idProducto',$idproducto);
		$this->db->update('producto',$data);

		$this->db->where('idTalla', '1');
		$this->db->where('idProducto',$idproducto);
		$this->db->update('stock',array('cantidad' => $qty38));

		$this->db->where('idTalla', '2');
		$this->db->where('idProducto',$idproducto);
		$this->db->update('stock',array('cantidad' => $qty39));

		$this->db->where('idTalla', '3');
		$this->db->where('idProducto',$idproducto);
		$this->db->update('stock',array('cantidad' => $qty40));

		$this->db->where('idTalla', '4');
		$this->db->where('idProducto',$idproducto);
		$this->db->update('stock',array('cantidad' => $qty41));

		$this->db->where('idTalla', '5');
		$this->db->where('idProducto',$idproducto);
		$this->db->update('stock',array('cantidad' => $qty42));

		$this->db->trans_complete();

		if($this->db->trans_complete()===FALSE)
		{
			return false;			
		}				

	}	
	public function desabilitar($idproducto, $data)
	{		
		$this->db->where('idProducto',$idproducto);
		$this->db->update('producto',$data);
	}

	//Proceso Venta
	public function obtenerFila($idproducto,$idtalla)
    {    	    	
       	$this->db->select('*');
        $this->db->from('stock S');
        $this->db->join('talla T', 'T.idTalla = S.idTalla');
        $this->db->join('producto P', 'P.idProducto = S.idProducto');
        $this->db->join('modelo M', 'M.idModelo = P.idModelo');
        $this->db->where('P.idProducto', $idproducto);          
        $this->db->where('T.idTalla', $idtalla);  
        $query = $this->db->get();
        $result = $query->row_array();                     
        
        return !empty($result)?$result:false;              
    } 

    //idproducto talla
    public function productoDetalleTalla($idproducto)
    {
    	$this->db->select('*');
        $this->db->from('stock S');
        $this->db->join('talla T', 'T.idTalla = S.idTalla');
        $this->db->join('producto P', 'P.idProducto = S.idProducto');
        $this->db->join('modelo M', 'M.idModelo = P.idModelo');
        $this->db->where('P.idProducto', $idproducto);  
        $query = $this->db->get();
        $result = $query->result_array();
        
        return !empty($result)?$result:false;              
    }

   	//Pagina de inico seccion de productos nuevos
    public function productosNuevos()
    {
    	$this->db->select('*');
        $this->db->from('producto P');
        $this->db->join('modelo M', 'M.idModelo = P.idModelo');
        $this->db->where('P.estado', 1);
        $this->db->where('M.estado', 1);
        $this->db->order_by('P.fechaRegistro', 'DESC');
        $this->db->limit(4);

        return $this->db->get();
    }
}
