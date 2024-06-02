<?php
// models/ProductImage.php
class ProductImage {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($productId, $imagePath) {
        $stmt = $this->pdo->prepare('INSERT INTO product_images (product_id, image_url) VALUES (?, ?)');
        $stmt->execute([$productId, $imagePath]);
    }

    public function getByProductId($productId) {
        $stmt = $this->pdo->prepare('SELECT * FROM product_images WHERE product_id = ?');
        $stmt->execute([$productId]);
        return $stmt->fetchAll();
    }
}
?>
