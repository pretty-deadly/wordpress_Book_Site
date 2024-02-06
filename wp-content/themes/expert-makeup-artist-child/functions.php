<?php
function ito_enqueue_styles()
{
// get information about the theme
    $theme = wp_get_theme();

// dequeue the styles from the parent theme
    wp_dequeue_style('expert-makeup-artist-style');

//enqueue real parent stylesheet
    wp_enqueue_style('expert-makeup-artist-style', get_template_directory_uri() . '/style.css',
        ['bootstrap-css', 'font-awesome-css'],
        $theme->get('Version')
    );

//enqueue child theme to override parent theme
    wp_enqueue_style('ito-child-style', get_stylesheet_uri(),
        ['expert-makeup-artist-style', 'bootstrap-css', 'font-awesome-css'],
        $theme->get('Version')
    );

//remove anything you're not using
    wp_dequeue_style('expert-makeup-artist-ie8');
    wp_dequeue_style('expert-makeup-artist-ie9');


}

add_action('wp_enqueue_scripts', 'ito_enqueue_styles', 100);

function expert_child_makeup_artist_breadcrumb() {
    if (!is_home()) {
        echo '<a href="';
        echo esc_url(home_url());
        echo '">';
        bloginfo('name');
        echo "</a> ";

        $post = get_post();

        if(is_single() && $post && $post->post_type == 'book'){
            echo "&nbsp;&#187;&nbsp;";
            echo '<a href="';
            echo esc_url(get_post_type_archive_link('book'));
            echo '">Books</a> ';
            if (is_single()) {
                echo "&nbsp;&#187;&nbsp;";
                echo "<span> ";
                the_title();
                echo "</span>";
            }
        } else if (is_category() || is_single()) {
            echo "&nbsp;&#187;&nbsp;";
            the_category(', ');
            if (is_single()) {
                echo "&nbsp;&#187;&nbsp;";
                echo "<span> ";
                the_title();
                echo "</span>";
            }
        } elseif (is_page()) {
            echo "&nbsp;&#187;&nbsp;";
            echo "<span>";
            the_title();
            echo "</span> ";
        }
    }
}