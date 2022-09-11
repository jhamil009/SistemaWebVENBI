<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mb-2">
            <h1>Administración de Productos Desabilitados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/producto/listaDesabilitados">
                <i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/producto/index">
                <i class="fas fa-list"></i>&nbsp;&nbsp;Lista de Productos Habilitados</a>
              </li>
            </ol>
          </div>           
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Productos Desabilitados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table-responsive table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="10%">Foto</th>
                    <th width="10%">Modelo</th>
                    <th width="30%">Descripción</th>
                    <th>Color</th>
                    <th>Precio Unitario</th>
                    <th>Stock Total</th>                    
                    <th>Fecha de Registro</th>                                    
                    <th>Habilitar</th>                                                                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $indice=1;
                    foreach ($producto->result() as $row) 
                    {
                    ?>
                    <tr>
                      <td><?php echo $indice; ?></td>
                      <td>
                        <?php 
                        $foto=$row->foto;
                        if($foto=="default.jpg" || $foto=="")
                        {
                        ?>
                            <img src="<?php echo base_url(); ?>/uploads/default.jpg" class="border border-dark" width=75>                       
                        <?php
                        }
                        else 
                        {
                        ?>
                          <img src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" class="border border-dark" width=75>
                        <?php  
                        }
                        ?>
                      </td>                    
                      <td><?php echo $row->nombreModelo; ?></td>
                      <td><?php echo $row->descripcion; ?></td>
                      <td><?php echo $row->color; ?></td>
                      <td><?php echo $row->precioUnitario; ?></td>
                      <td><?php echo $row->stockTotal; ?></td>                    
                      <td><?php echo formatearFecha($row->fechaRegistro); ?></td>                      
                      <td>
                        <?php 
                        $atributos=array('class'=>'form-enabled');
                        echo form_open_multipart('producto/habilitarbd',$atributos);
                        ?>
                          <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section><br><br><br>