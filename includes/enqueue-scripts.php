<?php
/**
 * Trading Widget Scripts & Styles
 * 
 * Enqueues the necessary JS and CSS for the Trading Widget
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

/**
 * Enqueue necessary scripts and styles
 */
function trading_widget_enqueue_scripts() {
    // Register styles
    wp_register_style(
        'trading-widget-style',
        TRADING_WIDGET_URL . 'assets/css/trading-widget.css',
        array(),
        TRADING_WIDGET_VERSION
    );

// Register scripts
wp_register_script(
    'trading-widget-script',
    TRADING_WIDGET_URL . 'assets/js/trading-widget.js',
    array(),
    TRADING_WIDGET_VERSION,
    true
);

wp_register_script(
    'widget-icons-script',
    TRADING_WIDGET_URL . 'assets/js/widget-icons.js',
    array(),
    TRADING_WIDGET_VERSION,
    true
);

    // Localize script with trading URLs
    wp_localize_script('trading-widget-script', 'tradingWidgetData', array(
        'tradingUrls' => array(
            'REAL8-XLM' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/XLM-native',
            'REAL8-USDC' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/USDC-www.centre.io',
            'REAL8-EURC' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/EURC-circle.com',
            'REAL8-SLVR' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/SLVR-mintx.co',
            'REAL8-GOLD' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/GOLD-mintx.co',
            // Reversed pairs
            'XLM-REAL8' => 'https://stellarterm.com/exchange/XLM-native/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD',
            'USDC-REAL8' => 'https://stellarterm.com/exchange/USDC-www.centre.io/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD',
            'EURC-REAL8' => 'https://stellarterm.com/exchange/EURC-circle.com/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD',
            'SLVR-REAL8' => 'https://stellarterm.com/exchange/SLVR-mintx.co/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD',
            'GOLD-REAL8' => 'https://stellarterm.com/exchange/GOLD-mintx.co/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD'
        ),
        'defaultTradeUrl' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/XLM-native'
    ));
 
    
// Enqueue only when shortcode is used
global $post;
if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'trading_widget')) {
    wp_enqueue_style('trading-widget-style');
    wp_enqueue_script('trading-widget-script');
    wp_enqueue_script('widget-icons-script');
}    

}
add_action('wp_enqueue_scripts', 'trading_widget_enqueue_scripts');
?>