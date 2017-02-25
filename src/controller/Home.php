<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 14:22
 */

namespace Controller;


class Home extends Controller {

    public function execute() {
        $this->header["title"] = "e-commerce";
    }
}