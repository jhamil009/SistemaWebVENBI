<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$lista=$this->modelo_model->listar();
			$data['modelo']=$lista;
			//alerta de CRUD
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('modelo_registrar');
			$this->load->view('modelo_listar',$data);
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
			$this->load->helper(array('modelo_rules'));
			//Cargar reglas
			$this->form_validation->set_rules(reglasRegistroModelo());

			if($this->form_validation->run()==FALSE)
			{
				//error
				$lista=$this->modelo_model->listar();
				$data['modelo']=$lista;
				
				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('modelo_registrar');
				$this->load->view('modelo_listar',$data);
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else 
			{
				//Ok
				$idusuario=$this->session->userdata('idusuario');

				$data['nombreModelo']=strtoupper($_POST['nombreModelo']);
				$data['idUser']=$idusuario;
				$this->modelo_model->agregar($data);
				//mensaje de registro
				redirect('modelo/index/1','refresh');
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
			$idmodelo=$_POST['idmodelo'];
			$data1['infoModelo']=$this->modelo_model->recuperarInfo($idmodelo);

			$lista=$this->modelo_model->listar();
			$data2['modelo']=$lista;

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');
			$this->load->view('modelo_modificar', $data1);
			$this->load->view('modelo_listar', $data2);
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
			$this->load->helper(array('modelo_rules'));
			//Cargar reglas
			$this->form_validation->set_rules(reglasModificacionModelo());

			if($this->form_validation->run()==FALSE)
			{
				//error

				//Modelo
				$idmodelo=$_POST['idmodelo'];
				$data1['infoModelo']=$this->modelo_model->recuperarInfo($idmodelo);

				$lista=$this->modelo_model->listar();
				$data2['modelo']=$lista;

				$this->load->view('inc/header.php');
				$this->load->view('inc/navbar.php');				
				$this->load->view('inc/sidebarMain.php');
				$this->load->view('inc/sidebarMenu.php');
				$this->load->view('modelo_modificar', $data1);
				$this->load->view('modelo_listar', $data2);
				$this->load->view('inc/footerAutor.php');
				$this->load->view('inc/footer.php');
			}
			else
			{
				//ok
				$idmodelo=$_POST['idmodelo'];
				$idusuario=$this->session->userdata('idusuario');			
				$fechaActualizacion=date('Y-m-d H:i:s');

				$data['nombreModelo']=strtoupper($_POST['nombreModelo']);
				$data['fechaActualizacion']=$fechaActualizacion;		
				$data['idUser']=$idusuario;
				$this->modelo_model->modificar($idmodelo,$data);
				//mensaje de modificacion		
				redirect('modelo/index/2','refresh');
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
			$idmodelo=$_POST['idmodelo'];			
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=0;
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;

			$this->modelo_model->desabilitar($idmodelo,$data);
			//mensaje de eliminacion		
			redirect('modelo/index/3','refresh');	
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
			$lista=$this->modelo_model->listaDesabilitados();
			$data['modelo']=$lista;
			//alerta de CRUD
			$data['msg']=$this->uri->segment(3);

			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');			
			$this->load->view('modelo_listarDesabilitados',$data);
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
			$idmodelo=$_POST['idmodelo'];			
			$fechaActualizacion=date('Y-m-d H:i:s');
			$idusuario=$this->session->userdata('idusuario');

			$data['estado']=1;
			$data['fechaActualizacion']=$fechaActualizacion;
			$data['idUser']=$idusuario;

			$this->modelo_model->modificar($idmodelo,$data);
			//mensaje de habilitacion		
			redirect('modelo/index/4','refresh');	
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}	
}