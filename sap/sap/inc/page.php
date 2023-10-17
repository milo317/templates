<?php get_header(); ?>

<div id="content">

<div id="middle">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $title = get_post_meta($post->ID, 'title', true);
if ($title) { ?>
<h1><?php echo $title; ?></h1>
<?php } 
else { ?>
<h1><?php the_title(); ?></h1>
<?php } ?>
<?php $subtitle = get_post_meta($post->ID, 'subtitle', true);
if ($subtitle) { ?>
<div class="subtitle"><?php echo $subtitle; ?></div>
<?php } 
else { ?>
<?php } ?>

<div class="entry">
<?php the_content(__('Read more'));?>

<?php edit_post_link('<h3>Editieren</h3>','',''); ?>
</div>


<div class="content-title">
            <p class="alignleft">Sie befinden sich hier:</p> <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <a href="http://facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php echo urlencode(the_title('','', false)) ?>" target="_blank" class="f" title="Share on Facebook"></a>
            <a href="http://twitter.com/home?status=<?php the_title(); ?> <?php echo getTinyUrl(get_permalink($post->ID)); ?>" target="_blank" class="t" title="Spread the word on Twitter"></a>
            <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>" target="_blank" class="di" title="Bookmark on Del.icio.us"></a>
            <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank" class="su" title="Share on StumbleUpon"></a>
</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>

<?php get_template_part('sidebar'); ?>

<?php get_template_part('legs'); ?>
</div>

<?php get_template_part('footerpage'); ?>