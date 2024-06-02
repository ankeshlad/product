<?php
// api/products.php
require_once '../config/database.php';
require_once '../models/Product.php';
require_once '../models/ProductImage.php';

header('Content-Type: application/json');

$productModel = new Product($pdo);
$productImageModel = new ProductImage($pdo);

$products = $productModel->getAll();

foreach ($products as &$product) {
    $product['images'] = $productImageModel->getByProductId($product['id']);
}

echo json_encode($products);
?>
