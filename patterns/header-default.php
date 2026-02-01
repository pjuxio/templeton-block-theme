<?php
/**
 * Title: Header with logo, navigation, and CTA button.
 * Slug: templeton-block-theme/header-default
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"},"margin":{"top":"0px"}},"color":{"background":"#222222"}},"layout":{"type":"constrained","wideSize":"1400px"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#222222;margin-top:0px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-logo {"width":180} /-->
		
		<!-- wp:group {"style":{"spacing":{"blockGap":"30px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"textColor":"base","layout":{"type":"flex","setCascadingProperties":true}} /-->
			
			<!-- wp:buttons {"className":"hide-on-mobile"} -->
			<div class="wp-block-buttons hide-on-mobile">
			<!-- wp:button {"backgroundColor":"accent","textColor":"contrast","className":"has-hover-darken"} -->
			<div class="wp-block-button has-hover-darken"><a class="wp-block-button__link has-contrast-color has-accent-background-color has-text-color has-background wp-element-button" href="/schedule-a-tour/">Schedule a Tour</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
