<?php
/**
 * Title: Footer with logo, text, and links.
 * Slug: templeton-block-theme/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"30px","right":"30px"},"margin":{"top":"0px"}},"color":{"background":"#222222"}},"className":"footer-links-white","layout":{"type":"constrained"},"fontSize":"small"} -->
<div class="wp-block-group alignfull footer-links-white has-small-font-size has-background" style="background-color:#222222;margin-top:0px;padding-top:var(--wp--preset--spacing--small);padding-right:30px;padding-bottom:var(--wp--preset--spacing--small);padding-left:30px">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-logo {"width":150,"align":"center"} /-->
		
		<!-- wp:paragraph {"align":"center","textColor":"base"} -->
		<p class="has-text-align-center has-base-color has-text-color">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Templeton Academy · <a href="#">Contact Us</a></p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph {"align":"center","textColor":"base"} -->
		<p class="has-text-align-center has-base-color has-text-color"><a href="#"><?php echo esc_html__( 'Facebook', 'templeton-block-theme' ); ?></a> · <a href="#"><?php echo esc_html__( 'LinkedIn', 'templeton-block-theme' ); ?></a> · <a href="#"><?php echo esc_html__( 'Instagram', 'templeton-block-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
