<?php

// Name: OZMX Token Global Integration 1.0.3
// Globale Einstellungen initialisieren WooCommerce 8.0.2

// Register a new endpoint for the user profile
add_action('init', 'register_ozmx_token_endpoint');
function register_ozmx_token_endpoint() {
    add_rewrite_endpoint('ozmx_token', EP_ROOT | EP_PAGES);
}

// This function should be called once, e.g., on theme or plugin activation.
function ozmx_flush_rewrite_rules() {
    flush_rewrite_rules(false); // Flush the rules, but do not hard flush (false)
}
register_activation_hook(__FILE__, 'ozmx_flush_rewrite_rules');

// Add the custom field to the WooCommerce account page
add_action('woocommerce_account_ozmx_token_endpoint', 'add_ozmx_token_content');
function add_ozmx_token_content() {
    $user_id = get_current_user_id();
    $wallet_address = get_user_meta($user_id, 'brc20_wallet_address', true);
    $understood = get_user_meta($user_id, 'understood', true);
    $transfer_to_external_wallet = get_user_meta($user_id, 'transfer_to_external_wallet', true); // Neues Meta-Feld

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['brc20_wallet_address'])) {
            $wallet_address = sanitize_text_field($_POST['brc20_wallet_address']);
            update_user_meta($user_id, 'brc20_wallet_address', $wallet_address);
            echo '<div class="woocommerce-message">' . __('Wallet address updated successfully!', 'my-child-theme') . '</div>';
        }
        if (isset($_POST['understood'])) {
            update_user_meta($user_id, 'understood', 1);
        } else {
            update_user_meta($user_id, 'understood', 0);
        }
		     if (isset($_POST['transfer_to_external_wallet'])) {
            update_user_meta($user_id, 'transfer_to_external_wallet', 1);
        } else {
            update_user_meta($user_id, 'transfer_to_external_wallet', 0);
        }
    }

    echo '<form method="post">';
		echo '<input type="submit" value="' . __('Update Wallet', 'my-child-theme') . '" class="button" />';
    echo '<img width="80" height="80" src="https://onezeromore.com/wp-content/uploads/2023/06/OZMX_Token_Weissx-150x150.jpg ">';
    $user_tokens = floatval(get_user_meta($user_id, 'ozmx_user_tokens', true));
    echo ' ' . number_format($user_tokens, 0, ',', '.') . ' ' . __('Aktueller OZMX Tokenstand', 'my-child-theme');
    echo '<br><p style="text-align: justify;">' . __('Der OZMX Token repräsentiert ein <a href="https://onezeromore.com/vertrauenskonzept/">innovatives</a> und experimentelles Konzept innerhalb der Community des OZM. Als Community Token wurde es mit der Absicht geschaffen, die Verbindung und das Engagement innerhalb der Kunstliebhaber und Unterstützer zu fördern. Es ist wichtig zu betonen, dass der OZMX Token keinen monetären Wert besitzt und nicht als Investition oder Spekulationsinstrument betrachtet werden sollte. Sein Wert liegt vielmehr in seiner symbolischen Bedeutung und der Möglichkeit, eine neue Form des Dialogs und der Zusammenarbeit in der Kunstwelt zu ermöglichen. Es verkörpert den Geist der Innovation und Kreativität, der das OZM auszeichnet, und lädt alle ein, Teil dieser aufregenden künstlerischen Reise zu sein.', 'my-child-theme') . '</p>';
	  echo '<p><label for="understood"><input type="checkbox" name="understood" id="understood" value="1" ' . checked(1, $understood, false) . ' /> ' . __('Ich habe den Text gelesen und verstanden', 'my-child-theme') . '</label></p>';
	  echo '<p><label for="brc20_wallet_address">' . __('Deine BRC-20 Token Wallet Address:', 'my-child-theme') . ' </label>';
   echo '<input type="text" name="brc20_wallet_address" id="brc20_wallet_address" value="' . esc_attr($wallet_address) . '" class="input-text" /></p>';
	 echo '<p><label for="transfer_to_external_wallet"><input type="checkbox" name="transfer_to_external_wallet" id="transfer_to_external_wallet" value="1" ' . checked(1, $transfer_to_external_wallet, false) . ' /> ' . __('OZMX Token auf externe Wallet übertragen', 'my-child-theme') . '</label></p>';
    echo '</form>';
}

