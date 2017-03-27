<?php
//require
require "common.php";

// only registered user
page_for_customer();

if (isset($_POST["update"])) {

    // connect to mongodb server
    $collection = (new MongoDB\Client)->ecomerce->cart;

    //Convert to PHP array
    $name = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $address2= filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
    $town = filter_input(INPUT_POST, 'town', FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    //$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);


$findProduct = [
        //"_id" => new MongoDB\BSON\ObjectID($id)
        "_id" => get_user_id() // user can update only his own data (Tony)
    ];

    $updateProduct = [
     '$set' => [ 
       "name" => $name,
       "Address" => $address,
       "AddressL" => $address2,
       "Town" => $town,
       "Postcode" => $postcode,
       "number" => $phone
       
       ]
    ];

    $check_update = $collection->updateOne($findProduct, $updateProduct);
    $_SESSION["message"]["success"][] = "Product Updated Successfully!";

}


generate_header("Change address");

include 'src/templates/update_customer.php';
update_form1();
generate_footer();