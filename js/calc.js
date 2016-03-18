function calc() {
  var bday = Math.round($('#sum').val()*0.0236*100)/100;
  var rday = Math.round($('#sum').val()*0.01*100)/100;
  var month = Math.round((bday*22+rday*8)*100)/100;
  var month3 = Math.round(month*3*100)/100;
  var month6 = Math.round(month*6*100)/100;
  var year = Math.round(month*12*100)/100;;
  $('.sump').text($('#sum').val());
  $('.day').text(bday);
  $('.month').text(month);
  $('.3months').text(month3);
  $('.6months').text(month6);
  $('.year').text(year);
  $('#sum').change(function () {
    var bday = Math.round($('#sum').val()*0.0236*100)/100;
    var rday = Math.round($('#sum').val()*0.01*100)/100;
    var month = Math.round((bday*22+rday*8)*100)/100;
    var month3 = Math.round(month*3*100)/100;
    var month6 = Math.round(month*6*100)/100;
    var year = Math.round(month*12*100)/100;
    $('.sump').text($('#sum').val());
    $('.day').text(bday);
    $('.month').text(month);
    $('.3months').text(month3);
    $('.6months').text(month6);
    $('.year').text(year);
  });
}
