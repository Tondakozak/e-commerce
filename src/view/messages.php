<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 26.02.2017
 * Time: 10:20
 */

function view_error($msg) {
    echo "<div class='alert alert-danger'>".$msg."</div>";
}

function view_success($msg) {
    echo "<div class='alert alert-success'>".$msg."</div>";
}