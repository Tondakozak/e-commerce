<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 17:14
 */

namespace Controller;


class Logout extends Controller {
    function execute() {
        $this->header["title"] = "Logout";
    }
}