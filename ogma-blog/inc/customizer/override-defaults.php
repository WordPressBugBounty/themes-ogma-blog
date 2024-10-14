<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

//managed the site identity section in general settings panel.

$wp_customize->get_section( 'title_tagline' )->priority = 10;
$wp_customize->get_section( 'title_tagline' )->panel    = 'ogma_blog_panel_header';

$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

$wp_customize->get_control( 'header_textcolor' )->section    = 'title_tagline';
$wp_customize->get_control( 'header_textcolor' )->priority    = 20;

$wp_customize->get_section( 'header_image' )->priority = 15;
$wp_customize->get_section( 'header_image' )->panel     = 'ogma_blog_panel_header';

$wp_customize->get_control( 'background_color' )->section    = 'background_image';
$wp_customize->get_control( 'background_color' )->priority    = 5;

$wp_customize->get_section( 'background_image' )->panel    = 'ogma_blog_panel_general';
$wp_customize->get_section( 'background_image' )->title    = __( 'Background', 'ogma-blog' );
$wp_customize->get_section( 'background_image' )->priority = 65;
