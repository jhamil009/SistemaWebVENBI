<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

	public function index()
	{
		$data = array();
        
        // Recuperar datos del carrito de la sesión
        $data['itemsCarrito'] = $this->cart->contents();
        
        // Cargar la vista del carrito       
		$this->load->view('inc2/head.php');
        $this->load->view('inc2/nav.php');
        $this->load->view('web-carrito.php', $data);    
        $this->load->view('inc2/footer.php');        
	}
    public function agregarCarrito($idproducto)
    {       
        // Obtener producto específico por ID
        $producto=$this->producto_model->obtenerFila($idproducto);        
                
        // Agregar producto al carrito
        $data = array(
            'id'=> $producto['P.idProducto'],
            'qty'=>1,
            'price'=>$producto['P.precioUnitario'],            
            'name'=>$producto['M.modelo'],
            'image'=>$producto['P.foto']
        );

        $this->cart->insert($data);
              
        // Redirigir a la página del carrito
        redirect('carrito/index','refresh');                 
    }       
	public function modificarCantidadItems()
    {
        $update = 0;
        
        // Obtener información del artículo del carrito
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Actualizar artículo en el carrito
        if(!empty($rowid) && !empty($qty))
        {
            $data = array(
                'rowid'=>$rowid,
                'qty'=>$qty
            	);

            $update = $this->cart->update($data);
        }
        
        // Respuesta de devolución
        if($update)
        {
            echo 'Ok';
        }
        else 
        {
            echo 'Error';
        }
        //echo $update?'Ok':'Error';
    }
    public function removerItem($rowid)
    {
        // Remover artículo del carrito
        $remover = $this->cart->remove($rowid);
        
        // Redirigir a la página del carrito
        redirect('carrito/index','refresh');
    }
    public function destroyCarrito()
    {
        $this->cart->destroy();
        
        // Redirigir a la página del catalogo
        redirect('tienda/catalogo', 'refresh');
    }
}