<?php

function mytheme_customize_register( $wp_customize ) {
    // Add a section for Social Media Links
    $wp_customize->add_section( 'social_media_section' , array(
        'title'      => __('Social Media Links', 'mytheme'),
        'priority'   => 30,
    ));

    // Add settings for each social media link
    $wp_customize->add_setting( 'facebook_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting( 'twitter_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting( 'linkedin_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Add controls to input the social media links
    $wp_customize->add_control( 'facebook_link', array(
        'label'      => __('Facebook URL', 'mytheme'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));

    $wp_customize->add_control( 'twitter_link', array(
        'label'      => __('Twitter URL', 'mytheme'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));

    $wp_customize->add_control( 'linkedin_link', array(
        'label'      => __('LinkedIn URL', 'mytheme'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));
}

add_action( 'customize_register', 'mytheme_customize_register' );