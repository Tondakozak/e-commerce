<?php

function generate_slider(){
?>

<div class="jumbotron feature">
    <div class="container">

        <div id="feature-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#feature-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#feature-carousel" data-slide-to="1"></li>
                <li data-target="#feature-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <a href="#">
                        <img class="img-responsive" src="../images/product-images/jd.jpg" alt="">
                    </a>
                    <div class="carousel-caption">
                        <h3>Timberland</h3>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" src="../images/product-images/jd.jpg" alt="">
                    </a>
                    <div class="carousel-caption">
                        <h3>Timberland</h3>
                    </div>
                </div>
                <div class="item">
                    <a href="#">
                        <img class="img-responsive" src="../images/product-images/jd.jpg" alt="">
                    </a>
                    <div class="carousel-caption">
                        <h3>Timberland</h3>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#feature-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#feature-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</div>
<?php

}

function generate_feature(){
?>


    <div class="container">
        <div class="row page-intro">
            <div class="col-lg-12">
                <h1>Featured Products</h1>
            </div>
        </div>




    <div class="row">
        <?php

        //connect to database
        $products = (new MongoDB\Client)->ecomerce->products->find();
        // .limit(6) not working

        foreach ($products as $cust) { ?>
            <div class="col-md-4">
                <article class="article-intro">
                    <a href="product_details.html">
                        <img class="img-responsive img-rounded" src="'../images/product-images/<?php echo $cust['name'] ?>" alt="">
                    </a>
                    <h3>
                        <a href="product_details.html"><?php echo $cust['brand']; ?></a>
                    </h3>
                    <p><?php echo $cust['name']; ?></p>
                </article>
            </div>
        <?php } ?>
    </div>
<?php
}