// Add the custom tab to the WooCommerce account menu
add_filter('woocommerce_account_menu_items', 'ozmx_token_tab');
function ozmx_token_tab($menu_links) {
    $menu_links = array_slice($menu_links, 0, 1, true)
    + array('ozmx_token' => __('OZMX Token', 'my-child-theme'))
    + array_slice($menu_links, 1, NULL, true);
    return $menu_links;
}

// Token Generierung bei Kaufabschluss
function generate_ozmx_tokens($order_id) {
    // Überprüfen Sie, ob Tokens bereits für diese Bestellung generiert wurden
    if (get_post_meta($order_id, '_ozmx_tokens_generated', true)) {
        return; // Beenden Sie die Funktion, wenn Tokens bereits generiert wurden
    }

    $order = wc_get_order($order_id);
    $items = $order->get_items();
    $total_tokens_to_generate = 0;

    foreach ($items as $item) {
           $product = $item->get_product();
   			 $total = $item->get_total();

// Überprüfen Sie, ob das Produkt oder sein übergeordnetes Produkt (falls es ein variables Produkt ist) die has_OZMID-Bedingung erfüllt
    if (has_OZMID($product) || ( $product->is_type('variation') && has_OZMID(wc_get_product($product->get_parent_id())) )) {
        if (is_numeric($total)) {
            $total_tokens_to_generate += floor(floatval($total) * 0.10);
        }
    }
}

    $generated_tokens = intval(get_option('ozmx_generated_tokens', 0));
    $total_tokens = intval(get_option('ozmx_total_tokens', 0));

    update_option('ozmx_generated_tokens', $generated_tokens + $total_tokens_to_generate); 

    $user_id = $order->get_user_id();

    if ($user_id) { // Überprüfen, ob es sich um einen registrierten Benutzer handelt
        $wallet_address = get_user_meta($user_id, 'brc20_wallet_address', true);

        if ($wallet_address) { // Überprüfen, ob der Benutzer eine Wallet-Adresse hat
            $user_tokens = floatval(get_user_meta($user_id, 'ozmx_user_tokens', true));
            update_user_meta($user_id, 'ozmx_user_tokens', $user_tokens + $total_tokens_to_generate);
        } else {
            // Wenn der Benutzer keine Wallet-Adresse hat
            $user_tokens = floatval(get_user_meta($user_id, 'ozmx_user_tokens', true));
            update_user_meta($user_id, 'ozmx_user_tokens', $user_tokens + $total_tokens_to_generate);
        }
    } else {
        // Wenn es sich um eine Gästebestellung handelt
        $guest_tokens = get_option('ozmx_guest_tokens');
        update_option('ozmx_guest_tokens', $guest_tokens + $total_tokens_to_generate);
    }

    // Nachdem die Tokens generiert wurden, setzen Sie die Metadaten-Flag für diese Bestellung
	update_post_meta($order_id, '_ozmx_tokens_generated', 'yes');

	// Token-Transaktionshistorie des Benutzers aktualisieren
	$transfers = get_user_meta($user_id, 'token_transfers', true);
	if (!is_array($transfers)) {
    $transfers = [];
	}
	$transfers[] = ['date' => current_time('mysql'), 'amount' => $total_tokens_to_generate, 'status' => __('Token generiert', 'my-child-theme')];
	update_user_meta($user_id, 'token_transfers', $transfers);
}

add_action('woocommerce_order_status_completed', 'generate_ozmx_tokens');

