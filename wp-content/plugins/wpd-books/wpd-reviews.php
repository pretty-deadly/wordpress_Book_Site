<?php
/**
 * @wordpress-plugin
 * Plugin Name: Reviews
 * Description: Plugin to display reviews
 * Author: Tasheena Vigil
 * Version: 1.0.0
 * Text Domain: wpd-reviews
 */

// this is the only thing that needs to be unique in our plugin
// to access anything in this plugin outside this plugin, we use
// RecipePlugin\function_name() or RecipePlugin\ClassName
namespace ReviewPlugin;

//define plugin-level constants
const TEXT_DOMAIN = 'wpd-reviews';

//include class files
include __DIR__ . '/classes/Singleton.php';
include __DIR__ . '/classes/ReviewPostType.php';
//include __DIR__ . '/classes/BookGenreTaxonomy.php';
include __DIR__ . '/classes/ReviewMeta.php';

ReviewPostType::getInstance();
//BookGenreTaxonomy::getInstance();
ReviewMeta::getInstance();

//flush the cache
function activate_plugin(){
    $reviewPostType = ReviewPostType::getInstance();
    $reviewPostType->registerReviewPostType();

    //BookGenreTaxonomy::getInstance()->registerBookGenreTaxonomy();

    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'ReviewPlugin\activate_plugin');