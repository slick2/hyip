$(document).ready(function () {
	$(".oper-wrap input").each(function () {
		if($(this).val())
		{
			$(this).attr("readonly",true);
		}
	});
});