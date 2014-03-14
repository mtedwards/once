/*
  Other Elements:
  // "foundation/foundation.alerts.js"
  // "foundation/foundation.clearing.js"
  // "foundation/foundation.cookie.js"
  // "foundation/foundation.dropdown.js"

  // "foundation/foundation.joyride.js"
  // "foundation/foundation.magellan.js"
  // "foundation/foundation.orbit.js"
  // "foundation/foundation.reveal.js"
  // "foundation/foundation.section.js"
  // "foundation/foundation.tooltips.js"
  // "foundation/foundation.interchange.js"

  // "foundation/foundation.abide.js"
*/


// @codekit-prepend "foundation/foundation.js"
// @codekit-prepend "foundation/foundation.forms.js"
// @codekit-prepend "foundation/foundation.placeholder.js"
// @codekit-prepend "foundation/foundation.reveal.js"
// @codekit-prepend "foundation/foundation.topbar.js", "foundation/foundation.orbit.js"
// @codekit-prepend "fitvids.js"
// @codekit-prepend "respond.js"
// @codekit-prepend "cookie.js"
// @codekit-prepend "utm.js"


$(document ).ready(function() {
    $(document).foundation();

    
    $(".entry-content").fitVids();
    
    
	if($('.videos').length){
		$(function(){
			thumbs = $('.videos li a');
			vid = $(thumbs).first().data("vid");
			$('.video-object iframe').attr('src',vid);
			$(thumbs).click(function(){
			  vid = $(this).data("vid");
			  $('.video-object iframe').attr('src',vid);
			  return false;
			});
		});
	}
    
    // @codekit-prepend "slideshow.js"
    
    //form validation
    

     // Define Function to validate email
      function checkEmail(email) { 
          var pattern = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var emailVal = email;
          return pattern.test(emailVal);
      }

     // ON FORM SUBMISSION
    $('form.custom').on('click','input#submit',function(){ 

      // Hide any errors again (In case the form has already created errors).  
       $('.error').hide();

      // Define Variable for validation and to post
      var Firstname = $("input#Firstname").val();
      var LastName = $("input#Surname").val();
      var Email = $("input#Email").val();
      var State = $("select#State").val();


      // Validate Firstname
      if (Firstname == "") {
        $("input#Firstname").focus();
        $("input#Firstname").next().show();
        return false;
      } 

      // Validate LastName
      if (LastName == "") {
        $("input#Surname").focus();
        $("input#Surname").next().show();
        return false;
      } 

      //Validate email by running it through the function.
      if (!checkEmail(Email)) {
        $("input#Email").focus();
        $("input#Email").next().show();
        return false;
        }


        // Validate State
      if (State == "Select State") {
        $("select#State").focus();
        $("select#State").next().show();
        return false;
      }
    });
    
    
    $.fn.extend({ 
        rotaterator: function(options) {
 
            var defaults = {
                fadeSpeed: 1000,
                pauseSpeed: 5000,
				        child:null
            };
             
            var options = $.extend(defaults, options);
         
            return this.each(function() {
                  var o =options;
                  var obj = $(this);                
                  var items = $(obj.children(), obj);
				  items.each(function() {$(this).hide();})
				  if(!o.child){var next = $(obj).children(':first');
				  }else{var next = o.child;
				  }
				  $(next).fadeIn(o.fadeSpeed, function() {
						$(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function() {
							var next = $(this).next();
							if (next.length == 0){
									next = $(obj).children(':first');
							}
							$(obj).rotaterator({child : next, fadeSpeed : o.fadeSpeed, pauseSpeed : o.pauseSpeed});
						})
					});
            });
        }
    });
    
    
  $('.quotes').rotaterator({fadeSpeed:1000, pauseSpeed:6000});
    
    //Compact View Toggle
    
    $('.entry-content').on('click','a#toggle_compact',function(){
      $('ul#auditionees').toggleClass('compact');
      $(this).text($(this).text() == "Compact View" ? "Full View" : "Compact View");
    });
    
    if($(window).width() > "880") {
     (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=681730241853452";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs'); 
    }
});