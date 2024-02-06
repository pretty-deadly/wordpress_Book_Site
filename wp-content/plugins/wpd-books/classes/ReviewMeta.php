<?php

namespace ReviewPlugin;

/**
 * Class for collecting book reviews
 */
class ReviewMeta extends Singleton
{

    /**
     * the name of the reviewer
     * @var string
     */
    const REVIEWER_NAME = 'reviewerName';


    /**
     *the title of the review
     * @var string
     */
    const REVIEWER_TITLE = 'reviewTitle';

    /**
     * the location of the reviewer
     * @var string
     */
    const REVIEWER_LOCATION = 'location';


    /**
     *the content of the review
     * @var
     */
    const REVIEW_CONTENT = 'reviewContent';


    /**
     *the 1-5 star rating of the reviewed book
     * @var string
     */
    const REVIEW_RATING = 'reviewRating';

    /** the title of the book being reviewed
     * @var string
     */
    const REVIEWED_BOOK = 'reviewedBook';


    protected static $instance;


    protected function __construct(){
        add_action('admin_init', array($this, 'registerMetaBoxes'));
        add_action('save_post_' . ReviewPostType::POST_TYPE, array($this, 'saveReviewMeta'));

    }

    public function registerMetaBoxes(){
        add_meta_box('review_directions_meta', 'Directions', array($this, 'directionsMetaBox'),
        ReviewPostType::POST_TYPE,
        'normal'
        );

        }


        public function directionsMetaBox(){
        $post = get_post();
        $reviewerName = get_post_meta($post->ID, self::REVIEWER_NAME, true);
        $reviewerLocation = get_post_meta($post ->ID, self::REVIEWER_LOCATION, true);
        $reviewerTitle = get_post_meta($post->ID, self::REVIEWER_TITLE, true);
        $reviewContent = get_post_meta($post->ID, self::REVIEW_CONTENT, true);
        $rating = get_post_meta($post->ID, self::REVIEW_RATING, true);
        $reviewedBookTitle = get_post_meta($post->ID, self::REVIEWED_BOOK, true);



            ?>

            <p>
                <label for="reviewerName">Name:</label>
                <input type="text" name="reviewerName" id="reviewerName" value="<?= $reviewerName ?>">
            </p>
            <p>
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="<?= $reviewerLocation ?>">
            </p>

            <p>
                <label for="reviewerTitle">Title:</label>
                <input type="text" name="reviewerTitle" id="reviewerTitle" value="<?= $reviewerTitle ?>">
            </p>
            <p>
                <label for="content">Details:</label>
                <textarea name="content" id="content" value="<?= $reviewContent ?>"></textarea>
            </p>

            <p>

                <label for="reviewRating">Rating:</label>
                <select name="reviewRating" id="reviewRating">
                <option name="rating" value="<?= $rating ?>" id="5"><label for="5">&starf;&starf;&starf;&starf;&starf;</label>
                <option name="rating" value="<?= $rating ?>" id="4"><label for="4">&starf;&starf;&starf;&starf;</label>
                <option name="rating" value="<?= $rating ?>" id="3"><label for="3">&starf;&starf;&starf;</label>
                <option name="rating" value="<?= $rating ?>" id="2"><label for="2">&starf;&starf;</label>
                <option name="rating" value="<?= $rating ?>" id="1"><label for="1">&starf;</label>
                </select>

            </p>

            <p>
                <label for="books">Choose Book:</label>

                <select name="books" id="books">
                    <option name="Dissolving Classroom" id="Dissolving Classroom" value="<?= $reviewedBookTitle ?>">Dissolving Classroom</option>
                    <option name="Deserter" value="<?= $reviewedBookTitle ?>">Deserter</option>
                    <option name="Fragments of Horror" value="<?= $reviewedBookTitle ?>">Fragments of Horror</option>
                    <option name="The Luminal Zone" value="<?= $reviewedBookTitle ?>">The Luminal Zone</option>
                    <option name="Uzumaki" value="<?= $reviewedBookTitle ?>">Uzumaki</option>
                    <option name="Tomie" value="<?= $reviewedBookTitle ?>">Tomie</option>
                    <option name="Frankenstein" value="<?= $reviewedBookTitle ?>">Frankenstein</option>
                    <option name="Gyo" value="<?= $reviewedBookTitle ?>">Gyo</option>
                    <option name="Lovesickness" value="<?= $reviewedBookTitle ?>">Lovesickness</option>
                    <option name="Remina" value="<?= $reviewedBookTitle ?>">Remina</option>
                    <option name="Shiver" value="<?= $reviewedBookTitle ?>">Shiver</option>
                    <option name="Black Paradox" value="<?= $reviewedBookTitle ?>">Black Paradox</option>
                    <option name="Sensor" id="Sensor" value="<?= $reviewedBookTitle ?>">Sensor</option>
                    <option name="Smashed" value="<?= $reviewedBookTitle ?>">Smashed</option>
                    <option name="Venus in the Blind Spot" value="<?= $reviewedBookTitle ?>">Venus in the Blind Spot</option>
                    <option name="No Longer Human" value="<?= $reviewedBookTitle ?>">No Longer Human</option>
                    <option name="The Art of Junji Ito: Twisted Visions" value="<?= $reviewedBookTitle ?>">The Art of Junji Ito: Twisted Visions</option>
                </select>
            </p>


<?php

        }

        public function saveReviewMeta(){
        $post = get_post();


            if(isset($_POST['reviewerName'])){
                $reviewerName = sanitize_text_field($_POST['reviewerName']);

                update_post_meta($post->ID, self::REVIEWER_NAME, $reviewerName);
            }

            if(isset($_POST['location'])){
                $reviewerLocation = sanitize_text_field($_POST['location']);

                update_post_meta($post->ID, self::REVIEWER_LOCATION, $reviewerLocation);
            }


            if(isset($_POST['reviewTitle'])){
                $reviewerTitle = sanitize_text_field($_POST['reviewTitle']);

                update_post_meta($post->ID, self::REVIEWER_TITLE, $reviewerTitle);
            }


            if(isset($_POST['reviewContent'])){
                $reviewContent = sanitize_text_field($_POST['reviewContent']);

                update_post_meta($post->ID, self::REVIEW_CONTENT, $reviewContent);
            }

            if(isset($_POST['reviewRating'])){
                $rating = sanitize_text_field($_POST['reviewRating']);

                update_post_meta($post->ID, self::REVIEW_RATING, $rating);
            }

            if(isset($_POST['reviewedBook'])){
                $reviewedBookTitle = sanitize_text_field($_POST['reviewedBook']);

                update_post_meta($post->ID, self::REVIEWED_BOOK, $reviewedBookTitle);
            }


        }
}