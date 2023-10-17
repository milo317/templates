<?php
if(function_exists('wp_nav_menu')) {
wp_nav_menu(array(
'theme_location' => 'top-nav',
'container' => '',
'container_id' => 'top-nav',
'menu_id' => 'nav',
'fallback_cb' => 'topnav_fallback',
));
} else {
?>
<?php
}
?>