<?php
function generate_header($title){
	?>
	
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title;?> | E-Commerce</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

    <!-- navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">

            <!-- logo and hamburger menu button -->
            <div class="navbar-header">
                <!-- hamburger menu button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="index.php"><img src="images/logo.jpg"></a>
            </div>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>

                    <li>
                        <a href="products.php">Products</a>
                    </li>
                    <li><a></a></li>
                    <li><a></a></li>
                    <li><a></a></li>

                    <li>
                        <a href="registration.php">Registration</a>
                    </li>

                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart (2)</a>
                    </li>
                </ul>

                <!-- search form -->
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>



            </div>  <!-- end - navbar links -->
        </div>
    </nav> <!-- end - navigation -->



    <!-- main content -->
    <div class="container">

<?php
    show_messages();


}


function generate_footer(){
	?>
	
	
    <!-- footer -->
    <footer>
        <div class="footer-blurb"></div>

        <div class="small-print">
            <div class="container">
                <p><a href="tos.php">Terms &amp; Conditions</a> | <a href="privacy.php">Privacy Policy</a> | <a href="contact.php">Contact</a></p>
                <p>Copyright &copy; MDX 2017 </p>
            </div>
        </div>
    </footer>
</div> <!-- end - main content -->

<!-- JavaScript links -->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
<?php

}

function show_messages() {
    // if there are any messages
    if (isset($_SESSION["message"])) {
		
        // show all success messages
		if (isset($_SESSION["message"]["success"])) {
			foreach ($_SESSION["message"]["success"] as $msg) {
				echo "<div class='alert alert-success'>".$msg."</div>";
			}
		}

        // show all error messages
		if (isset($_SESSION["message"]["error"])) {
			foreach ($_SESSION["message"]["error"] as $msg) {
				echo "<div class='alert alert-danger'>".$msg."</div>";
			}
		}
        // delete showed messages
        unset($_SESSION["message"]);        
    }

}
?>
	
	



