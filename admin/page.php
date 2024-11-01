<div class="wrap">
    <h1><?php _e('Takeaway.com Settings', 'takeaway-widget'); ?></h1>

    <form action="options.php" method="post" id="takeaway_settings_form">
        <?php settings_fields(TAKEAWAY_SETTINGS); ?>
        <?php do_settings_sections(TAKEAWAY_SETTINGS); ?>

        <table class="form-table">
            <tr>
                <th><label for="<?php echo TAKEAWAY_SETTING_SHOPURL ?>">Restaurant URL</label></th>
                <td>
                    <select name="<?php echo TAKEAWAY_SETTING_SHOPURL_DOMAIN ?>"
                            id="<?php echo TAKEAWAY_SETTING_SHOPURL_DOMAIN ?>">
                        <option value="nl" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'nl'); ?>>
                            www.thuisbezorgd.nl
                        </option>
                        <option value="benl" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'benl'); ?>>
                            www.takeaway.com/belgium (NL)
                        </option>
                        <option value="befr" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'befr'); ?>>
                            www.takeaway.com/belgium (FR)
                        </option>
                        <option value="de" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'de'); ?>>
                            www.lieferando.de
                        </option>
                        <option value="pl" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'pl'); ?>>
                            www.pyszne.pl
                        </option>
                        <option value="at" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'at'); ?>>
                            www.lieferservice.at
                        </option>
                        <option value="chde" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'chde'); ?>>
                            www.takeaway.com/switzerland (DE)
                        </option>
                        <option value="chfr" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'chfr'); ?>>
                            www.takeaway.com/switzerland (FR)
                        </option>
                        <option value="lu" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'lu'); ?>>
                            www.pizza.lu
                        </option>
                        <option value="pt" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'pt'); ?>>
                            www.pizza.pt
                        </option>
                        <option value="vn" <?php selected(get_option(TAKEAWAY_SETTING_SHOPURL_DOMAIN), 'vn'); ?>>
                            www.vietnammm.com
                        </option>
                    </select>
                    /
                    <input placeholder="Restaurant URL" name="<?php echo TAKEAWAY_SETTING_SHOPURL ?>"
                           value="<?php echo esc_attr(get_option(TAKEAWAY_SETTING_SHOPURL)); ?>"
                           class="regular-text" id="<?php echo TAKEAWAY_SETTING_SHOPURL ?>"/>
                    <p class="description">
                        Example: your Takeaway.com link is: https://www.takeaway.com/pizza-venetia-1. Copy the last part 'pizza-venetia-1' and paste it in the 'Restaurant URL' field.
                    </p>
                </td>
            </tr>
            <tr>
                <th><label for="<?php echo TAKEAWAY_SETTING_LAYOUT ?>">Layout</label></th>
                <td><select name="<?php echo TAKEAWAY_SETTING_LAYOUT ?>" id="<?php echo TAKEAWAY_SETTING_LAYOUT ?>">
                        <option value="rectangle" <?php selected(get_option(TAKEAWAY_SETTING_LAYOUT), 'rectangle'); ?>>
                            Rectangle
                        </option>
                        <option value="square" <?php selected(get_option(TAKEAWAY_SETTING_LAYOUT), 'square'); ?>>
                            Square
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="<?php echo TAKEAWAY_SETTING_COLOR ?>">Color</label></th>
                <td><select name="<?php echo TAKEAWAY_SETTING_COLOR ?>" id="<?php echo TAKEAWAY_SETTING_COLOR ?>">
                        <option value="orange" <?php selected(get_option(TAKEAWAY_SETTING_COLOR), 'orange'); ?>>
                            Orange
                        </option>
                        <option value="white" <?php selected(get_option(TAKEAWAY_SETTING_COLOR), 'white'); ?>>
                            White
                        </option>
                        <option value="black" <?php selected(get_option(TAKEAWAY_SETTING_COLOR), 'black'); ?>>
                            Black
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="<?php echo TAKEAWAY_SETTING_FREE_DELIVERY ?>">Free delivery</label></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Free delivery</span></legend>
                        <input
                                name="<?php echo TAKEAWAY_SETTING_FREE_DELIVERY ?>"
                                id="<?php echo TAKEAWAY_SETTING_FREE_DELIVERY ?>"
                            <?php checked(get_option(TAKEAWAY_SETTING_FREE_DELIVERY), 1); ?>
                                type="checkbox"
                                value="1"
                        >
                    </fieldset>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>

    <h2>Preview</h2>
    <?php the_widget('Takeaway_Widget'); ?>

</div>