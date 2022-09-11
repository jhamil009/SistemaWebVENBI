<div class="bg-white full-box">
    <div class="container container-web-page">
                <h3 class="font-weight-bold poppins-regular text-uppercase">Productos en tienda</h3>
        <p class="text-justify mb-3">
            Bienvenido al menú de productos, aqui encontrara todos los productos disponibles en nuestra tienda. Puede ordenar los productos por orden alfabético o por precio en el botón "<i class="fas fa-sort-alpha-down fa-fw"></i> ORDENAR POR". Además, puede buscar productos por nombre haciendo clic en el botón "<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
        </p>
                
        <!--<div class="container-fluid" style="border-top: 1px solid #E1E1E1; padding: 20px; 0">
            <div class="row align-items-center">
                <div class="col-12 col-sm-4 text-center text-sm-start">
                    <button type="button" class="btn btn-link" data-mdb-toggle="modal" data-mdb-target="#saucerModal">
                        <i class="fas fa-search fa-fw"></i> &nbsp; Buscar
                    </button>
                </div>               
                <div class="col-12 col-sm-4 text-center text-sm-end">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="OrderSubMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort-alpha-down fa-fw"></i> &nbsp; Ordenar por
                        </button>
                        <div class="dropdown-menu" aria-labelledby="OrderSubMenu">
                            <a class="dropdown-item" href="#">Ascendente (A-Z)</a>
                            <a class="dropdown-item" href="#">Descendente (Z-A)</a>
                            <a class="dropdown-item" href="#">Precio (Menor a Mayor)</a>
                            <a class="dropdown-item" href="#">Precio (Mayor a Menor)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- Cesta del carrito -->
       <?php 
        if($this->session->userdata('login') && $this->session->userdata('tipo')=='cliente' && $this->session->userdata('estado')==1)
        {
        ?>  
        <div class="cart-view">
            <a class="btn btn-success" href="<?php echo base_url();?>index.php/carrito" title="View Cart">
                <i class="fas fa-shopping-cart"></i>
                <?php 
                if ($this->cart->total_items() > 0)
                {
                    if ($this->cart->total_items() > 1)
                    {
                        echo '&nbsp Hay un total de '.$this->cart->total_items().' productos';    
                    }
                    else 
                    {
                        echo '&nbsp Hay un total de '.$this->cart->total_items().' producto';   
                    }            
                }
                else 
                {
                    echo '&nbsp El carrito de compras esta vacio';  
                }                
                ?>        
            </a>
        </div>
        <?php
        }
        ?>
    
        <div class="container-cards full-box">
        <?php         
        foreach($producto as $row)
        {
        $foto=$row['foto'];
        ?>
            <div class="card-product div-bordered bg-white shadow-2">
                <figure class="card-product-img">
                    <img src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" class="img-fluid" alt="botas" />
                </figure>
                <div class="card-product-body">
                    <div class="card-product-content scroll">
                        <h4 class="text-center">
                            CATERPILLAR&nbsp;<?php echo $row['nombreModelo']; ?>
                        </h4>
                        <p class="text-center">
                            <?php echo $row['descripcion'];?>, color <?php echo $row['color'] ?>
                        </p>
                        <p class="text-center text-danger">
                            <?php echo $row['precioUnitario']; ?> Bs.
                        </p>                                               
                    </div>
                    <?php 
                    if($this->session->userdata('login') && $this->session->userdata('tipo')=='cliente' && $this->session->userdata('estado')==1)
                    {
                    ?>                                        
                    <!--<form action="<?php //echo base_url('index.php/carrito/agregarCarrito/'.$row['idProducto']); ?>" method="POST">-->
                    <form action="#" method="POST">
                        <div class="text-center card-product-options">
                            <button type="submit" class="btn btn-link btn-sm btn-rounded text-success" >
                                <i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar al carrito
                            </button>                                                
                        </div>
                    </form>
                    <?php
                    }
                    else
                    {
                    ?>
                    <form action="<?php echo base_url();?>index.php/cliente" method="POST">
                        <div class="text-center card-product-options">
                            <button type="submit" class="btn btn-link btn-sm btn-rounded text-success" >
                                <i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar al carrito
                            </button>                                            
                        </div>
                    </form>
                    <?php   
                    }
                    ?>                   
                </div>
            </div>
        <?php        
        }
        ?>
        </div>
    </div>
</div>

<!-- Modal de los botones buscar -->
<!--<div class="modal fade" id="saucerModal" tabindex="-1" aria-hidden="true" aria-labelledby="saucerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content FormularioAjax" action="http://localhost/proyectosEjemplos/STO-main/ajax/buscadorAjax.php" data-form="default" data-lang="es" method="POST" autocomplete="off">
            <input type="hidden" name="modulo" value="tienda">
            <div class="modal-header">
                <h5 class="modal-title" id="saucerModalLabel">Buscar producto</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-outline mb-4">
                    <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" name="busqueda_inicial" id="buscar_producto" maxlength="30">
                    <label for="buscar_producto" class="form-label">¿Qué estás buscando?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"><i class="fas fa-times fa-fw"></i> &nbsp; Cerrar</button>
                <button type="submit" class="btn btn-info"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar</button>
            </div>
        </form>
    </div>
</div>-->