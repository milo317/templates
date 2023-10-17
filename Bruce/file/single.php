<?php get_header(); ?>
<?php if ( have_posts() ) : ?><?php while ( have_posts() ) : the_post(); ?>
<?php
if (function_exists('vp_get_thumb_url')) {
        $thumb=vp_get_thumb_url($post->post_content, 'bigg');
}
?>
<div class="breaks animated fadeInLeftBig" style="background-image:url(<?php if ($thumb!='') echo $thumb; ?>)">
<div class="over">
<div class="alimg">
<div class="slideimg">
<div class="slidetxt">
<h1><?php the_title(); ?></h1>

</div>

<div class="ausgabe">
<?php 
	$my_query = new WP_Query('showposts=1&offset=4&orderby=rand');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>   
<div class="atext animated rotateInDownRight">
<h4><span><?php _e( 'Related') ?></span></h4>
<h2><a href="<?php the_permalink() ?>"><?php the_time(__('mjy')) ?></a></h2>
<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

</div>

<?php
if (function_exists('vp_get_thumb_url')) {
        $thumb=vp_get_thumb_url($post->post_content, 'bigg');
}
?>
<div class="asimg animated rotateInDownRight" style="background-image:url(<?php if ($thumb!='') echo $thumb; ?>)">
<a href="<?php the_permalink() ?>"></a>
</div>
<?php endwhile; ?>  
</div>

</div>
</div>

<div class="whity"><div class="reds">
<div class="buys"><?php the_category(' <span>/</span> '); ?></div>
</div></div>
</div>
</div>
<div class="wrapper animated fadeInLeftBig">
<div id="container" class="clear">

<div id="content">

<div class="content-title">
            <?php the_tags(__(''), ', '); ?>          
</div>

        <div class="entry">
            <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
                <div class="post-meta">
                    <h1 style="display:none"><?php the_title(); ?></h1>
                    <?php _e( 'by') ?> <span class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span> <?php _e( 'at') ?> <span
                        class="post-date"><?php the_time(__('M j, Y')) ?></span>   <?php edit_post_link( __( '&bull; Edit'), ''); ?></div>
                <div class="post-contents"><?php the_content(); ?></div>                
            </div>
            
<div class="meta">
<div class="xscol1">
<?php if ( get_the_author_meta( 'description' ) ) :  ?>
<div class="author-avatar alignright">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 60 ) ); ?>
</div>

<div id="author-description">
<h4><?php printf( esc_attr__( 'About %s', 'Bruce' ), get_the_author() ); ?> :</h4>
<?php the_author_meta( 'description' ); ?> | <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php printf( __( 'View all articles by %s <span class="meta-nav">&rarr;</span>', 'Tracks' ), get_the_author() ); ?></a>
</div>
<?php endif; ?>
</div>


</div>
 
</div>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<?php 
	$my_query = new WP_Query('showposts=1&offset=4&orderby=rand');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<?php
if (function_exists('vp_get_thumb_url')) {
        $thumb=vp_get_thumb_url($post->post_content, 'bigg');
}
?>

<div class="wrapper">
 	
<div class="hen"><h2>Related</h2></div>
<div class="ren"></div> 
</div>
<div class="breaks" style="background-image:url(<?php if ($thumb!='') echo $thumb; ?>)">
<div class="alimg">
<div class="slideimg">
<div class="slidetxt">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

</div>

</div>
</div>

<div class="whity"><div class="reds">
<div class="buys"><?php the_category(' <span>/</span> '); ?></div>
</div></div>
</div>

<?php endwhile; ?>   
<div class="wrapper">
<?php
              // If comments are open or we have at least one comment, load up the comment template
              if ( comments_open() || '0' != get_comments_number() )
                comments_template();
            ?>
</div>

<?php get_footer(); ?>
<nav class="nav-slide">
<?php 
$prev_post = get_adjacent_post(false, '', true);
if(!empty($prev_post)) {
echo '<a class="prev" href="' . get_permalink($prev_post->ID) . '"><span class="icon-wrap"><svg class="icon" width="32" height="32" viewBox="0 0 64 64"><use xlink:href="#arrow-left-1"></svg></span><div><h3>' . $prev_post->post_title . ' <span> Previously</span></h3></div></a>'; }
 ?>
<?php
$next_post = get_adjacent_post(false, '', false);
if(!empty($next_post)) {
echo '<a class="next" href="' . get_permalink($next_post->ID) . '">	<span class="icon-wrap"><svg class="icon" width="32" height="32" viewBox="0 0 64 64"><use xlink:href="#arrow-right-1"></svg></span><div><h3>' . $next_post->post_title . ' <span>Next</span></h3></div></a>'; }
?>
</nav>