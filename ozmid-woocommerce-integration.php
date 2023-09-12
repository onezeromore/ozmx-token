<?php

// Name: OZMID Complete WooCommerce Integration
// OZMID Complete WooCommerce Integration  - WooCommerce 8.0.2

// Add new field to product category
add_action('product_cat_add_form_fields', 'woocommerce_add_category_id_field');
add_action('product_cat_edit_form_fields', 'woocommerce_edit_category_id_field', 10, 2);

function woocommerce_add_category_id_field() {
    ?>
    <div class="form-field">
        <label for="OZMID"><?php _e('OZMID', 'woocommerce'); ?></label>
        <input type="text" id="OZMID" name="OZMID" />
        <p class="description"><?php _e('Enter a unique OZMID for this category.', 'woocommerce'); ?></p>
    </div>
    <div class="form-field">
        <label for="generate_ozmx"><?php _e('OZMX-Token generieren?', 'woocommerce'); ?></label>
        <input type="checkbox" id="generate_ozmx" name="generate_ozmx" value="1" />
        <p class="description"><?php _e('Check if OZMX tokens should be generated for this category.', 'woocommerce'); ?></p>
    </div>
    <?php
}

function woocommerce_edit_category_id_field($term, $taxonomy) {
    $OZMID = get_term_meta($term->term_id, 'OZMID', true);
    $generate_ozmx = get_term_meta($term->term_id, 'generate_ozmx', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="OZMID"><?php _e('OZMID', 'woocommerce'); ?></label></th>
        <td>
            <input type="text" id="OZMID" name="OZMID" value="<?php echo esc_attr($OZMID) ? esc_attr($OZMID) : ''; ?>" />
            <p class="description"><?php _e('Enter a unique OZMID for this category.', 'woocommerce'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="generate_ozmx"><?php _e('OZMX-Token generieren?', 'woocommerce'); ?></label></th>
        <td>
            <input type="checkbox" id="generate_ozmx" name="generate_ozmx" value="1" <?php checked($generate_ozmx, 1); ?> />
            <p class="description"><?php _e('Check if OZMX tokens should be generated for this category.', 'woocommerce'); ?></p>
        </td>
    </tr>
    <?php
}

add_action('created_product_cat', 'woocommerce_save_category_id_field', 10, 2);
add_action('edited_product_cat', 'woocommerce_save_category_id_field', 10, 2);

function woocommerce_save_category_id_field($term_id, $tt_id) {
    if (isset($_POST['OZMID']) && '' !== $_POST['OZMID']) {
        $OZMID = sanitize_text_field($_POST['OZMID']);
        update_term_meta($term_id, 'OZMID', $OZMID);
    }
    if (isset($_POST['generate_ozmx'])) {
        update_term_meta($term_id, 'generate_ozmx', 1);
    } else {
        update_term_meta($term_id, 'generate_ozmx', 0);
    }
}

// Display OZMID, year and product ID on product page
add_action('woocommerce_single_product_summary', 'display_product_info', 15);

function display_product_info() {
    global $product;

    $product_id = $product->get_id();
    $product_year = get_the_date('Y', $product_id);
    $product_categories = get_the_terms($product_id, 'product_cat');

    if ($product_categories && !is_wp_error($product_categories)) {
        $single_cat = array_shift($product_categories);
        $OZMID = get_term_meta($single_cat->term_id, 'OZMID', true);

        echo '<p>' . __('OZMID: ', 'woocommerce') . $OZMID . '</p>';
        echo '<p>' . __('Year: ', 'woocommerce') . $product_year . '</p>';
        echo '<p>' . __('Product ID: ', 'woocommerce') . $product_id . '</p>';
    }
}

// OZM ID shortcode 
function woocommerce_product_info_shortcode() {
    global $product;

    if ($product) {
        $product_id = $product->get_id();
        $product_year = get_the_date('Y', $product_id);
        $product_categories = get_the_terms($product_id, 'product_cat');

        if ($product_categories && !is_wp_error($product_categories)) {
            $single_cat = array_shift($product_categories);
            $OZMID = get_term_meta($single_cat->term_id, 'OZMID', true);

            return '' . $OZMID . '' . $product_year . '' . $product_id;
        }
    }

    return '';
}
add_shortcode('product_info', 'woocommerce_product_info_shortcode');

// OZM ID and product info to checkout
add_filter('woocommerce_get_item_data', 'display_product_info_in_cart', 10, 2);

function display_product_info_in_cart($item_data, $cart_item) {
   $product_id = $cart_item['product_id'];
    $product_categories = get_the_terms($product_id, 'product_cat');

    if ($product_categories && !is_wp_error($product_categories)) {
        $single_cat = array_shift($product_categories);
        $OZMID = get_term_meta($single_cat->term_id, 'OZMID', true);
        $product_year = get_the_date('Y', $product_id);
        $product_info = '' . $OZMID . '' . $product_year . '' . $product_id;

        $item_data[] = array(
            'key'     => __('ID', 'woocommerce'),
            'value'   => wc_clean($product_info),
            'display' => '',
        );
    }

    return $item_data;
}

// Add product info to order meta
add_action('woocommerce_checkout_create_order_line_item', 'add_product_info_to_order_items', 10, 4);

function add_product_info_to_order_items($item, $cart_item_key, $values, $order) {
    $product_id = $values['product_id'];
    $product_categories = get_the_terms($product_id, 'product_cat');

    if ($product_categories && !is_wp_error($product_categories)) {
        $single_cat = array_shift($product_categories);
        $OZMID = get_term_meta($single_cat->term_id, 'OZMID', true);
        $product_year = get_the_date('Y', $product_id);
        $product_info = '' . $OZMID . '' . $product_year . '' . $product_id;

        $item->add_meta_data(__('ID', 'woocommerce'), $product_info, true);
    }
}
