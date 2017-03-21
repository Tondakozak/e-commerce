<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 15:47
 */


function generate_products_sidebar() {
    echo <<<END

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


END;

}

function generate_product_item($id, $name, $brand, $photo, $price) {
    //set_script("cart.js");
    echo <<<END

        <div class="col-md-3">
            <article class="article-intro">
                <a href="product.php?id=$id">
                    <img class="img-responsive img-rounded" src="images/product-images/$photo" alt="$name">
                </a>
                <h3>
					<a href="product.php?id=$id">$brand</a>
                </h3>
                    <p>$name</p>
					<p>£$price</p>
					<form onsubmit="return add_into_cart(event, this);">
					    <input type="hidden" name="product-quantity" value="1">
					    <input type="hidden" name="product-id" value="$id">					
                        <input name="Add" value="Add to Cart" type="submit" class="btn btn-default">
                    </form>
            </article>
        </div>

END;

}



/**
 * @param $data
 *  $data = [
"id" => $id,
"name" => $name,
"photos" => $photos,
"amount" => $amount,
"category" => $category,
"size" => $size,
"price" => $price,
"gender" => $gender,
"brand" => $brand,
"description" => $description
];
 */
function generate_product_detail($data) {

    $data["gender"] = ucfirst($data["gender"]);
    $data["description"] = nl2br($data["description"]);
    $data["category"] = implode(", ", $data["category"]);
    $data = protect_output($data);


    echo <<<END

<div class="row">

        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="view-product">
                        <img src="images/product-details/{$data["photos"][0]}" alt="$data[name]">

                    </div>


                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->

                        <h2>$data[name]</h2>

                        <span>
									<span>£$data[price]</span>
									<label>Quantity:</label>
									<form onsubmit="return add_into_cart(event, this);">
                                        <input type="number" value="1" min="1" max="$data[quantity]" name="product-quantity">
                                        <input type="hidden" value="$data[id]" name="product-id">
                                        <button class="btn btn-default cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
									</form>
								</span>
                        <p><b>Availability:</b> In Stock</p>
                        <p><b>Gender:</b> $data[gender]</p>
                        <p><b>Size:</b> $data[size]</p>
                        <p><b>Categories:</b> $data[category]</p>
                        <p><b>Description:</b> </p>
                        <p>$data[description]</p>

                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->

        </div>
    </div>



END;

}