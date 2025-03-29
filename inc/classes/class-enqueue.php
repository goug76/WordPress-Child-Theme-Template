<?php

namespace GOUG\Inc;

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

use GOUG\Inc\Traits\Singleton;

class Enqueue
{
    use Singleton;

    protected function __construct() 
    {
        $this->setup_hooks();
    }

    protected function setup_hooks() 
    {
        add_action('wp_enqueue_scripts', array( $this, 'enqueue_scripts' ));
        add_action('wp_head', array( $this, 'goug_head'), 5);
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
    }

    public function enqueue_scripts() 
    {        
        // Enqueue Parent Stylesheet
        $parent_style = 'parent-style'; // This is 'twentytwentyfour-style' for the Twenty Twenty Four theme.

        wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style',
            get_stylesheet_directory_uri() . '/style.css',
            array( $parent_style ),
            wp_get_theme()->get('Version')
        );
        // Registering CSS Stylesheets
        wp_register_style('main_style', get_theme_file_uri('/assets/css/style.css'), NULL, 1.0, 'all');

        // Enqueue CSS Stylesheets
        wp_enqueue_style('dashicons');
        wp_enqueue_style('main_style');

        // Registering JS Scripts
        wp_register_script('main-js', get_theme_file_uri('/assets/js/bundled.js'), array('jquery'), '1.0', true);

        // Enqueue JS Scripts
        wp_enqueue_script('main-js');
    }

    public function goug_head() 
    { ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://cdnjs.cloudflare.com">
        <link rel="preconnect" href="https://kit.fontawesome.com">

        <?php
    }

    public function admin_enqueue()
    {
        // Registering CSS Stylesheets
        wp_register_style('admin_style', get_stylesheet_directory_uri() . '/assets/css/admin.css', NULL, 1.0, 'all');

        // Enqueue CSS Stylesheets
        wp_enqueue_style('admin_style');

    }
}