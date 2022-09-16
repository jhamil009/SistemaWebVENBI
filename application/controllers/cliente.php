<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if($this->session->userdata('login') && $this->session->userdata('estado')==1)
		{
			//el usuario ya esta logueado redirigimos a panel					
			redirect('cliente/panel','refresh');								
		}		
		else
		{
			$this->load->view('inc/header.php');			
			$this->load->view('cliente_login',$data);
			$this->load->view('inc/footer.php');
		}		
	}
	public function validar()
	{
		//Cargar helper
		$this->load->helper(array('login_rules'));
		//Cargar reglas
		$this->form_validation->set_rules(reglasLoginCliente());

		if($this->form_validation->run()==FALSE)
		{
			//Error
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');			
			$this->load->view('cliente_login',$data);
			$this->load->view('inc/footer.php');
		}
		else 
		{
			//Ok
			$login=$_POST['login'];
			$password=md5($_POST['password']);
			$consulta=$this->usuario_model->validarCliente($login, $password);
			
			if ($consulta->num_rows() > 0)
			{			
				foreach ($consulta->result() as $row)
				{
					$this->session->set_userdata('idusuario',$row->idUsuario);
					$this->session->set_userdata('login',$row->nombreUsuario);
					$this->session->set_userdata('tipo',$row->tipoUsuario);
					$this->session->set_userdata('estado',$row->estado);
					redirect('cliente/panel','refresh');
				}
			}
			else			
			{			
				redirect('cliente/index/6','refresh');
			}
		}		
	}
	public function panel()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='cliente' && $this->session->userdata('estado')==1)
		{							
			redirect('tienda/index','refresh');							
		}
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			redirect('cliente/listar', 'refresh');
		}
		else
		{			
			redirect('cliente/index','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('tienda/index','refresh');
	}

	//Modo desde el navegador Web
	public function agregarUsuario()
	{				
		$this->load->view('inc/header.php');
		$this->load->view('cliente_registrarWeb');
		$this->load->view('inc/footer.php');
	}

	//Modo desde el Administrador
	public function listar()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$lista=$this->cliente_model->listar();
			$data['cliente']=$lista;
			//alertas de CRUD
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('cliente_listar',$data);
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
			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('cliente_registrar');
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
		//Cargar helper
		$this->load->helper(array('usuario_rules'));
		//Cargar reglas
		$this->form_validation->set_rules(reglasRegistroUsuario());					

		if($this->form_validation->run()==FALSE)
		{
			//Redireccionar al formulario por tipo de usuario
			if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
			{
				//Error
				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('cliente_registrar');
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else 
			{
				$this->load->view('inc/header.php');
				$this->load->view('cliente_registrarWeb');
				$this->load->view('inc/footer.php');
			}
		}
		else
		{
			//Ok			
			$data['nombres']=strtoupper($_POST['nombres']);
			$data['primerApellido']=strtoupper($_POST['apellidoPaterno']);
			$data['segundoApellido']=strtoupper($_POST['apellidoMaterno']);
			$data['telefono']=$_POST['telefono'];
			$data['email']=$_POST['email'];
			$data['nombreUsuario']=$_POST['usuario'];		
			$data['password']=md5($_POST['password']);
			$data['tipoUsuario']='cliente';

			if($this->session->userdata('login'))
			{
				$idusuario=$this->session->userdata('idusuario');
				$data['idUser']=$idusuario;		
			}				
			$this->cliente_model->agregar($data);

			//Redireccionar por el tipo de usuario
			if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1) 
			{
				//mensaje de registro
				redirect('cliente/listar/1','refresh');	
			}
			else
			{
				//Mensaje de registro por Jquery (ID boton)
				redirect('tienda/index','refresh');	
			}		
		}
	}
	public function modificar()
	{		
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$idcliente=$_POST['idcliente'];
			$data['infoCliente']=$this->cliente_model->recuperarInfo($idcliente);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('cliente_modificar',$data);
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
		//Cargar helper
		$this->load->helper(array('usuario_rules'));
		//Cargar reglas
		$this->form_validation->set_rules(reglasModificacionUsuario());

		if($this->form_validation->run()==FALSE)
		{
			if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
			{
				$idcliente=$_POST['idcliente'];
				$data['infoCliente']=$this->cliente_model->recuperarInfo($idcliente);

				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('cliente_modificar',$data);
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else
			{
				//
				//Por trabajar la parte de modificacion por la pagina web (Cliente)
				$idcliente=$_POST['idcliente'];
				$data['infoCliente']=$this->cliente_model->recuperarInfo($idcliente);

				$this->load->view('inc/header.php');
				$this->load->view('cliente_modificarWeb',$data);
				$this->load->view('inc/footer.php');
			}
		}
		else 
		{
			//Todo Ok
			$idcliente=$_POST['idcliente'];	
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['nombres']=strtoupper($_POST['nombres']);
			$data['primerApellido']=strtoupper($_POST['apellidoPaterno']);
			$data['segundoApellido']=strtoupper($_POST['apellidoMaterno']);				
			$data['telefono']=$_POST['telefono'];
			$data['email']=$_POST['email'];			
			$data['tipoUsuario']='cliente';			
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;
			
			$this->cliente_model->modificar($idcliente,$data);

			//Redireccionar por el tipo de usuario
			if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1) 
			{
				//mensaje de modificacion
				redirect('cliente/listar/2','refresh');	
			}
			else
			{
				//
				//mensaje de modificacion WEB (aun por poner)
				redirect('tienda/index','refresh');	
			}
		}
	}
	public function desabilitarbd()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$idcliente=$_POST['idcliente'];
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=0;
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;
			
			$this->cliente_model->desabilitar($idcliente,$data);
			//mensaje de eliminacion logica
			redirect('cliente/listar/3','refresh');
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
			$lista=$this->cliente_model->listaDesabilitados();
			$data['cliente']=$lista;
			//Alertas de CRUD
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('cliente_listarDesabilitados',$data);
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
			$idcliente=$_POST['idcliente'];
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=1;
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;
			
			$this->cliente_model->modificar($idcliente,$data);
			//Mensaje de eliminacion logica
			redirect('cliente/listar/4','refresh');
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}	
}