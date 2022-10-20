<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_Model {

	public function agregar($data)
	{
		//Recuperar el id de la Venta para el registro del detalle del producto
		$insert=$this->db->insert('venta',$data);	

		//Retornar el id de la venta
		return $insert?$this->db->insert_id():false;
	}
	public function agregarDetalleVenta($data = array()) 
	{        
        //Insertar el detalle de la venta
        $insert = $this->db->insert_batch('detalleventa', $data);    

        // Retornar el estado
        return $insert?true:false;
    }
    public function actualizarStock($data = array()) 
    {     
        //Modificar el stock    	
        $update=$this->db->update_batch('stock',$data,'idStock');
     	
     	//Retornar el estado     	
        return $update?true:false;   
    }

    //listar los estados de las ventas
    public function listarVentaPendiente()
    {
        $this->db->select('U.nombres, U.primerApellido, U.segundoApellido, SUM(DV.cantidad) AS cantidad, V.totalPagar, V.fechaRegistro, V.estado, V.idVenta');
        $this->db->from('venta V');     
        $this->db->join('detalleventa DV', 'DV.idVenta = V.idVenta');  
        $this->db->join('usuario U', 'U.idUsuario = V.idUser');  
        $this->db->where('V.estado', 1);
        $this->db->group_by("U.nombres, U.primerApellido, U.segundoApellido, V.totalPagar, V.fechaRegistro, V.estado");
        $this->db->order_by('V.idVenta', 'asc');
        
        return $this->db->get();
    }
    public function listarVentaProceso()
    {
        $this->db->select('U.nombres, U.primerApellido, U.segundoApellido, SUM(DV.cantidad) AS cantidad, V.totalPagar, V.fechaRegistro, V.estado, V.idVenta');
        $this->db->from('venta V');     
        $this->db->join('detalleventa DV', 'DV.idVenta = V.idVenta');  
        $this->db->join('usuario U', 'U.idUsuario = V.idUser');  
        $this->db->where('V.estado', 2);
        $this->db->group_by("U.nombres, U.primerApellido, U.segundoApellido, V.totalPagar, V.fechaRegistro, V.estado");
        $this->db->order_by('V.idVenta', 'asc');
        
        return $this->db->get();
    }
    public function listarVentaRealizada()
    {
       $this->db->select('U.nombres, U.primerApellido, U.segundoApellido, SUM(DV.cantidad) AS cantidad, V.totalPagar, V.fechaRegistro, V.estado, V.idVenta');
        $this->db->from('venta V');     
        $this->db->join('detalleventa DV', 'DV.idVenta = V.idVenta');  
        $this->db->join('usuario U', 'U.idUsuario = V.idUser');  
        $this->db->where('V.estado', 3);
        $this->db->group_by("U.nombres, U.primerApellido, U.segundoApellido, V.totalPagar, V.fechaRegistro, V.estado");
        $this->db->order_by('V.idVenta', 'asc');
        
        return $this->db->get();
    }

    //modificacion del estado de las ventas
    public function modificarEstadoVenta($idventa, $data)
    {
        $this->db->where('idVenta',$idventa);
        $this->db->update('venta',$data);
    }

    //Ventana compras cliente
    public function listarComprasCliente($idCliente)
    {
        $this->db->select('V.idVenta, U.nombres, U.primerApellido, U.segundoApellido, SUM(DV.cantidad) AS cantidad, V.totalPagar, V.fechaRegistro, V.estado');
        $this->db->from('venta V');     
        $this->db->join('detalleventa DV', 'DV.idVenta = V.idVenta');  
        $this->db->join('usuario U', 'U.idUsuario = V.idUser');  
        $this->db->where('V.idUser', $idCliente);
        $this->db->group_by("U.nombres, U.primerApellido, U.segundoApellido, V.totalPagar, V.fechaRegistro, V.estado");
        $this->db->order_by('V.idVenta', 'asc');
        
        return $this->db->get();
    }   

    //Recibo de la compra
    public function reciboCompraPDF($idventa)
    {
        $this->db->select('DV.idVenta, DV.cantidad, DV.precioUnitario as subtotal, M.nombreModelo, P.color, T.nombreTalla, P.precioUnitario');
        $this->db->from('detalleventa DV');     
        $this->db->join('stock S', 'S.idStock = DV.idStock');  
        $this->db->join('talla T', 'T.idTalla = S.idTalla');  
        $this->db->join('producto P', 'P.idProducto = S.idProducto');  
        $this->db->join('modelo M', 'M.idModelo = P.idModelo');  
        $this->db->where('DV.idVenta', $idventa);            
        
        return $this->db->get();
    }
    //datos restantes
    public function detallesExtrasPDF($idventa)
    {
        $this->db->select('V.idVenta, U.nombres, U.primerApellido, U.segundoApellido, V.totalPagar, V.fechaRegistro as fecha');
        $this->db->from('venta V');             
        $this->db->join('usuario U', 'U.idUsuario = V.idUser');  
        $this->db->where('V.idVenta', $idventa);                
        
        return $this->db->get();
    }
}
