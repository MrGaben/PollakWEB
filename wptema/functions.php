<?php

function add_widget_support()
{
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'add_widget_support');


function add_Main_Nav()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'add_Main_Nav');

function add_normalize_CSS()
{
    wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

add_action('wp_enqueue_scripts', 'add_normalize_CSS');

function datum_link_shortcode()
{
    return date('Y-m-d H:m:s');
}

add_shortcode('datum', 'datum_link_shortcode');


add_action('admin_menu', 'custom_theme_options_page');


function custom_theme_options_page_content()
{

    $image_url = get_template_directory_uri() . '/images.jpg';


    echo '<div class="wrap">';
    echo '<h1>Random theme</h1>';
    echo '<p>Here is your theme image:</p>';
    echo '<img src="' . $image_url . '" alt="Theme Thumbnail">';
    echo '</div>';
}
function custom_theme_options_page()
{
    add_theme_page(
        'Custom Theme Options',  
        'Theme Options',        
        'manage_options',       
        'custom-theme-options',  
        'custom_theme_options_page_content' 
    );
}