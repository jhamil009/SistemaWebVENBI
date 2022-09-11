     
    <!-- Main content -->
    <section class="content">    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Modelos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table-responsive table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="10%">#</th>                  
                    <th width="20%">Nombre</th>                   
                    <th width="25%">Fecha de Registro</th>
                    <th width="25%">Fecha de Actualización</th>                                                        
                    <th>Modificar</th>  
                    <th>Desabilitar</th>                                               
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
                          echo form_open_multipart('modelo/modificar');
                          ?>
                              <input type="hidden" name="idmodelo" value=" <?php echo $row->idModelo; ?> ">
                              <button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i></button>
                          <?php 
                          echo form_close();
                          ?>
                      </td>                               
                      <td>
                          <?php
                          $atributos=array('class'=>'form-deleteModelo');                          
                          echo form_open_multipart('modelo/desabilitarbd',$atributos);
                          ?>
                              <input type="hidden" name="idmodelo" value=" <?php echo $row->idModelo; ?> ">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section><br><br><br>
    <!-- /.content -->