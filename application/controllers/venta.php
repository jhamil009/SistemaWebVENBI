<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

	public function index()
	{ 
        if($this->session->userdata('login') && $this->session->userdata('tipo')=='cliente' && $this->session->userdata('estado')==1)
        {
            //Registro de venta        
            $totalpagar=$this->cart->total(); 
            $idusuario=$this->session->userdata('idusuario');

            $data['totalPagar']=$totalpagar;
            $data['idUser']=$idusuario;

            //insertar la venta en BDD
            $idVenta=$this->venta_model->agregar($data);

            //Comprobar si el registro de venta se encuentra en BDD
            if($idVenta) 
            {
                //Invocamos el controlador detalleVenta que tiene como valor 1 o la variable comprobacion
                $detalleventa=$this->detalleVenta($idVenta);

                if($detalleventa) 
                {
                    //mensaje de compra
                    redirect('tienda/compras','refresh');            
                }
                else 
                {
                    //mensaje de error
                    $data['error_msg'] = 'Error de compra, inténtalo de nuevo.';
                }
            }
            else
            {
                //mensaje de error
                $data['error_msg'] = 'Ocurrieron algunos problemas, inténtalo de nuevo.';
            }            
	   }       
       else
       {
            redirect('cliente/index','refresh');
       } 
    }
    public function detalleVenta($idVenta)
    {
        //Registro del detalle de la venta
        $itemscarrito = $this->cart->contents();

        $detalleventa = array();
        $i=0;
        foreach($itemscarrito as $item)
        {
            $detalleventa[$i]['idVenta'] = $idVenta;
            $detalleventa[$i]['idStock'] = $item['id'];
            $detalleventa[$i]['cantidad'] = $item['qty'];
            $detalleventa[$i]['precioUnitario'] = $item["subtotal"];
            $i++;
        }
        
        //Actualizar Stock
        $stock = array();
        $i=0;
        foreach($itemscarrito as $item)
        {
            $stock[$i]['idStock'] = $item['id'];  
            $stock[$i]['cantidad'] = $item['stock'] - $item['qty'];            
            $i++;
        }       

        if(!empty($detalleventa))
        {
            //Insertar el detalle de la venta en BDD
            $insertardetalle = $this->venta_model->agregarDetalleVenta($detalleventa);

            //Modificar el stock de los productos vendidos
            $stockupdate=$this->venta_model->actualizarStock($stock);
            
            //Para comprobar la venta y que retorne un dato, para luego invocar en el controlador index
            $comprobacion=1;

            if($insertardetalle===TRUE && $stockupdate===TRUE)
            {
                //Remover los items del carrito de compras
                $this->cart->destroy();

                return $comprobacion;
            }
        }
    }

    //LISTAR LOS ESTADOS DE LAS VENTAS
    public function listarPendiente()
    {        
        if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
        {
            $lista=$this->venta_model->listarVentaPendiente();
            $lista2=$this->venta_model->listarVentaProceso();
            $data['ventasPendientes']=$lista;
            $data['ventasProceso']=$lista2;

            $this->load->view('inc/header.php');
            $this->load->view('inc/navbar.php');                
            $this->load->view('inc/sidebarMain.php');
            $this->load->view('inc/sidebarMenu.php');
            $this->load->view('venta_listarPendientes',$data);
            $this->load->view('inc/footerAutor.php');
            $this->load->view('inc/footer.php');
        }
        else
        {
            redirect('administrador/index','refresh');
        }   
    }
    //Modificacion del envio pendiente
    public function modificarPendiente()
    {        
        if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
        {
           $idventa=$_POST['idventa'];
           $fechaActualizacion=date('Y-m-d H:i:s');
           //$idusuario=$this->session->userdata('idusuario');

           $data['estado']=2;
           $data['fechaActualizacion']=$fechaActualizacion;
           //$data['idUser']=$idusuario;

           $this->venta_model->modificarEstadoVenta($idventa,$data);

           redirect('venta/listarPendiente','refresh');    
        }
        else
        {
            redirect('administrador/index','refresh');
        }   
    }

    //Modificacion del envio en proceso
    public function modificarProcesoEnvio()
    {        
        if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
        {
           $idventa=$_POST['idventa'];
           $fechaActualizacion=date('Y-m-d H:i:s');
           //$idusuario=$this->session->userdata('idusuario');

           $data['estado']=3;
           $data['fechaActualizacion']=$fechaActualizacion;
           //$data['idUser']=$idusuario;

           $this->venta_model->modificarEstadoVenta($idventa,$data);

           redirect('venta/listarPendiente','refresh');    
        }
        else
        {
            redirect('administrador/index','refresh');
        }   
    }

    //Ventas realizadas con exito
    public function listarVentasCompletadas()
    {        
        if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
        {
            $lista=$this->venta_model->listarVentaRealizada();            
            $data['ventasCompletadas']=$lista;            

            $this->load->view('inc/header.php');
            $this->load->view('inc/navbar.php');                
            $this->load->view('inc/sidebarMain.php');
            $this->load->view('inc/sidebarMenu.php');
            $this->load->view('venta_listarVentasCompletadas',$data);
            $this->load->view('inc/footerAutor.php');
            $this->load->view('inc/footer.php');
        }
        else
        {
            redirect('administrador/index','refresh');
        }   
    }
}