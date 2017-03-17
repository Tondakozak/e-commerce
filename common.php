<?php
session_start();
include 'src/templates/layout.php';

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


// ****************************************************
// *
// * functions for users and authentication
// *
// ****************************************************

/**
 * Returns id of logged user, if not logged, returns false
 * @return bool
 */
function get_user_id() {
    if (isset($_SESSION["user"]["id"])) {
        return $_SESSION["user"]["id"];
    } else {
        return false;
    }
}

/**
 * Returns role of logged user, if not logged, returns false
 * @return bool
 */
function get_user_role() {
    if (isset($_SESSION["user"]["role"])) {
        return $_SESSION["user"]["role"];
    } else {
        return false;
    }
}

/**
 * Returns true if the user is logged in
 * @return bool
 */
function is_logged() {
    return (isset($_SESSION["user"]["id"]));
}

/**
 * returns true if the user is logged in and it is a customer
 * @return bool
 */
function is_customer() {
    return (isset($_SESSION["user"]["id"]) && $_SESSION["user"]["role"] == "customer");
}


/**
 * returns true if the user is logged in and it is a staff
 * @return bool
 */
function is_staff() {
    return (isset($_SESSION["user"]["id"]) && $_SESSION["user"]["role"] == "staff");
}


/**
 * If the user is logged in, he is redirected and program is terminated
 * @return bool
 */
function page_for_guest() {
    if (isset($_SESSION["user"]["id"])) {
        header("Location: /");
        exit;
    }

    return true;
}

/**
 * If the user is not logged in customer, he is redirected and program is terminated
 * @return bool
 */
function page_for_customer() {
    if (!isset($_SESSION["user"]["id"]) || $_SESSION["user"]["role"] != "customer") {
        header("Location: /");
        exit;
    }

    return true;
}

/**
 * If the user is not logged staff, he is redirected and program is terminated
 * @return bool
 */
function page_for_staff() {
    if (!isset($_SESSION["user"]["id"]) || $_SESSION["user"]["role"] != "staff") {
        header("Location: /");
        exit;
    }

    return true;
}


// ****************************************************
// *
// * functions for setting messages
// *
// ****************************************************

/**
 * save success message to $_SESSION
 * use it instead of: $_SESSION["message"]["success"][] = $message;
 * @param $message string
 */
function set_success($message) {
    $_SESSION["message"]["success"][] = $message;
}

/**
 * save error message to $_SESSION
 * use it instead of: $_SESSION["message"]["error"][] = $message;
 * @param $message string
 */
function set_error($message) {
    $_SESSION["message"]["error"][] = $message;
}




/**
 * Protect output data against XSS
 * @param $data
 * @return array|string
 */

function protect_output($data) {
    if(!is_array($data)) {
        return htmlspecialchars($data, ENT_QUOTES);
    } else {
        $protectString = function(&$string) {
            $string = htmlspecialchars($string, ENT_QUOTES);
        };
        array_walk_recursive($data, $protectString);
        return $data;
    }
}