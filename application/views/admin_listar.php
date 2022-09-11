
  <div class="content-wrapper">    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mb-2">
            <h1>Administración de Administradores</h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/administrador/listar">
                <i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/administrador/agregar">
                <i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Agregar Nuevo Admin.</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/administrador/listaDesabilitados">
                <i class="fas fa-list"></i>&nbsp;&nbsp;Lista de Admins Desabilitados.</a>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Administradores</h3>
              </div>              
              <div class="card-body">
                <table id="example1" class="table-responsive table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre(s)</th>
                    <th>Apellido(s)</th>
                    <th>Correo Electrónico</th>                   
                    <th>Teléfono Celular</th> 
                    <th>Nombre de Usuario</th>                                        
                    <th>Fecha de Registro</th>                    
                    <th>Modificar</th>  
                    <th>Desabilitar</th>                                            
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $indice=1;
                    foreach ($empleado->result() as $row) 
                    {
                    ?>
                    <tr>
                      <td><?php echo $indice; ?></td>
                      <td><?php echo $row->nombres; ?></td>
                      <td><?php echo $row->primerApellido." ".$row->segundoApellido; ?></td>
                      <td><?php echo $row->email; ?></td>                        
                      <td><?php echo $row->telefono; ?></td>
                      <td><?php echo $row->nombreUsuario; ?></td>                                            
                      <td><?php echo formatearFecha($row->fechaRegistro); ?></td>                      
                      <td>
                          <?php  
                          echo form_open_multipart('administrador/modificar');
                          ?>
                              <input type="hidden" name="idempleado" value=" <?php echo $row->idUsuario; ?> ">
                              <button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i></button>
                          <?php 
                          echo form_close();
                          ?>
                      </td>                               
                      <td>
                          <?php 
                          $atributos=array('class'=>'form-delete');
                          echo form_open_multipart('administrador/desabilitarbd', $atributos);
                          ?>
                              <input type="hidden" name="idempleado" value=" <?php echo $row->idUsuario; ?> ">
                              <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                          <?php 
                          echo form_close();
                          ?>
                      </td>
                    </tr>
                    <?php
                    $indice++;
                    }
                    ?>
                  </tbody>                  
                </table>
              </div>              
            </div>            
          </div>          
        </div>        
      </div>
    </section><br><br><br>