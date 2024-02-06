<?php
/**
 * @wordpress-plugin
 * Plugin Name: Books
 * Description: Plugin to display books
 * Author: Tasheena Vigil
 * Version: 1.0.0
 * Text Domain: wpd-books
 */

// this is the only thing that needs to be unique in our plugin
// to access anything in this plugin outside this plugin, we use
// RecipePlugin\function_name() or RecipePlugin\ClassName
namespace BookPlugin;

//define plugin-level constants
const TEXT_DOMAIN = 'wpd-books';

//include class files
include __DIR__ . '/classes/Singleton.php';
include __DIR__ . '/classes/BookPostType.php';
include __DIR__ . '/classes/BookGenreTaxonomy.php';
include __DIR__ . '/classes/BookMeta.php';

BookPostType::getInstance();
BookGenreTaxonomy::getInstance();
BookMeta::getInstance();

//flush the cache
function activate_plugin(){
    $bookPostType = BookPostType::getInstance();
    $bookPostType->registerBookPostType();

    BookGenreTaxonomy::getInstance()->registerBookGenreTaxonomy();

    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'BookPlugin\activate_plugin');