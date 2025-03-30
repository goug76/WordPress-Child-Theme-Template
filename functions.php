<?php
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

$files = array( 
    '/inc/helpers/autoloader.php',
    '/inc/helpers/helper-functions.php'
);

foreach($files as $file) {
    if ( file_exists( dirname( __FILE__ ) . $file ) ) {
        require_once dirname( __FILE__ ) . $file;
    }
}

if ( ! defined( 'GOUG_DIR_PATH' ) ) {
	define( 'GOUG_DIR_PATH', untrailingslashit( get_stylesheet_directory() ) );
}

\GOUG\Inc\GOUG_THEME::get_instance();