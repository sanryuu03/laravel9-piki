$(document).ready(function(){
    var date_input=$('input[name="date"]');
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        //format: 'mm/dd/yyyy',
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
})

$(document).ready(function(){
    var date_input=$('input[name="tanggal"]');
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        //format: 'mm/dd/yyyy',
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
})

$(document).ready(function(){
    var date_input=$('input[name="bulan"]');
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        //format: 'mm/dd/yyyy',
        format: 'MM',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
})
