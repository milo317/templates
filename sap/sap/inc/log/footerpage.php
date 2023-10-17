</div>
</div>

<div id="footer">
<div class="inner">

<div class="f1">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('footer-column1') ) : ?>		        

<ul>
<li>Heidelwerb Werbetechnik GbR</li>
<li><a class="hw" title="Wegbeschreibung auf Google maps ansehen" href="http://g.co/maps/h5xff">Sandh&#228;user Str. 15/ 1</a></li>
<li>69124 Heidelberg</li>
</ul>

<ul>
<li>Tel.: <a class="hw" rel="nofollow" title="Rufen Sie uns an" href="tel:+4962217255500">06221 / 72 555 00</a></li>
<li>Fax.: 06221 / 72 555 04</li>
<li>Email: <a class="hw" rel="nofollow" title="Mailen Sie uns Ihre Bestellung" href="mailto:info@heidelwerb.de">info@heidelwerb.de</a></li>
</ul>

<?php endif; ?>
</div>

<div class="f2">
<?php if ( !function_exists('dynamic_sidebar')
		        || !dynamic_sidebar('footer-column2') ) : ?>		        

<p>
Wir von Heidelwerb sehen uns als 
Full-Service Dienstleister in Sachen 
Werbetechnik. Unser Schwerpunkt liegt 
in der Au&#946;enwerbung, seien es Big Banner, 
Fahnen, Firmenschilder oder auch Flotten 
Vollklebungen und Textildrucke. 
</p>
<p>
Unseren Kunden bieten wir von der 
Grafischen Arbeit ( Grafik, Layout etc.) 
bis zur Montage eine Spitzenberatung 
und Kundenbetreuung.
</p>

<?php endif; ?>
</div>

<div class="f3"><a class="hw" title="Wegbeschreibung auf Google maps ansehen" href="http://g.co/maps/h5xff">Wegbeschreibung auf Google maps ansehen</a></div>

</div>
</div>

<div class="clearfix"></div><hr class="clear" />

<div class="creditl">
<div class="inner">

<div class="copy"><?php _e("Copyright"); ?> &copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> <?php _e("All Rechte vorbehalten"); ?></div>

<div class="copyr"><a class="hw" title="Design by milo" href="http://3oneseven.com/">Design by milo</a></div>

</div>
</div>

</div>

<script src="<?php bloginfo('template_url'); ?>/js/unitip.js" type="text/javascript"></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.cookie.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/script.js'></script>
<script type="text/javascript">
            (function($) {
                $(function() {
                    $('#slideshow').cycle({
                        fx:     'scrollHorz',
                        timeout: <?php echo (get_option('ss_timeout')) ? get_option('ss_timeout') : '7000' ?>,
                        next:   '#rarr',
                        prev:   '#larr'
                    });
                })
            })(jQuery)
</script>    

<script type="text/javascript">
var sc_project=7895982; 
var sc_invisible=1; 
var sc_security="54d106fa"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter_xhtml.js"></script>
<noscript><div class="statcounter"><a title="counter for
tumblr" href="http://statcounter.com/tumblr/"
class="statcounter"><img class="statcounter"
src="http://c.statcounter.com/7895982/0/54d106fa/1/"
alt="milo317" /></a></div></noscript>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31494937-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>