  $('ul.tracks li').first().addClass('active');
  
  $("a#next").click(function(){
      var $toHighlight = $('.active').next('li').length > 0 ? $('.active').next('li') : $('.tracks li').first();
      $('.active').removeClass('active');
      $toHighlight.addClass('active');
  });