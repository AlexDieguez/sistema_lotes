$( document ).ready(function(){
  $(".button-collapse").sideNav();
  $("#table").DataTable({
    responsive:!0,
    ordering:!1,
    lengthMenu:[[5,15,25,-1],[5,15,25,"All"]],
    pageLength:5,
    orderCellsTop:!0,
    language:{
        url:"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }
});
$("#table thead").on("click",".form-control",function(e){e.stopPropagation()}),
$("#table thead").on("keyup change",".form-control",
    function(e){
        var a=$(this).attr("data-column"),
        s=$(this).val();
        $("#table").DataTable().columns(a).search(s).draw()}
    )})