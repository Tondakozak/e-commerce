<?php
//require
require "common.php";

include "src/templates/products.php";

generate_header("Products", $in_cart_common);
generate_page_title("Products");

echo "<div class=row>";
generate_products_sidebar();

//connect to database
$products = (new MongoDB\Client)->ecomerce->products->find(["quantity" => ['$gt' => 0]]);

foreach ($products as $p) {
    generate_product_item($p);
}

echo "</div>";


generate_footer();
