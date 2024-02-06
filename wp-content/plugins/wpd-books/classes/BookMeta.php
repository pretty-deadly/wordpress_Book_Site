<?php

namespace BookPlugin;

/**
 * Class for collecting data about a book post type
 */
class BookMeta extends Singleton
{

    /**
     * the name of the book publisher
     * @var string
     */
    const PUBLISHER_NAME = 'bookPublisher';


    /**
     *the date the book was published
     *
     */
    const PUBLISHED_DATE = 'bookPublishedDate';


    /**
     *the total number of pages in the book
     * @var Int
     */
    const TOTAL_PAGES = 'bookTotalPages';


    /**
     * the cost of the book
     * @var int
     */
    const PRICE = 'bookPrice';


    /**
     *the genre of the book
     * @var string
     */
    const GENRE = 'book-genre';

    protected static $instance;


    protected function __construct(){
        add_action('admin_init', array($this, 'registerMetaBoxes'));
        add_action('save_post_' . BookPostType::POST_TYPE, array($this, 'saveBookMeta'));

    }

    public function registerMetaBoxes(){
        add_meta_box('book_directions_meta', 'Directions', array($this, 'directionsMetaBox'),
        BookPostType::POST_TYPE,
        'normal'
        );

        }


        public function directionsMetaBox(){
        $post = get_post();
        $bookPublisher = get_post_meta($post->ID, self::PUBLISHER_NAME, true);
        $bookPublishedDate = get_post_meta($post->ID, self::PUBLISHED_DATE, true);
        $bookTotalPages = get_post_meta($post->ID, self::TOTAL_PAGES, true);
        $bookPrice = get_post_meta($post->ID, self::PRICE, true);



            ?>
            <p>
                <label for="bookPublisher">Publisher:</label>
                <input type="text" name="bookPublisher" id="bookPublisher" value="<?= $bookPublisher ?>">
            </p>
            <p>
                <label for="bookPublishedDate">Publish Date:</label>
                <input type="date" name="bookPublishedDate" id="bookPublishedDate" value="<?= $bookPublishedDate ?>">
            </p>
            <p>
                <label for="bookTotalPages">Page Count:</label>
                <input type="number" name="bookTotalPages" id="bookTotalPages" value="<?= $bookTotalPages ?>">
            </p>
            <p>
                <label for="bookTotalPages">Price:</label>
                <input type="text" name="bookPrice" id="bookPrice" value="<?= $bookPrice ?>">
            </p>




<?php

        }

        public function saveBookMeta(){
        $post = get_post();


            if(isset($_POST['bookPublisher'])){
                $bookPublisher = sanitize_text_field($_POST['bookPublisher']);

                update_post_meta($post->ID, self::PUBLISHER_NAME, $bookPublisher);
            }


            if(isset($_POST['bookPublishedDate'])){
                $bookPublishedDate = sanitize_text_field($_POST['bookPublishedDate']);

                update_post_meta($post->ID, self::PUBLISHED_DATE, $bookPublishedDate);
            }


            if(isset($_POST['bookTotalPages'])){
                $bookTotalPages = sanitize_text_field($_POST['bookTotalPages']);

                update_post_meta($post->ID, self::TOTAL_PAGES, $bookTotalPages);
            }

            if(isset($_POST['bookPrice'])){
                $bookPrice = sanitize_text_field($_POST['bookPrice']);

                update_post_meta($post->ID, self::PRICE, $bookPrice);
            }

        }
}