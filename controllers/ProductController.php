<?php
require_once 'models/Product.php';
require_once 'models/ProductImage.php';

class ProductController {
    private $pdo;
    private $productModel;
    private $productImageModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->productModel = new Product($pdo);
        $this->productImageModel = new ProductImage($pdo);
    }

    public function add() {
        require 'views/product/add.php';
    }

    public function store() {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        
        $productId = $this->productModel->create($name, $description, $price);

        if ($productId) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $imagePath = 'uploads/' . basename($_FILES['images']['name'][$key]);
                move_uploaded_file($tmp_name, $imagePath);
                $this->productImageModel->create($productId, $imagePath);
            }
        }

        header('Location: /product-images/index.php');
    }

    public function index() {
        $products = $this->productModel->getAll();
        $pdo = $this->pdo; // Pass the PDO object to the view
        require 'views/product/index.php';
    }
}
?>
