<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 26.02.2017
 * Time: 10:04
 */
?>
<div class="row page-intro">
    <div class="col-lg-12  ">
        <h1>Registration</h1>
    </div>
</div>


<!-- registration form -->
<div class="container-fluid">
    <form method="post" class="register-form">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="name">Name</label>
                <input name="register-name" class="form-control" type="text" id="name" value="<?=$form["register-name"];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="email">Email</label>
                <input name="register-email" class="form-control" type="email" id="email" value="<?=$form["register-email"];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">Password</label>
                <input name="register-password" class="form-control" type="password" id="password" value="<?=$form["register-password"];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password_again">Password Again</label>
                <input name="register-password-again" class="form-control" type="password" id="password_again"  value="<?=$form["register-password-again"];?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                <button class="btn btn-default regbutton" name="register-submit">Register</button>
            </div>

        </div>
    </form>
</div>
