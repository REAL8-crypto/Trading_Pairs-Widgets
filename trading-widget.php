<?php
/**
 * Plugin Name: REAL8 Trading Pair Widget
 * Description: A widget to select trading pairs for REAL8 and redirect to trading pages. shortcode [trading_widget]
 * Version: 3.5.1
 * Author: ProWoos
 * Text Domain: trading-widget
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Define plugin constants
define('TRADING_WIDGET_PATH', plugin_dir_path(__FILE__));
define('TRADING_WIDGET_URL', plugin_dir_url(__FILE__));
define('TRADING_WIDGET_VERSION', '1.0.0');

// Include required files
require_once TRADING_WIDGET_PATH . 'includes/shortcodes.php';
require_once TRADING_WIDGET_PATH . 'includes/enqueue-scripts.php';
require_once TRADING_WIDGET_PATH . 'includes/admin/admin-menu.php'; // Only this admin menu file
require_once TRADING_WIDGET_PATH . 'includes/admin/settings-page.php';
require_once TRADING_WIDGET_PATH . 'includes/admin/settings-fields.php';

// Add settings link to plugin page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'trading_widget_add_plugin_page_settings_link');
function trading_widget_add_plugin_page_settings_link($links) {
    $links[] = '<a href="' . admin_url('admin.php?page=trading-widget-settings') . '">' . __('Settings') . '</a>';
    return $links;
}

// Plugin activation hook (optional)
register_activation_hook(__FILE__, 'trading_widget_activate');
function trading_widget_activate() {
    // Any activation tasks (flush rewrite rules, create DB tables, etc.)
    // flush_rewrite_rules();
}

// Plugin deactivation hook (optional)
register_deactivation_hook(__FILE__, 'trading_widget_deactivate');
function trading_widget_deactivate() {
    // Any cleanup tasks
    // flush_rewrite_rules();
}

// Load plugin text domain
function trading_widget_load_textdomain() {
    load_plugin_textdomain( 'trading-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'trading_widget_load_textdomain' );

?>