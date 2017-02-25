<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 14:34
 */

namespace Controller;


class Account extends Controller {
    function execute() {
        $this->header["title"] = "My Account";
    }
}