<?php
/**
 * Created by PhpStorm.
 * User: Tonda
 * Date: 17.03.2017
 * Time: 12:08
 */


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
									<form onsubmit="return add_to_cart(this);">
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