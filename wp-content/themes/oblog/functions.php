<?php 

// =================================================================

    function onews_setup_theme()
    {
        // On dit à Wordpress de gérer la balise <title> pour nous
        add_theme_support( 'title-tag' );
    }

    // On va dire à Wordpress d'executer la fonction précédente
    // après un événement particulier, ici après "setup_theme"
    // On parle, dans Wordpress, de hooks 
    // (Ca ressemble un peu aux eventListener en JS ;))
    add_action( "after_setup_theme", "onews_setup_theme" );

// =================================================================

    function onews_register_styles()
    {

        wp_enqueue_style( 
            'reset-css', 
            get_theme_file_uri( "assets/css/reset.css" ), 
            [], 
            "1.0"
        );
        // J'ajoute à WP mes fichiers de style
        wp_enqueue_style( 
            'style-css', 
            get_theme_file_uri( "assets/css/style.css" ), 
            ['reset-css'], 
            "1.0"
        );
       
    }

    // Encore une fois, on dit à Wordpress a quel moment appeller cette fonction
    add_action( "wp_enqueue_scripts", "onews_register_styles" );

// =================================================================

    // Filter except length to 35 words.
    // tn custom excerpt length
    function onews_custom_excerpt_length( $length ) 
    {
        return 35;
    }
    
    add_filter( 'excerpt_length', 'onews_custom_excerpt_length', 999 );

// =================================================================

    function onews_register_menus()
    {
        register_nav_menu( "header-menu", "Menu de l'entête" );
        register_nav_menu( "hidden-menu", "Menu masqué" );
    }

    add_action( 'init', 'onews_register_menus' );

// =================================================================