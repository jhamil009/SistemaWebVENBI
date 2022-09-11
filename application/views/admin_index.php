<br>
<div class="container">
	<div class="row">
		<div class="col">
			<h1>Bienvenido Administrador</h1>
			<h2>Nombre Usuario: <?php echo $this->session->userdata('login'); ?> </h2>
			<h2>Tipo: <?php echo $this->session->userdata('tipo'); ?> </h2>

			<h2>Cantidad de administradores habilitados: 
				<?php echo $this->admin_model->cantidadAdmin(); ?>
			</h2>				
			<h2>ID de Usuario: <?php echo $this->session->userdata('idusuario'); ?> </h2>
		</div>
	</div>
</div>