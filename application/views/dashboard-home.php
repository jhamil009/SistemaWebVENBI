
  <div class="content-wrapper">    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/dashboard/index">
                <i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a>
              </li>
              <li class="breadcrumb-item active">
                <i class="nav-icon fab fa-dashcube"></i>&nbsp;&nbsp;Dashboard
              </li>
            </ol>
          </div> 
        </div>
      </div>
    </div> 

    <section class="content">
      <div class="container-fluid">
        <h5 class="mb-2">Reportes</h5>
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger">
                <i class="fas fa-hand-holding-usd"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total recaudado<br> en ventas</span>
                <span class="info-box-number">0 bs</span>
              </div>              
            </div>            
          </div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info">
                <i class="fas fa-shopping-basket"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Producto más <br>vendido</span>
                <span class="info-box-number">Ninguno</span>
              </div>              
            </div>            
          </div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning">
                <i class="fas fa-calculator"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Cantidad total<br>ventas realizadas</span>
                <span class="info-box-number">0</span>
              </div>              
            </div>            
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success">
                <i class="fas fa-user-plus"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total de usuarios<br> registrados</span>
                <span class="info-box-number">
                  <?php echo $this->reportes_model->cantidadUsuariosRegistrados(); ?>
                </span>
              </div>              
            </div>            
          </div>          
        </div>        
      </div>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">        
        <div class="row">
          <div class="col-lg-3 col-6">            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $this->reportes_model->cantidadAdmin(); ?></h3>
                <h5>Administradores</h5>
              </div>
              <div class="icon">
                <i class="fas fa-user-secret"></i>
              </div>
              <a href="<?php echo base_url(); ?>index.php/administrador/listar" class="small-box-footer">Más Información
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $this->reportes_model->cantidadCliente(); ?></h3>
                <h5>Clientes</h5>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo base_url(); ?>index.php/cliente/listar" class="small-box-footer">Más Información
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">          
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $this->reportes_model->cantidadModelo(); ?></h3>
                <h5>Modelos</h5>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-tag"></i>
              </div>
              <a href="<?php echo base_url(); ?>index.php/modelo/index" class="small-box-footer">Más Información
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">          
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->reportes_model->cantidadProducto(); ?></h3>
                <h5>Productos</h5>
              </div>
              <div class="icon">
                <i class="fas fa-box-open"></i>
              </div>
              <a href="<?php echo base_url(); ?>index.php/producto/index" class="small-box-footer">Más Información
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">          
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>0</h3>
                <h5>Ventas</h5>
              </div>
              <div class="icon">
                <i class="fas fa-cash-register"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">          
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>0</h3>
                <h5>Pedidos Pendientes</h5>
              </div>
              <div class="icon">
                <i class="fas fa-truck-loading"></i>
              </div>
              <a href="#" class="small-box-footer">Más Información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">          
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>0</h3>
                <h5>Cuentas Bancarias</h5>
              </div>
              <div class="icon">
                <i class="fas fa-university"></i> 
              </div>
              <a href="#" class="small-box-footer">Más Información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!--<div class="col-lg-3 col-6">          
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>Total de Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>-->

        </div>
      </div>
    </section><br><br><br>