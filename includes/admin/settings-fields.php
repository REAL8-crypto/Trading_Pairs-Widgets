<?php

// Register settings
add_action('admin_init', 'trading_widget_register_settings');
function trading_widget_register_settings() {
    register_setting('trading_widget_settings_group', 'trading_widget_pairs');
    register_setting('trading_widget_settings_group', 'trading_widget_urls');
    
    add_settings_section(
        'trading_widget_main_section', 
        __('Manage Trading Pairs', 'trading-widget'), 
        'trading_widget_main_section_callback', 
        'trading-widget-settings'
    );
    
    add_settings_field(
        'trading_widget_pairs', 
        __('Trading Pairs', 'trading-widget'), 
        'trading_widget_pairs_callback', 
        'trading-widget-settings', 
        'trading_widget_main_section'
    );
}

function trading_widget_main_section_callback() {
    echo '<p>' . __('Add or remove trading pairs and their URLs for the widget.', 'trading-widget') . '</p>';
}

function trading_widget_pairs_callback() {
    $pairs = get_option('trading_widget_pairs', array(
        array('buy' => 'REAL8', 'sell' => 'XLM', 'url' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/XLM-native'),
        array('buy' => 'REAL8', 'sell' => 'USDC', 'url' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/USDC-www.centre.io'),
        array('buy' => 'REAL8', 'sell' => 'EURC', 'url' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/EURC-circle.com'),
        array('buy' => 'REAL8', 'sell' => 'SLVR', 'url' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/SLVR-mintx.co'),
        array('buy' => 'REAL8', 'sell' => 'GOLD', 'url' => 'https://stellarterm.com/exchange/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD/GOLD-mintx.co'),
        array('buy' => 'XLM', 'sell' => 'REAL8', 'url' => 'https://stellarterm.com/exchange/XLM-native/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD'),
        array('buy' => 'USDC', 'sell' => 'REAL8', 'url' => 'https://stellarterm.com/exchange/USDC-www.centre.io/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD'),
        array('buy' => 'EURC', 'sell' => 'REAL8', 'url' => 'https://stellarterm.com/exchange/EURC-circle.com/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD'),
        array('buy' => 'SLVR', 'sell' => 'REAL8', 'url' => 'https://stellarterm.com/exchange/SLVR-mintx.co/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD'),
        array('buy' => 'GOLD', 'sell' => 'REAL8', 'url' => 'https://stellarterm.com/exchange/GOLD-mintx.co/REAL8-GBVYYQ7XXRZW6ZCNNCL2X2THNPQ6IM4O47HAA25JTAG7Z3CXJCQ3W4CD'),
    ));
    ?>
    <div id="trading-pairs">
        <?php foreach ($pairs as $index => $pair) : ?>
            <div class="trading-pair">
                <div class="asset-selector">
                    <label for="buy-asset-<?php echo $index; ?>"><?php _e('Buy', 'trading-widget'); ?></label>
                    <input type="text" id="buy-asset-<?php echo $index; ?>" name="trading_widget_pairs[<?php echo $index; ?>][buy]" value="<?php echo esc_attr($pair['buy']); ?>" />
                </div>
                
                <div class="flip-container">
                    <div class="flip-button">↑↓</div>
                </div>
                
                <div class="asset-selector">
                    <label for="sell-asset-<?php echo $index; ?>"><?php _e('Sell', 'trading-widget'); ?></label>
                    <input type="text" id="sell-asset-<?php echo $index; ?>" name="trading_widget_pairs[<?php echo $index; ?>][sell]" value="<?php echo esc_attr($pair['sell']); ?>" />
                </div>

                <div class="url-container">
                    <label for="url-<?php echo $index; ?>"><?php _e('URL', 'trading-widget'); ?></label>
                    <input type="text" id="url-<?php echo $index; ?>" name="trading_widget_pairs[<?php echo $index; ?>][url]" value="<?php echo esc_attr($pair['url']); ?>" />
                </div>
                
                <button type="button" class="remove-trading-pair">−</button>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="add-trading-pair"><?php _e('Add Trading Pair', 'trading-widget'); ?></button>
    <script>
        document.getElementById('add-trading-pair').addEventListener('click', function() {
            var index = document.querySelectorAll('.trading-pair').length;
            var container = document.createElement('div');
            container.classList.add('trading-pair');
            container.innerHTML = `
                <div class="asset-selector">
                    <label for="buy-asset-${index}"><?php _e('Buy', 'trading-widget'); ?></label>
                    <input type="text" id="buy-asset-${index}" name="trading_widget_pairs[${index}][buy]" value="" />
                </div>
                <div class="flip-container">
                    <div class="flip-button">↑↓</div>
                </div>
                <div class="asset-selector">
                    <label for="sell-asset-${index}"><?php _e('Sell', 'trading-widget'); ?></label>
                    <input type="text" id="sell-asset-${index}" name="trading_widget_pairs[${index}][sell]" value="" />
                </div>
                <div class="url-container">
                    <label for="url-${index}"><?php _e('URL', 'trading-widget'); ?></label>
                    <input type="text" id="url-${index}" name="trading_widget_pairs[${index}][url]" value="" />
                </div>
                <button type="button" class="remove-trading-pair">−</button>
            `;
            document.getElementById('trading-pairs').appendChild(container);
        });

        document.getElementById('trading-pairs').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-trading-pair')) {
                e.target.parentElement.remove();
            }
        });
    </script>
    <?php
}
?>