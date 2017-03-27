<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products | E-Commerce</title>

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
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

            <a class="navbar-brand" href="index.html"><img src="../images/logo.jpg"></a>
        </div>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="about.html">About</a>
                </li>

                <li class="active">
                    <a href="products.html">Products</a>
                </li>
                <li><a></a></li>
                <li><a></a></li>
                <li><a></a></li>

                <li>
                    <a href="registration.html">Registration</a>
                </li>

                <li>
                    <a href="login.html">Login</a>
                </li>
                <li>
                    <a href="cart.html">Cart (2)</a>
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


    <div class="row page-intro">
        <div class="col-lg-12  ">
            <h2>Search Results</h2>
            <p>Search phrase: <strong>Outdoor blue boots</strong></p>
        </div>
    </div>


    <div class="row">

        <!-- side bar -->
        <div class="col-sm-3">
            <div class="left-sidebar">

                <!--Sorting-->

                <h3>Sort by</h3>
                <div class="radio">
                    <label>
                        <input type="radio" name="sort">
                        Price: Lowest first
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio"name="sort">
                        Price: Highest first
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio"name="sort">
                        Popularity
                    </label>
                </div>
                <hr>

                <!--Men or Women-->

                <h3>Gender</h3>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        Male
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        Female
                    </label>
                </div>

                <!-- Size -->

                <h3>Size</h3>
                <div class="brands-name">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            29 <span> (32) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            30 <span> (54) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            31 <span> (32) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            32 <span> (22) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            34 <span> (28) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            35 <span> (44) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            36 <span> (62) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            37 <span> (25) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            38 <span> (72) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            39 <span> (32) </span>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            40 <span> (112) </span>
                        </label>
                    </div>
                </div>
                <!--/size_products-->

                <!-- Price -->

                <h3>Price Range</h3>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="100">
                        £ 50 to £ 100
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="200">
                        £ 110 to £ 200
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="300">
                        £ 210 to £ 300
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="400">
                        £ 310 to £ 400
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="500">
                        £ 410 to £ 500
                    </label>
                </div>
            </div>
        </div> <!-- end - side bar -->


        <!-- list of products -->
        <div class="col-md-8">
            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>
                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">
            </article>
            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">
            </article>

            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>

            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>

            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>

            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>
            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>
            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>
            <article class="col-md-4 article-intro">
                <a href="product_details.html">
                    <img class="img-responsive img-rounded" src="../images/product-images/jd.jpg" alt="">
                </a>
                <h3>
                    <a href="product_details.html">Timberland</a>
                </h3>
                <p>The City Blazer</p>
                <p>£100</p>

                <input name="Add" value="Add to Cart" type="button" class="btn btn-default">

            </article>
        </div> <!-- end - list of products -->

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