<?php

function autoloadFunkce($trida)
{
    $namespace = explode("\\", $trida);

    if ($namespace[0] == "MongoDB") {
        unset($namespace[0]);
        $path = implode("/", $namespace);
        require("libraries/mongodb/src/" . $path . ".php");
    }
    $namespaces = array("Controller", "Model", "View");
    if (in_array($namespace[0], $namespaces)) {
        require "src/".strtolower($namespace[0])."/".$namespace[1].".php";
    }

}

// Registrace callbacku (Pod starým PHP 5.2 je nutné nahradit fcí __autoload())
spl_autoload_register("autoloadFunkce");


/*
require("libraries/mongodb/src/functions.php");

$collection = (new MongoDB\Client)->example->users;

$insertOneResult = $collection->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

var_dump($insertOneResult->getInsertedId());*/


$mainController = new Controller\Main();
$mainController->execute();

$mainController->renderView();