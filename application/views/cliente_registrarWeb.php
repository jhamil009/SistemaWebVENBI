<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Registro de Usuario</b></a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrar una nueva cuenta</p>      
      <form action="<?php echo base_url(); ?>index.php/cliente/agregarbd" method="POST">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre(s)" name="nombres" autocomplete="off" value="<?php echo set_value('nombres');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('nombres'); ?></span>
        </div>        
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Primer Apellido" name="apellidoPaterno" autocomplete="off" value="<?php echo set_value('apellidoPaterno');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('apellidoPaterno'); ?></span>  
        </div>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Segundo Apellido" name="apellidoMaterno" autocomplete="off" value="<?php echo set_value('apellidoMaterno');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>          
        </div>
        <?php if(form_error('nombres')!="" && form_error('apellidoPaterno')!="") { ?>
        <div class="mt-0 mb-3">
           <span class="text-success">* Este campo no es obligatorio.</span> 
        </div>         
        <?php } else { ?>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('apellidoMaterno'); ?></span>
        </div>
        <?php } ?>
        <div class="input-group">
          <input type="email" class="form-control" placeholder="Correo electrónico" name="email" autocomplete="off" value="<?php echo set_value('email');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>        
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Número de teléfono" name="telefono" autocomplete="off" value="<?php echo set_value('telefono');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('telefono'); ?></span>
        </div>        
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" autocomplete="off" value="<?php echo set_value('usuario');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-circle"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger mt-0 mb-3"><?php echo form_error('usuario'); ?></span>
        </div>        
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Contraseña" name="password" autocomplete="off" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contraseña debe empezar con una letra y contener al menos un dígito(número).">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>        
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="repassword" autocomplete="off" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contraseña debe empezar con una letra y contener al menos un dígito(número).">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>          
        </div>
        <div class="mt-0 mb-3">
          <span class="text-danger mt-0 mb-3"><?php echo form_error('repassword'); ?></span>
        </div>    
            
        <div class="row">                    
          <div class="col-sm-12 mb-2">
            <button id="btnRegisterWeb" type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
          </div>        
        </div>       
      </form>        
      <p class="text-center poppins-regular mb-0">¿Ya tienes una cuenta? 
        <a href="<?php echo base_url(); ?>index.php/cliente/index" class="font-weight-bold">Inicia sesión aquí</a>
      </p>
       <p class="text-center poppins-regular mt-1 mb-0">
        <a href="<?php echo base_url(); ?>index.php/tienda/index" class="font-weight-bold">Volver a la página principal</a>
      </p>      
    </div>    
  </div>
</div>