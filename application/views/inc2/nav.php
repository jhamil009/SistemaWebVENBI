<body id="main-body" class="scroll">
    <header class="header full-box bg-white">
        <div class="header-brand full-box">
            <a href="<?php echo base_url(); ?>index.php/tienda">
                <img src="<?php echo base_url(); ?>externo/assets/img/logo3.jpg" alt="company" class="img-fluid">
            </a>
        </div>

        <div class="header-options full-box">
            <nav class="header-navbar full-box poppins-regular font-weight-bold scroll" onclick="show_menu_mobile()">
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="<?php echo base_url();?>index.php/tienda">
                            <i class="fas fa-home"></i>&nbsp;&nbsp;Inicio
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/tienda/catalogo">
                            <i class="fas fa-shopping-bag"></i>&nbsp;&nbsp;Catálogo
                        </a>
                    </li>                  
                    <li>
                        <a href="#">
                            <i class="fas fa-id-card-alt"></i>&nbsp;&nbsp;Contactos
                        </a>
                    </li>
                    <?php 
                    if(!$this->session->userdata('login'))
                    {
                    ?>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/cliente/agregarUsuario">
                                <i class="fa fa-user"></i>&nbsp;&nbsp;Registrarse
                            </a>
                        </li>                                      
                        <li>
                            <a href="<?php echo base_url();?>index.php/cliente">
                                <i class="fas fa-user-circle"></i>&nbsp;&nbsp;Iniciar Sesión
                            </a>
                        </li>                        
                    <?php
                    }
                    ?>                                        
                </ul>
            </nav>                    
            <?php 
            if($this->session->userdata('login') && $this->session->userdata('tipo')=='cliente' && $this->session->userdata('estado')==1)
            {
            ?>  
                <a href="<?php echo base_url();?>index.php/carrito" class="header-button full-box text-center" title="Carrito" >
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge bg-primary rounded-pill bag-count" >
                        <?php echo $this->cart->total_items(); ?>
                    </span>
                </a>                                                                             
                <div class="header-button full-box text-center" id="userMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo $this->session->userdata('login'); ?>" >
                    <i class="fas fa-user-circle"></i>                                                        
                </div>
                <div class="dropdown-menu div-bordered popup-login" aria-labelledby="userMenu">
                    <p class="text-center" style="padding-top: 10px;">
                        <i class="fas fa-user-circle fa-3x"></i><br>
                        <small><?php echo $this->session->userdata('login'); ?></small>
                    </p>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-shopping-cart"></i> &nbsp; Compras
                    </a>
                    <a class="dropdown-item" href="<?php echo base_url();?>index.php/cliente/logout">
                        <i class="fas fa-sign-out-alt"></i> &nbsp; Cerrar sesión
                    </a>
                </div> 
                <small class="font-weight-bold"><?php echo $this->session->userdata('login'); ?></small>     
            <?php
            }
            if($this->session->userdata('login') && $this->session->userdata('tipo')=='administrador' && $this->session->userdata('estado')==1)
            {
                $this->session->sess_destroy();
                redirect('tienda','refresh');
            }
            ?>
            <a href="javascript:void(0);" class="header-button full-box text-center d-lg-none" title="Menú" onclick="show_menu_mobile()" >
                <i class="fas fa-bars"></i>
            </a>
        </div>    
    </header>