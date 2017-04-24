$(function(){
  $('[name=authors]').change(function(){
    var text = $('[name=authors] option:selected').text();

    var firstName = text.match(/ .+/)[0].replace(/\s+/g, '');
    var lastName  = text.replace(firstName, '').replace(/\s+/g, '');

    $('.books__author_firstname').val(firstName);
    $('.books__author_lastname' ).val(lastName);
  });
});
