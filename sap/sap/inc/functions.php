<?php 
add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
   echo '
      <style type="text/css">
         #header-logo { background-image: url('.get_bloginfo('template_directory').'/images/icon/favicon.ico) !important; }
      </style>
   ';
} 
function custom_colors() {
   echo '<style type="text/css">.ab-icon{display:none !important;}#wphead{background:#fafafa !important;border-bottom:6px solid #026BDA;color:#333;text-shadow:#fff 0 1px 1px;}#footer{background:#fafafa !important;border-top:6px solid #026BDA;color:#333;}#user_info p,#user_info p a,#wphead a{color:#333 !important;}</style>';
}
add_action('admin_head', 'custom_colors');
function remove_footer_admin () {
    echo "Thank you for creating with <a href='http://3oneseven.com/'>milo</a>.";
} 
add_filter('admin_footer_text', 'remove_footer_admin'); 

function admin_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/icon/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon');

add_action('login_head', 'custom_login');
function fb_login_headerurl() {
	$url = bloginfo('url');
	echo $url;
}
add_filter( 'login_headerurl', 'fb_login_headerurl' );
function fb_login_headertitle() {
	$name = get_option('blogname');
	echo $name;
}
add_filter( 'login_headertitle', 'fb_login_headertitle' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_image_size( 'cover', 173, 243 );
add_image_size( 'slider', 200, 200, true );
add_image_size( 'teaser', 40, 40 );
add_image_size( 'browse', 155, 155 );
add_image_size( 'fthumb', 70, 70 ); 

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link'); 
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
add_filter( 'show_admin_bar', '__return_false' );
remove_action( 'wp_head', 'feed_links' );
remove_filter('atom_service_url','atom_service_url_filter');
remove_action('wp_head', 'feed_links', 2); 
add_action('wp_head', 'my_feed_links');
function my_feed_links() {
  if ( !current_theme_supports('automatic-feed-links') ) return;
  ?>
  <?php 
}

function remove_comments_rss( $for_comments ) {
return;
}
add_filter('post_comments_feed_link','remove_comments_rss');

// sidebar stuff
register_sidebars( 1, 
	array( 
		'name' => 'Footer Box 1',
		'id' => 'footer-column1',
    'description' => __('The footer 1st column widget area for your txt etc.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	) 
);

register_sidebars( 1,
	array( 
		'name' => 'Footer Box 2',
		'id' => 'footer-column2',
    'description' => __('The footer 2nd column widget area for your txt etc.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	) 
);

register_sidebars( 1,
	array( 
		'name' => 'Footer Box 3',
		'id' => 'footer-column3',
    'description' => __('The footer 3rd column widget area for your txt etc.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	) 
);

register_sidebars( 1,
	array( 
		'name' => 'Sidebar',
		'id' => 'sidebar',
    'description' => __('The sidebar widget area for your txt etc.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
	) 
);

function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/log/log.css" />'; 
}   
add_action('login_head', 'custom_login');

function milo_body_control() { 
global $post; 
$postclass = $post->post_name;
if (is_home()) { 
echo 'id="home" class="heidelwerb_design_by_milo317"'; 
} elseif (is_single()) { 
echo 'id="single" class="' . $postclass . ' heidelwerb_design_by_milo317"';
} elseif (is_page()) { 
echo 'id="' . $postclass . '" class="heidelwerb_design_by_milo317"';
} elseif (is_category()) { 
echo 'id="category" class="heidelwerb_design_by_milo317"';
} elseif (is_archive()) { 
echo 'id="arch" class="heidelwerb_design_by_milo317"';
} elseif (is_404()) { 
echo 'id="error" class="heidelwerb_design_by_milo317"';
} elseif (is_search()) { 
echo 'id="searchme" class="heidelwerb_design_by_milo317"'; 
} 
} 

add_action( 'after_setup_theme', 'regMyMenus' );
function regMyMenus() {
// This theme uses wp_nav_menu() in four locations.
register_nav_menus( array(
'top-nav' => __( 'Main Menu' ),
) );
}
function topnav_fallback() {
?>

<ul id="nav">
<?php wp_list_pages('depth=4&sort_column=menu_order&title_li='); ?>
</ul>
<?php
}

function Bruce_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'Bruce_remove_recent_comments_style' );

function unregister_default_wp_widgets() { 
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search'); 
} 
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

function commentslist($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li>
        <div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <table>
                <tr>
                    <td>
                        <?php echo get_avatar($comment, 70, get_bloginfo('template_url').'/images/no-avatar.png'); ?>
                    </td>
                    <td>
                        <div class="comment-meta">
                            <?php printf(__('<p class="comment-author"><span>%s</span> says:</p>'), get_comment_author_link()) ?>
                            <?php printf(__('<p class="comment-date">%s</p>'), get_comment_date('M j, Y')) ?>
                            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </div>
                    </td>
                    <td>
                        <div class="comment-text">
                            <?php if ($comment->comment_approved == '0') : ?>
                                <p><?php _e('Your comment is awaiting moderation.') ?></p>
                                <br />
                            <?php endif; ?>
                            <?php comment_text() ?>
                        </div>
                    </td>
                </tr>
            </table>
         </div>
<?php
}

add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
        if ( ! is_admin() ) {
                global $id;
                $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
                return count($comments_by_type['comment']);
        } else {
                return $count;
        }
}

function getTinyUrl($url) {
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    return $tinyurl;
}

class Recentposts_thumbnail extends WP_Widget {
    function Recentposts_thumbnail() {
        parent::WP_Widget(false, $name = 'Raw Recent Posts');
    }
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
            <?php echo $before_widget; ?>
            <?php if ( $title ) echo $before_title . $title . $after_title;  else echo '<div class="widget-body clear">'; ?>
            <?php
                global $post;
                if (get_option('rpthumb_qty')) $rpthumb_qty = get_option('rpthumb_qty'); else $rpthumb_qty = 5;
                $q_args = array(
                    'numberposts' => $rpthumb_qty,
                );
                $rpthumb_posts = get_posts($q_args);
                foreach ( $rpthumb_posts as $post ) :
                    setup_postdata($post);
            ?>
                <a href="<?php the_permalink(); ?>" class="rpthumb clear">
                    <?php if ( has_post_thumbnail() && !get_option('rpthumb_thumb') ) {
                        the_post_thumbnail('teaser');
                        $offset = 'style="padding-left: 65px;"';
                    }
                    ?>
                    <span class="rpthumb-title" <?php echo $offset; ?>><?php the_title(); ?></span>
                    <span class="rpthumb-date" <?php echo $offset; unset($offset); ?>><?php the_time(__('M j, Y')) ?></span>
                </a>
            <?php endforeach; ?>
            <?php echo $after_widget; ?>
        <?php
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        update_option('rpthumb_qty', $_POST['rpthumb_qty']);
        update_option('rpthumb_thumb', $_POST['rpthumb_thumb']);
        return $instance;
    }
    function form($instance) {
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="rpthumb_qty">Number of posts:  </label><input type="text" name="rpthumb_qty" id="rpthumb_qty" size="2" value="<?php echo get_option('rpthumb_qty'); ?>"/></p>
            <p><label for="rpthumb_thumb">Hide thumbnails:  </label><input type="checkbox" name="rpthumb_thumb" id="rpthumb_thumb" <?php echo (get_option('rpthumb_thumb'))? 'checked="checked"' : ''; ?>/></p>
        <?php
    }

}
add_action('widgets_init', create_function('', 'return register_widget("Recentposts_thumbnail");'));

function txfx_nice_search() {
    if ( is_search() && strpos($_SERVER['REQUEST_URI'], '/wp-admin/') === false && strpos($_SERVER['REQUEST_URI'], '/search/') === false ) {
        wp_redirect(get_bloginfo('home') . '/search/' . str_replace(' ', '+', str_replace('%20', '+', get_query_var('s'))));
        exit();
    }
}
add_action('template_redirect', 'txfx_nice_search');

function dimox_breadcrumbs() { 
  $delimiter = '&raquo;';
  $home = 'Startseite'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb 
  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<div id="crumbs">'; 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' '; 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after; 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after; 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after; 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after; 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      } 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after; 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after; 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after; 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after; 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after; 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after; 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    } 
    echo '</div>'; 
  }
} // end dimox_breadcrumbs()
?>