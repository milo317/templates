 $(document).ready(function(){
                /* colorbox */
   
                $('.colorbox').colorbox(); 
                
                /* map */              
                
                $('#map .box').hover(function(){
                   var width = $(this).children('.arrow').width() - 55; 
                   $(this).children('.description').width(width).slideDown('fast'); 
                }, function() {
                    $(this).children(".description").slideUp('fast');
                });
                
                /* carousel */
                
                $('#carousel').jcarousel({
                wrap: 'circular'
                });
                
                /* ajax links */
                $("a.ajax").live("click", function (event) {
                    event.preventDefault();
                    
                    if ($(this).hasClass('delete')) {
                        if (confirm('Opravdu smazat?')) {
                            $.get(this.href);       
                        }                
                    }
                    else {
                        $.get(this.href);    
                    }
                });                  

 });