<?php

// Register admin menu
add_action('admin_menu', 'trading_widget_admin_menu');
function trading_widget_admin_menu() {
    add_menu_page(
        __('Trading Widget Settings', 'trading-widget'), 
        __('Trading Widget', 'trading-widget'), 
        'manage_options', 
        'trading-widget-settings', 
        'trading_widget_settings_page', 
        'dashicons-chart-line' // Keep the chart icon
    );
}
?>