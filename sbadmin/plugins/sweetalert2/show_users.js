(function(){
  
  $("tr td .form-delete").submit(function(ev){
    ev.preventDefault();
    
    Swal.fire({
      title: '¿Realmente quieres eliminar el registro?',
      text: "El registro será eliminado permanentemente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if(result.isConfirmed) {        
        $.ajax({
          url: '<?php echo base_url(); ?>index.php/producto/desabilitarbd',
          type: 'POST',
          success: function(){
             Swal.fire(
              'Eliminado!',
              'El registro ha sido eliminado.',
              'success'      
            )
          }
        });

        this.submit();
      }
    })
  })
})();