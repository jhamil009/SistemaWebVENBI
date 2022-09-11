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


		//el numero 5 puede ser sustituido por el numero de filas afectadas en una consulta
		//$this->db->count_all('my_table') === 5

		/*for ($i = 1; $i <= $this->db->count_all('talla'); $i++)
		{	
			$num=38;

			$data1['idProducto']=$idproducto;
			$data1['idTalla']=$i;
			$data1['cantidad']=$tallaN.$num;
			$this->db->insert('stock',$data1);

			$num++;			
		}*/
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
	public function obtenerFila($idproducto="")
    {    	    	
        $this->db->select('*');
        $this->db->from('producto P');
        $this->db->join('modelo M', 'M.idModelo = P.idModelo');
        $this->db->where('P.estado', 1);
        $this->db->where('M.estado', 1);
        
        if($idproducto)
        {
            $this->db->where('P.idProducto',$idproducto);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {            
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Devolver datos obtenidos   
        if (!empty($result))
        {        	
            return $result;
        }   
        else 
        {
            return false;    
        }                 
    } 
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
