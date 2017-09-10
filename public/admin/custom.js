$(document).ready(function () {
    $("#date-popover").popover({html: true, trigger: "manual"});
    $("#date-popover").hide();
    $("#date-popover").click(function (e) {
        $(this).hide();
    });

    // datatables
    $('#datatables').DataTable();
    $('.daterange').daterangepicker();
    $('.datepicker').datepicker();
});
