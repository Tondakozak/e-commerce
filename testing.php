<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 26.02.2017
 * Time: 11:09
 */

require "config.php";
require("libraries/mongodb/src/functions.php");

function autoloadFunkce($trida)
{
    $namespace = explode("\\", $trida);

    if ($namespace[0] == "MongoDB") {
        unset($namespace[0]);
        $path = implode("/", $namespace);
        require("libraries/mongodb/src/" . $path . ".php");
        return;
    }
    $namespaces = array("Controller", "Model", "View");
    if (in_array($namespace[0], $namespaces)) {
        require "src/".strtolower($namespace[0])."/".$namespace[1].".php";
    }

}

// Registrace callbacku (Pod starým PHP 5.2 je nutné nahradit fcí __autoload())
spl_autoload_register("autoloadFunkce");

/*
$db = new \Model\DB();
$coll = $db->selectCollection("users");
$insertOneResult = $coll->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
]);
printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
var_dump($insertOneResult->getInsertedId());
*/

var_dump(!"  ");



/*
$collection = null;
$collection = (new MongoDB\Client)->{DB_NAME}->users;
try {
    $insertOneResult = $collection->insertOne([
        'name' => 'Tonda Kozák',
        'category' => 'customer',
        'password' => '1234',
        'email' => 'admin@example.com',
        "address" => [
            "line_1" => "9 Buxton Road",
            "line_2" => "Second Floor",
            "town" => "London",
            "postcode" => "NW2 5HS"
        ],
        "phone_number" => "07744523695",
        "cart" => [],
        "registration_date" => "123"
    ]);
} catch (Exception $e) {
    echo "Problem: ".$e->getMessage();
    exit();
}




printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

var_dump($insertOneResult->getInsertedId());

*/