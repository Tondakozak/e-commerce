<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 17:12
 */

namespace Controller;


class Login extends Controller {
    function execute() {
        $this->header["title"] = "Login";
    }
}