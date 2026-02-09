<?php
/**
 * This file adds functions to the Templeton Block Theme WordPress theme.
 *
 * @package Templeton Block Theme
 * @author  PJUX
 * @license GNU General Public License v3
 * @link    https://pjux.com/
 */

if ( ! function_exists( 'templeton_block_theme_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 0.8.0
	 *
	 * @return void
	 */
	function templeton_block_theme_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'templeton-block-theme', get_template_directory() . '/languages' );

		// Enqueue editor stylesheet.
		add_editor_style( get_template_directory_uri() . '/style.css' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

	}
}
add_action( 'after_setup_theme', 'templeton_block_theme_setup' );

/**
 * Add Google Tag Manager script to head.
 *
 * @since 1.0.0
 */
function templeton_block_theme_google_tag_manager() {
	?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PCK4T9W4');</script>
	<!-- End Google Tag Manager -->
	<?php
}
add_action( 'wp_head', 'templeton_block_theme_google_tag_manager', 1 );

/**
 * Add Google Tag Manager noscript fallback after body tag.
 *
 * @since 1.0.0
 */
function templeton_block_theme_google_tag_manager_noscript() {
	?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PCK4T9W4"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
}
add_action( 'wp_body_open', 'templeton_block_theme_google_tag_manager_noscript' );

