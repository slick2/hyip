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