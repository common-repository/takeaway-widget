var refreshIframe = function () {
    var domain = jQuery("#takeaway_setting_shopurl_domain").val();
    var shopurl = jQuery("#takeaway_setting_shopurl").val();
    var layout = jQuery("#takeaway_setting_layout").val();
    var color = jQuery("#takeaway_setting_color").val();
    var free_delivery = jQuery("#takeaway_setting_free_delivery").val();

    var iframeDiv = jQuery(".takeaway_widget_js").first();

    iframeDiv.attr('data-domain', domain);
    iframeDiv.attr('data-shopurl', shopurl);
    iframeDiv.attr('data-layout', layout);
    iframeDiv.attr('data-color', color);
    iframeDiv.attr('data-free-delivery', free_delivery);

    // Remove the iframe to add it back in
    jQuery(".takeaway_widget_js iframe").remove();
    init_takeaway_widget(document);
};

jQuery(document).ready(function () {
    jQuery("#takeaway_settings_form input").on('change paste keyup', refreshIframe);
    jQuery("#takeaway_settings_form select").on('change', refreshIframe);
    refreshIframe();
});
