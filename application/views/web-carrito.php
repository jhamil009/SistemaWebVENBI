<script>
// Actualizar cantidad de artículoy
function modificarItemCarrito(obj, rowid)
{
    $.get("<?php echo base_url();?>index.php/carrito/modificarCantidadItems", {rowid:rowid, qty:obj.value}, 
        function(respuesta)
        {
            if(respuesta == 'Ok')
            {
                location.reload();
            }
            else
            {
                alert('La actualización del carrito falló, inténtalo de nuevo.');
            }
        }
    );
}
</script>

<h1>COMPRAS CARRITO</h1>
<table class="table table-striped">
<thead>
    <tr>
        <th width="10%">Producto</th>
        <th width="30%">Modelo</th>
        <th width="15%">Precio</th>
        <th width="13%">Cantidad</th>
        <th width="20%" class="text-right">Subtotal</th>
        <th width="12%"></th>
    </tr>
</thead>
<tbody>
    <?php 
    if($this->cart->total_items() > 0)
    { 
        foreach($itemsCarrito as $item)
        {
        ?>
        <tr>
            <td>
                <?php 
                    $imageURL = !empty($item["image"])?base_url('uploads/'.$item["image"]):base_url('uploads/default.jpg'); 
                ?>
                <img src="<?php echo $imageURL; ?>" width="50"/>
            </td>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Bs&nbsp;'.$item["price"].' BOB'; ?></td>
            <td>
                <input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="modificarItemCarrito(this, '<?php echo $item["rowid"]; ?>')">
            </td>
            <td class="text-right"><?php echo 'Bs&nbsp;'.$item["subtotal"].' BOB'; ?></td>
            <td class="text-right">
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar el artículo?')?window.location.href='<?php echo base_url('index.php/carrito/removerItem/'.$item["rowid"]); ?>':false;">
                    <i class="fas fa-trash"></i> 
                </button>
            </td>
        </tr>
        <?php 
        } 
    }
    else
    { 
    ?>
        <tr>
            <td colspan="6">
                <p>Tu carrito esta vacío.....</p>
            </td>
        </tr>
    <?php 
    } 
    ?>
    <?php 
    if($this->cart->total_items() > 0)
    { 
    ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total de la compra</strong></td>
            <td class="text-right"><strong><?php echo 'Bs&nbsp;'.$this->cart->total().' BOB'; ?></strong></td>
            <td></td>
        </tr>
    <?php 
    }
    ?>    
</tbody>
</table>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 d-grid">
            <a href="<?php echo base_url(); ?>index.php/tienda/catalogo" class="btn btn-danger">Volver al Catalogo</a>      
        </div>
        <div class="col-sm-6 d-grid">
            <a href="<?php echo base_url(); ?>index.php/carrito/destroyCarrito" class="btn btn-success">Comprar Producto</a>
        </div>
    </div>
</div>