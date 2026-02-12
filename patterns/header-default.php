<?php
/**
 * Title: Header with logo and navigation.
 * Slug: templeton-block-theme/header-default
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0"}}},"backgroundColor":"contrast","layout":{"type":"constrained","wideSize":"1400px"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small);padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:html -->
		<a href="/" class="header-logo"><img src="/wp-content/uploads/2026/02/brand-white.png" alt="Templeton Academy" width="180" height="auto"></a>
		<!-- /wp:html -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"className":"header-nav-group"} -->
		<div class="wp-block-group header-nav-group">
			<!-- wp:navigation {"textColor":"base","overlayBackgroundColor":"contrast","overlayTextColor":"base","layout":{"type":"flex","justifyContent":"right"}} /-->

			<!-- wp:buttons {"className":"hide-on-mobile"} -->
			<div class="wp-block-buttons hide-on-mobile">
				<!-- wp:button {"backgroundColor":"accent","textColor":"contrast","className":"header-cta-button","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
				<div class="wp-block-button header-cta-button"><a class="wp-block-button__link has-contrast-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" href="/schedule-a-tour">Schedule a Tour</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
