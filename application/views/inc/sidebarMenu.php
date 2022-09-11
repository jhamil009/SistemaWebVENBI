    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/dashboard/index" class="nav-link">
              <i class="nav-icon fab fa-dashcube"></i>
              <p>Dashboard</p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>Administradores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/administrador/agregar" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nuevo administrador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/administrador/listar" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Lista de administradores</p>
                </a>
              </li>             
            </ul>
          </li>         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>               
              <p>Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">          
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/cliente/agregar" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nuevo cliente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/cliente/listar" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Lista de clientes</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>Modelos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">                        
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/modelo/index" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Lista de modelos</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>               
              <p>Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/producto/agregar" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Agregar producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>index.php/producto/index" class="nav-link">
                  <i class="fas fa-boxes nav-icon"></i>
                  <p>Inventario de productos</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <i class=""></i>               
              <p>Pedidos & Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Ventas realizadas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-truck-loading nav-icon"></i>
                  <p>Pedidos pendientes</p>
                </a>
              </li>             
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>                        
              <p>Cuentas Bancarias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Agregar cuenta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Lista de cuentas</p>
                </a>
              </li>             
            </ul>
          </li>          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Configuraciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-store-alt nav-icon"></i>
                  <p>Microempresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Cuenta</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/dashboard/homeTienda" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Sitio Web</p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>index.php/administrador/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Cerrar sesión</p>
            </a>            
          </li>
        </ul>
      </nav>
    <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
  </aside>