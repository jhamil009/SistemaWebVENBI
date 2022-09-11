(function(){
  
  $("tr td .form-delete").submit(function(ev){
    ev.preventDefault();
    
    Swal.fire({
      title: '¿Realmente quieres desabilitar el registro?',
      text: "¡El registro será desabilitado, y no se mostrará en la lista de registros!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if(result.isConfirmed) {                      
        this.submit();
      }
    })
  })
})();

(function(){
  
  $("tr td .form-deleteModelo").submit(function(ev){
    ev.preventDefault();
    
    Swal.fire({
      title: '¿Realmente quieres desabilitar el registro?',
      text: "¡El registro será desabilitado, como también los productos con el modelo enlazado!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if(result.isConfirmed) {                     
        this.submit();        
      }
    })
  })
})();

(function(){  
  $("tr td .form-enabled").submit(function(ev){
    ev.preventDefault();
    
    Swal.fire({
      title: '¿Realmente quieres habilitar el registro?',
      text: "¡El registro será habilitado, nuevamente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, habilitar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if(result.isConfirmed) {                     
        this.submit();        
      }
    })
  })
})();