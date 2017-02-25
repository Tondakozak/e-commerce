<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 17:10
 */

namespace Controller;


class Administration extends Controller {
    function execute() {
        $this->header["title"] = "Administration";
    }
}