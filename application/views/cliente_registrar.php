
  <div class="content-wrapper">    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Usuarios Clientes</h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/cliente/listar">
                <i class="fas fa-list"></i>&nbsp;&nbsp;Volver a la lista de Clientes</a>
              </li>
            </ol>
          </div>          
        </div>
      </div>      
    </section>
    
    <section class="content">    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-body">              
                <form action="<?php echo base_url(); ?>index.php/cliente/agregarbd" method="POST">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label for="val01" class="form-label">Nombre(s):</label>
                      <input type="text" class="form-control" id="val01" name="nombres" placeholder="Ingrese el nombre(s)" autocomplete="off" value="<?php echo set_value('nombres');?>">
                      <span class="text-danger mb-0"><?php echo form_error('nombres'); ?></span>
                    </div>
                    <div class="col-md-4">
                      <label for="val02" class="form-label">Primer Apellido:</label>
                      <input type="text" class="form-control" id="val02" name="apellidoPaterno" placeholder="Ingrese el primer Apellido" autocomplete="off" value="<?php echo set_value('apellidoPaterno');?>"> 
                      <span class="text-danger mb-0"><?php echo form_error('apellidoPaterno'); ?></span>                  
                    </div>
                    <div class="col-md-4">
                      <label for="val03" class="form-label">Segundo Apellido:</label>
                      <input type="text" class="form-control" id="val03" name="apellidoMaterno" placeholder="Ingrese el segundo Apellido" autocomplete="off" value="<?php echo set_value('apellidoMaterno');?>">                                   
                      <?php if(form_error('nombres')!="" && form_error('apellidoPaterno')!="") { ?>
                        <span class="text-success mb-0">* Este campo no es obligatorio.</span> 
                      <?php } ?>
                    </div>                  
                  </div>
                  <?php if(form_error('nombres')=="" && form_error('apellidoPaterno')=="") { ?>
                    <br>
                  <?php } ?>                                    
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="val04" class="form-label">Correo Electr??nico:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validatedInputGroupPrepend">@</span>
                        </div>
                        <input type="email" class="form-control" id="val04" name="email" placeholder="Ingrese el correo electr??nico" autocomplete="off" value="<?php echo set_value('email');?>">
                      </div>
                      <span class="text-danger mb-0"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="col-md-6">
                      <label for="val05" class="form-label">Tel??fono Celular:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="validatedInputGroupPrepend">+591</span>
                        </div>
                        <input type="text" class="form-control" id="val05" name="telefono" placeholder="Ingrese el n??mero de tel??fono" autocomplete="off" value="<?php echo set_value('telefono');?>">
                      </div>
                      <span class="text-danger mb-0"><?php echo form_error('telefono'); ?></span>
                    </div>              
                  </div>
                  <?php if(form_error('email')=="" && form_error('telefono')=="") { ?>
                    <br>
                  <?php } ?> 
                   <div class="row g-3">
                    <div class="col-md-4">
                      <label for="val06" class="form-label">Nombre de Usuario:</label>
                      <input type="text" class="form-control" id="val06" name="usuario" placeholder="Ingrese el nombre de usuario" autocomplete="off" value="<?php echo set_value('usuario');?>">
                      <span class="text-danger mb-0"><?php echo form_error('usuario'); ?></span>
                    </div>
                    <div class="col-md-4">
                      <label for="val07" class="form-label">Contrase??a:</label>
                      <div class="input-group">
                        <input type="password" class="form-control" id="val07" name="password" placeholder="Ingrese la contrase??a" autocomplete="off" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contrase??a debe empezar con una letra y contener al menos un d??gito(n??mero).">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" type="button" onclick="mostrarPassword()">
                            <span class="fa fa-eye-slash icon"></span> 
                          </button>
                        </div>                        
                      </div>
                      <span class="text-danger mb-0"><?php echo form_error('password'); ?></span>          
                    </div>
                    <div class="col-md-4">
                      <label for="val08" class="form-label">Repetir Contrase??a:</label>
                      <div class="input-group">
                        <input type="password" class="form-control" id="val08" name="repassword" placeholder="Vuelva a ingresar la contrase??a" autocomplete="off" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contrase??a debe empezar con una letra y contener al menos un d??gito(n??mero).">
                        <div class="input-group-append">
                          <button class="btn btn-secondary" type="button" onclick="mostrarPassword()">
                            <span class="fa fa-eye-slash icon"></span> 
                          </button>
                        </div>
                      </div>
                      <span class="text-danger mb-0"><?php echo form_error('repassword'); ?></span>          
                    </div>
                  </div>
                  <?php if(form_error('usuario')=="" && form_error('password')=="" && form_error('repassword')=="") { ?>
                    <br>
                  <?php } ?> 
                  <div class="row g-3">
                    <div class="col-md-6">
                      <button class="btn btn-primary btn-block mb-3 mt-1" type="submit">
                        <i class="far fa-save"></i> &nbsp; GUARDAR
                      </button>
                    </div>
                    <div class="col-md-6 w-100">
                      <a class="btn btn-danger btn-block mb-3 mt-1" href="<?php echo base_url(); ?>index.php/cliente/listar" role="button">
                        <i class="fas fa-arrow-alt-circle-left"></i> &nbsp;CANCELAR
                      </a>
                    </div>                  
                  </div>              
                </form>                                          
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br>