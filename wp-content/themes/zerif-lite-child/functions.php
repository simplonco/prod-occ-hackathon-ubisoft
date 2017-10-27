<?php

function child_enqueue_styles() {

    $parent_style = 'zerif-lite-style'; 
    $manifest = get_root_path() . 'manifest.txt';
    $version = '';
    if (file_exists($manifest)) {
        $version = file_get_contents($manifest);
    } 
    
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css?' . $version,
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );

function dequeue_parent_styles() {
    wp_dequeue_style( 'zerif_style' );
    wp_deregister_style( 'zerif_style' );
}
add_action( 'wp_print_styles', 'dequeue_parent_styles' );


function get_root_path()
{
    $base = dirname(__FILE__);
    $path = false;

    if (@file_exists(dirname(dirname($base))."/wp-config.php"))
    {
        $path = dirname(dirname($base))."/wp-config.php";
    }
    else
    if (@file_exists(dirname(dirname(dirname($base)))."/wp-config.php"))
    {
        $path = dirname(dirname(dirname($base)))."/wp-config.php";
    }
    else
    $path = false;

    if ($path != false)
    {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}

function add_customize_fields ( $wp_customize ) {

    $wp_customize->add_panel( 'socc_options_panel', array(
		'title'    => 'Contenu supplémentaire',
		'priority' => 300,
	) );

	$wp_customize->add_section( 'socc_hero_section', array(
		'title'    => 'Hero',
		'priority' => 10,
		'panel'    => 'socc_options_panel'
	) );
	$wp_customize->add_section( 'socc_about_section', array(
		'title'    => 'Presentation',
		'priority' => 11,
		'panel'    => 'socc_options_panel'
	) );
    $wp_customize->add_section( 'socc_footer_section', array(
		'title'    => 'Footer',
		'priority' => 11,
		'panel'    => 'socc_options_panel'
    ) );
    /** hero */
	$wp_customize->add_setting( 'socc_hero_subtitle', array(
        'default' => 'hero subtitle',
        'transport' => 'refresh'
    ) );

	$wp_customize->add_control( 'socc_hero_subtitle', array(
		'type'     => 'textarea',
		'label'    => 'Contenu Sous-titre Hero',
		'section'  => 'socc_hero_section',
		'priority' => 1
	) );
        /** about */
	$wp_customize->add_setting( 'socc_about_subtitle', array(
        'default' => 'about subtitle',
        'transport' => 'refresh'
    ) );

	$wp_customize->add_control( 'socc_about_subtitle', array(
		'type'     => 'textarea',
		'label'    => 'Contenu paragraphe gauche Presentation',
		'section'  => 'socc_about_section',
		'priority' => 1
    ) );
    $wp_customize->add_setting( 'socc_about_tasks-title', array(
        'default' => 'Titre liste',
        'transport' => 'refresh'
    ) );

	$wp_customize->add_control( 'socc_about_tasks-title', array(
		'type'     => 'textarea',
		'label'    => 'Titre Liste',
		'section'  => 'socc_about_section',
		'priority' => 1
	) );
    $wp_customize->add_setting( 'socc_about_tasks-post', array(
        'default' => '',
        'transport' => 'refresh'
    ) );

    $wp_customize->add_control( 'socc_about_tasks-post', array(
        'type'     => 'textarea',
        'label'    => 'Paragraphe Liste',
        'section'  => 'socc_about_section',
        'priority' => 1
    ) );
    $wp_customize->add_setting( 'socc_about_bottom', array(
        'default' => '',
        'transport' => 'refresh'
    ) );

	$wp_customize->add_control( 'socc_about_bottom', array(
		'type'     => 'textarea',
		'label'    => 'Paragraphe Bas',
		'section'  => 'socc_about_section',
		'priority' => 1
    ) );


        /**footer */
    $wp_customize->add_setting( 'socc_footer_logo_left', array(
        'default' => '',
        'transport' => 'refresh'
    ) );

	$wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'socc_footer_logo_left',
             array(
                'label'    => 'Logo gauche',
                'section'  => 'socc_footer_section',
                'priority' => 1
            ) 
        )
    );
    


    $wp_customize->add_setting( 'socc_footer_logo_right', array(
        'default' => '',
        'transport' => 'refresh'
    ) );

    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'socc_footer_logo_right',
             array(
                'label'    => 'Logo droit',
                'section'  => 'socc_footer_section',
                'priority' => 1
            ) 
        )
    );
}

add_action('customize_register', 'add_customize_fields');