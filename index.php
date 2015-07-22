<?php
include 'WooLimeLight.php';

$wll = new WooLimeLight();
add_shortcode( 'woocommerce_limelight', array(&$wll, 'init') );

/**
 * Add javascript
 */
wp_register_script('woolimelight', get_template_directory_uri() . '/WooLimeLight/js/woolimelight.js', array('jquery'), true, true);
wp_enqueue_script('woolimelight');