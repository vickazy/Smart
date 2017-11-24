$(document).ready(function () {
    $("#date-popover").popover({html: true, trigger: "manual"});
    $("#date-popover").hide();
    $("#date-popover").click(function (e) {
        $(this).hide();
    });

    // datatables
    $('#datatables').DataTable();
    $('.daterange').daterangepicker({
      "locale": {
        "format": "DD-MM-YYYY",
        "separator":" sampai "
      },
      "startDate": moment(),
      "endDate": moment(),
    }, function(start, end) {
      $('.start').val(start.format('YYYY-MM-DD'));
      $('.end').val(end.format('YYYY-MM-DD'));
    });
    $('.datepicker').datepicker();


});
