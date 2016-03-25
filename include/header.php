<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
<meta charset="utf-8">
<title>Пирамида</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="ic1.png" sizes="16x16">
	<link rel="stylesheet" href="css/style.css" type='text/css' media='all'>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/lk-style.css">

	<script src="./js/calc.js"></script>

	<script type="text/javascript">
		$(function () {                                      // Когда страница загрузится
    $('.left-menue-lk a').each(function () {             // получаем все нужные нам ссылки
        var location = window.location.href; // получаем адрес страницы
        var link = this.href;                // получаем адрес ссылки
        if(location == link) {               // при совпадении адреса ссылки и адреса окна
            $(this).addClass('active');  //добавляем класс
        }
    });
});
	</script>
	<script>
		function tm()
		{
			var date = new Date();
			var f_minute = (date.getMinutes() < 10 ? '0' : '' ) + date.getMinutes();
			var f_second = (date.getSeconds() < 10 ? '0' : '' ) + date.getSeconds();
			$("#time").text(date.getHours()+":"+f_minute+":"+f_second);
		}
		$(document).ready(function () {
			setInterval(tm,1000);
		});

	</script>
</head>
<body>
