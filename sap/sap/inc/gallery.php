<?php
/*
Template Name: gallery Template
*/
?>
<?php get_template_part('headerG'); ?>


<div id="content">

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
<div id="text">
<?php the_content(__('Read more'));?>
<div class="clearfix"></div><hr class="clear" />
<div id="send2" class="send"><a href="http://heidelwerb.de/anfrage/">Unverbindliche Anfrage</a></div>
<?php edit_post_link('<h3>Editieren</h3>','',''); ?>
</div>

<div id="gallery">
<div id="slider1" class="sliderwrapper">

<?php
$attachments = get_children(array('post_parent' => $post->ID,
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order ID'));
foreach($attachments as $att_id => $attachment) {
	$full_img_url = wp_get_attachment_url($attachment->ID);
        $split_pos = strpos($full_img_url, 'wp-content');
        $split_len = (strlen($full_img_url) - $split_pos);
        $abs_img_url = substr($full_img_url, $split_pos, $split_len);
        $full_info = @getimagesize(ABSPATH.$abs_img_url);
        ?>
<div class="contentdiv">
<div class="slideimg">
<a class="hw" href="<?php echo $full_img_url; ?>" title="<?php the_title(); ?>" rel="ibox"><img src="<?php echo $full_img_url; ?>" alt="<?php the_title(); ?>" /></a>
</div>
</div>
<?php
}
?>

<div id="paginate-slider1" class="pagination"></div>
<script type="text/javascript">
featuredcontentslider.init({
id: "slider1", 
contentsource: ["inline", ""], 
toc: "#increment", 
nextprev: ["prev", "next"], 
revealtype: "mouseover", 
enablefade: [true, 0.2], 
autorotate: [true, 6000], 
onChange: function(previndex, curindex){ 
}
})
</script>
</div>
</div>

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

<?php get_template_part('legs'); ?>
</div>

<?php get_footer(); ?>