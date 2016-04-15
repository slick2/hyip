$(document).ready(function () {
	$(".table-setting input").each(function () {
		if($(this).val())
		{
		if($(this).attr('id')!='email'){
			$(this).attr("readonly",true);		
		}			
			
		}
	});
});
