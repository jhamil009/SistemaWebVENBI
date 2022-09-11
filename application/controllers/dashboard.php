<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
		{
			$this->load->view('inc/header.php');
			$this->load->view('inc/navbar.php');				
			$this->load->view('inc/sidebarMain.php');
			$this->load->view('inc/sidebarMenu.php');			
			$this->load->view('dashboard-home');
			$this->load->view('inc/footerAutor.php');
			$this->load->view('inc/footer.php');								
		}
		else
		{
			redirect('administrador/index','refresh');
		}
	}

	//De la interfaz del administrador nos redirigimos al sitio web o la tienda
	public function homeTienda()
	{
		$this->session->sess_destroy();
		redirect('tienda/index','refresh');
	}
}
