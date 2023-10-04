<?php
/**
 * Enqueue scripts and styles.
 */
function theme_scripts()
{

    //    <!-- Icons -->
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri() . '/public/fonts/bootstrap/bootstrap-icons.css');
    wp_enqueue_style('Yekan', get_template_directory_uri() . '/public/fonts/YekanBakh/fontface.css', array());
    wp_enqueue_style('Yekan-en', get_template_directory_uri() . '/public/fonts/YekanBakh-en/fontface.css', array());
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array(),);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/public/js/app.js', array(), true);
    wp_localize_script('main-js', 'jsData', array(
        'date' => get_field('date','2')
    ));
}

add_action('wp_enqueue_scripts', 'theme_scripts');


add_theme_support('title-tag');
add_theme_support('post-thumbnails');

