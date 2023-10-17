<?php get_header(); ?>

<div id="sow">

<div id="content">

<div id="middle">

<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
<h2 class="pagetitle"><?php echo single_cat_title(); ?> Articles</h2>
<small><?php echo category_description($category); ?> <?php if(is_category()) : ?>
<a href="<?php echo bloginfo("url") . "/wp-rss2.php?cat=$cat" ?>">Subscribe to the <?php single_cat_title(); ?> articles</a>
<?php endif; ?></small>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
<?php /* If this is a search */ } elseif (is_search()) { ?>
<h2 class="pagetitle">Search Results</h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle">Author Articles</h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2>Archives</h2><?php } ?>

<?php while (have_posts()) : the_post(); ?>

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
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<div class="read"><a href="<?php the_permalink() ?>">Read More</a></div>
</div>

<div class="postspace"></div>
<?php endwhile; else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('', '', '', '', 3, false);} ?>
</div>

</div>
<?php get_template_part('sidebar'); ?>
</div>
</div>
</div>

</div>
<?php get_footer(); ?>