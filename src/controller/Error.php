<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 14:25
 */

namespace Controller;


class Error extends Controller {
    public function execute() {
        echo "Error";
        var_dump($this->url);
    }
}