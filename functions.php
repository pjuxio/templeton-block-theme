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
		});
	' );
}
add_action( 'wp_enqueue_scripts', 'templeton_block_theme_enqueue_scripts' );

/**
 * Shortcode for copyright with current year.
 *
 * @since 1.0.0
 */
function templeton_block_theme_copyright() {
	return '<p class="has-text-align-center footer-attribution has-base-color has-text-color">© ' . date( 'Y' ) . ' Templeton Academy</p>';
}
add_shortcode( 'copyright', 'templeton_block_theme_copyright' );
