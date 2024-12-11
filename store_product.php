<?php
$request = file_get_contents('php://input');
$request = json_decode($request, true);

if(!empty($request['submit'])){

    $product_name = $request['product_name'];
    $quantity = $request['quantity'];
    $price = $request['price'];
    $date = date('Y-m-d h:m:s');
    $data = [
        "product_name" => $product_name,
        "quantity" => $quantity,
        "price" => $price,
        "date" => $date
    ];
    $products = file_get_contents("products.json");
    if($products){
        $products = json_decode($products, true);
    }else {
        $products = [];
    }
    $products[] = $data;
    file_put_contents("products.json", json_encode($products, true));
}