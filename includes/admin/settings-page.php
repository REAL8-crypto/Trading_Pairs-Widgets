<?php
// Create the settings page
function trading_widget_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Trading Widget Settings', 'trading-widget'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('trading_widget_settings_group');
            do_settings_sections('trading-widget-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
?>