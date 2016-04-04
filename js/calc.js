function calc() {
    var bday = Math.round($('#sum_calc').val() * 0.0236 * 100) / 100;
    var rday = Math.round($('#sum_calc').val() * 0.01 * 100) / 100;
    var month = Math.round((bday * 22 + rday * 8) * 100) / 100;
    var month3 = Math.round(month * 3 * 100) / 100;
    var month6 = Math.round(month * 6 * 100) / 100;
    var year = Math.round(month * 12 * 100) / 100;
    $('.sump').text($('#sum_calc').val());
    $('.day').text(bday);
    $('.month').text(month);
    $('.3months').text(month3);
    $('.6months').text(month6);
    $('.year').text(year);
}


function hide_notice() {
    $('#notice').hide(500);
}

$('#btn_calc').click(function () {

    if ($('#sum_calc').val() === "" || $('#sum_calc').val() === 0 || $('#sum_calc').val() < 10 || $('#sum_calc').val() > 10000)
    {
        $('#notice').show(200);
        setTimeout(hide_notice, 4000);
    } else {
        calc();
    }
});

$('#sum_calc').val($('#range').val());
$('#range').on('input change', function () {
    $('#sum_calc').val($('#range').val());
});

$('#sum_calc').on('input change', function () {
    $('#range').val($('#sum_calc').val());
});