// Token-Rückbuchung bei Stornierung der Bestellung
function refund_ozmx_tokens_on_cancellation($order_id) {
    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();
    
    if (!$user_id) {
        error_log("OZMX: Keine Benutzer-ID für Bestellung $order_id gefunden.");
        return;
    }

    $tokens_to_refund = floatval($order->get_subtotal()) * 0.10;

    // Benutzer-Token-Werte aktualisieren
    $user_tokens = floatval(get_user_meta($user_id, 'ozmx_user_tokens', true));
    $user_tokens -= $tokens_to_refund;
    update_user_meta($user_id, 'ozmx_user_tokens', $user_tokens);

// Globale Token-Werte aktualisieren
$generated_tokens = intval(get_option('ozmx_generated_tokens', 0));
$total_tokens = intval(get_option('ozmx_total_tokens', 0));

update_option('ozmx_generated_tokens', $generated_tokens - $tokens_to_refund);
update_option('ozmx_total_tokens', $total_tokens + $tokens_to_refund); // das zweite mal

// Token-Transaktionshistorie des Benutzers aktualisieren
$transfers = get_user_meta($user_id, 'token_transfers', true);
if (!is_array($transfers)) {
    $transfers = [];
}
$transfers[] = ['date' => current_time('mysql'), 'amount' => -$tokens_to_refund, 'status' => __('Token wegen Stornierung zurückgegeben', 'my-child-theme')];
update_user_meta($user_id, 'token_transfers', $transfers);
}
add_action('woocommerce_order_status_cancelled', 'refund_ozmx_tokens_on_cancellation');

// Token Übertragung an Benutzer
function transfer_ozmx_tokens_to_user($user_id, $amount) {
   $user_tokens = floatval(get_user_meta($user_id, 'ozmx_user_tokens', true));
    update_user_meta($user_id, 'ozmx_user_tokens', $user_tokens + $amount);
}

// Erstellen Sie einen neuen Menüpunkt im Adminbereich Woocoomerce 8.0.2
add_action('admin_menu', 'ozmx_admin_menu');
function ozmx_admin_menu() {
    add_menu_page(__('OZMX', 'my-child-theme'), __('OZMX', 'my-child-theme'), 'manage_options', 'ozmx', 'ozmx_admin_page', 'dashicons-tickets', 6);
    add_submenu_page('ozmx', __('OZMX Wallets', 'my-child-theme'), __('OZMX Wallets', 'my-child-theme'), 'manage_options', 'ozmx-custom-fields', 'ozmx_custom_fields_page');
    add_submenu_page('ozmx', __('OZMX ohne Wallet', 'my-child-theme'), __('OZMX ohne Wallet', 'my-child-theme'), 'manage_options', 'ozmx-no-wallet', 'ozmx_no_wallet_page');
 add_submenu_page('ozmx', __('OZMX Doku', 'my-child-theme'), __('OZMX Doku', 'my-child-theme'), 'manage_options', 'ozmx-doku', 'ozmx_doku_page');


}

// Hauptseite des OZMX-Menüs
//    Token Übertragung aller Benutzer an ihr Wallet
function get_total_transferred_tokens_for_all_users() {
    $users = get_users();
    $total_transferred_tokens = 0;

    foreach ($users as $user) {
        $user_transferred_tokens = get_user_meta($user->ID, 'ozmx_transferred_tokens', true);
        $total_transferred_tokens += intval($user_transferred_tokens);
    }

    return $total_transferred_tokens;
}

function ozmx_admin_page() {
    $total_tokens = get_option('ozmx_total_tokens', 420000000);
    $generated_tokens = get_option('ozmx_generated_tokens', 0);
	$total_transferred_tokens_for_all_users = get_total_transferred_tokens_for_all_users();
	 $guest_tokens = get_option('ozmx_guest_tokens', 0);
	 echo '<h2>' . __('Tokens für Gästebestellungen', 'my-child-theme') . '</h2>';
	echo '<p>' . sprintf(__('Es wurden %s Tokens für Gästebestellungen generiert.', 'my-child-theme'), number_format(floatval($guest_tokens), 0, ',', '.')) . '</p>';
 //   $transferred_tokens = get_option('ozmx_transferred_tokens', 0); wird nicht gebraucht

    echo '<h1>' . __('OZMX Adminbereich', 'my-child-theme') . '</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . __('Gesamtzahl aller Token', 'my-child-theme') . '</th>';
    echo '<th>' . __('Generierte Token', 'my-child-theme') . '</th>';
	echo '<th>' . __('Übertragenen Token', 'my-child-theme') . '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td>' . number_format($total_tokens - $generated_tokens, 0, ',', '.') . '</td>'; // Abzüglich der generierten Token
    echo '<td>' . number_format($generated_tokens, 0, ',', '.') . '</td>';
	echo '<td>' . number_format($total_transferred_tokens_for_all_users, 0, ',', '.') . '</td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
	
	
    // Liste aller Produktkategorien mit OZMID und der Option, OZMX-Token zu generieren
    echo '<h2>' . __('OZMID Kategorien', 'my-child-theme') . '</h2>';
    $categories = get_terms('product_cat', array('hide_empty' => false));
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . __('Kategorie', 'my-child-theme') . '</th>';
    echo '<th>' . __('OZMID', 'my-child-theme') . '</th>';
    echo '<th>' . __('OZMX-Token generieren?', 'my-child-theme') . '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($categories as $category) {
        $OZMID = get_term_meta($category->term_id, 'OZMID', true);
        $generate_ozmx = get_term_meta($category->term_id, 'generate_ozmx', true);
        echo '<tr>';
        echo '<td>' . esc_html($category->name) . '</td>';
        echo '<td>' . esc_html($OZMID) . '</td>';
        echo '<td>' . ($generate_ozmx ? __('Ja', 'my-child-theme') : __('Nein', 'my-child-theme')) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}


