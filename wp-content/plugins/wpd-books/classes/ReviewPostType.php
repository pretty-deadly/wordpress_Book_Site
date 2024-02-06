<?php

namespace ReviewPlugin;

/**
 * Class for registering the custom post type for book reviews
 */
class ReviewPostType extends Singleton
{
    /**
     * @var string The post type identifier
     */
    const POST_TYPE = 'review';

    /**
     * Constructor. Hooks into WordPress actions.
     */
    protected function __construct()
    {
        add_action('init', array($this, 'registerReviewPostType'));
        add_filter('the_content', array($this, 'reviewContentTemplate'), 1);
    }

    /**
     * Registers the custom post type for reviews.
     */
    public function registerReviewPostType()
    {
        $labels = array(
            'name' => _x('Reviews', 'Post Type General Name', TEXT_DOMAIN),
            'singular_name' => _x('Review', 'Post Type Singular Name', TEXT_DOMAIN),
            'menu_name' => __('Reviews', TEXT_DOMAIN),
            'name_admin_bar' => __('Review', TEXT_DOMAIN),
            'archives' => __('Review Archives', TEXT_DOMAIN),
            'attributes' => __('Review Attributes', TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Item:', TEXT_DOMAIN),
            'all_items' => __('All Reviews', TEXT_DOMAIN),
            'add_new_item' => __('Add New Review', TEXT_DOMAIN),
            'add_new' => __('Add Review', TEXT_DOMAIN),
            'new_item' => __('New Review', TEXT_DOMAIN),
            'edit_item' => __('Edit Review', TEXT_DOMAIN),
            'update_item' => __('Update Review', TEXT_DOMAIN),
            'view_item' => __('View Review', TEXT_DOMAIN),
            'view_items' => __('View Review', TEXT_DOMAIN),
            'search_items' => __('Search Review', TEXT_DOMAIN),
            'not_found' => __('Not found', TEXT_DOMAIN),
            'not_found_in_trash' => __('Not found in Trash', TEXT_DOMAIN),
            'featured_image' => __('Featured Image', TEXT_DOMAIN),
            'set_featured_image' => __('Set featured image', TEXT_DOMAIN),
            'remove_featured_image' => __('Remove featured image', TEXT_DOMAIN),
            'use_featured_image' => __('Use as featured image', TEXT_DOMAIN),
            'insert_into_item' => __('Insert into Review', TEXT_DOMAIN),
            'uploaded_to_this_item' => __('Uploaded to this review', TEXT_DOMAIN),
            'items_list' => __('Review list', TEXT_DOMAIN),
            'items_list_navigation' => __('Reviews list navigation', TEXT_DOMAIN),
            'filter_items_list' => __('Filter reviews list', TEXT_DOMAIN),
        );
        $args = array(
            'label' => __('Review', TEXT_DOMAIN),
            'description' => __('Reviews', TEXT_DOMAIN),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'hierarchical' => false,
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

    /**
     * Modifies the content of review posts.
     *
     * @param string $content The content of the post.
     * @return string The modified content.
     */
    public function reviewContentTemplate($content)
    {
        $post = get_post();

        if ($post->post_type == self::POST_TYPE) {
            $reviewerName = get_post_meta($post->ID, ReviewMeta::REVIEWER_NAME, true);
            $reviewerLocation = get_post_meta($post->ID, ReviewMeta::REVIEWER_LOCATION, true);
            $reviewerTitle = get_post_meta($post->ID, ReviewMeta::REVIEWER_TITLE, true);
            $reviewContent = get_post_meta($post->ID, ReviewMeta::REVIEW_CONTENT, true);
            $rating = get_post_meta($post->ID, ReviewMeta::REVIEW_RATING, true);
            $reviewedBookTitle = get_post_meta($post->ID, ReviewMeta::REVIEWED_BOOK, true);

            $content = '
                <div class="card">' . $content . '
                <hr>
                <ul class="list-inline">
                    <li class="list-inline-item"><strong>' . $reviewedBookTitle . '</strong></li>
                    <li class="list-inline-item">' . $reviewerTitle . '</li>
                    <li class="list-inline-item"><small>Reviewed By: ' . $reviewerName . '</small></li>
                    <li class="list-inline-item"><small>Location: ' . $reviewerLocation . '</small></li>
                    <li class="list-inline-item"><strong>Details: </strong>' . $reviewContent . '</li>
                    <li class="list-inline-item"><strong>Rating: </strong>' . $rating . '</li>
                </ul>
                </div>
            ';
        }
        return $content;
    }
}
