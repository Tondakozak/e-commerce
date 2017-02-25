<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 14:33
 */

namespace Controller;


class Page extends Controller {
    function execute() {
        $this->header["title"] = "Page";
    }
}