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

    //PDF de la venta
    public function listaPDFVenta()
    {            
        if($this->session->userdata('login') && $this->session->userdata('estado')==1)
        {
            $idventa=$_POST['idventa'];

            $lista=$this->venta_model->reciboCompraPDF($idventa);            
            $lista=$lista->result();

            $detalle=$this->venta_model->detallesExtrasPDF($idventa);
            $detalle=$detalle->result();

            $this->pdf=new pdf();
            $this->pdf->AddPage();
            $this->pdf->SetMargins(17,17,17);
            
            # Logo de la empresa formato png #
            $this->pdf->Image('./img/logo.png',165,12,35,35,'PNG');

            # Encabezado y datos de la empresa #
            $this->pdf->SetFont('Arial','B',16);
            $this->pdf->SetTextColor(0,0,0);
            $this->pdf->Cell(150,10,utf8_decode(strtoupper("MICROEMPRESA PEGASUS")),0,0,'L');

            $this->pdf->Ln(9);

            $this->pdf->SetFont('Arial','',10);
            $this->pdf->SetTextColor(39,39,51);
            $this->pdf->Cell(150,9,utf8_decode("NIT: 0000000000"),0,0,'L');

            $this->pdf->Ln(5);

            $this->pdf->Cell(150,9,utf8_decode("Dirección: Av Fuerza Aérea entre Viloma"),0,0,'L');

            $this->pdf->Ln(5);

            $this->pdf->Cell(150,9,utf8_decode("Celular: 77993036"),0,0,'L');

            $this->pdf->Ln(5);

            $this->pdf->Cell(150,9,utf8_decode("Email: pegasus@gmail.com"),0,0,'L');

            $this->pdf->Ln(10);

            $this->pdf->SetFont('Arial','',10);
            $this->pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
            $this->pdf->SetTextColor(97,97,97);

            foreach ($detalle as $value) 
            {
                $fechaEmision=formatearFecha($value->fecha);    
                $this->pdf->Cell(116,7,utf8_decode($fechaEmision),0,0,'L');
            }  
        
                            
            $this->pdf->SetFont('Arial','B',10);
            $this->pdf->SetTextColor(39,39,51);
            $this->pdf->Cell(35,7,utf8_decode(strtoupper("Factura Nro.")),0,0,'C');

            $this->pdf->Ln(7);

            $this->pdf->SetFont('Arial','',10);
            $this->pdf->Cell(12,7,utf8_decode("Cliente:"),0,0,'L');
            $this->pdf->SetTextColor(97,97,97);

            foreach ($detalle as $value) 
            {
                $cliente=$value->nombres." ".$value->primerApellido." ".$value->segundoApellido;    
                $this->pdf->Cell(134,7,utf8_decode(" ".$cliente),0,0,'L');
            }  
            
            $this->pdf->SetFont('Arial','B',10);
            $this->pdf->SetTextColor(97,97,97);
            $this->pdf->Cell(35,7,utf8_decode(strtoupper("1")),0,0,'C');

            $this->pdf->Ln(10);

            # Tabla de productos #
            $this->pdf->SetFont('Arial','',8);
            $this->pdf->SetFillColor(0,0,0);
            $this->pdf->SetDrawColor(0,0,0);
            $this->pdf->SetTextColor(255,255,255);
            $this->pdf->Cell(90,8,utf8_decode("Descripción"),1,0,'C',true);
            $this->pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
            $this->pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
            $this->pdf->Cell(19,8,utf8_decode("Envío"),1,0,'C',true);
            $this->pdf->Cell(32,8,utf8_decode("Subtotal"),1,0,'C',true);

            $this->pdf->Ln(8);

            $this->pdf->SetTextColor(39,39,51);

            /*----------  Detalles de la tabla  ----------*/
            foreach ($lista as $row) 
            {
                $decripcion=$row->nombreModelo." ".$row->color." ".$row->nombreTalla;
                $cantidad=$row->cantidad;
                $precioUnitario=$row->precioUnitario;
                $subTotal=$row->subtotal;

                $this->pdf->Cell(90,7,utf8_decode($decripcion),'L',0,'C');
                $this->pdf->Cell(15,7,$cantidad,'L',0,'C');
                $this->pdf->Cell(25,7,$precioUnitario,'L',0,'C');
                $this->pdf->Cell(19,7,utf8_decode("0 bs"),'L',0,'C');
                $this->pdf->Cell(32,7,$subTotal,'LR',0,'C');

                $this->pdf->Ln(5);
            }
           
            $this->pdf->Ln(7);
            /*----------  Fin Detalles de la tabla  ----------*/

            $this->pdf->SetFont('Arial','B',9);

            # Impuestos & totales #
            $this->pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
            $this->pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
            $this->pdf->Cell(32,7,utf8_decode("TOTAL:"),'T',0,'C');


            foreach ($detalle as $value) 
            {
                $total=$value->totalPagar;    
                $this->pdf->Cell(34,7,utf8_decode($total.' bs'),'T',0,'C');
            }            

            $this->pdf->Ln(7);

            $this->pdf->Output("lista.pdf" , "I");
        }
        else
        {
            redirect('administrador/index','refresh');
        }  
    }
}