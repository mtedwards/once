$('document').ready(function(){
  var url = window.location.href; 
  var substr = url.split('?utm');
  
  if(substr[1]){
    var utm = substr[1];
    utm = 'utm' + utm; 
    $.cookie('utm', utm, { expires: 7, path: '/' });
  }

  var stored_utm = $.cookie('utm');

  if(stored_utm) {
      
      var sub_utm = stored_utm.split('&');
      
      for (var i = 0; i < sub_utm.length; i++) {  
        if(sub_utm[i].search('source') > -1){
          var source = sub_utm[i];
        }        
        if(sub_utm[i].search('campaign') > -1){
          var campaign = sub_utm[i];
        }
      }
      
      var source = source.split('=');
      var source = source[1];
      
      var campaign = campaign.split('=');
      var campaign = campaign[1];
      var Ticket_link = 'http://www.ticketmaster.com.au/Once-a-New-Musical-tickets/artist/1789689?camefrom=CFC_AU_GFO_ONCE_' + source + '_' + campaign;
      
      var links = $('a[href*="ticketmaster"]');
      
      for (var i = 0; i < links.length; i++) {
        link = links[i];
        $(link).attr('href',Ticket_link);
      }
    }
});
