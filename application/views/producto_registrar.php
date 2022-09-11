<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/producto/index">
                <i class="fas fa-list"></i>&nbsp;&nbsp;Volver a la lista de Productos</a>
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
            <div class="card mb-4">
              <div class="card-body">              
                <form action="<?php echo base_url(); ?>index.php/producto/agregarbd" method="POST" enctype="multipart/form-data">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label for="val01" class="form-label">Modelo:</label>
                      <select name="idmodelo" class="form-control">
                        <option selected disabled value="">Seleccione un modelo</option>
                        <?php foreach ($modelo->result() as $row) { ?>
                          <option value="<?php echo $row->idModelo; ?>"><?php echo $row->nombreModelo; ?></option>
                        <?php } ?>
                      </select>   
                      <span class="text-danger mb-0"><?php echo form_error('idmodelo'); ?></span>
                    </div>                 
                    <div class="col-md-4">
                      <label for="val02" class="form-label">Color:</label>
                      <select class="form-control" id="val02" name="color">
                        <option selected disabled value="">Seleccione un color</option>
                        <option value="Caqui" <?php echo set_select('color', 'Caqui'); ?> >Caqui</option>
                        <option value="Café" <?php echo set_select('color', 'Café'); ?> >Café</option>
                        <option value="Negro" <?php echo set_select('color', 'Negro'); ?> >Negro</option>
                        <option value="Verde" <?php echo set_select('color', 'Verde'); ?> >Verde</option>
                        <option value="Amarillo" <?php echo set_select('color', 'Amarillo'); ?> >Amarillo</option>
                        <option value="Canela" <?php echo set_select('color', 'Canela'); ?> >Canela</option>
                      </select>        
                      <span class="text-danger mb-0"><?php echo form_error('color'); ?></span>
                    </div>                                      
                    <div class="col-md-4">
                      <label for="val03" class="form-label">Precio Unitario (Bs.):</label>
                      <input type="number" class="form-control" id="val03" name="precio" step="any" placeholder="Ingrese el precio" autocomplete="off" value="<?php echo set_value('precio'); ?>">
                      <span class="text-danger mb-0"><?php echo form_error('precio'); ?></span>
                    </div>
                  </div>

                  <?php if(form_error('idmodelo')=="" && form_error('color')=="" && form_error('precio')==""){ ?>
                    <br>
                  <?php } ?>  

                  <div class="row g-3">
                    <div class="col-md-4">
                      <label for="val04" class="form-label">Cantidad de Tallas Nº38:</label>
                      <input type="number" class="form-control" id="val04" name="tallaN38" autocomplete="off" value="<?php echo set_value('tallaN38'); ?>" placeholder="Ingrese la cantidad de tallas Nº38">
                      <span class="text-danger mb-0"><?php echo form_error('tallaN38'); ?></span>
                    </div>
                    <div class="col-md-4">
                      <label for="val05" class="form-label">Cantidad de Tallas Nº39:</label>
                      <input type="number" class="form-control" id="val05" name="tallaN39" autocomplete="off" value="<?php echo set_value('tallaN39'); ?>" placeholder="Ingrese la cantidad de tallas Nº39">
                      <span class="text-danger mb-0"><?php echo form_error('tallaN39'); ?></span>
                    </div>          
                    <div class="col-md-4">
                      <label for="val06" class="form-label">Cantidad de Tallas Nº40:</label>
                      <input type="number" class="form-control" id="val06" name="tallaN40" autocomplete="off" value="<?php echo set_value('tallaN40'); ?>" placeholder="Ingrese la cantidad de tallas Nº40">
                      <span class="text-danger mb-0"><?php echo form_error('tallaN40'); ?></span>
                    </div>                  
                  </div>

                  <?php if(form_error('tallaN38')=="" && form_error('tallaN39')=="" && form_error('tallaN40')==""){ ?>
                    <br>
                  <?php } ?>  

                   <div class="row g-3">
                    <div class="col-md-6">
                      <label for="val07" class="form-label">Cantidad de Tallas Nº41:</label>
                      <input type="number" class="form-control" id="val07" name="tallaN41" autocomplete="off" value="<?php echo set_value('tallaN41'); ?>" placeholder="Ingrese la cantidad de tallas Nº41">
                      <span class="text-danger mb-0"><?php echo form_error('tallaN41'); ?></span>
                    </div>
                    <div class="col-md-6">
                      <label for="val08" class="form-label">Cantidad de Tallas Nº42:</label>
                      <input type="number" class="form-control" id="val08" name="tallaN42" autocomplete="off" value="<?php echo set_value('tallaN42'); ?>" placeholder="Ingrese la cantidad de tallas Nº42">
                      <span class="text-danger mb-0"><?php echo form_error('tallaN42'); ?></span>
                    </div>                 
                  </div>

                  <?php if(form_error('tallaN41')=="" && form_error('tallaN42')==""){ ?>
                    <br>
                  <?php } ?>  

                  <div class="row g-3">
                    <div class="col-md-12">
                      <label for="val09" class="form-label">Descripción:</label>
                      <textarea class="form-control" id="val09" name="descripcion" rows="2" placeholder="Ingresar la descripción del producto..." ><?php echo set_value('descripcion'); ?></textarea> 
                      <span class="text-danger mb-0"><?php echo form_error('descripcion'); ?></span>                    
                    </div>                                  
                  </div>

                  <?php if(form_error('descripcion')==""){ ?>
                    <br>
                  <?php } ?>                           

                  <div class="row g-3">
                    <div class="col-md-12">                      
                      <legend><i class="far fa-file-image"></i>&nbsp; Foto o portada del producto</legend>                        
                      <div class="row">
                        <div class="col-12 col-md-5">
                          <p>Tipo de archivo permitido: JPG. Tamaño máximo 5MB. Resolución recomendada 500px X 500px</p>
                          <input type="file" class="form-control-file" name="foto" id="foto" />
                          <span class="text-danger mb-0"><?php echo form_error('foto'); ?></span>             
                        </div>
                      </div>                                              
                    </div>
                  </div>
                  <?php if(form_error('foto')==""){ ?>
                    <br>
                  <?php } ?>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <button class="btn btn-primary btn-block" type="submit">
                        <i class="far fa-save"></i> &nbsp;GUARDAR
                      </button>
                    </div>
                    <div class="col-md-6 w-100">
                      <a class="btn btn-danger btn-block" href="<?php echo base_url(); ?>index.php/producto/index" role="button">
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
    <!-- /.content -->
