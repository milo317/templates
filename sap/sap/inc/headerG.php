<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php if ( is_home() ) { ?><? bloginfo('name'); ?> | <?php bloginfo('description'); ?><?php } ?>
<?php if ( is_404() ) { ?><? bloginfo('name'); ?> | Nichts gefunden<?php } ?>
<?php if ( is_search() ) { ?><? bloginfo('name'); ?> | Such Resultate <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); echo $key; _e(' &mdash; '); echo $count . ' '; _e('Artikel'); wp_reset_query(); ?>
<?php } ?>
<?php if ( is_author() ) { ?><? bloginfo('name'); ?> | Author Archiv<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php
$category = get_the_category();
echo $category[0]->cat_name;
?> | <? bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?> | <? bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><? bloginfo('name'); ?> | Archiv | <?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><? bloginfo('name'); ?> | Archiv | <?php the_time('F'); ?><?php } ?>
<?php if ( is_day() ) { ?><? bloginfo('name'); ?> | Archiv | <?php the_time('F'); ?><?php } ?>
<?php if ( is_year() ) { ?><? bloginfo('name'); ?> | Archiv | <?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><? bloginfo('name'); ?>
 | <?php  single_tag_title("", true); } } ?>
 </title>

<link rel="stylesheet" href="/wp-content/themes/hw/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" type="image/ico" href="/wp-content/themes/hw/images/icon/favicon.ico" />
<link rel="stylesheet" href="/wp-content/themes/hw/mobi.css" media="handheld" />
<link rel="stylesheet" href="/wp-content/themes/hw/mobi.css"  type="text/css" media="handheld" />
<link rel="stylesheet" href="/wp-content/themes/hw/mobi2.css" media="only screen and (max-width: 820px), only screen and (max-device-width: 820px)" />
<link rel="stylesheet" href="/wp-content/themes/hw/mobi.css"  type="text/css" media="only screen and (max-width: 480px), only screen and (max-device-width: 480px)" />

<!--[if lt IE 10]>
<link rel="stylesheet" href="/wp-content/themes/hw/ie.css" type="text/css" title="default" media="screen" />
<![endif]-->
<?php if ( (is_home())  ) { ?>
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/hw/style_ie.css" />
<![endif]-->
<?php } ?>
<!--[if lt IE 7]>
<link rel="stylesheet" href="/wp-content/themes/hw/iefix.css" type="text/css" title="default" media="screen" />
<![endif]-->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contentslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ibox.js"></script>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />	
<meta name="google-site-verification" content="1ENz_DWCXgGvRMAGcNea5X9I7dGLlRD8-lLsskv2HKk" />
<?php wp_head(); ?>
</head>
<body <?php milo_body_control(); ?>>

<div id="fhead">

<div id="header">
<div id="tagline">
<div id="head">
<h1><a href="/"><?php bloginfo('name'); ?></a></h1>	
</div>
<?php get_template_part('nav'); ?>
<div id="tel"><a class="hw" rel="nofollow" title="Rufen Sie uns unverbindlich an" href="tel:+4962217255500">(06221)72 555 00</a></div>
</div>
</div>

</div>

<?php if ( (is_home())  ) { ?>
<?php get_template_part('item'); ?>
<?php } else { ?>
<div id="back"></div>
<?php } ?>

<div id="rapper">
<div id="wrapper">
<div id="wrap">

<?php if ( (is_home())  ) { ?>
<?php } else { ?>
<div id="mnav">

<ul>
<li><a class="hw" title="Unseren Digitaldruckbereich ansehen" href="http://heidelwerb.de/produkte/digital-druck/">Digitaldruck</a></li>
<li><a class="hw" title="Unseren Schilderdruckbereich ansehen" href="http://heidelwerb.de/produkte/schilderdruck/">Schilderdruck</a></li>
<li><a class="hw" title="Unseren Foliendruckbereich ansehen" href="http://heidelwerb.de/produkte/foliendruck/">Foliendruck</a></li>
<li><a class="hw" title="Unseren Textildruckbereich ansehen" href="http://heidelwerb.de/produkte/textildruck/">Textildruck</a></li>
<li><a class="hw" title="Unsere Montageabteilung ansehen" href="">Montage</a></li>
</ul>

</div>
<?php } ?>