<?php
    function update_form($filter){
?>

<div class="container">
    <div class="row page-intro">
        <div class="col-md-4">
            <h2>Update Product Details</h2>
        </div>
    </div>

       <?php
        //connect to database

       // This query is listing all products instead of single product so get product by ID 
        $products = (new MongoDB\Client)->ecomerce->products->findOne($filter);

        // .limit(6) not working
        $cust = $products;
?>
    <div class="container-fluid">
        <form class="register-form" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="name">Name of Product</label>
                    <input name="name" class="form-control" type="text" id="name" value="<?php echo $cust['name']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="10" id="description"><?php echo $cust['description']; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="picture">Upload Picture of Product</label>
                    <input type="file" name="imageToUpload" id="image">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="brand">Brand Name</label>
                    <input name="brand" class="form-control" type="text" id="brand" value="<?php echo $cust['brand']; ?>">
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="category">Category Name</label>
                    <input name="category" class="form-control" type="text" id="category" value="<?php echo implode(", ", mongo_to_array($cust['category'])); ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="gender">Gender</label>
                    <input name="gender" class="form-control" type="text" id="gender" value="<?php echo $cust['gender']; ?>">
                </div>
            </div>            

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="price">Price</label>
                    <input name="price" class="form-control" type="number" id="price" value="<?php echo $cust['price']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="quantity">Quantity</label>
                    <input name="quantity" class="form-control" type="number" id="quantity" value="<?php echo $cust['quantity']; ?>">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <input type="hidden" name="id" value="<?php echo $cust['_id']; ?>">
                    <button type="submit" name="update" class="btn btn-default regbutton">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
}