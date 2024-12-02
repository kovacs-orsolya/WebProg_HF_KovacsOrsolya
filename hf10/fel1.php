<?php

function curl_get($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}


$cartsUrl = "https://fakestoreapi.com/carts/user/1";
$carts = curl_get($cartsUrl);

$productsUrl = "https://fakestoreapi.com/products";
$products = curl_get($productsUrl);

$productPrices = [];
foreach ($products as $product) {
    $productPrices[$product['id']] = $product['price'];
}

$totalValue = 0;
foreach ($carts as $cart) {
    foreach ($cart['products'] as $product) {
        $productId = $product['productId'];
        $quantity = $product['quantity'];
        $totalValue += $productPrices[$productId] * $quantity;
        
    }
}

echo "The total value of user $userId's carts is: $" . $totalValue;

?>
