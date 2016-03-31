$(document).ready(function () {
    $('.newacc').hide();
    $(".payeer").show();

    $('.paysystem').change(function () {
        $('.newacc').hide();
        var syst = $(this).val().toLowerCase();
        $("." + syst).show();
    });
    $('.payinout').change(function () {
        var syst = $(this).val();
        $('.newacc').hide();
        var system = $('.paysystem').val().toLowerCase();
        $("." + system).show();
        switch (syst)
        {
            case '0':
                break;
            case '1':
                $('.out').hide();
                break;
            case '2':
                $('.in').hide();
                break;
        }
    });

    $('.toggle').click(function () {
        var text = $(this).html();
        var send = "";
        var system = "";
        var toggle = 0;
        if ($(this).hasClass('payeer'))
        {
            send = $('.payeersend').html();
            system = 'payeer';
        } 
        else
        {
            if ($(this).hasClass('perfectmoney'))
            {
                send = $('.perfectmoneysend').html();
                system = 'perfectmoney';
            } 
            else 
            {
                if ($(this).hasClass('advcash')) 
                {
                    send = $('.advcashsend').html();
                    system = 'advcash';
                }
            }
        }
        if(text == 'Активировать')
        {
            $(this).html('Деактивировать');
            toggle = 1;
            
        }
        else
        {
            $(this).html('Активировать');
        }
        $.post(
                '/admin',
                {
                    toggle: toggle,
                    id: send,
                    system: system
                }
        );
    });

    $(".ajax").click(function () {
        var id = $(this).attr('id').split('_')[0];
        var ru = id + "_russian", en = id + "_english", cn = id + "_chinese", vn = id + "_vietnamese";
        var ru_res = $("textarea[name='" + ru + "']").val();
        var en_res = $("textarea[name='" + en + "']").val();
        var cn_res = $("textarea[name='" + cn + "']").val();
        var vn_res = $("textarea[name='" + vn + "']").val();
        $.post(
                "/admin/translation",
                {
                    id: id,
                    russian: ru_res,
                    english: en_res,
                    chinese: cn_res,
                    vietnamese: vn_res
                }
        );
    });
});