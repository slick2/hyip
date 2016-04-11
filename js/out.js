$(document).ready(function(){
    $('#outpercent').click(function(){
        $.post('/referral',{outperc:true},function(data){
            alert(data);
        });
    });
});