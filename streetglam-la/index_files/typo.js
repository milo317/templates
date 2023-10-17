(function($) {

  
	jQuery('#search-top .icon-search').click(function(){
      jQuery('#search-top .search-form').fadeIn('300');
      jQuery('#search-top .search-form .inputbox').focus().css("color","#000");
    });
    jQuery('#search-top .search-close').click(function(){
      jQuery('#search-top .search-form').fadeOut('300');
    });
  

  
   
    
    jQuery(window).scroll(function() {
      if (jQuery(this).scrollTop() > 200) {
        jQuery("#back-top").fadeIn()
      } else {
        jQuery("#back-top").fadeOut()
      }
    });
    


 $(document).ready(function(){
  $(window).load(function() {
      $('#loading').hide();
    });
  });
})(jQuery);