<?php
/**
 * Clear all database-stored template customizations
 * This forces WordPress to use the file-based templates as the source of truth
 * 
 * Run via WP-CLI: wp eval-file clear-template-customizations.php
 * Or via browser (add to functions.php temporarily): templeton_clear_db_templates();
 */

function templeton_clear_db_templates() {
    global $wpdb;
    
    // Delete all wp_template and wp_template_part posts from database
    $deleted_templates = $wpdb->query(
        "DELETE FROM {$wpdb->posts} 
         WHERE post_type IN ('wp_template', 'wp_template_part')
         AND post_name LIKE 'templeton-block-theme%'"
    );
    
    // Clean up orphaned postmeta
    $wpdb->query(
        "DELETE FROM {$wpdb->postmeta} 
         WHERE post_id NOT IN (SELECT ID FROM {$wpdb->posts})"
    );
    
    // Clear object cache
    wp_cache_flush();
    
    echo "✓ Cleared {$deleted_templates} template customizations from database\n";
    echo "✓ File-based templates are now active\n";
    
    return $deleted_templates;
}

// Run the function
templeton_clear_db_templates();
