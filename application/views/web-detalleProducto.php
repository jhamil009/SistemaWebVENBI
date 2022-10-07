<div class="full-box bg-gray">
    <div class="container container-web-page">
        <h3 class="font-weight-bold poppins-regular text-uppercase">Detalles del producto</h3>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <p class="text-end">
                    <a href="<?php echo base_url(); ?>index.php/tienda/catalogo" class="btn btn-outline-primary">
                        <i class="fas fa-reply"></i> &nbsp; Regresar atrás
                    </a>
                </p>                
                <div class="col-12 col-lg-5">
                    <?php         
                    foreach($productoInfo->result() as $row)
                    {
                    $foto=$row->foto;
                    ?>
                        <figure class="full-box">
                            <img class="img-fluid" src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" alt="botas" style="-webkit-border-radius: 15px 15px 15px 15px;" />
                        </figure>                      
                    <?php        
                    }
                    ?>
                </div>
                <div class="col-12 col-lg-7">
                    <h4 class="font-weight-bold poppins-regular tittle-details">
                        CATERPILLAR <?php echo $row->nombreModelo; ?>
                    </h4>
                    <div class="container-fluid" style="padding-top: 15px;">
                        <?php foreach($productoInfo->result() as $row) { ?>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4"">
                                <strong class="text-uppercase"><i class="fas fa-tags fa-fw"></i> Modelo:</strong> 
                                &nbsp <?php echo $row->nombreModelo; ?>                            
                            </div>
                            <div class="col-12 col-md-6 mb-4"">
                                <strong class="text-uppercase"><i class="far fa-credit-card fa-fw"></i> Precio:</strong> 
                                &nbsp <?php echo $row->precioUnitario; ?> BOB
                            </div>                                                       
                            <div class="col-12 col-md-6 mb-4"">
                                <strong class="text-uppercase"><i class="fas fa-copyright fa-fw"></i> Marca:</strong>
                                &nbsp CATERPILLAR 
                            </div>
                             <div class="col-12 col-md-6 mb-4"">
                                <strong class="text-uppercase"><i class="fas fa-palette fa-fw"></i> Color:</strong>
                                &nbsp <?php echo $row->color; ?>                        
                            </div>
                            <div class="col-12 col-md-12 mb-4"">
                                <strong class="text-uppercase"><i class="fas fa-crown fa-fw"></i> Descripción:</strong>
                                &nbsp <?php echo $row->descripcion; ?>.                       
                            </div>                                                                                  
                        </div>
                    </div>                                                        
                    <?php } ?>
                    <p class="text-justify lead" style="padding-top: 10px;">
                        <span class="lead text-uppercase font-weight-bold">Seleccione la talla:</span><br>                        
                    </p>               
                    <div class="container-fluid" style="margin-bottom: 20px;">
                        <div class="row">                            
                            <?php foreach($productoTallas as $talla) { ?>
                                <div class="col-12 col-md-4">
                                    <form action="<?php echo base_url();?>index.php/carrito/agregarCarrito" method="POST">
                                        <input type="hidden" name="idproducto" value="<?php echo $talla['idProducto']; ?>">
                                        <input type="hidden" name="idtalla" value="<?php echo $talla['idTalla']; ?>">
                                        <input type="hidden" name="idstock" value="<?php echo $talla['idStock']; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $talla['precioUnitario']; ?>">
                                        <input type="hidden" name="modelo" value="<?php echo $talla['nombreModelo']; ?>">
                                        <input type="hidden" name="talla" value="<?php echo $talla['nombreTalla']; ?>">
                                        <input type="hidden" name="foto" value="<?php echo $talla['foto']; ?>">
                                        <input type="hidden" name="color" value="<?php echo $talla['color']; ?>">
                                        <button type="submit" class="btn btn-info" style="margin-top: 10px;">
                                            <?php echo $talla['nombreTalla']; ?>
                                        </button>                                                             
                                    </form>
                                </div>
                            <?php } ?>                              
                        </div>                        
                    </div>                                                                        
                </div>
            </div>
        </div>
    </div>
</div>