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
            <h2>Orders Received</h2>
        </div>
    </div>


    <div class="row">

        <section id="cart_items">
            <div class="container">

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="date">Product Name</td>
                            <td class="description">Price</td>
                            <td class="dispatch">User</td>
                            <td class="user">Detail</td>
                            <td class="user">Status</td>

                        </tr>
                        </thead>
                        <tbody>
						
	<?php

	//connect to database
	$order = (new MongoDB\Client)->ecomerce->orders->find();

	foreach ($order as $cust) {
?>
<tr>
                            <td class="cart_product">
                                <strong><?php echo $cust['productname']; ?></strong>
                            </td>
                            <td class="cart_description">
                                <?php echo $cust['price']; ?>
                            </td>
                             <td class="cart_description">
                                <?php echo $cust['user']; ?>
                            </td>
                            <td>

                                <a href="manage_orders.php" class="btn btn-info">Detail</a>
                            </td>
                            <td>
      							Pending						
                            </td>
                        </tr>
					<?php } ?>
                

                        </tbody>
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
                <p><a href="tos.html">Terms &amp; Conditions</a> | <a href="privacy.html">Privacy Policy</a> | <a href="contact.html">Contact</a></p>
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
