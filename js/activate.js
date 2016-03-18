$(function () {                                      // Когда страница загрузится
    var location = window.location.href; // получаем адрес страницы
    $('.left-menue-lk a').each(function () {             // получаем все нужные нам ссылки
        
        var link = this.href;                // получаем адрес ссылки
        if(location == link) {               // при совпадении адреса ссылки и адреса окна
            $(this).addClass('active');  //добавляем класс
        }
    });
});