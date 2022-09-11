<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mb-2">
            <h1>Administración de Modelos Desabilitados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">            
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/modelo/listaDesabilitados">
                <i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a>
              </li>                        
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/modelo/index">
                <i class="fas fa-list"></i>&nbsp;&nbsp;Lista de Modelos Habilitados</a>
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
                <h3 class="card-title">Lista de Modelos Desabilitados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table-responsive table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="10%">#</th>                  
                    <th width="20%">Nombre</th>                   
                    <th width="25%">Fecha de Registro</th>
                    <th width="25%">Fecha de Actulización</th>                                                                            
                    <th width="10%">Habilitar</th>                                               
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $indice=1;
                    foreach ($modelo->result() as $row) 
                    {
                    ?>
                    <tr>
                      <td><?php echo $indice; ?></td>
                      <td><?php echo $row->nombreModelo; ?></td>                         
                      <td><?php echo formatearFecha($row->fechaRegistro); ?></td> 
                      <td><?php echo formatearFecha($row->fechaActualizacion); ?></td>                                                  
                      <td>
                          <?php
                          $atributos=array('class'=>'form-enabled');                          
                          echo form_open_multipart('modelo/habilitarbd',$atributos);
                          ?>
                              <input type="hidden" name="idmodelo" value=" <?php echo $row->idModelo; ?> ">
                              <button class="btn btn-success" type="submit">
                                <i class="fas fa-check-square"></i>
                              </button>
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