<div class="banner">
    <div class="banner-body">
        <h3 class="text-uppercase">Bienvenido a VENBI</h3>
        <p>Los mejores productos y la mejor calidad los encuentras en VENBI</p>
    </div>
</div>

<div class="container-fluid container-web-page border-bottom bg-white">
    <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros servicios</h3>
    <br>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <p class="text-center"><i class="fas fa-shipping-fast fa-5x"></i></p>
            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Envíos a domicilio</h5>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <p class="text-center"><i class="fas fa-boxes fa-5x"></i></p>
            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Ventas al por mayor</h5>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <p class="text-center"><i class="fas fa-store-alt fa-5x"></i></p>
            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Puntos de Entrega</h5>
            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <dir class="col-12 col-md-12">
            <figure class="full-box">
                <img src="<?php echo base_url(); ?>externo/assets/img/portadaInicio2.jpg" alt="registration_company" class="img-fluid" style="width: 100%;">
            </figure>
        </dir>
    </div>
</div><br>
<div class="container-fluid">
    <h3 class="text-uppercase poppins-regular" style="margin-left: 8px;">NUEVOS PRODUCTOS</h3>
    <div class="row">
        <?php foreach ($productosNuevos->result() as $row) {  ?>
        <div class="col-sm-3">
            <div class="container-cards full-box">
                <div class="card-product div-bordered bg-white shadow-2">
                    <figure class="card-product-img">
                        <img src="<?php echo base_url(); ?>/uploads/<?php echo $row->foto; ?>" class="img-fluid" alt="botas" />
                    </figure>
                    <div class="card-product-body">
                        <div class="card-product-content scroll">
                            <h4 class="text-center">
                                CATERPILLAR&nbsp;<?php echo $row->nombreModelo; ?>
                            </h4>
                            <p class="text-center">
                                <?php echo $row->descripcion;?>, color <?php echo $row->color ?>
                            </p>
                            <p class="text-center text-danger">
                                <?php echo $row->precioUnitario; ?> Bs.
                            </p>                                               
                        </div>                      
                    </div>
                </div>
            </div>
        </div>        
        <?php } ?>
    </div>
</div><br>

<div class="container-fluid">
    <div class="row">
        <dir class="col-12 col-md-12">
            <figure class="full-box">
                <img src="<?php echo base_url(); ?>externo/assets/img/portadaInicio1.jpg" alt="registration_company" class="img-fluid" style="width: 100%;">
            </figure>
        </dir>
    </div>
</div>

<?php if(!$this->session->userdata('login')) { ?>
<div class="container container-web-page">
    <div class="row justify-content-md-center">
        <div class="col-12 col-md-6">
            <figure class="full-box">
                <img src="<?php echo base_url(); ?>externo/assets/img/registration.png" alt="registration_company" class="img-fluid">
            </figure>
        </div>
        <div class="w-100"></div>
        <div class="col-12 col-md-6">
            <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Crea tu cuenta</h3>
            <p class="text-justify">
                Crea tu cuenta para poder realizar pedidos de productos hasta la puesta de tu casa, es muy fácil y rápido.
            </p>
             <p class="text-center">
                <a href="<?php echo base_url(); ?>index.php/cliente/index" class="btn btn-primary">Iniciar Sesión</a>
            </p>
            <p class="text-center">
                <a href="<?php echo base_url(); ?>index.php/cliente/agregarUsuario" class="btn btn-primary">Crear cuenta</a>
            </p>
        </div>
    </div>
</div>
<?php } ?>