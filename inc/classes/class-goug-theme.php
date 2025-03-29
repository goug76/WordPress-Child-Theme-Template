<?php

namespace GOUG\Inc;

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

use GOUG\Inc\Traits\Singleton;

class GOUG_THEME 
{
    use Singleton;

    protected function __construct() 
    { 
        /**
		 * Load Classes
		 */
        
        Enqueue::get_instance();
        Dashboard::get_instance();
 
        $this->setup_hooks();
    }

    protected function setup_hooks() 
    {
        /**
		 * Actions
		 */

        add_action( 'after_setup_theme', array( $this, 'theme_setup') );
        // add_action( 'init', array( $this, 'restrict_admin_dashboard') );
        // add_action( 'phpmailer_init', array( $this, 'send_smtp_email') );
        add_filter( 'login_redirect', array( $this, 'goug_logon_redirect' ) );
        add_filter( 'get_avatar', array( $this, 'bloggerpilot_gravatar_alt' ) );

        // add_filter( 'body_class', array( $this, 'tosh_dark_mode' ) );
    }

    public function restrict_admin_dashboard() 
    {
        if ( is_admin() && ! current_user_can( 'administrator' ) ) {
            wp_redirect( home_url() );
            exit;
        }
    }

    public function goug_logon_redirect( $requested_redirect_to ) 
    {
        return $requested_redirect_to;
    }

    // Add alt tag to WordPress Gravatar images
    function bloggerpilot_gravatar_alt($bloggerpilotGravatar) 
    {
        if (have_comments()) {
            $alt = get_comment_author();
        }
        else {
            $alt = get_the_author_meta('display_name');
        }
        $bloggerpilotGravatar = str_replace('alt=\'\'', 'alt=\'Avatar for ' . $alt . '\'', $bloggerpilotGravatar);
        return $bloggerpilotGravatar;
    }

    public function theme_setup() 
    {
        /**
         * Default Theme Support options
         */
        // Adding Featured Image to Posts
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag' );
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support( 'custom-logo' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );    

        // Activate HTML5 Features
        add_theme_support( 'html5', array(
            'comment-list', 
            'comment-form', 
            'search-form', 
            'gallery', 
            'caption',
            'script',
            'style'
        ));

        // Activate Post Formats
        add_theme_support( 'post-formats', array(
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat'
        ));        
    }

    public function send_smtp_email($phpmailer)
    {
        $phpmailer->SMTPDebug = SMTP_DEBUG;
        $phpmailer->isSMTP();
        $phpmailer->SMTPAuth = SMTP_AUTH;
        $phpmailer->Host = SMTP_HOST;
        $phpmailer->Port = SMTP_PORT;
        $phpmailer->Username = SMTP_USER;
        $phpmailer->Password = SMTP_PASS;
        $phpmailer->SMTPSecure = SMTP_SECURE;
        $phpmailer->From = SMTP_FROM;
        $phpmailer->FromName = SMTP_NAME;
    }

    function tosh_dark_mode($classes) 
    {
        $tosh_night_mode = isset($_COOKIE['toshDarkMode']) ? $_COOKIE['toshDarkMode'] : '';
        //if the cookie is stored..
        if ($tosh_night_mode !== '') {
            // Add 'dark-mode' body class
            return array_merge($classes, array('dark-mode'));
        }
        return $classes;
    }
}