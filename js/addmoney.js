    $('#notice').hide();
$(document).ready(function () {


    $('.btn-full').click(function () {
        var cur = $(this).data('cur');
        var min = cur == "usd" ? 5 : 700;
        $('.log_invalid span').text("Минимальная сумма для данной платежной системы составляет "+min+" "+cur.toUpperCase());
        $('.btn-full').each(function () {
            $(this).removeClass("btn-full-active");
        });
        $(".new_depos").each(function () {
            $(this).removeClass("new_depos-active");
        });
        if ($(this).parent().hasClass("new_depos"))
            $(this).parent().addClass("new_depos-active");
        else
            $(this).parent().parent().addClass("new_depos-active");
        $(this).addClass("btn-full-active");
    });

});