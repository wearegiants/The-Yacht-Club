<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup(){
load_theme_textdomain('blankslate', get_template_directory() . '/languages');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
register_nav_menus(
array( 'detroit-menu' => __( 'Detroit Menu', 'blankslate' ) )
);
register_nav_menus(
array( 'social-menu' => __( 'Social Menu', 'blankslate' ) )
);
register_nav_menus(
array( 'detroit-social-menu' => __( 'Detroit Social Menu', 'blankslate' ) )
);
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
if(get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title) {
if ($title == '') {
return 'Untitled';
} else {
return $title;
}
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_filter('comment_form_defaults', 'blankslate_comment_form_defaults');
function blankslate_comment_form_defaults( $args )
{
$req = get_option( 'require_name_email' );
$required_text = sprintf( ' ' . __('Required fields are marked %s', 'blankslate'), '<span class="required">*</span>' );
$args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'blankslate') . ( $req ? $required_text : '' ) . '</p>';
$args['title_reply'] = __('Post a Comment', 'blankslate');
$args['title_reply_to'] = __('Post a Reply to %s', 'blankslate');
return $args;
}
add_action( 'init', 'blankslate_add_shortcodes' );
function blankslate_add_shortcodes() {
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
add_filter('img_caption_shortcode', 'blankslate_img_caption_shortcode_filter',10,3);
add_filter('widget_text', 'do_shortcode');
}
function blankslate_img_caption_shortcode_filter($val, $attr, $content = null)
{
extract(shortcode_atts(array(
'id'    => '',
'align' => '',
'width' => '',
'caption' => ''
), $attr));
if ( 1 > (int) $width || empty($caption) )
return $val;
$capid = '';
if ( $id ) {
$id = esc_attr($id);
$capid = 'id="figcaption_'. $id . '" ';
$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
}
return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
. (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid
. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array (
'name' => __('Sidebar Widget Area', 'blankslate'),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);
function blankslate_get_page_number() {
if (get_query_var('paged')) {
print ' | ' . __( 'Page ' , 'blankslate') . get_query_var('paged');
}
}
function blankslate_catz($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function blankslate_tag_it($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function blankslate_commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
} else {
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function blankslate_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php blankslate_commenter_link() ?></div>
<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'blankslate' ), get_comment_date(), get_comment_time() ); ?><span class="meta-sep"> | </span> <a href="#comment-<?php echo get_comment_ID(); ?>" title="<?php _e('Permalink to this comment', 'blankslate' ); ?>"><?php _e('Permalink', 'blankslate' ); ?></a>
<?php edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your comment is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','blankslate'),
'login_text' => __('Login to reply.', 'blankslate'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">',
'after' => '</div>'
)));
endif;
?>
<?php }
function blankslate_custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'blankslate'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your trackback is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php }

add_image_size( 'landscape-640', 640, 320, true );
add_image_size( 'square-320', 320, 320, true );
add_image_size( 'square-640', 640, 640, true );
add_image_size( 'minisite-slider', 1000, 667, true );
add_image_size( 'hero', 1100, 750, true );

function removeRecentComments() {
global $wp_widget_factory;
remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'removeRecentComments' );
//add_filter('show_admin_bar', '__return_false');

require_once locate_template('/snippets/themewrangler.class.php');          // Theme Wrangler

