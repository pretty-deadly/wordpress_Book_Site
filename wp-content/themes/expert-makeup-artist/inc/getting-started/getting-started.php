<?php
//about theme info
add_action( 'admin_menu', 'expert_makeup_artist_gettingstarted' );
function expert_makeup_artist_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'expert-makeup-artist'), esc_html__('About Theme', 'expert-makeup-artist'), 'edit_theme_options', 'expert_makeup_artist_guide', 'expert_makeup_artist_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function expert_makeup_artist_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'expert_makeup_artist_admin_theme_style');

//guidline for about theme
function expert_makeup_artist_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'expert-makeup-artist' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Expert Makeup Artist WordPress Theme', 'expert-makeup-artist' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'expert-makeup-artist' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'expert-makeup-artist' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'expert-makeup-artist' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'expert-makeup-artist' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'expert-makeup-artist' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'expert-makeup-artist' ); ?> <a href="<?php echo esc_url( EXPERT_MAKEUP_ARTIST_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'expert-makeup-artist' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Expert Makeup Artist is a fine WordPress theme that has a perfect blend of style and elegance and is suitable to give a fine web presence to makeup studios, salons, spas, hair dresses, hairstylist experts, styling studios, and makeover artists, personal stylist, fashionistas and fashion and style bloggers. It can be used as a multipurpose theme and has sophisticated look. The design is retina-ready and responsive to show every detail with ease and makes your website look incredible on every device. Your website will look extremely professional and to allow every user to create a website with minimal effort as there is a user-friendly theme options panel available. With this free theme,  you get plenty of personalization options as well as a lot of well-designed sections including Team, Testimonial Section, etc. Call to Action (CTA) buttons are added at places where visitors can click and go to the next step thus improving your conversions. For getting a faster page load time, the clean and secure codes of this theme are further optimized. Moreover, you get translation options for your website and SEO-friendly codes will help you to get to the top of the SERP ranks. This theme also provides you with many social media options for promoting your products.', 'expert-makeup-artist')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Expert Makeup Artist Theme', 'expert-makeup-artist' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'expert-makeup-artist'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( EXPERT_MAKEUP_ARTIST_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'expert-makeup-artist'); ?></a>
			<a href="<?php echo esc_url( EXPERT_MAKEUP_ARTIST_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'expert-makeup-artist'); ?></a>
			<a href="<?php echo esc_url( EXPERT_MAKEUP_ARTIST_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'expert-makeup-artist'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/expert-makeup-artist.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'expert-makeup-artist'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'expert-makeup-artist'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'expert-makeup-artist'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>