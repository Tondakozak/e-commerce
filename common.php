<?php
session_start();
include'src/view/layout.php';

// mongoDB functions
require("libraries/mongodb/src/functions.php");

function autoloadFunction($class) {
    $namespace = explode("\\", $class);

    if ($namespace[0] == "MongoDB") {
        unset($namespace[0]);
        $path = implode("/", $namespace);
        require("libraries/mongodb/src/" . $path . ".php");
        return;
    }

}

// classes autoload
spl_autoload_register("autoloadFunction");

