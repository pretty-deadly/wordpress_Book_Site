<?php
/**
 * Plugin Name: Filter My Books
 * Description: Widget for displaying books
 * Author: Tasheena Vigil
 * Text Domain: book_filter
 * Version: 1.0.0
 */

//include the widget file
// require_once won't work here

require_once
    plugin_dir_path(__FILE__) . "/Filter.php";


add_action('widgets_init', function(){
    register_widget('Filter');

});
