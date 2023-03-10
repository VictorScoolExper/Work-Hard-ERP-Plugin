<?php
/*
    Plugin Name: Work Hard ERP
    Description: This is an ERP and CRM focused to aid small business that 
    focus on landscaping, home maintance, etc.
    Version: 0.1.0
    Require at least: 5.9
    Requires PHP: 7.2
    Author: The North Tech Solutions Team
    Author URI: thenorthtechsolutions.com
    Text Domain: hard-work-erp
    Domain Path: /languages
    License: Copyright 2019-2023 wherp.thenorthtechsolutions.com. All rights reserved.
*/

if (!function_exists('add_action')) {
    echo 'Seems like you stumbled here by accident. 😛';
    exit;
}

// Setup
define('HW_ERP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('HW_ERP_PLUGIN_FILE', __FILE__);

// Includes
$rootFiles = glob(HW_ERP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(HW_ERP_PLUGIN_DIR . 'includes/**/*.php');
$moduleFiles = glob(HW_ERP_PLUGIN_DIR . 'modules/**/*.php');
//$moduleSubdirectoryFiles = glob(HW_ERP_PLUGIN_DIR . 'modules/**')
$allFiles = array_merge($rootFiles, $subdirectoryFiles, $moduleFiles);

foreach ($allFiles as $filename) {
    include_once($filename);
}

// Do this using the regular php method by adding it in the vendor
function my_plugin_scripts() {
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', array(), '5.3.0', 'all' );
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN', array('jquery'), '5.3.0', true);
}

// Hooks
add_action( 'admin_enqueue_scripts', 'my_plugin_scripts' );

add_action('admin_menu', 'hw_erp_admin_menus');






