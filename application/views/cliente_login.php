<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">Sesión de Usuarios</a>
    </div>
    <div class="card-body">
      <h4 class="text-center">Iniciar sesión</h4>
      <form action="<?php echo base_url(); ?>index.php/cliente/validar" method="POST">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre de usuario" name="login" autocomplete="off" value="<?php echo set_value('login');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('login'); ?></span> 
        </div>

        <div class="input-group">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-0">
          <span class="text-danger"><?php echo form_error('password'); ?></span> 
        </div>

        <p class="mt-0 mb-3">
            <!--Se creara un form para modificar la contrasena depende el correo o nombre de usuario-->
            <a href="#">Olvidé mi contraseña</a>
        </p>

        <div class="row">          
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block mb-2">Iniciar sesión</button>
          </div>          
        </div>
      </form>

      <?php
      switch ($msg) {
        case '6':
          $mensaje="¡Nombre de usuario o contraseña incorrecta!<br> Por favor ingresar datos validos.";
          break;

        default:
          $mensaje="";
          break;
      }
      ?>                    
      <p class="text-center poppins-regular mb-0">¿No tienes cuenta? 
        <a href="<?php echo base_url(); ?>index.php/cliente/agregarUsuario" class="font-weight-bold">Regístrate aquí</a>
      </p>
      <p class="text-center poppins-regular mt-1 mb-2">
        <a href="<?php echo base_url(); ?>index.php/tienda/index" class="font-weight-bold">Volver a la página principal</a>
      </p>
      <?php 
      if (!$mensaje=="") { ?>
        <p class="text-center text-danger mt-1 mb-0"> <i class="fas fa-exclamation-circle"></i>&nbsp; <?php echo $mensaje;?></p>
      <?php } else { ?>
        <p class="mb-0"></p>
      <?php } ?>    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->