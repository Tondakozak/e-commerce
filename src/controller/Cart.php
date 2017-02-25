<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 17:11
 */

namespace Controller;


class Cart extends Controller {
    function execute() {
        $this->header["title"] = "Cart";
    }
}