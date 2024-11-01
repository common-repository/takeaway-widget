<?php
echo $args['before_widget'];
if (!empty($instance['title']))
{
    echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
}
?>

    <div class="takeaway_widget_js"
         data-domain="<?php echo get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN) ?>"
         data-shopurl="<?php echo get_option(TAKEAWAY_SETTING_SHOPURL) ?>"
         data-layout="<?php echo get_option(TAKEAWAY_SETTING_LAYOUT) ?>"
         data-color="<?php echo get_option(TAKEAWAY_SETTING_COLOR) ?>"
         data-free-delivery="<?php echo get_option(TAKEAWAY_SETTING_FREE_DELIVERY) ?>">
    </div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "<?php echo TAKEAWAY_WIDGET_JS_SOURCE; ?>";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'takeaway-widget-js'));</script>
<?php
echo $args['after_widget'];