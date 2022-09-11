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
                <i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/modelo/listaDesabilitados">
                <i class="fas fa-list"></i>&nbsp;&nbsp;Lista de Modelos Desabilitados</a>
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
                <h3 class="card-title">Registro de Modelo</h3>                
              </div>                
              <div class="card-body">
                <form action="<?php echo base_url(); ?>index.php/modelo/agregarbd" method="POST">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputModeloInsert" class="form-label">Nombre del Modelo:</label>
                        <input type="text" class="form-control form-control-border" id="inputModeloInsert" name="nombreModelo" placeholder="Ingrese el nombre del modelo" autocomplete="off" value="<?php echo set_value('nombreModelo'); ?>" disabled>
                        <span class="text-danger mb-0"><?php echo form_error('nombreModelo'); ?></span>
                      </div>
                    </div>                    
                    <div class="col-md-4 w-100">
                      <button class="btn btn-primary btn-block mt-4" type="button" id="btnHabilitarInsert" onclick="habilitarInputModelInsert()">
                        <i class="fas fa-arrow-alt-circle-left"></i> &nbsp;REGISTRAR
                      </button>                      
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-success btn-block mt-4" id="btnModeloInsert" type="submit" disabled>
                        <i class="far fa-save"></i> &nbsp;GUARDAR
                      </button>
                    </div>
                  </div>
                </form>
              </div>              
            </div>
          </div>
        </div>        
      </div>
    </section>