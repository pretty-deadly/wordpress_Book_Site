<?php
/**
 * The template for displaying archive pages
 * @subpackage Neve
 */

get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h2 class="page-title">Books</h2>' );
			?>
		</header>
	<?php endif; ?>

	<div class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
		    $neve_archive_page_sidebar = get_theme_mod('neve_archive_page_sidebar','Right Sidebar');
		    if($neve_archive_page_sidebar == 'Left Sidebar'){ ?>
		    	<div class="row">
		        	<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
			        <div class="content_area col-lg-8 col-md-8">
				    	<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();
									
									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif; 
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'neve' ),
				                        'next_text'          => __( 'Next page', 'neve' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neve' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>			
			<?php }else if($neve_archive_page_sidebar == 'Right Sidebar'){ ?>
				<div class="row">
					<div class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif;
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'neve' ),
				                        'next_text'          => __( 'Next page', 'neve' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neve' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
				</div>
			<?php }else if($neve_archive_page_sidebar == 'One Column'){ ?>
					<div class="content_area">
						<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif; 
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'neve' ),
				                        'next_text'          => __( 'Next page', 'neve' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neve' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
			<?php }else if($neve_archive_page_sidebar == 'Grid Layout'){ ?>
		    	<div class="content_area">
					<section id="post_section" >
						<div class="row">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/grid-layout' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif; 
							?>
						</div>
						<div class="navigation">
			                <?php
			                    the_posts_pagination( array(
			                        'prev_text'          => __( 'Previous page', 'neve' ),
			                        'next_text'          => __( 'Next page', 'neve' ),
			                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neve' ) . ' </span>',
			                    ) );
			                ?>
			                <div class="clearfix"></div>
			            </div>
					</section>
				</div>
			<?php } else { ?>
				<div class="row">
					<div class="content_area col-lg-8 col-md-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/book_content' );
								endwhile;
								else :

									get_template_part( 'template-parts/post/content', 'none' );
								endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'neve' ),
				                        'next_text'          => __( 'Next page', 'neve' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'neve' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
				</div>
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer();
