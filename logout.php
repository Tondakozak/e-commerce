<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 13.03.2017
 * Time: 20:07
 */

require "common.php";

if (is_logged()) {
    // delete session
    unset($_SESSION["user"]);
    set_success("You are logged out.");
}

header("Location: /");
exit();