$settings = array(

'available_scripts' => array(
'jquery'          => array('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js','1.10.2'),
'smartajax'       => array('/wp-content/themes/splashtime/javascripts/load.smartajax.js'),
'nprogress'       => array('//cdnjs.cloudflare.com/ajax/libs/nprogress/0.1.2/nprogress.min.js'),
'superfish'       => array('//cdnjs.cloudflare.com/ajax/libs/superfish/1.7.4/superfish.min.js'),
'easing'          => array('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'),
'royalslider'     => array('/wp-content/themes/splashtime/javascripts/jquery.royalslider.min.js'),
'isotope'         => array('//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/1.5.25/jquery.isotope.min.js'),
'slides'          => array('/wp-content/themes/splashtime/javascripts/slides.min.jquery.js'),
'fitvids'         => array('//cdnjs.cloudflare.com/ajax/libs/fitvids/1.0.1/jquery.fitvids.min.js'),
'parallax'        => array('//cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax-min.js'),
'waypoints'       => array('//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js'),
'debounced'       => array('/wp-content/themes/splashtime/javascripts/scroller/jquery.debouncedresize.js'),
'transit'         => array('//cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js'),
'fixedscroll'     => array('/wp-content/themes/splashtime/javascripts/scroller/cbpFixedScrollLayout.js'),
'share'           => array('/wp-content/themes/splashtime/javascripts/share.min.js'),
'ui'              => array('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'),
'magnific'        => array('//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.9/jquery.magnific-popup.min.js'),
'accordion'       => array('/wp-content/themes/splashtime/javascripts/accordion.js'),
'scripts'         => array('/wp-content/themes/splashtime/javascripts/scripts.min.js'),
'415-scripts'     => array('/wp-content/themes/splashtime/assets/javascripts/main.min.js'),
),

'default_scripts' => array(
'jquery',
'smartajax',
'plugins',
'superfish',
'easing',
'isotope',
'fitvids',
'magnific',
'royalslider',
'scripts'),

'available_stylesheets' => array(
'default'      => array('/wp-content/themes/splashtime/style.css',1),
'skeleton'     => array('/wp-content/themes/splashtime/stylesheets/skeleton.css'),
'layout'           => array('/wp-content/themes/splashtime/stylesheets/layout-update.css'),
'grid'           => array('/wp-content/themes/splashtime/stylesheets/grid.css'),
'fonts'        => array('/wp-content/themes/splashtime/fonts/maisonneue-demi-trial.css'),
'royalslider'  => array('/wp-content/themes/splashtime/stylesheets/royalslider.css'),
'rs-default'     => array('/wp-content/themes/splashtime/stylesheets/rs-default.css'),
'rs-min'         => array('/wp-content/themes/splashtime/stylesheets/rs-minimal-white.css'),
'nprogress'      => array('/wp-content/themes/splashtime/stylesheets/nprogress.css'),
'cstomscroll'  => array('/wp-content/themes/splashtime/stylesheets/jquery.mCustomScrollbar.css'),
'magnific'       => array('/wp-content/themes/splashtime/stylesheets/magnific.css'),
'montserat'      => array('//fonts.googleapis.com/css?family=Montserrat:400,700'),
'mailchimp'      => array('//cdn-images.mailchimp.com/embedcode/classic-081711.css'),
'onepage'      => array('/wp-content/themes/splashtime/stylesheets/onepage-scroll.css'),
'accordion'      => array('/wp-content/themes/splashtime/stylesheets/accordion.css'),
'main.min'     => array('/wp-content/themes/splashtime/stylesheets/main.min.css'),
'415-styles'     => array('/wp-content/themes/splashtime/assets/css/layout.min.css'),
),

'default_stylesheets' => array(
'default',
'grid',
'layout',
'royalslider',
'rs-default',
'rs-min',
'mailchimp',
'montserat',
'accordion',
'layout-update',
'main.min'
),

'remove_from_head' => array(
'rsd_link',
'wlwmanifest_link',
'wp_generator',
'rel_canonical',
'index_rel_link',
'parent_post_rel_link',
'start_post_rel_link',
'adjacent_posts_rel_link',
'adjacent_posts_rel_link_wp_head',
'wp_shortlink_wp_head',
'wp_shortlink_wp_header',
'feed_links',
'latest_comments',
'feed_links_extra',
'recent_comments_style'
),

'deregister_scripts' => array('jquery','l10n')

);

Themewrangler::set_defaults( $settings );

class clean_nav extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'current-menu-item' ) : array();
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el(&$output, $item, $depth) {
        $output .= "</li>\n";
    }
}


add_action('wp','mysite_check_template');

function mysite_check_template() {

    if ( is_page_template( 'page-tournament-new.php' ) ) {

        require_once locate_template('/lib/wrangles.php');

    }

}


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

