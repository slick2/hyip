$(document).ready(function () {
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