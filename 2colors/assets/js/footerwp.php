<?php get_template_part('sfoo'); ?>

<div id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
<?php get_template_part('foo'); ?>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="http://cdn.3oneseven.com/416/js/jquery.min.js"></script>
<script type="text/javascript">$(document).ready(function(){var a=function(){return $(document).height()-$(window).height()},b=function(){return $(window).scrollTop()};if("max"in document.createElement("progress")){var c=$("progress");c.attr({max:a()}),$(document).on("scroll",function(){c.attr({value:b()})}),$(window).resize(function(){c.attr({max:a(),value:b()})})}else{var e,f,c=$(".progress-bar"),d=a(),g=function(){return e=b(),f=e/d*100,f+="%"},h=function(){c.css({width:g()})};$(document).on("scroll",h),$(window).on("resize",function(){d=a(),h()})}}),$(document).ready(function(){$("#flat").addClass("active"),$("#progressBar").addClass("flat"),$("#flat").on("click",function(){$("#progressBar").removeClass().addClass("flat"),$("a").removeClass(),$(this).addClass("active"),$(this).preventDefault()}),$("#single").on("click",function(){$("#progressBar").removeClass().addClass("single"),$("a").removeClass(),$(this).addClass("active"),$(this).preventDefault()}),$("#multiple").on("click",function(){$("#progressBar").removeClass().addClass("multiple"),$("a").removeClass(),$(this).addClass("active"),$(this).preventDefault()}),$("#semantic").on("click",function(){$("#progressBar").removeClass().addClass("semantic"),$("a").removeClass(),$(this).addClass("active"),$(this).preventDefault(),alert("hello")}),$(document).on("scroll",function(){maxAttr=$("#progressBar").attr("max"),valueAttr=$("#progressBar").attr("value"),percentage=valueAttr/maxAttr*100,percentage<49?(document.styleSheets[0].addRule(".semantic","color: red"),document.styleSheets[0].addRule(".semantic::-webkit-progress-value","background-color: red"),document.styleSheets[0].addRule(".semantic::-moz-progress-bar","background-color: red")):percentage<98?(document.styleSheets[0].addRule(".semantic","color: orange"),document.styleSheets[0].addRule(".semantic::-webkit-progress-value","background-color: orange"),document.styleSheets[0].addRule(".semantic::-moz-progress-bar","background-color: orange")):(document.styleSheets[0].addRule(".semantic","color: green"),document.styleSheets[0].addRule(".semantic::-webkit-progress-value","background-color: green"),document.styleSheets[0].addRule(".semantic::-moz-progress-bar","background-color: green"))})});</script>
<script type="text/javascript">var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="http://cdn.3oneseven.com/416/images/up.png" style="filter:alpha(opacity=70); -moz-opacity:0.7;" width="43" height="31"/>',controlattrs:{offsetx:0,offsety:40},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var a=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);a="string"==typeof a&&1==jQuery("#"+a).length?jQuery("#"+a).offset().top:0,this.$body.animate({scrollTop:a},this.setting.scrollduration)},keepfixed:function(){var a=jQuery(window),b=a.scrollLeft()+a.width()-this.$control.width()-this.controlattrs.offsetx,c=a.scrollTop()+a.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:b+"px",top:c+"px"})},togglecontrol:function(){var a=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=a>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(a){var b=scrolltotop,c=document.all;b.cssfixedsupport=!c||c&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,b.$body=a(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),b.$control=a('<div id="topcontrol">'+b.controlHTML+"</div>").css({position:b.cssfixedsupport?"fixed":"absolute",bottom:b.controlattrs.offsety,right:b.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"back to top"}).click(function(){return b.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=b.$control.text()&&b.$control.css({width:b.$control.width()}),b.togglecontrol(),a('a[href="'+b.anchorkeyword+'"]').click(function(){return b.scrollup(),!1}),a(window).bind("scroll resize",function(){b.togglecontrol()})})}};scrolltotop.init();</script>

 
<?php if ( (is_single())  ) { ?>
<script src="http://cdn.3oneseven.com/416/js/ibox.js" type="text/javascript" ></script>
<?php } ?>

<!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js" type="text/javascript"></script><![endif]-->

<?php do_action('wp_footer'); ?>
<script type="text/javascript">
sc_project=3231500; 
sc_invisible=1; 
sc_partition=35; 
sc_security="2ff72137"; 
</script>
<script type="text/javascript" src="http://www.statcounter.com/counter/counter_xhtml.js"></script><noscript><div class="statcounter"><a class="statcounter" href=""><img class="statcounter" src="http://c36.statcounter.com/3231500/0/2ff72137/1/" alt="milo317" width="0" height="0" /></a></div></noscript>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-3164702-2', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>