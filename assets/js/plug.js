var nowDate = new Date();
var today = new Date();
today.setDate(today.getDate()+1);

$(document).ready(function() {
  $("#example1").dataTable();
  $('#example2').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
    "bAutoWidth": false,
    "bJQueryUI":true
  });
  $('#datatableBig').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": true,
    "iDisplayLength": 200,
    "aLengthMenu": [ 200, 400, 500, 1000 ],
    "bJQueryUI":false
  });
  $('#datatableMed').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": true,
    "iDisplayLength": 30,
    "aLengthMenu": [ 30, 100, 200, 500 ],
    "bJQueryUI":false
  });
  $('#datatableNopaging').dataTable({
    "bPaginate": false,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": false,
    "bAutoWidth": true,
    "iDisplayLength": 200,
    "aLengthMenu": [ 30, 100, 200, 500 ],
    "bJQueryUI":false
  });
  
  $('#dp').datepicker({
    language: "id",
    format: "dd-mm-yyyy",
    autoclose: true,
    todayHighlight: true,
    startDate: today 
  });
  $('#dp1').datepicker({
    language: "id",
    format: "dd-mm-yyyy",
    autoclose: true,
    todayHighlight: true,
    startDate: today 
  });

  $(".alert-success").delay(100).addClass("in").fadeOut(6000);
  $(".alert-danger").delay(100).addClass("in").fadeOut(7000);
});