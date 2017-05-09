$(function(){
  $('.borrows .start_date').change(function(){
    var start_date = $('.borrows .start_date').val();
    var date       = new Date(start_date);

    if(new Date > date) {
      date = new Date;

      var dateFormat  = new DateFormat('yyyy-MM-dd');
      var start_date  = dateFormat.format(date);
      $('.borrows .start_date').val(start_date);
    }

    dayOfMonth     = date.getDate();
    date.setDate(dayOfMonth + 14);

    var dateFormat  = new DateFormat('yyyy-MM-dd');
    var finish_date = dateFormat.format(date);
    $('.borrows .finish_date').val(finish_date);
  });
});
