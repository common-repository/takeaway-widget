<?php


/**
 * Sends out a POST request to an API endpoint so that information about the installation can be saved.
 * Gets called when the user activates the plugin.
 */
register_activation_hook(TAKEAWAY_WIDGET_BASE_FILE_NAME, function () {
    $url = TAKEAWAY_WIDGET_API_URL . 'installation';

    $options = array(
        'http' => array(
            'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
            'method' => 'POST',
            'content' => http_build_query(takeaway_widget_gather_remote_data())
        )
    );

    $context = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);

    if ($result === false)
    {
        return;
    }

    $json = json_decode($result);
    $widgetId = $json->last_insert_id;
    update_option(TAKEAWAY_WIDGET_REMOTE_ID, $widgetId);
});


/**
 * Sends out a DELETE request to an API endpoint so that information about the installation can be removed.
 * Gets called when the user deactivates the plugin.
 */
register_deactivation_hook(TAKEAWAY_WIDGET_BASE_FILE_NAME, function () {
    $widgetId = get_option(TAKEAWAY_WIDGET_REMOTE_ID);
    $url = TAKEAWAY_WIDGET_API_URL . 'installation/' . $widgetId;

    $options = array(
        'http' => array(
            'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
            'method' => 'DELETE'
        )
    );

    $context = stream_context_create($options);
    @file_get_contents($url, false, $context);
});

/**
 * Sends out a PUT request to an API endpoint so that the information can be updated.
 * Gets called when a user saves new settings.
 */
function takeaway_widget_update_remote_data()
{
    $widgetId = get_option(TAKEAWAY_WIDGET_REMOTE_ID);
    $url = TAKEAWAY_WIDGET_API_URL . 'installation/' . $widgetId;

    $options = array(
        'http' => array(
            'header' => 'Content-type: application/x-www-form-urlencoded\r\n',
            'method' => 'PUT',
            'content' => http_build_query(takeaway_widget_gather_remote_data()),
        )
    );

    $context = stream_context_create($options);
    @file_get_contents($url, false, $context);
}

/**
 * Updates the remote values if one of the options are changed.
 */
add_action('updated_option', function ($option_name, $old_value, $value) {
    if (in_array($option_name, [
        TAKEAWAY_SETTING_COLOR,
        TAKEAWAY_SETTING_LAYOUT,
        TAKEAWAY_SETTING_SHOPURL_DOMAIN,
        TAKEAWAY_SETTING_FREE_DELIVERY,
    ]))
    {
        takeaway_widget_update_remote_data();
    }
}, 10, 3);

function takeaway_widget_gather_remote_data()
{
    return [
        'installation_domain' => site_url() ?: network_site_url(),
        'shop_domain' => get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN, ''),
        'layout' => get_option(TAKEAWAY_SETTING_LAYOUT, ''),
        'color' => get_option(TAKEAWAY_SETTING_COLOR, ''),
        'free_delivery' => get_option(TAKEAWAY_SETTING_FREE_DELIVERY, ''),
    ];
}