// Unterseite für OZMX Wallets
function ozmx_custom_fields_page() {
    echo '<h2>' . __('Token Wallets', 'my-child-theme') . '</h2>';

    $args = array(
        'meta_key' => 'brc20_wallet_address',
        'meta_value' => '',
        'meta_compare' => '!=',
        'fields' => 'all_with_meta'
    );
    $users = get_users($args);

    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . __('Name', 'my-child-theme') . '</th>';
    echo '<th>' . __('Wallet Address', 'my-child-theme') . '</th>';
    echo '<th>' . __('Verstanden', 'my-child-theme') . '</th>';
	 echo '<th>' . __('Token auf externe Wallet übertragen?', 'my-child-theme') . '</th>';
    echo '<th>' . __('Aktueller OZMX Tokenstand', 'my-child-theme') . '</th>';
    echo '<th>' . __('Ausgezahlter Tokenstand', 'my-child-theme') . '</th>';
    echo '<th>' . __('Aktion', 'my-child-theme') . '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

foreach ($users as $user) {
    $user_tokens = floatval(get_user_meta($user->ID, 'ozmx_user_tokens', true));
    $transferred_tokens = floatval(get_user_meta($user->ID, 'ozmx_transferred_tokens', true));
    $transfer_to_external_wallet = get_user_meta($user->ID, 'transfer_to_external_wallet', true); // Hinzufügen dieser Zeile
    $nonce = wp_create_nonce('transfer_tokens_nonce_' . $user->ID); // Nonce erstellen

    echo '<tr>';
    echo '<td><a href="' . get_edit_user_link($user->ID) . '">' . esc_html($user->display_name) . '</a></td>';
    echo '<td>' . esc_html($user->brc20_wallet_address) . '</td>';
    echo '<td>' . ($user->understood ? __('Ja', 'my-child-theme') : __('Nein', 'my-child-theme')) . '</td>';
    echo '<td>' . ($transfer_to_external_wallet ? __('Ja', 'my-child-theme') : __('Nein', 'my-child-theme')) . '</td>'; // Verwendung der Variable hier
 	echo '<td>' . number_format(floatval($user_tokens), 0, ',', '.') . '</td>';
 	echo '<td>' . number_format(floatval($transferred_tokens), 0, ',', '.') . '</td>';
    echo '<td>';
    echo '<form action="' . admin_url('admin-post.php') . '" method="post">';
    echo '<input type="hidden" name="action" value="transfer_tokens_to_wallet">';
    echo '<input type="hidden" name="user_id" value="' . $user->ID . '">';
    echo '<input type="hidden" name="nonce" value="' . $nonce . '">';
    echo '<input type="submit" value="' . __('Token übertragen', 'my-child-theme') . '">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
}

    echo '</tbody>';
    echo '</table>';
}

