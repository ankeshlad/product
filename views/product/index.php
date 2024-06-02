<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <a href="/product-images/index.php?action=add">Add Product</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Images</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['description']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td>
                <?php
                $productImageModel = new ProductImage($pdo); // Initialize ProductImage model with $pdo
                $images = $productImageModel->getByProductId($product['id']);
                foreach ($images as $image):
                ?>
                    <img src="<?php echo htmlspecialchars($image['image_url']); ?>" alt="Product Image">
                <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
