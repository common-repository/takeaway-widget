<?php

require_once 'widget_class.php';

add_action('widgets_init', function () {
    register_widget('Takeaway_Widget');
});