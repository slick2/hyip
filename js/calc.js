function calc() {
    var bday = Math.round($('#sum').val()*0.0236*100)/100;
    var rday = Math.round($('#sum').val()*0.01*100)/100;
    var month = Math.round((bday*22+rday*8)*100)/100;
    var month3 = Math.round(month*3*100)/100;
    var month6 = Math.round(month*6*100)/100;
    var year = Math.round(month*12*100)/100;
    //$('.sump').text($('#sum').val());
    $('.day').text("$"+bday);
    $('.month').text("$"+month);
    $('.3months').text("$"+month3);
    $('.6months').text("$"+month6);
    $('.year').text("$"+year);
}


  $('#sum').on('change input',function () {

function hide_notice() {
    $('#notice').hide(500);
}


    if ($('#sum').val() < 10 || $('#sum').val() > 10000)
    {
        $('#notice').show(200);
    
    } else {
        $('#notice').hide(500);
        calc();
    }

/*$('#sum').val($('#range').val());
$('#range').on('input change', function () {
    $('#sum').val($('#range').val());
});

$('#sum').on('input change', function () {
    $('#range').val($('#sum').val());
});*/
  });