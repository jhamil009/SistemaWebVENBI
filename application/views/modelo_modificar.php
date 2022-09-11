<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mb-2">
            <h1>Administración de Modelos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">            
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/modelo/index">
                <i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Volver al registro de modelos</a>
              </li>
            </ol>
          </div>                  
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>    
    <!--Registro de Categorias-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">                
                <h3 class="card-title">Modificar Modelo</h3>
              </div>                
              <div class="card-body">
              <?php
              foreach ($infoModelo->result() as $row)
              {
              ?>
                <form action="<?php echo base_url(); ?>index.php/modelo/modificarbd" method="POST">
                  <input type="hidden" class="form-control" name="idmodelo" value="<?php echo $row->idModelo; ?>">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputModeloUpdate" class="form-label">Nombre del Modelo:</label>
                        <input type="text" class="form-control form-control-border" id="inputModeloUpdate" name="nombreModelo" placeholder="Ingrese el nombre del modelo" autocomplete="off" value="<?php echo set_value('nombreModelo', isset($row->nombreModelo) ? $row->nombreModelo : ''); ?>" disabled>
                        <span class="text-danger mb-0"><?php echo form_error('nombreModelo'); ?></span>
                      </div>
                    </div>
                    <div class="col-md-4 w-100">
                      <button class="btn btn-primary btn-block mt-4" type="button" id="btnHabilitarUpdate" onclick="habilitarInputModelUpdate()">
                        <i class="fas fa-arrow-alt-circle-left"></i> &nbsp;MODIFICAR
                      </button>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-success btn-block mt-4" id="btnModeloUpdate" type="submit" disabled>
                        <i class="far fa-save"></i> &nbsp;GUARDAR
                      </button>
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
    </section>    