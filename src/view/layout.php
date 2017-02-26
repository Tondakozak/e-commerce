<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 24.02.2017
 * Time: 14:35
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->header["title"] ?></title>

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
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

            <a class="navbar-brand" href="/"><img src="/images/logo.jpg"></a>
        </div>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">

                <?php
                require "src/view/navigation.php";
                ?>

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
        // render success and error messages
        $this->renderMessages();

        // render content
        $this->controller->renderView();
    ?>


    <!-- footer -->
    <footer>
        <div class="footer-blurb"></div>

        <div class="small-print">
            <div class="container">
                <p><a href="/page/tos/">Terms &amp; Conditions</a> | <a href="/page/privacy/">Privacy Policy</a> | <a href="/page/contact/">Contact</a></p>
                <p>Copyright &copy; MDX 2017 </p>
            </div>
        </div>
    </footer>
</div> <!-- end - main content -->

<!-- JavaScript links -->
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
