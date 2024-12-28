<?php

function mytheme_customize_register($wp_customize) {
    // Add a section for Store Info
    $wp_customize->add_section('store_info_section', array(
        'title'      => __('Store Info', 'mytheme'),
        'priority'   => 40,
    ));

    // Wholesale Info Fields
    $wp_customize->add_setting('wholesale_address', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('wholesale_address', array(
        'label'      => __('Wholesale Address', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $phone_numbers = ['1', '2', '3', '4']; // Wholesale numbers
    foreach ($phone_numbers as $number) {
        $wp_customize->add_setting("wholesale_number_$number", array(
            'default'   => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("wholesale_number_$number", array(
            'label'      => __("Wholesale Number $number", 'mytheme'),
            'section'    => 'store_info_section',
            'type'       => 'text',
        ));
    }

    $wp_customize->add_setting('wholesale_working_hours_mon_fri', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('wholesale_working_hours_mon_fri', array(
        'label'      => __('Wholesale Working Hours (Mon-Fri)', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('wholesale_working_hours_sat', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('wholesale_working_hours_sat', array(
        'label'      => __('Wholesale Working Hours (Sat)', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('wholesale_email', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('wholesale_email', array(
        'label'      => __('Wholesale Email', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'email',
    ));

    // Retail Info Fields
    $wp_customize->add_setting('retail_address', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('retail_address', array(
        'label'      => __('Retail Address', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('retail_phone_number', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('retail_phone_number', array(
        'label'      => __('Retail Phone Number', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('retail_working_hours_mon_fri', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('retail_working_hours_mon_fri', array(
        'label'      => __('Retail Working Hours (Mon-Fri)', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('retail_working_hours_sat', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('retail_working_hours_sat', array(
        'label'      => __('Retail Working Hours (Sat)', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('retail_email', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('retail_email', array(
        'label'      => __('Retail Email', 'mytheme'),
        'section'    => 'store_info_section',
        'type'       => 'email',
    ));

    // Footer 
    $wp_customize->add_section('footer', array(
        'title'      => __('Footer', 'mytheme'),
        'priority'   => 10,
    ));

    $wp_customize->add_setting('footer_logo', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'      => __('Footer logo', 'mytheme'),
        'section'    => 'footer',
        'settings'   => 'footer_logo',
    )));


    // Social Links
    $wp_customize->add_section('social_media_section', array(
        'title'      => __('Social Media Links', 'mytheme'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('facebook_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('facebook_link', array(
        'label'      => __('Facebook URL', 'mytheme'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));

    $wp_customize->add_setting('instagram_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('instagram_link', array(
        'label'      => __('Instagram URL', 'mytheme'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));

    $wp_customize->add_setting('email_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('email_link', array(
        'label'      => __('Email URL', 'mytheme'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));

    // Social Icons
    $wp_customize->add_setting('facebook_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'facebook_icon', array(
        'label'      => __('Facebook Icon', 'mytheme'),
        'section'    => 'social_media_section',
        'settings'   => 'facebook_icon',
    )));

    $wp_customize->add_setting('instagram_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'instagram_icon', array(
        'label'      => __('Instagram Icon', 'mytheme'),
        'section'    => 'social_media_section',
        'settings'   => 'instagram_icon',
    )));

    $wp_customize->add_setting('email_icon', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'email_icon', array(
        'label'      => __('Email Icon', 'mytheme'),
        'section'    => 'social_media_section',
        'settings'   => 'email_icon',
    )));
}

add_action( 'customize_register', 'mytheme_customize_register' );

// Add WooCommerce support to your theme
function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

function mytheme_enqueue_styles() {
    // Enqueue the parent theme stylesheet (if applicable)
    if (is_child_theme()) {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    }

    // Enqueue the custom stylesheet
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/custom.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

function mytheme_register_menus() {
    register_nav_menus(array(
        'footer_menu_1' => __('Footer Menu 1', 'mytheme'),
        'footer_menu_2' => __('Footer Menu 2', 'mytheme'),
        'footer_menu_3' => __('Footer Menu 3', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_register_menus');

function custom_woocommerce_products_per_page($query) {
    if (!is_admin() && $query->is_main_query() && is_product_category()) {
        // Set the number of products per page
        $query->set('posts_per_page', 15); // Change 12 to your desired number
    }
}
add_action('pre_get_posts', 'custom_woocommerce_products_per_page');

function enqueue_custom_js() {
    wp_enqueue_script(
        'custom-js', // Handle for the script
        get_template_directory_uri() . '/custom.js', // Path to the script
        array(), // Dependencies (if any)
        '1.0.0', // Version number
        true // Load in the footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_js');
