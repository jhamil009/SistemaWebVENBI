<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function index()
	{
		$data['msg']=$this->uri->segment(3);

		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			//el usuario ya esta logueado redirigimos a panel					
			redirect('administrador/panel','refresh');								
		}
		else 
		{
			//el usuario no esta logueado
			$this->load->view('inc2/head.php');
			$this->load->view('admin_login',$data);
		}					
	}
	public function validar()
	{
		//Cargar helper
		$this->load->helper(array('login_rules'));
		//Cargar reglas
		$this->form_validation->set_rules(reglasLoginAdmin());

		if($this->form_validation->run()==FALSE)
		{
			//Error
			$data['msg']=$this->uri->segment(3);
			
			$this->load->view('inc2/head.php');
			$this->load->view('admin_login',$data);
		}
		else 
		{
			//Todo Ok
			$login=$_POST['login'];
			$password=md5($_POST['password']);
			$consulta=$this->usuario_model->validarAdmin($login, $password);
			
			if($consulta->num_rows() > 0)
			{
				//tenemos una validacion efectiva
				foreach ($consulta->result() as $row)
				{
					$this->session->set_userdata('idusuario',$row->idUsuario);
					$this->session->set_userdata('login',$row->nombreUsuario);
					$this->session->set_userdata('tipo',$row->tipoUsuario);
					$this->session->set_userdata('estado',$row->estado);				
					redirect('administrador/panel','refresh');
				}
			}
			else			
			{
				//No hay una validacion efectiva y redigimos a la ventana login			
				redirect('administrador/index/7','refresh');
			}
		}						
	}
	public function panel()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{							
			redirect('dashboard/index','refresh');								
		}
		else
		{
			//el usuario no esta logueado
			redirect('administrador/index/8','refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('administrador/index/6','refresh');
	}
	public function listar()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$lista=$this->admin_model->listar();
			$data['empleado']=$lista;
			//alertas de CRUD
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('admin_listar',$data);
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
			$this->load->view('admin_registrar');
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
			$this->load->helper(array('usuario_rules'));
			//Cargar reglas
			$this->form_validation->set_rules(reglasRegistroUsuario());
						
			if($this->form_validation->run()==FALSE)
			{
				//Error
				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('admin_registrar');
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else
			{
				//Todo Ok
				$data['nombres']=strtoupper($_POST['nombres']);
				$data['primerApellido']=strtoupper($_POST['apellidoPaterno']);
				$data['segundoApellido']=strtoupper($_POST['apellidoMaterno']);				
				$data['telefono']=$_POST['telefono'];
				$data['email']=$_POST['email'];
				$data['nombreUsuario']=$_POST['usuario'];				
				$data['password']=md5($_POST['password']);
				$data['tipoUsuario']='administrador';
				//Id usuario
				$idusuario=$this->session->userdata('idusuario');
				$data['idUser']=$idusuario;

				$this->admin_model->agregar($data);
				//mensaje de registro		
				redirect('administrador/listar/1','refresh');
			}
		}
		else
		{
			redirect('administrador/index','refresh');
		}	
	}
	public function modificar()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{

			$idempleado=$_POST['idempleado'];
			$data['infoAdmin']=$this->admin_model->recuperarInfo($idempleado);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('admin_modificar',$data);
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
			$this->load->helper(array('usuario_rules'));
			//Cargar reglas
			$this->form_validation->set_rules(reglasModificacionUsuario());
			
			if($this->form_validation->run()==FALSE)
			{
				$idempleado=$_POST['idempleado'];
				$data['infoAdmin']=$this->admin_model->recuperarInfo($idempleado);
				//Error
				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('admin_modificar',$data);
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else
			{
				$idempleado=$_POST['idempleado'];	
				$fechaActualizacion=date('Y-m-d H:i:s');
				$idusuario=$this->session->userdata('idusuario');

				$data['nombres']=strtoupper($_POST['nombres']);
				$data['primerApellido']=strtoupper($_POST['apellidoPaterno']);
				$data['segundoApellido']=strtoupper($_POST['apellidoMaterno']);				
				$data['telefono']=$_POST['telefono'];
				$data['email']=$_POST['email'];
				$data['tipoUsuario']='administrador';
				$data['fechaActualizacion']=$fechaActualizacion;
				$data['idUser']=$idusuario;
				
				$this->admin_model->modificar($idempleado,$data);
				//mensaje de modificacion
				redirect('administrador/listar/2','refresh');
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
			$idempleado=$_POST['idempleado'];
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=0;
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;
			
			$this->admin_model->desabilitar($idempleado,$data);
			//mensaje de eliminacion logica
			redirect('administrador/listar/3','refresh');
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
			$lista=$this->admin_model->listaDesabilitados();
			$data['empleado']=$lista;
			//alertas de CRUD
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('admin_listarDesabilitados',$data);
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
			$idempleado=$_POST['idempleado'];
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=1;
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;
			
			$this->admin_model->modificar($idempleado,$data);
			//mensaje de eliminacion logica
			redirect('administrador/listar/4','refresh');
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}
}