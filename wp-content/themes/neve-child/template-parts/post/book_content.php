<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Neve
 */
?>

<div class="card-group">
    <div class="card">
        <div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
            <div class="card mb-3 article_content">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div class="img-fluid">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <div class="read-btn">
                                <button class="button button-primary" href="<?php the_permalink(); ?>">
                                    <span><?php esc_html_e('Read More', 'neve'); ?></span>
                                    <span class="screen-reader-text"><?php esc_html_e('Read More', 'neve'); ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="post-hr">
