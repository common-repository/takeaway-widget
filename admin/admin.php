<?php

/**
 * Add administration menu
 */
add_action('admin_menu', function () {
    add_options_page('Takeaway.com Settings', 'Takeaway.com', 'manage_options', 'takeaway-widget', 'takeaway_admin_page');
});

function takeaway_admin_page()
{
    require 'page.php';
}

add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook != 'settings_page_takeaway-widget')
    {
        return;
    }
    wp_enqueue_script('takeaway_admin_script', plugins_url('js/page.js', __FILE__));
});

/**
 * Register settings
 */

add_action('admin_init', function () {
    register_setting(TAKEAWAY_SETTINGS, TAKEAWAY_SETTING_SHOPURL);
    register_setting(TAKEAWAY_SETTINGS, TAKEAWAY_SETTING_SHOPURL_DOMAIN);
    register_setting(TAKEAWAY_SETTINGS, TAKEAWAY_SETTING_LAYOUT);
    register_setting(TAKEAWAY_SETTINGS, TAKEAWAY_SETTING_COLOR);
    register_setting(TAKEAWAY_SETTINGS, TAKEAWAY_SETTING_FREE_DELIVERY);
});