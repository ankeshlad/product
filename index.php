<?php
$pdo = require 'config/database.php';
require_once 'controllers/ProductController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = new ProductController($pdo);

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'store':
        $controller->store();
        break;
    case 'index':
    default:
        $controller->index();
        break;
}
?>
