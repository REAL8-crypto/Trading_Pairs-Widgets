<?php
/**
 * REAL8 Trading Widget Template
 * 
 * HTML template for the $REAL8 trading widget
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Get the plugin directory URL to properly reference assets
$plugin_url = plugin_dir_url(__FILE__);
?>

<div class="trading-widget">
    <div class="widget-header">
        <h2><?php _e('Trade Assets', 'trading-widget'); ?></h2>
         <img style="margin: 0 0.2em;width: 32px;height: 32px;" src="https://real8.org/img/icons/real8-icon.png" />
         <img style="margin: 0 0.2em;width: 32px;height: 32px;" src="https://real8.org/img/icons/xlm-icon.png" />
         <img style="margin: 0 0.2em;width: 32px;height: 32px;" src="https://real8.org/img/icons/usdc-icon.png" />
         <img style="margin: 0 0.2em;width: 32px;height: 32px;" src="https://real8.org/img/icons/eurc-icon.png" />
         <img style="margin: 0 0.2em;width: 32px;height: 32px;" src="https://real8.org/img/icons/slvr-icon.png" />
         <img style="margin: 0 0.2em;width: 32px;height: 32px;" src="https://real8.org/img/icons/gold-icon.png" />
    </div>
    
    <div class="trading-pair">
        <div class="asset-selector" id="buy-asset">
            <div class="asset-label"><?php _e('Buy', 'trading-widget'); ?></div>
            <select id="buy-select">
                <option value="REAL8" data-icon="https://real8.org/img/icons/real8-icon.png">REAL8</option>
            </select>
        </div>
        
        <div class="flip-container">
            <div class="flip-button" id="flip-assets">
                ↑↓
            </div>
        </div>
        
        <div class="asset-selector" id="sell-asset">
            <div class="asset-label"><?php _e('Sell', 'trading-widget'); ?></div>
            <select id="sell-select">
                <option value="XLM" data-icon="https://real8.org/img/icons/xlm-icon.png">XLM</option>
                <option value="USDC" data-icon="https://real8.org/img/icons/usdc-icon.png">USDC</option>
                <option value="EURC" data-icon="https://real8.org/img/icons/eurc-icon.png">EURC</option>
                <option value="SLVR" data-icon="https://real8.org/img/icons/slvr-icon.png">SLVR</option>
                <option value="GOLD" data-icon="https://real8.org/img/icons/gold-icon.png">GOLD</option>
            </select>
        </div>
    </div>
    
    <button class="trade-button" id="trade-button"><?php _e('Trade Now', 'trading-widget'); ?></button>
</div>

<script src="../js/widget-icons.js"></script>