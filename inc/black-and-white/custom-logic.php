<?php

function mytheme_customize_register($wp_customize) {
    $wp_customize->add_section('social_media_section', array(
        'title'      => __('Social Media Links', 'mytheme'),
        'priority'   => 30,
    ));

    // Social Links
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
