<?php

// !mack add mustibey tree file
 1.index.php 
 2.stylec.css 
 3.functions.php 

//  !add style file content 
/*
Theme Name: Alpha
Theme URI: https://github.com/WordPress/twentynineteen
Author: the WordPress team
Author URI: https://wordpress.org/
Description: A new Gutenberg-ready theme.
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: alphpa
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready
*/

//!  functions.php add simple code 
function alpha_bootstrap()
{
    load_theme_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("post-gat");
}
add_action("after_setup_theme", "alpha_bootstrap");

// !style connect function 
function alpha_asset()
{
    wp_enqueue_style("alphe", get_stylesheet_uri());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts", "alpha_asset");

<?php wp_head(); ?>

<body <?php body_class(); ?>>
    <?php we_footer(); ?>

    // !post all description
    <?php the_title(); ?>
    <?php the_author(); ?>
    <?php the_date(); ?>
    <?php the_content(); ?>
    or
    <?php the_excerpt(); ?>
    <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>

    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail("large", array("class" => "img-fluid"));
    }

    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?>


    // !read more function
    <?php
    if (is_single()) {
        the_content();
    } else {
        the_excerpt();
    }
    ?>


    ?>
    //!pagination
    <?php the_posts_pagination(array(
        "screen_reader_text" => " ",
        'prev_text'          => __('New Post'),
        'next_text'          => __('Old Post'),
    )); ?>

    // !comment thempalte
    <?php comments_template() ?>


    <?php if(comments_open()): ?>
    <div class="col-md-8">
        <?php comments_template() ?>
    </div>


    // !header part and footer
    <?php get_header(); ?>
    <?php get_template_part('hero'); ?>
    <?php get_footer(); ?>

    // !site ulr or real pathe
    <?php echo site_url() ?>">

    // !single page post
    <?php next_post_link(); ?>
    <?php echo "<br>"; ?>
    <?php previous_post_link(); ?>

    // !id - Sidebar id - Must be all in lowercase

    // !sidebar function make
    // !sidebar ragistaion
    function alpha_sidebar() {
    register_sidebar( array(
    'name' => __( 'Right Sidebar', 'theme-slug' ),
    'id' => 'sidebar-1',
    'class' => '',
    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
    'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ) );
    }
    add_action('widgets_init', 'alpha_sidebar');

    // !show sidebar code
    <?php
    if (is_active_sidebar('sidebar-1')) {
        dynamic_sidebar('sidebar-1');
    }
    ?>

    // !post passworad protected

    <?php 
    if(!post_password_required()){
        the_excerpt(); 
    }else{
      echo get_the_password_form();
    }
    
     ?>

    ?>