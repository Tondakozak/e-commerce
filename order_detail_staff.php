<?php
//require
require "common.php";


// you must ensure that this page will be available only for staff (Tony)
page_for_staff();

generate_admin("Products"); ?>



<!-- main content -->
<div class="container">


    <div class="row page-intro">
        <div class="col-lg-12  ">
            <h2>Order Detail</h2>
        </div>
    </div>


    <div class="row">
        <!-- customer details -->
        <section>
            <h4>Overview</h4>
            <p><b>Date of order:</b> 10/02/2017</p>
            <p><b>Status: </b>Processing <a href="#" class="btn btn-danger">Cancel Order</a> <a href="#" class="btn btn-info">Was Dispatched</a> </p>

            <form class="form-inline">
                <p class="form-inline"><b>Arriving: </b>
                <input class="form-control" type="date" value="15/02/2017">
                <input type="submit" class="form-control" value="Change Date" name="date">
                </p>
            </form>
            <hr>
            <h4>
                Customer Details
            </h4>
            <p>Antonín Kozák</p>
            <p>19 BUXTON ROAD</p>
            <p>LONDON, E17 7EH</p>
            <p>United Kingdom</p>
            <p><b>Phone: </b>0666 559 321</p>
            <p><b>Email: </b>order.example@hotmail.com</p>
        </section>
        <!-- items -->
        <section>
            <hr>
            <h4>Products</h4>
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
                                <p><strong>Quantity: </strong> 1</p>
                            </td>
                            <td class="cart_price">
                                <p>£50.00</p>
                                <p><b>£200.00</b></p>
                            </td>

                        </tr>

                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="../images/product-details/product.jpg" width="140" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Euro GORE-TEX® Nubuck Hiking Boots</a></h4>
                                <p><strong>Quantity: </strong> 3</p>
                            </td>
                            <td class="cart_price">
                                <p>£50.00</p>
                                <p><b>£150.00</b></p>
                            </td>

                        </tr>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="../images/cart/one.png" width="140" height="80" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">Timberland 3</a></h4>
                                <p><strong>Quantity: </strong> 8</p>
                            </td>
                            <td class="cart_price">
                                <p>£50.00</p>
                                <p><b>£400.00</b></p>
                            </td>

                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td></td>
                            <td>£850.00</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->


    </div>

    <!-- footer -->
    <footer>
        <div class="footer-blurb"></div>

        <div class="small-print">
            <div class="container">
                <p><a href="tos.html">Terms &amp; Conditions</a> | <a href="privacy.html">Privacy Policy</a> | <a
                        href="contact.html">Contact</a></p>
                <p>Copyright &copy; MDX 2017 </p>
            </div>
        </div>
    </footer>
</div> <!-- end - main content -->

<!-- JavaScript links -->
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>