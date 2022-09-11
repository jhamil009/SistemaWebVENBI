
  <div class="content-wrapper">    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modificar Usuario Cliente</h1>
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
      <div class="row mb-0">
        <div class="col-sm-12">
          <h6 class="text-danger ml-2">Solo se puede modificar los datos personales del usuario cliente.</h6>
        </div>
      </div>    
    </section>
    
    <section class="content">    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-body">
              <?php
              foreach ($infoCliente->result() as $row)
              {        
              ?>              
                <form action="<?php echo base_url(); ?>index.php/cliente/modificarbd" method="POST">
                  <input type="hidden" class="form-control" name="idcliente" value="<?php echo $row->idUsuario; ?>">
                  <fieldset disabled>
                    <legend>Datos de Usuario</legend>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="val06" class="form-label">Nombre de Usuario:</label>
                        <input type="text" class="form-control" id="val06" name="usuario" autocomplete="off" value="<?php echo $row->nombreUsuario;?>">
                      </div>                     
                      <div class="col-md-6">
                        <label for="val07" class="form-label">Contraseña:</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="val07" name="password" autocomplete="off" value="<?php echo $row->password; ?>">
                          <div class="input-group-append">
                            <button class="btn btn-secondary" type="button">
                              <span class="fa fa-eye-slash icon"></span>
                            </button>
                          </div>
                        </div>                      
                      </div>
                    </div>
                  </fieldset>
                  <br>
                  <fieldset>
                    <legend>Datos Personales</legend>
                    <div class="row g-3">
                      <div class="col-md-4">
                        <label for="val01" class="form-label" >Nombre(s):</label>
                        <input type="text" class="form-control" id="val01" name="nombres" placeholder="Ingrese el nombre(s)" autocomplete="off" value="<?php echo set_value('nombres', isset($row->nombres) ? $row->nombres : "");?>">
                        <span class="text-danger mb-0"><?php echo form_error('nombres'); ?></span>
                      </div>
                      <div class="col-md-4">
                        <label for="val02" class="form-label">Primer Apellido:</label>
                        <input type="text" class="form-control" id="val02" name="apellidoPaterno" placeholder="Ingrese el primer apellido" autocomplete="off" value="<?php echo set_value('apellidoPaterno', isset($row->primerApellido) ? $row->primerApellido : "");?>">
                        <span class="text-danger mb-0"><?php echo form_error('apellidoPaterno'); ?></span>
                      </div>
                      <div class="col-md-4">
                        <label for="val03" class="form-label">Segundo Apellido:</label>
                        <input type="text" class="form-control" id="val03" name="apellidoMaterno" placeholder="Ingrese el segundo apellido" autocomplete="off" value="<?php echo set_value('apellidoMaterno', isset($row->segundoApellido) ? $row->segundoApellido : "");?>"> 
                        <span class="text-danger mb-0"><?php echo form_error('apellidoMaterno'); ?></span>
                      </div>
                    </div>
                    <?php if(form_error('nombres')=="" && form_error('apellidoPaterno')=="") { ?>
                      <br>
                    <?php } ?>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="val04" class="form-label">Correo Electrónico:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validatedInputGroupPrepend">@</span>
                          </div>
                          <input type="email" class="form-control" id="val04" name="email" autocomplete="off" value="<?php echo set_value('email', isset($row->email) ? $row->email : "");?>">                          
                        </div> 
                        <span class="text-danger mb-0"><?php echo form_error('email'); ?></span>                     
                      </div>
                       <div class="col-md-6">
                        <label for="val05" class="form-label">Teléfono Celular:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="validatedInputGroupPrepend">+591</span>
                          </div>
                          <input type="text" class="form-control" id="val05" name="telefono" placeholder="Ingrese el número de teléfono" autocomplete="off" value="<?php echo set_value('telefono', isset($row->telefono) ? $row->telefono : "");?>">
                        </div>
                        <span class="text-danger mb-0"><?php echo form_error('telefono'); ?></span>
                      </div>
                    </div>
                  </fieldset>
                  <?php if(form_error('telefono')=="" && form_error('email')=="") { ?>
                    <br>
                  <?php } ?>   
                  <br>         
                  <div class="row g-3">
                    <div class="col-md-6">
                      <button class="btn btn-primary btn-block" type="submit"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
                    </div>
                    <div class="col-md-6 w-100">
                      <a class="btn btn-danger btn-block" href="<?php echo base_url(); ?>index.php/cliente/listar" role="button">
                        <i class="fas fa-arrow-alt-circle-left"></i> &nbsp;CANCELAR
                      </a>
                    </div>                  
                  </div>              
                </form>
              <?php 
              }      
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><br><br><br>
    <!-- /.content -->
