<?php
//require
require "common.php";


generate_header("Cart"); ?>




    <div class="row page-intro">
        <div class="col-lg-12  ">
            <h2>Shopping Cart</h2>
        </div>
    </div>


    <div class="row">
        <!-- cart items -->
        <section id="cart_items">
            <div class="container">

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Quantity</td>
                            <td class="price">Price</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="../images/cart/one.png" width="140" height="80" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Timberland</a></h4>
                                <p><input type="number" value="4" class="form-control" min="0"></p>
                            </td>
                            <td class="cart_price">
                                <p>£50.00</p>
                                <p><b>£200.00</b></p>
                            </td>

                        </tr>

                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="../images/cart/one.png" width="140" height="80" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Timberland 2</a></h4>
                                <p><input type="number" value="5" class="form-control" min="0"></p>
                            </td>
                            <td class="cart_price">
                                <p>£50.00</p>
                                <p><b>£250.00</b></p>
                            </td>

                        </tr>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="../images/cart/one.png" width="140" height="80" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Timberland 3</a></h4>
                                <p><input type="number" value="8" class="form-control" min="0"></p>
                            </td>
                            <td class="cart_price">
                                <p>£50.00</p>
                                <p><b>£400.00</b></p>
                            </td>

                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total: </td><td></td><td>£850.00</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <!-- address -->
        <section id="do_action">
            <h3>Your details</h3>
            <!-- Address -->
            <div class="container-fluid">
                <form action="" method="" class="register-form">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="name">Name</label>
                            <input name="name" class="form-control" type="text" id="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="email">Email</label>
                            <input name="email" class="form-control" type="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="tel">Tel. number</label>
                            <input name="tel" class="form-control" type="tel" id="tel">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="address1">Address <small>line 1</small></label>
                            <input name="address1" class="form-control" type="text" id="address1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="address2">Address <small>line 2</small></label>
                            <input name="address2" class="form-control" type="text" id="address2">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="town">Town / City</label>
                            <input name="town" class="form-control" type="text" id="town">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <label for="postcode">Postcode</label>
                            <input name="postcode" class="form-control" type="text" id="postcode">
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                            <button class="btn btn-default regbutton">Checkout</button>
                        </div>

                    </div>
                </form>
            </div>
        </section><!-- end - address -->

    </div>

<?php

generate_footer(); ?>
