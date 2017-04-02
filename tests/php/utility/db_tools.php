<?php


function add_product($name, $description, $brand, $price, $quantity, $size, $category, $gender, $photo) {

        // If an image doesn't exist, the default one is set
        if (!isset($uploadFileName)) {
            $uploadFileName = "default.jpg";
        }

        $dataArray = [
            "name" => $name,
            "description" => $description,
            "brand" => $brand,
            "price" => intval($price),
            'quantity' => intval($quantity),
            'size' => intval($size),
            "category" => explode(", ", $category),
            "gender" => $gender,
            'photos' => [$photo]
        ];

        // Add new users to the database
        $returnVal = select_collection("products")->insertOne($dataArray);

        return $returnVal->getInsertedId();
}