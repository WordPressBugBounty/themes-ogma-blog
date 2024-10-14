<?php
/**
 * Define path for required files for Custom Control
 * 
 * @package Ogma Blog
*/

/**
 * Register Custom Controls
 * 
 * @since 1.0.0
*/

// Load/Register control radio image.
require_once get_template_directory() . '/inc/customizer/custom-controls/radio-image/class-radio-image-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Radio_Image' );

// Load/Register control toggle.
require_once get_template_directory() . '/inc/customizer/custom-controls/toggle/class-toggle-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Toggle' );

// Load/Register control tabs.
require_once get_template_directory() . '/inc/customizer/custom-controls/tabs/class-tabs-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Tabs' );

// Load/Register control range.
require_once get_template_directory() . '/inc/customizer/custom-controls/range/class-range-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Range' );

// Load/Register control radio buttonset.
require_once get_template_directory() . '/inc/customizer/custom-controls/buttonset/class-buttonset-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Buttonset' );

// Load/Register control radio icons.
require_once get_template_directory() . '/inc/customizer/custom-controls/radio-icons/class-radio-icons-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Radio_Icons' );

// Load/Register control divider.
require_once get_template_directory() . '/inc/customizer/custom-controls/divider/class-divider-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Divider' );

// Load/Register control redirect.
require_once get_template_directory() . '/inc/customizer/custom-controls/redirect/class-redirect-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Redirect' );

// Load/Register control repeater.
require_once get_template_directory() . '/inc/customizer/custom-controls/repeater/class-repeater-control.php';

// Load/Register control heading.
require_once get_template_directory() . '/inc/customizer/custom-controls/heading/class-heading-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Heading' );

// Load/Register control dropdown categories.
require_once get_template_directory() . '/inc/customizer/custom-controls/dropdown-categories/class-dropdown-categories-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Dropdown_Categories' );

// Load/Register control sortable.
require_once get_template_directory() . '/inc/customizer/custom-controls/sortable/class-sortable-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Sortable' );

// Load/Register control typography.
require_once get_template_directory() . '/inc/customizer/custom-controls/typography/class-typography-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Typography' );

// Load/Register control upgrade.
require_once get_template_directory() . '/inc/customizer/custom-controls/upgrade/class-upgrade-control.php';
$wp_customize->register_control_type( 'Ogma_Blog_Control_Upgrade' );

// Load/Register section upsell.
require get_template_directory(). '/inc/customizer/extend-customizer/class-upsell-section.php';
$wp_customize->register_section_type( 'Ogma_Blog_Upsell_Section' );
