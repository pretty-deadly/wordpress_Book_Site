<?php

namespace BookPlugin;
use WP_Query;
use WP_Widget;
use function get_the_permalink;
use function get_the_title;
use function wp_reset_postdata;

class Filter extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'tv-book-filter-widget',
            'description' => 'A widget for displaying 5 recent book posts.',
        );
        parent::__construct('tv-book-filter-widget', 'Filter My Books', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        // outputs the content of the widget
        echo $args['before_widget'];

        if ($instance['title']) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];

        }

        $bookQuery = new WP_Query(
            array(
                'post_type' => 'book',
                'name' => 'book',
                'meta_key' => 'bookPublishedDate',
                'orderby' => array('meta_value_num' => 'ASC'),
                'posts_per_page' => 5,
                'has_password' => false,
                'post_status' => 'publish'
            )


        );

        // the loop
        if ($bookQuery->have_posts()) {
            echo "<ul>";
            while ($bookQuery->have_posts()) {
                $bookQuery->the_post(); // retrieves post from the database into the "current post"
                echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a><br>';
                echo number_format(get_post_meta(get_the_ID(), 'bookPublishedDate', true) . '</li>');
                echo '<li><hr></li>';
            }
            echo "</ul>";
        }

        // ALWAYS reset the page query
        wp_reset_postdata();

        echo $args['after_widget'];


    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        // outputs the options form on admin
        $title = $instance['title'] ?? 'Recent Publications';

        ?>
        <p><label for="<?= $this->get_field_id('title') ?>">Title</label>
            <input type="text"
                   id="<?= $this->get_field_id("title") ?>"
                   name="<?= $this->get_field_name('title') ?>"
                   class="widefat"
                   value="<?= $title ?>">

        </p>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance): array
    {

        $instance = [];

        // validate/sanitize
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;


    }
}