// Enqueue stylesheet.
add_action( 'wp_enqueue_scripts', 'templeton_block_theme_enqueue_stylesheet' );
function templeton_block_theme_enqueue_stylesheet() {

	wp_enqueue_style( 'templeton-block-theme', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

}

/**
 * Register block styles.
 *
 * @since 0.9.2
 */
function templeton_block_theme_register_block_styles() {

	$block_styles = array(
		'core/columns' => array(
			'columns-reverse' => __( 'Reverse', 'templeton-block-theme' ),
		),
		'core/group' => array(
			'shadow-light' => __( 'Shadow', 'templeton-block-theme' ),
			'shadow-solid' => __( 'Solid', 'templeton-block-theme' ),
		),
		'core/list' => array(
			'no-disc' => __( 'No Disc', 'templeton-block-theme' ),
			'checkmark-list' => __( 'Checkmark', 'templeton-block-theme' ),
			'checkmark-list-purple' => __( 'Checkmark Purple', 'templeton-block-theme' ),
		),
		'core/quote' => array(
			'shadow-light' => __( 'Shadow', 'templeton-block-theme' ),
			'shadow-solid' => __( 'Solid', 'templeton-block-theme' ),
		),
		'core/social-links' => array(
			'outline' => __( 'Outline', 'templeton-block-theme' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', 'templeton_block_theme_register_block_styles' );

/**
 * Register block pattern categories.
 *
 * @since 1.0.4
 */
function templeton_block_theme_register_block_pattern_categories() {

	register_block_pattern_category(
		'templeton-block-theme-page',
		array(
			'label'       => __( 'Page', 'templeton-block-theme' ),
			'description' => __( 'Create a full page with multiple patterns that are grouped together.', 'templeton-block-theme' ),
		)
	);
	register_block_pattern_category(
		'templeton-block-theme-pricing',
		array(
			'label'       => __( 'Pricing', 'templeton-block-theme' ),
			'description' => __( 'Compare features for your digital products or service plans.', 'templeton-block-theme' ),
		)
	);
	register_block_pattern_category(
		'templeton-dc',
		array(
			'label'       => __( 'Templeton DC', 'templeton-block-theme' ),
			'description' => __( 'Custom patterns for Templeton Academy DC.', 'templeton-block-theme' ),
		)
	);

}

add_action( 'init', 'templeton_block_theme_register_block_pattern_categories' );

/**
 * Enqueue custom scripts for video functionality.
 *
 * @since 1.0.0
 */
function templeton_block_theme_enqueue_scripts() {
	wp_register_script( 'templeton-block-theme-scripts', '', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'templeton-block-theme-scripts' );
	wp_add_inline_script( 'templeton-block-theme-scripts', '
		document.addEventListener("DOMContentLoaded", function() {
			const heroVideo = document.querySelector(".templeton-hero-video video");
			if (heroVideo) {
				heroVideo.autoplay = true;
				heroVideo.playsInline = true;
				heroVideo.setAttribute("aria-label", "Templeton Academy campus video");
				heroVideo.poster = "/wp-content/uploads/2026/02/dc-home-video.webp";
				heroVideo.play().catch(function() {
					// Autoplay was prevented, show controls
					heroVideo.controls = true;
				});
			}

			// Highlight About nav item when on staff pages
			if (window.location.pathname.startsWith("/our-team")) {
				const aboutLink = document.querySelector(".wp-block-navigation a[href*=\"/about\"]");
				if (aboutLink) {
					aboutLink.closest(".wp-block-navigation-item").classList.add("current-menu-ancestor");
				}
				// Also highlight Our Team link itself
				const ourTeamLink = document.querySelector(".wp-block-navigation a[href*=\"/our-team\"]");
				if (ourTeamLink) {
					ourTeamLink.closest(".wp-block-navigation-item").classList.add("current-menu-item");
				}
			}
		});
	' );
}
add_action( 'wp_enqueue_scripts', 'templeton_block_theme_enqueue_scripts' );

/**
 * Add favicon and app icons to the head.
 *
 * @since 1.0.0
 */
function templeton_block_theme_favicons() {
	$icons_url = get_template_directory_uri() . '/assets/images';
	?>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $icons_url ); ?>/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url( $icons_url ); ?>/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $icons_url ); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url( $icons_url ); ?>/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( $icons_url ); ?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url( $icons_url ); ?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo esc_url( $icons_url ); ?>/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<?php
}
add_action( 'wp_head', 'templeton_block_theme_favicons' );

/**
 * Shortcode for copyright with current year.
 *
 * @since 1.0.0
 */
function templeton_block_theme_copyright() {
	return '<p class="has-text-align-center footer-attribution has-base-color has-text-color">© ' . date( 'Y' ) . ' Templeton Academy</p>';
}
add_shortcode( 'copyright', 'templeton_block_theme_copyright' );

/**
 * Shortcode to display staff grid with headshot hover effect.
 *
 * @since 1.0.0
 */
function templeton_block_theme_staff_grid() {
	$staff_query = new WP_Query( array(
		'post_type'      => 'staff',
		'posts_per_page' => -1,
		'meta_key'       => 'staff_display_order',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
	) );

	if ( ! $staff_query->have_posts() ) {
		return '<p class="has-text-align-center has-medium-font-size">No staff members found.</p>';
	}

	$output = '<div class="staff-grid">';

	while ( $staff_query->have_posts() ) {
		$staff_query->the_post();
		
		$staff_role     = get_post_meta( get_the_ID(), 'staff_role', true );
		$staff_pronouns = get_post_meta( get_the_ID(), 'staff_pronouns', true );
		$headshot_1     = get_post_meta( get_the_ID(), 'staff_headshot_1', true );
		$headshot_2     = get_post_meta( get_the_ID(), 'staff_headshot_2', true );

		// Get image URLs - smiling (headshot_2) as default, serious (headshot_1) on hover
		$image_1_url = $headshot_2 ? wp_get_attachment_image_url( $headshot_2, 'medium_large' ) : get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
		$image_2_url = $headshot_1 ? wp_get_attachment_image_url( $headshot_1, 'medium_large' ) : '';

		// Fallback to placeholder if no image
		if ( ! $image_1_url ) {
			$image_1_url = get_theme_file_uri() . '/assets/images/sample_800x800.jpg';
		}

		$has_hover_class = $image_2_url ? ' has-hover-image' : '';
		$title_attr      = esc_attr( get_the_title() );
		$permalink       = get_the_permalink();

		$output .= '<div class="staff-card">';
		$output .= '<a href="' . esc_url( $permalink ) . '" class="staff-card-link">';
		$output .= '<div class="staff-card-image' . $has_hover_class . '">';
		$output .= '<img src="' . esc_url( $image_1_url ) . '" alt="' . $title_attr . '" class="staff-headshot staff-headshot-primary" loading="lazy">';
		
		if ( $image_2_url ) {
			$output .= '<img src="' . esc_url( $image_2_url ) . '" alt="' . $title_attr . '" class="staff-headshot staff-headshot-secondary" loading="lazy">';
		}
		
		$output .= '</div>';
		$output .= '<div class="staff-card-content">';
		$output .= '<h3 class="staff-name">' . esc_html( get_the_title() ) . '</h3>';
		
		if ( $staff_role ) {
			$output .= '<p class="staff-role">' . esc_html( $staff_role ) . '</p>';
		}
		
		if ( $staff_pronouns ) {
			$output .= '<span class="staff-pronouns">(' . esc_html( $staff_pronouns ) . ')</span>';
		}
		
		$output .= '</div>';
		$output .= '</a>';
		$output .= '</div>';
	}

	$output .= '</div>';

	wp_reset_postdata();

	return $output;
}
add_shortcode( 'staff_grid', 'templeton_block_theme_staff_grid' );

/**
 * Shortcode to display staff member header (name and role).
 *
 * @since 1.0.0
 */
function templeton_block_theme_staff_header() {
	if ( ! is_singular( 'staff' ) ) {
		return '';
	}

	$staff_role     = get_post_meta( get_the_ID(), 'staff_role', true );
	$staff_pronouns = get_post_meta( get_the_ID(), 'staff_pronouns', true );

	$output = '<h1 class="wp-block-heading has-text-align-center accent-underline-lime has-base-color has-text-color has-x-large-font-size">' . esc_html( get_the_title() );
	
	if ( $staff_pronouns ) {
		$output .= ' <span class="staff-header-pronouns">(' . esc_html( $staff_pronouns ) . ')</span>';
	}
	
	$output .= '</h1>';

	if ( $staff_role ) {
		$output .= '<p class="staff-header-role">' . esc_html( $staff_role ) . '</p>';
	}

	return $output;
}
add_shortcode( 'staff_header', 'templeton_block_theme_staff_header' );

/**
 * Shortcode to display staff member detail (headshot and bio).
 *
 * @since 1.0.0
 */
function templeton_block_theme_staff_detail() {
	if ( ! is_singular( 'staff' ) ) {
		return '';
	}

	$headshot_2 = get_post_meta( get_the_ID(), 'staff_headshot_2', true );

	// Get image URL - use smiling headshot (headshot_2), fall back to featured image
	$image_url = $headshot_2 ? wp_get_attachment_image_url( $headshot_2, 'large' ) : get_the_post_thumbnail_url( get_the_ID(), 'large' );

	$output = '<div class="staff-detail">';

	if ( $image_url ) {
		$output .= '<div class="staff-detail-image">';
		$output .= '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
		$output .= '</div>';
	}

	$output .= '<div class="staff-detail-content">';
	$output .= '<div class="staff-detail-bio">' . apply_filters( 'the_content', get_the_content() ) . '</div>';
	
	// Add previous/next navigation
	$output .= templeton_block_theme_staff_navigation();
	
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'staff_detail', 'templeton_block_theme_staff_detail' );

/**
 * Get previous/next staff navigation based on display order.
 *
 * @since 1.0.0
 */
function templeton_block_theme_staff_navigation() {
	$current_order = get_post_meta( get_the_ID(), 'staff_display_order', true );
	$current_order = $current_order ? intval( $current_order ) : 0;

	// Get all staff ordered by display order
	$all_staff = get_posts( array(
		'post_type'      => 'staff',
		'posts_per_page' => -1,
		'meta_key'       => 'staff_display_order',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
		'fields'         => 'ids',
	) );

	$current_index = array_search( get_the_ID(), $all_staff );
	$prev_staff    = ( $current_index > 0 ) ? $all_staff[ $current_index - 1 ] : null;
	$next_staff    = ( $current_index < count( $all_staff ) - 1 ) ? $all_staff[ $current_index + 1 ] : null;

	$output = '<nav class="staff-navigation">';

	if ( $prev_staff ) {
		$prev_headshot = get_post_meta( $prev_staff, 'staff_headshot_1', true );
		$prev_image    = $prev_headshot ? wp_get_attachment_image_url( $prev_headshot, 'thumbnail' ) : get_the_post_thumbnail_url( $prev_staff, 'thumbnail' );
		
		$output .= '<a href="' . get_permalink( $prev_staff ) . '" class="staff-nav-link staff-nav-prev">';
		$output .= '<span class="staff-nav-direction">← Previous</span>';
		$output .= '<span class="staff-nav-name">' . get_the_title( $prev_staff ) . '</span>';
		$output .= '</a>';
	} else {
		$output .= '<span class="staff-nav-link staff-nav-placeholder"></span>';
	}

	if ( $next_staff ) {
		$next_headshot = get_post_meta( $next_staff, 'staff_headshot_1', true );
		$next_image    = $next_headshot ? wp_get_attachment_image_url( $next_headshot, 'thumbnail' ) : get_the_post_thumbnail_url( $next_staff, 'thumbnail' );
		
		$output .= '<a href="' . get_permalink( $next_staff ) . '" class="staff-nav-link staff-nav-next">';
		$output .= '<span class="staff-nav-direction">Next →</span>';
		$output .= '<span class="staff-nav-name">' . get_the_title( $next_staff ) . '</span>';
		$output .= '</a>';
	} else {
		$output .= '<span class="staff-nav-link staff-nav-placeholder"></span>';
	}

	$output .= '</nav>';

	return $output;
}
