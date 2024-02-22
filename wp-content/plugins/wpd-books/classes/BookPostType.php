<?php

namespace BookPlugin;

/**
 * a class for creating a post type about Books
 */
class BookPostType extends Singleton
{
    /**
     * @var string
     */
    const POST_TYPE = 'book';


    /**
     * @var string
     */
    const GENRE = 'book-genre';

    protected static $instance;

    protected function __construct()
    {
        add_action('init', array($this, 'registerBookPostType'));

        add_filter('the_content', array($this, 'bookContentTemplate'), 1);

    }

    public function registerBookPostType()
    {
        // Register Custom Post Type

        $labels = array(
            'name' => _x('Books', 'Post Type General Name', TEXT_DOMAIN),
            'singular_name' => _x('Book', 'Post Type Singular Name', TEXT_DOMAIN),
            'menu_name' => __('Books', TEXT_DOMAIN),
            'name_admin_bar' => __('Book', TEXT_DOMAIN),
            'archives' => __('Book Archives', TEXT_DOMAIN),
            'attributes' => __('Book Attributes', TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Item:', TEXT_DOMAIN),
            'all_items' => __('All Books', TEXT_DOMAIN),
            'add_new_item' => __('Add New Book', TEXT_DOMAIN),
            'add_new' => __('Add Book', TEXT_DOMAIN),
            'new_item' => __('New Book', TEXT_DOMAIN),
            'edit_item' => __('Edit Book', TEXT_DOMAIN),
            'update_item' => __('Update Book', TEXT_DOMAIN),
            'view_item' => __('View Book', TEXT_DOMAIN),
            'view_items' => __('View Books', TEXT_DOMAIN),
            'search_items' => __('Search Book', TEXT_DOMAIN),
            'not_found' => __('Not found', TEXT_DOMAIN),
            'not_found_in_trash' => __('Not found in Trash', TEXT_DOMAIN),
            'featured_image' => __('Featured Image', TEXT_DOMAIN),
            'set_featured_image' => __('Set featured image', TEXT_DOMAIN),
            'remove_featured_image' => __('Remove featured image', TEXT_DOMAIN),
            'use_featured_image' => __('Use as featured image', TEXT_DOMAIN),
            'insert_into_item' => __('Insert into Book', TEXT_DOMAIN),
            'uploaded_to_this_item' => __('Uploaded to this book', TEXT_DOMAIN),
            'items_list' => __('Books list', TEXT_DOMAIN),
            'items_list_navigation' => __('Books list navigation', TEXT_DOMAIN),
            'filter_items_list' => __('Filter books list', TEXT_DOMAIN),
        );
        $args = array(
            'label' => __('Book', TEXT_DOMAIN),
            'description' => __('Books', TEXT_DOMAIN),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_rest' => true,
        );
        register_post_type(self::POST_TYPE, $args);
    }

    public function bookContentTemplate($content)
    {
        $post = get_post();

        if ($post->post_type == self::POST_TYPE) {
            $bookPublisher = get_post_meta($post->ID, BookMeta::PUBLISHER_NAME, true);
            $bookPublishedDate = get_post_meta($post->ID, BookMeta::PUBLISHED_DATE, true);
            $bookTotalPages = get_post_meta($post->ID, BookMeta::TOTAL_PAGES, true);
            $bookPrice = get_post_meta($post->ID, BookMeta::PRICE, true);
            $bookGenre = wp_get_post_terms($post->ID, self:: GENRE, array("fields" => "names"));
            if (is_array($bookGenre) && !empty($bookGenre)) {
                $genreList = implode(',', $bookGenre);
            }else{
                $genreList = 'No genre assigned';
            }


            $content = '
            <h3 class="border-bottom py-2" id="book-description"><strong>Description</strong></h3>
                           <div>' . $content . '</div>
                           <hr>
                           <ul class="list-inline">
                           <li class="list-inline-item"><strong>Genre: </strong>' . $genreList . '</li>
                           <li class="list-inline-item"><strong>Publisher: </strong>' . $bookPublisher . '</li>
                           <li class="list-inline-item"><strong>Published Date: </strong>' . $bookPublishedDate . '</li>
                           <li class="list-inline-item"><strong>Pages: </strong>' . $bookTotalPages . '</li>
                           </ul>
                           <div>
                           <p><strong>Book Price: </strong> $' . $bookPrice . '</p>
                           </div>
            ';
        }
        return $content;
    }
}