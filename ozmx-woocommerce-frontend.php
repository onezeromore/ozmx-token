<?php

// Namne: OZM Woocommerce Frontend 1.0.1
// Add a settings field to the WooCommerce > Settings > Products tab Woocoomerce 8.0.2
add_filter('woocommerce_product_settings', 'add_bonus_percentage_setting');

function add_bonus_percentage_setting($settings) {
    $settings[] = array(
        'title'    => __('OZMX Token Bonus Percentage', 'woocommerce'),
        'desc'     => __('The percentage of the net value that will be given as a bonus in OZMX tokens.', 'woocommerce'),
        'id'       => 'woocommerce_ozmx_bonus_percentage',
        'default'  => '10',
        'type'     => 'number',
        'desc_tip' => true,
    );

    return $settings;
}

// Function to calculate the bonus
function calculate_bonus($product) {
    $net_price = 0;

    if ($product->is_type('variable')) {
        $prices = $product->get_variation_prices();
        if (!empty($prices['price'])) {
            $average_price = array_sum($prices['price']) / count($prices['price']);
            $net_price = wc_get_price_excluding_tax($product, array('price' => $average_price));
        }
    } else {
        $net_price = wc_get_price_excluding_tax($product);
    }

    $bonus_percentage = get_option('woocommerce_ozmx_bonus_percentage', 10);
    $bonus = $net_price * ($bonus_percentage / 100);

    return floor($bonus); // Hier wird der Bonus abgerundet
}

// Create the [product_bonus] shortcode
add_shortcode('product_bonus', 'display_product_bonus');

function display_product_bonus() {
    global $product;

    if ($product && has_OZMID($product)) {
        $bonus = calculate_bonus($product);
        return number_format($bonus, 0, ',', '.');
    }

    return '';
}

// Check if product has OZMID and if OZMX tokens should be generated
function has_OZMID($product) {
    $product_id = $product->get_id();
    $product_categories = get_the_terms($product_id, 'product_cat');

    if ($product_categories && !is_wp_error($product_categories)) {
        $single_cat = array_shift($product_categories);
        $OZMID = get_term_meta($single_cat->term_id, 'OZMID', true);
        $generate_ozmx = get_term_meta($single_cat->term_id, 'generate_ozmx', true);

        // Überprüfen Sie sowohl OZMID als auch das Kontrollkästchen
        return $OZMID && $generate_ozmx;
    }

    return false;
}

// Add bonus to cart page
add_filter('woocommerce_cart_item_name', 'add_bonus_to_cart', 10, 3);

function add_bonus_to_cart($name, $cart_item, $cart_item_key) {
    $product = $cart_item['data'];

    // Wenn das Produkt eine Variation ist, verwenden Sie das übergeordnete Produkt für die Bonusberechnung
    if ($product->is_type('variation')) {
        $product = wc_get_product($product->get_parent_id());
    }

    if (has_OZMID($product)) {
        $bonus = calculate_bonus($product);
        $name .= '<br>' . __('Bonus:', 'my-child-theme') . ' ' . number_format($bonus, 0, ',', '.') . ' <a href="https://onezeromore.com/ozmx-token-manifest">' . __('OZMX Token', 'my-child-theme') . '</a>';
    }

    return $name;
}

// Add bonus to checkout page
add_filter('woocommerce_checkout_cart_item_name', 'add_bonus_to_checkout', 10, 3);

function add_bonus_to_checkout($name, $cart_item, $cart_item_key) {
    return add_bonus_to_cart($name, $cart_item, $cart_item_key);
}
