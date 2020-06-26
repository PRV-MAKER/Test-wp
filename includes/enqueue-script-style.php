<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }


add_action( 'wp_enqueue_scripts', 'prv_theme_scripts' );
function prv_theme_scripts() {

	wp_enqueue_script( 'prv-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {wp_enqueue_script( 'comment-reply' );	}

	wp_enqueue_script( 'modernizr-2.8.3.min', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array(), '1.0', false );
   wp_enqueue_script( 'jquery-1.12.0.min', get_template_directory_uri() . '/assets/js/jquery-1.12.0.min.js', array(), '1.0', true );
   wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0', true );
   wp_enqueue_script( 'prv_plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), '1.0', true );
   wp_enqueue_script( 'slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.0', true );
   wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0', true );
   wp_enqueue_script( 'prv_waypoints.min', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), '1.0', true );
   wp_enqueue_script( 'prv_main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
   wp_enqueue_script( 'ajax_search', get_template_directory_uri() . '/assets/js/ajax-search.js', array(), '1.0', true );
   wp_localize_script( 'ajax_search', 'search__inner', array(
    'url' => admin_url( 'admin-ajax.php'), 
    'nonce' => wp_create_nonce( 'search-nonce' )
   ) );
}



add_action( 'wp_enqueue_scripts', 'prv_theme_styles' );
function prv_theme_styles() {

	wp_enqueue_style( 'prv-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'prv-theme-style', 'rtl', 'replace' );


	/*   Подключаем стили ХТМЛ шаблона   red */
	wp_enqueue_style( 'bootstrap.min',            get_template_directory_uri() . '/assets/css/bootstrap.min.css',        array(), _S_VERSION ); 
	wp_enqueue_style( 'owl.carousel.min',     get_template_directory_uri() . '/assets/css/owl.carousel.min.css',     array(), _S_VERSION ); 
	wp_enqueue_style( 'owl.theme.default.min',get_template_directory_uri() . '/assets/css/owl.theme.default.min.css',array(), _S_VERSION ); 
	wp_enqueue_style( 'prv_core',                 get_template_directory_uri() . '/assets/css/core.css',                 array(), _S_VERSION ); 
	wp_enqueue_style( 'prv_shortcodes',           get_template_directory_uri() . '/assets/css/shortcode/shortcodes.css', array(), _S_VERSION ); 
	wp_enqueue_style( 'prv_style',                get_template_directory_uri() . '/assets/css/style.css',                array(), _S_VERSION ); 
   wp_enqueue_style( 'prv_responsive',           get_template_directory_uri() . '/assets/css/responsive.css',           array(), _S_VERSION ); 
   wp_enqueue_style( 'prv_custom',               get_template_directory_uri() . '/assets/css/custom.css',                array(), _S_VERSION ); 
   wp_enqueue_style( 'prv_fonts','https://fonts.googleapis.com/css2?family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&family=Jost:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap', array(), _S_VERSION ); 
}




