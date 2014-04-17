
  <?php // AdRoll SmartPixel Code ?>
  <script type="text/javascript">
    adroll_adv_id = "2TLAMKJMTRGH3ALECCN2WU";
    adroll_pix_id = "HUS3VZ6GNVHSRJVD5EAOUA";
    (function () {
    var oldonload = window.onload;
    window.onload = function(){
       __adroll_loaded=true;
       var scr = document.createElement("script");
       var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
       scr.setAttribute('async', 'true');
       scr.type = "text/javascript";
       scr.src = host + "/j/roundtrip.js";
       ((document.getElementsByTagName('head') || [null])[0] ||
        document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
       if(oldonload){oldonload()}};
    }());
  </script>
  
  
  <?php // Google remarketing code ?>
  <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 984139055;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
  </script>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
  <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/984139055/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
  </noscript>
  
  
  
  <?php // Classic Analytics just for Demographics etc ?>
  <script type="text/javascript">
  
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-44051658-2']);
    _gaq.push(['_trackPageview']);
  
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>