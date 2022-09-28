<div class="bg-white full-box">
    <div class="container container-web-page">
                <h3 class="font-weight-bold poppins-regular text-uppercase">Productos en tienda</h3>
        <p class="text-justify mb-3">
            Bienvenido al menú de productos, aqui encontrara todos los productos disponibles en nuestra tienda. Puede ordenar los productos por orden alfabético o por precio en el botón "<i class="fas fa-sort-alpha-down fa-fw"></i> ORDENAR POR". Además, puede buscar productos por nombre haciendo clic en el botón "<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
        </p>       
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
        foreach($productos->result() as $row)
        {
        $foto=$row->foto;
        ?>
            <div class="card-product div-bordered bg-white shadow-2">
                <figure class="card-product-img">
                    <img src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" class="img-fluid" alt="botas" />
                </figure>
                <div class="card-product-body">
                    <div class="card-product-content scroll">
                        <h4 class="text-center">
                            CATERPILLAR&nbsp;<?php echo $row->nombreModelo; ?>
                        </h4>
                        <p class="text-center">
                            <?php echo $row->descripcion;?>, color <?php echo $row->color; ?>
                        </p>
                        <p class="text-center text-danger">
                            <?php echo $row->precioUnitario; ?> Bs.
                        </p>                                               
                    </div>
                    <?php 
                    if($this->session->userdata('login') && $this->session->userdata('tipo')=='cliente' && $this->session->userdata('estado')==1)
                    {
                    ?>                                        
                    <!--<form action="<?php //echo base_url('index.php/carrito/agregarCarrito/'.$row['idProducto']); ?>" method="POST">-->
                    <form action="<?php echo base_url();?>index.php/tienda/detalleProducto" method="POST">
                        <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
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