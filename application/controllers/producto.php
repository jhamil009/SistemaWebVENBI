<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$lista=$this->producto_model->listar();
			$data['producto']=$lista;			
			//alerta de CRUD
			$data['msg']=$this->uri->segment(3);		

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('producto_listar',$data);
			$this->load->view('inc/footerAutor.php');
			$this->load->view('inc/footer.php');
		}
		else
		{
			redirect('administrador/index','refresh');
		}	
	}
	public function agregar()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$listaModelo=$this->modelo_model->listar();
			$data['modelo']=$listaModelo;

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('producto_registrar', $data);
			$this->load->view('inc/footerAutor.php');
			$this->load->view('inc/footer.php');			
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}
	public function agregarbd()
	{
		
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			//Cargar helper
			$this->load->helper(array('producto_rules'));
			//Cargar reglas
			$this->form_validation->set_rules(reglasRegistroProducto());

			$this->form_validation->set_rules('foto', 'Imagen', 'callback_file_check');			

			if($this->form_validation->run()==FALSE)
			{
				//Error
				$listaModelo=$this->modelo_model->listar();
				$data['modelo']=$listaModelo;

				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('producto_registrar', $data);
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');				
			}
			else
			{
				//Todo Ok
				$idusuario=$this->session->userdata('idusuario');
				$data['idModelo']=$_POST['idmodelo'];
				$data['descripcion']=$_POST['descripcion'];
				$data['color']=$_POST['color'];
				$data['precioUnitario']=$_POST['precio'];				
				$data['idUser']=$idusuario;
				//tallas
				$tallaN38=$_POST['tallaN38'];
				$tallaN39=$_POST['tallaN39'];
				$tallaN40=$_POST['tallaN40'];
				$tallaN41=$_POST['tallaN41'];
				$tallaN42=$_POST['tallaN42'];
				//Stock total
				$data['stockTotal']=$tallaN38+$tallaN39+$tallaN40+$tallaN41+$tallaN42;
				//nombre del Archivo			
				$fechaActual=date('Y-m-d H:i:s');
				$nombrearchivo=formatoArchivo($fechaActual).".jpg";
				//configuraciones
				$archivo='foto';
				$config['upload_path']="./uploads/";
				$config['file_name']=formatoArchivo($fechaActual);
				$config['allowed_types']="jpg";
				$config['max_size']="10000"; //kb

				//cargar configuracion
				$this->load->library('upload',$config);

				if (!$this->upload->do_upload($archivo)) 
				{
					//$data['uploadError']=$this->upload->display_errors();
					$data['foto']="default.jpg";
				}
				else 
				{
					$data['foto']=$nombrearchivo;
					$this->upload->data();
				}

				$this->producto_model->agregar($data, $tallaN38, $tallaN39, $tallaN40, $tallaN41, $tallaN42);
				//mensaje de registro		
				redirect('producto/index/1','refresh');
			}
		}
		else
		{
			redirect('administrador/index','refresh');
		}	
	}
	//Validacion de archivos (Registrar)
	public function file_check($str)
	{
        $allowed_mime_type_arr = array('image/jpeg');
        $mime = get_mime_by_extension($_FILES['foto']['name']);

        if(isset($_FILES['foto']['name']) && $_FILES['foto']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else{
                $this->form_validation->set_message('file_check', '* Por favor solo seleccione archivos en formato JPG.');
                return false;
            }
        }
        else{
            $this->form_validation->set_message('file_check', '* Se requiere la fotografía del producto.');
            return false;
        }
    }
	public function modificar()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$idproducto=$_POST['idproducto'];
			//Producto
			$data['infoProducto']=$this->producto_model->recuperarInfo($idproducto);
			//Modelo
			$data['infoModelo']=$this->modelo_model->listar();
			//tallas
			$data['infoTalla38']=$this->talla_model->recuperarInfoTalla38($idproducto);
			$data['infoTalla39']=$this->talla_model->recuperarInfoTalla39($idproducto);
			$data['infoTalla40']=$this->talla_model->recuperarInfoTalla40($idproducto);
			$data['infoTalla41']=$this->talla_model->recuperarInfoTalla41($idproducto);
			$data['infoTalla42']=$this->talla_model->recuperarInfoTalla42($idproducto);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('producto_modificar', $data);
			$this->load->view('inc/footerAutor.php');
			$this->load->view('inc/footer.php');
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}
	public function modificarbd()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			//Cargar helper
			$this->load->helper(array('producto_rules'));
			//Cargar reglas
			$this->form_validation->set_rules(reglasModificacionProducto());

			if($this->form_validation->run()==FALSE)
			{
				//Error				
				$idproducto=$_POST['idproducto'];
				$data['infoProducto']=$this->producto_model->recuperarInfo($idproducto);
				//Modelo
				$data['infoModelo']=$this->modelo_model->listar();
				//tallas
				$data['infoTalla38']=$this->talla_model->recuperarInfoTalla38($idproducto);
				$data['infoTalla39']=$this->talla_model->recuperarInfoTalla39($idproducto);
				$data['infoTalla40']=$this->talla_model->recuperarInfoTalla40($idproducto);
				$data['infoTalla41']=$this->talla_model->recuperarInfoTalla41($idproducto);
				$data['infoTalla42']=$this->talla_model->recuperarInfoTalla42($idproducto);

				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('producto_modificar', $data);
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else 
			{
				//Todo Ok
				$idproducto=$_POST['idproducto'];
				$fechaActualizacion=date('Y-m-d H:i:s');
				$idusuario=$this->session->userdata('idusuario');
				//Producto
				$data['color']=$_POST['color'];
				$data['descripcion']=$_POST['descripcion'];
				$data['precioUnitario']=$_POST['precio'];								
				$data['fechaActualizacion']=$fechaActualizacion;				
				$data['idUser']=$idusuario;
				//Modelo
				$data['idModelo']=$_POST['idmodelo'];
				//tallas
				$qty38=$_POST['tallaN38'];
				$qty39=$_POST['tallaN39'];
				$qty40=$_POST['tallaN40'];
				$qty41=$_POST['tallaN41'];
				$qty42=$_POST['tallaN42'];
				//stock total
				$data['stockTotal']=$qty38+$qty39+$qty40+$qty41+$qty42;
				
				//nombre del Archivo			
				$fechaActual=date('Y-m-d H:i:s');
				$nombrearchivo=formatoArchivo($fechaActual).".jpg";
				//configuraciones
				$archivo='foto';
				$config['upload_path']="./uploads/";
				$config['file_name']=formatoArchivo($fechaActual);
				$config['allowed_types']="jpg";
				$config['max_size']="10000"; //kb

				//cargar configuracion
				$this->load->library('upload',$config);

				if ($this->upload->do_upload($archivo)) 
				{
					$data['foto']=$nombrearchivo;
					$this->upload->data();		
				}	

				$this->producto_model->modificar($idproducto,$data, $qty38, $qty39, $qty40, $qty41, $qty42);
				//mensaje de actualizacion			
				redirect('producto/index/2','refresh');	
			}			
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}
	public function desabilitarbd()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{			
			$idproducto=$_POST['idproducto'];
			$fechaActualizacion=date('Y-m-d H:i:s');					
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=0;
			$data['fechaActualizacion']=$fechaActualizacion;			
			$data['idUser']=$idusuario;

			$this->producto_model->desabilitar($idproducto,$data);
			//mensaje de desabilitacion
			redirect('producto/index/3','refresh');
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}
	public function listaDesabilitados()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$lista=$this->producto_model->listaDesabilitados();
			$data['producto']=$lista;			
			//alerta de CRUD
			$data['msg']=$this->uri->segment(3);		

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('producto_listarDesabilitados',$data);
			$this->load->view('inc/footerAutor.php');
			$this->load->view('inc/footer.php');
		}
		else
		{
			redirect('administrador/index','refresh');
		}	
	}
	public function habilitarbd()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{			
			$idproducto=$_POST['idproducto'];
			$fechaActualizacion=date('Y-m-d H:i:s');					
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=1;
			$data['fechaActualizacion']=$fechaActualizacion;			
			$data['idUser']=$idusuario;

			$this->producto_model->desabilitar($idproducto,$data);
			//mensaje de habilitacion
			redirect('producto/index/4','refresh');
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}	
}