// Unterseite für OZMX ohne Wallet
function ozmx_no_wallet_page() {
    echo '<h2>' . __('Benutzer ohne Wallet', 'my-child-theme') . '</h2>';
    $args = array(
        'meta_key' => 'brc20_wallet_address',
        'meta_value' => '',
        'meta_compare' => '=',
        'fields' => 'all_with_meta'
    );
    $users_without_wallet = get_users($args);

    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . __('Name', 'my-child-theme') . '</th>';
    echo '<th>' . __('E-Mail', 'my-child-theme') . '</th>';
    echo '<th>' . __('Registrierungsdatum', 'my-child-theme') . '</th>';
    echo '<th>' . __('Tokenstand', 'my-child-theme') . '</th>';  // Neue Spalte für den Tokenstand
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($users_without_wallet as $user) {
        $user_tokens = get_user_meta($user->ID, 'ozmx_user_tokens', true);  // Tokenstand des Benutzers abrufen
        echo '<tr>';
        echo '<td><a href="' . get_edit_user_link($user->ID) . '">' . esc_html($user->display_name) . '</a></td>';
        echo '<td>' . esc_html($user->user_email) . '</td>';
        echo '<td>' . date_i18n(get_option('date_format'), strtotime($user->user_registered)) . '</td>';
		echo '<td>' . number_format(floatval($user_tokens), 0, ',', '.') . '</td>';  // Tokenstand des Benutzers anzeigen
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
// Hauptseite des OZMX Doku-Menüs
function ozmx_doku_page() {
    echo '<h2>' . __('OZMX Token Transaktionsdokumentation', 'my-child-theme') . '</h2>';

    // Abfrage aller Benutzer, die OZMX Token-Transaktionen hatten
    $args = array(
        'meta_key' => 'token_transfers',
        'meta_value' => '',
        'meta_compare' => '!=',
        'fields' => 'all_with_meta'
    );
    $users_with_transfers = get_users($args);

    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>' . __('Name', 'my-child-theme') . '</th>';
    echo '<th>' . __('Datum', 'my-child-theme') . '</th>';
    echo '<th>' . __('Menge', 'my-child-theme') . '</th>';
    echo '<th>' . __('Status', 'my-child-theme') . '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($users_with_transfers as $user) {
        $transfers = get_user_meta($user->ID, 'token_transfers', true);
          // Umkehren der Reihenfolge der Transaktionen
    $transfers = array_reverse($transfers);
    foreach ($transfers as $transfer) {
            echo '<tr>';
            echo '<td><a href="' . get_edit_user_link($user->ID) . '">' . esc_html($user->display_name) . '</a></td>';
            echo '<td>' . esc_html($transfer['date']) . '</td>';
            echo '<td>' . number_format(floatval($transfer['amount']), 0, ',', '.') . '</td>';
            echo '<td>' . esc_html($transfer['status']) . '</td>';
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
}


// Verarbeiten der Token-Übertragung
add_action('admin_post_transfer_tokens_to_wallet', 'handle_token_transfer');
function handle_token_transfer() {
    $user_id = intval($_POST['user_id']);
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'transfer_tokens_nonce_' . $user_id) || !current_user_can('manage_options')) {
        wp_die(__('Sicherheitsüberprüfung fehlgeschlagen.', 'my-child-theme'));
    }
    $transferred_amount = floatval(get_user_meta($user_id, 'ozmx_user_tokens', true));

    // Token-Guthaben des Benutzers zurücksetzen
    update_user_meta($user_id, 'ozmx_user_tokens', 0);

    // Gesamtzahl der übertragenen Token aktualisieren
    $total_transferred = floatval(get_user_meta($user_id, 'ozmx_transferred_tokens', true));
    $total_transferred += $transferred_amount;
    update_user_meta($user_id, 'ozmx_transferred_tokens', $total_transferred);

    // Weiterleitung zurück zur Wallet-Seite mit einer Erfolgsmeldung
    wp_redirect(admin_url('admin.php?page=ozmx-custom-fields&transfer=success'));
    exit;
}
// Kontrollkästchen "An eine andere Adresse liefern" auf der Checkout-Seite
add_filter('woocommerce_ship_to_different_address_checked', '__return_false');
// Create an account
add_filter('woocommerce_create_account_default_checked', '__return_true');
add_filter('gettext', 'customize_create_account_text', 999, 3);
function customize_create_account_text($translated_text, $text, $domain) {
    if ($text === 'Create an account?' && $domain === 'woocommerce') {
        $translated_text = 'Create an account? Halte OZMX Token!';
    }
    return $translated_text;
}
