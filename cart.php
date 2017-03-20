<?php
//require
require "common.php";
include "src/templates/cart.php";
include_once "src/logic/user.php";
include_once "src/logic/cart.php";
include_once "src/logic/orders.php";

$title = "Cart";

$cart_data = get_cart(get_user_id());
$user_data = get_user_address(get_user_id());

if (isset($_POST["email"])) {
    $form_data = check_cart_form($_POST);
    if ($form_data && $cart_data) {
        save_user_details($form_data, get_user_id());
        $order_saved = save_order($form_data, $cart_data, get_user_id());
        $title = "Order Summary";
    }
}
// if the cart is empty
elseif (!$cart_data) {
    set_error("Your cart is empty.");
}



// generate HTML
generate_header($title);
generate_page_title($title);

if (isset($order_saved)) { // show order summary
    //generate_order_summary($cart_data, $user_data);
    echo "saved";
} else {

    if($cart_data) {
        // if the cart is not empty
        generate_cart_table($cart_data);
    }

    generate_address_form($user_data);

}

generate_footer();

