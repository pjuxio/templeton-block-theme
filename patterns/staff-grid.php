<?php
/**
 * Title: Staff Grid
 * Slug: templeton-block-theme/staff-grid
 * Categories: featured
 * Description: Display staff members in a responsive grid with hover effect headshots.
 */

$staff_query = new WP_Query(array(
    'post_type' => 'staff',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
));

if ($staff_query->have_posts()) :
?>
<!-- wp:group {"className":"staff-grid-container","layout":{"type":"default"}} -->
<div class="wp-block-group staff-grid-container">
    <div class="staff-grid">
        <?php while ($staff_query->have_posts()) : $staff_query->the_post(); 
            $staff_role = get_post_meta(get_the_ID(), 'staff_role', true);
            $staff_pronouns = get_post_meta(get_the_ID(), 'staff_pronouns', true);
            $headshot_1 = get_post_meta(get_the_ID(), 'staff_headshot_1', true);
            $headshot_2 = get_post_meta(get_the_ID(), 'staff_headshot_2', true);
            
            // Get image URLs
            $image_1_url = $headshot_1 ? wp_get_attachment_image_url($headshot_1, 'medium_large') : get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
            $image_2_url = $headshot_2 ? wp_get_attachment_image_url($headshot_2, 'medium_large') : '';
            
            // Fallback to placeholder if no image
            if (!$image_1_url) {
                $image_1_url = get_theme_file_uri() . '/assets/images/sample_800x800.jpg';
            }
        ?>
        <div class="staff-card">
            <a href="<?php the_permalink(); ?>" class="staff-card-link">
                <div class="staff-card-image<?php echo $image_2_url ? ' has-hover-image' : ''; ?>">
                    <img src="<?php echo esc_url($image_1_url); ?>" alt="<?php the_title_attribute(); ?>" class="staff-headshot staff-headshot-primary" loading="lazy">
                    <?php if ($image_2_url) : ?>
                    <img src="<?php echo esc_url($image_2_url); ?>" alt="<?php the_title_attribute(); ?>" class="staff-headshot staff-headshot-secondary" loading="lazy">
                    <?php endif; ?>
                </div>
                <div class="staff-card-content">
                    <h3 class="staff-name"><?php the_title(); ?></h3>
                    <?php if ($staff_pronouns) : ?>
                    <span class="staff-pronouns">(<?php echo esc_html($staff_pronouns); ?>)</span>
                    <?php endif; ?>
                    <?php if ($staff_role) : ?>
                    <p class="staff-role"><?php echo esc_html($staff_role); ?></p>
                    <?php endif; ?>
                </div>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<!-- /wp:group -->
<?php
wp_reset_postdata();
else :
?>
<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size">No staff members found. Please add staff in the WordPress admin.</p>
<!-- /wp:paragraph -->
<?php
endif;
?>
