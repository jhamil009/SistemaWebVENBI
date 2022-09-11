<body id="main-body" class="scroll">
    <div class="login-container">
		<div class="login-content">
			<figure class="full-box mb-4">
				<h3 class="text-center pb-1">Iniciar Sesión</h3>
				<img src="<?php echo base_url(); ?>externo/assets/avatar/2.png" alt="loginAdmin" class="img-fluid login-icon">
			</figure>
			<?php
			switch ($msg) {
				case '6':
					$mensaje="¡Gracias por usar el sistema!";
					break;
				case '7':
					$mensaje="¡Nombre de usuario o contraseña incorrecta!<br> Por favor ingresar datos validos.";
					break;
				case '8':
					$mensaje="¡Acceso no válido! <br> Por favor inicie sesión.";
					break;
				
				default:
					$mensaje="";
					break;
			} ?>
			<form action="<?php echo base_url(); ?>index.php/administrador/validar" method="POST" autocomplete="off">
				<div class="form-outline">
					<input type="text" class="form-control" id="login_usuario" name="login" maxlength="30">
					<label for="login_usuario" class="form-label" value="<?php echo set_value('login');?>">
						<i class="fas fa-user-secret"></i> &nbsp; Usuario
					</label>					
				</div>
				<div class="mt-0 mb-4">
					<span class="text-danger"><?php echo form_error('login'); ?></span>	
				</div>			
				<div class="form-outline">
					<input type="password" class="form-control" id="login_clave" name="password" maxlength="100">
					<label for="login_clave" class="form-label">
						<i class="fas fa-key"></i> &nbsp; Contraseña
					</label>
				</div>
				<div class="mt-0 mb-4">
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>				
				<button type="submit" class="btn btn-primary text-center mb-2 w-100">INICIAR SESIÓN</button>
			</form>
			<?php 
			if (!$mensaje=="") { ?>
				<p class="text-center text-danger mb-0"> <i class="fas fa-exclamation-circle"></i>&nbsp; <?php echo $mensaje;?></p>
			<?php }
			else { ?>
				<p class="mb-2"></p>
			<?php } ?>
		</div>
	</div>

<!-- MDBootstrap V5 -->
<script src="<?php echo base_url(); ?>externo/js/mdb.min.js" ></script>

<!-- General scripts -->
<script src="<?php echo base_url(); ?>externo/js/main.js" ></script>
</body>
</html>




