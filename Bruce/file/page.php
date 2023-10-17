<?php get_header(); ?>
<div id="break" class="animated fadeInLeftBig">
                  
</div>
<div class="wrapper animated fadeInLeftBig">
<div id="container" class="clear">

<div id="gcontent">
<div id="cow">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <div class="content-title">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        </div>
        
        <div class="entry">
            <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
                <div class="post-meta">
                    <h1><?php the_title(); ?></h1>
                     <?php edit_post_link( __( 'Edit'), '&bull; '); ?>                    
                </div>
                <div class="post-contents"><?php the_content(); ?></div>
            
            </div>
        </div>

        <?php endwhile; ?>
    <?php endif; ?>
</div>
</div>
</div>
</div>
<?php get_template_part('footer'); ?>