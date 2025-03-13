<?php
/**
 * Trading Widget Shortcodes
 * 
 * Registers all shortcodes for the Trading Widget plugin
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Register the shortcode
function trading_pair_widget_shortcode() {
    // Get the HTML template from the template file
    ob_start();
    include TRADING_WIDGET_PATH . 'templates/widget.php';
    return ob_get_clean();
}
add_shortcode('trading_widget', 'trading_pair_widget_shortcode');
?>
