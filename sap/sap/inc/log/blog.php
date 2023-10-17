<?php
/*
Template Name: blog Template
*/
?>
<?php get_header(); ?>

<div id="sow">

<div id="content">

<div id="middle">
<div id="last">
<?php 
	$my_query = new WP_Query('showposts=12&offset=0');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="content-title"><?php the_category(' <span>/</span> '); ?></div>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="meta">
<?php _e('by'); ?> <?php the_author_posts_link(); ?> | 
<?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?><?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags(' | Tags: ', ', ', ' '); } else {echo " | Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo ' | Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo ' '; } ?><?php edit_post_link(' | Edit','',''); ?>
<div class="date"><?php the_time('m'); ?> <?php the_time('j'); ?> </div>
</div>

<div class="entry">
<?php the_excerpt(__('Read more'));?>
</div>
<div class="read"><a href="<?php the_permalink() ?>">Read More</a></div>
<div class="postspace"></div>

<?php endwhile; ?>

<div class="clearfix"></div><hr class="clear" />

<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('', '', '', '', 3, false);} ?>
</div>

</div>
</div>

<?php get_template_part('sidebar'); ?>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>