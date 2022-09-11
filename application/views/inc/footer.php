<!-- jQuery -->
<script src="<?php echo base_url();?>sbadmin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>sbadmin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>sbadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>sbadmin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>sbadmin/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>sbadmin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>sbadmin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>sbadmin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>sbadmin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- SweetAlert2 Show Users(Ventanas Modales)-->
<script src="<?php echo base_url();?>sbadmin/scripts/show_users.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>sbadmin/dist/js/adminlte.min.js"></script>

<!-- scripts desarrollados -->
<script>
function mostrarPassword()
{
    var tipo = document.getElementById('val07');
    var tipo2 = document.getElementById('val08');      

    if(tipo.type == "password" || tipo2.type == "password")
    {
        tipo.type = "text";
        tipo2.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }
    else
    {
        tipo.type = "password";
        tipo2.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }  
}
//Habilitar input nombreModelo
function habilitarInputModelInsert()
{
  //input
  document.getElementById('inputModeloInsert').disabled=false;
  document.getElementById('inputModeloInsert').focus();

  //button
  document.getElementById('btnModeloInsert').disabled=false;  
  document.getElementById('btnHabilitarInsert').disabled=true;
}
function habilitarInputModelUpdate()
{
  const input = document.getElementById('inputModeloUpdate');
  input.disabled=false

  //focus
  const end = input.value.length;  
  input.setSelectionRange(end, end);
  input.focus();
  
  //button
  document.getElementById('btnModeloUpdate').disabled=false;  
  document.getElementById('btnHabilitarUpdate').disabled=true;
}
</script>

<script>
  //Traduccion de dataTable a español  
  let mensaje = '<?php echo $msg; ?>';
  switch(mensaje)
  {
    //Registro con exito
    case '1':
      Swal.fire(
          '¡Registro con éxito!',
          'Se agrego un nuevo registro.',
          'success'
        );
    break;
    //Modificacion con exito
    case '2':
      Swal.fire(
          '¡Modificación con éxito!',
          'El registro ha sido actualizado.',
          'success'
        );
    break;
    //Desabilitacion con exito
    case '3':
      Swal.fire(
          '¡Desabilitación con éxito!',
          'El registro ha sido desabilitado.',
          'success'
        );
    break;
    //Habilitacion con exito
    case '4':
      Swal.fire(
          '¡Habilitación con éxito!',
          'El registro ha sido habilitado nuevamente.',
          'success'
        );
    break;    
    //Mensaje de error
    case '10':
      Swal.fire(
          '¡Error!',
          'Volver a intentar.',
          'error'
        );
    break;
  }  
</script>

<script>
  //Mensaje de Registro de usuarios WEB
  /*$(document).ready(function(){
      $("#btnRegisterWeb").click(function(e){

        e.preventDefault();
          alert("Registro de nueva cuenta, existosamente.");
      });
  });  */
</script>

<script>
  $(function () {
   $('#example1').DataTable({      
      "fixedHeader": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All'],
        ],
      
      //traduccion al español dataTable
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros de 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior",
        },
        "sProcessing": "Procesando...",
      }
    });    
  });
</script>
</body>
</html>
