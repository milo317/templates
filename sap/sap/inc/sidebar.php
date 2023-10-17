<div id="sidebar">

<div class="slideshow">
<div id="slideshow">

<?php 
	$my_query = new WP_Query('category_name=heidelwerb&showposts=8&offset=0');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="slide clear">
<div class="post">
<?php $titlelink = get_post_meta($post->ID, 'titlelink', true);
if ($titlelink) { ?>
<?php
    if(has_post_thumbnail()) :?>
<a href="<?php echo $titlelink; ?>" title="<?php the_title(); ?>"><?php $browse_img = get_the_post_thumbnail($post->ID, 'slider'); ?><?php echo $browse_img; ?></a>
<?php else :?>
<a href="<?php echo $titlelink; ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/no-avatar.png" width="100%" height="auto" alt="<?php the_title(); ?>" /></a>
<?php endif;?>
<div class="ribb"></div>
<h4><a href="<?php echo $titlelink; ?>"><?php the_title(); ?></a></h4>
<div class="post-content">
<?php the_content_rss('', FALSE, '', 12); ?>
<div class="send"><a href="<?php echo $titlelink; ?>">Mehr dazu</a></div>
<?php } 
else { ?>
<?php } ?>
</div>

</div>
</div>

<?php endwhile; ?>
 </div>

            <a href="javascript: void(0);" id="larr"></a>
            <a href="javascript: void(0);" id="rarr"></a>
</div>

<?php if ( !function_exists('dynamic_sidebar')
	        || !dynamic_sidebar('sidebar') ) : ?>
	               
<?php endif; ?>

</div>