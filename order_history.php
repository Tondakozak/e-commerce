<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 20.03.2017
 * Time: 19:08
 */


//require
require "common.php";
include "src/templates/orders.php";
include_once "src/logic/user.php";
include_once "src/logic/orders.php";

$title = "Order History";

page_for_customer();

// detail of a order
if (isset($_GET["id"])) {
    // get the order details
    $order = get_order_details($_GET["id"]);

    if (!$order || $order["customer_details"]["user_id"] != get_user_id()) {
        // if the order doesn't exist or it is not current user's order
        set_error("This order doesn't exist.");
        header("Location: order_history.php");
        exit();
    } else {
        $show_order_detail = true;
        $title = "Order detail";
    }
} else {
    // list of orders
    $orders = get_orders(get_user_id());
}


// generate HTML
generate_header($title);
generate_page_title($title);

if (isset($show_order_detail)) {
    generate_order_detail("customer", $order);
} else {
    generate_orders_list($orders);
}


generate_footer();

