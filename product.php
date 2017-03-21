<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 12:01
 */


// include common files
require "common.php";

include "src/templates/products.php";
include "src/logic/products.php";

// there is not $_GET["id"] or is empty
if (empty($_GET["id"])) {
    header("Location: /");

    exit();
}


// Product details:
$product_details = get_product($_GET["id"]);

if (!$product_details) {
    // the product doesn't exist
    set_error("This product does not exist");
    //header("Location: products.php");
    exit();
}

// generate HTML
generate_header("Product");
generate_product_detail($product_details);
generate_footer();