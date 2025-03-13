/**
 * Trading Widget JavaScript
 * 
 * Handles the trading widget functionality
 */

(function() {
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        initTradingWidget();
    });

    // Initialize on page load if DOM is already loaded
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        setTimeout(initTradingWidget, 1);
    }

    function initTradingWidget() {
        const buySelect = document.getElementById('buy-select');
        const sellSelect = document.getElementById('sell-select');
        const flipButton = document.getElementById('flip-assets');
        const tradeButton = document.getElementById('trade-button');
        
        if (!buySelect || !sellSelect || !flipButton || !tradeButton) {
            return; // Elements not found, exit
        }
        
        // Get trading URLs from localized data
        // Fall back to empty object if not available
        const tradingUrls = window.tradingWidgetData ? window.tradingWidgetData.tradingUrls : {};
        const defaultTradeUrl = window.tradingWidgetData ? window.tradingWidgetData.defaultTradeUrl : '#';
        
        // Function to generate trade URL based on selected assets
        function generateTradeUrl() {
            const buyAsset = buySelect.value;
            const sellAsset = sellSelect.value;
            const pairKey = `${buyAsset}-${sellAsset}`;
            
            // Return the specific URL for this pair, or default if not found
            return tradingUrls[pairKey] || defaultTradeUrl;
        }
        
        // Flip assets function
        flipButton.addEventListener('click', function() {
            // Store current values
            const buyValue = buySelect.value;
            const sellValue = sellSelect.value;
            
            // Create temporary arrays of options
            const buyOptions = Array.from(buySelect.options).map(opt => ({
                value: opt.value,
                text: opt.text
            }));
            
            const sellOptions = Array.from(sellSelect.options).map(opt => ({
                value: opt.value,
                text: opt.text
            }));
            
            // Clear existing options
            buySelect.innerHTML = '';
            sellSelect.innerHTML = '';
            
            // Add sell options to buy select
            sellOptions.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.value;
                opt.textContent = option.text;
                buySelect.appendChild(opt);
            });
            
            // Add buy options to sell select
            buyOptions.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.value;
                opt.textContent = option.text;
                sellSelect.appendChild(opt);
            });
            
            // Set the previously selected values (flipped)
            buySelect.value = sellValue;
            sellSelect.value = buyValue;
        });
        
        // Trade button click handler
        tradeButton.addEventListener('click', function() {
            const tradeUrl = generateTradeUrl();
            window.open(tradeUrl, '_blank'); // Open in a new tab
        });
    }
})();