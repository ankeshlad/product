<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $description, $price) {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, description, price) VALUES (?, ?, ?)');
        $stmt->execute([$name, $description, $price]);
        return $this->pdo->lastInsertId();
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM products');
        return $stmt->fetchAll();
    }
}
?>
