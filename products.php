<?php
//require
require "common.php";

include "src/templates/products.php";

generate_header("Products");
generate_page_title("Products");

echo "<div class='row'>";

generate_products_sidebar();

//connect to database
$products = (new MongoDB\Client)->ecomerce->products->find();

foreach ($products as $p) {
    generate_product_item($p["_id"], $p["name"], $p["brand"], $p["photos"][0], $p["price"]);
}

echo "</div>";


generate_footer();
