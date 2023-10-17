<?php get_header(); ?>

<div id="break" class="animated fadeInLeftBig">
                 
</div>

<div class="wrapper animated fadeInLeftBig">
<div id="container" class="clear">
<div id="gcontent">
<div id="loop" class="grid clear">

 <div class="content-title">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        </div>
  <h1>Search results</h1>
  
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

<?php
if (function_exists('vp_get_thumb_url')) {
        $thumb=vp_get_thumb_url($post->post_content, 'bigg');
}
?>     
<div class="post" id="post_<?php the_ID(); ?>" style="background-image:url(<?php if ($thumb!='') echo $thumb; ?>)">
<a href="<?php the_permalink() ?>"></a>
<div class="over">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<div class="post-content">
<p><?php the_content_rss('', FALSE, ' ', 20); ?></p>
<div class="more"><a href="<?php the_permalink() ?>"><?php _e( 'Read more') ?></a></div>
</div>
</div>
</div>

<?php endwhile; else: ?>
<h1><?php _e('Sorry, no posts matched your criteria.', 'Detox') ?></h1>
<?php endif; ?>

</div>
</div>

</div>
</div>

<nav class="nav-slide">
<?php next_posts_link('<span class="icon-wrap"><svg class="icon" width="32" height="32" viewBox="0 0 64 64"><use xlink:href="#arrow-left-1"></svg></span><div><h3>Older<span> Entries</span></h3></div>', 0); ?>
<?php previous_posts_link('<span class="icon-wrap"><svg class="icon" width="32" height="32" viewBox="0 0 64 64"><use xlink:href="#arrow-right-1"></svg></span><div><h3>Newer<span> Entries</span></h3></div></a>', 0) ?>
</nav>
<?php get_footer(); ?>