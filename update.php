<?php
require_once "database.php";

$product = null; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Product not found.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $stmt = $conn->prepare("UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id");
        $result = $stmt->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'id' => $id
        ]);

        if ($result) {
            echo "Product updated successfully.";
            header("Location: index.php");
            exit;
        } else {
            echo "Error updating product.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <?php if ($product): ?>  
    <form action="update.php?id=<?php echo ($id); ?>" method="POST">
        <div>
            <label for="name">Name:
                <input type="text" name="name" value="<?php echo ($product['name']); ?>" required>
            </label>
        </div>
        <div>
            <label for="description">Description:
                <input type="text" name="description" value="<?php echo ($product['description']); ?>" required>
            </label>
        </div>
        <div>
            <label for="price">Price:
                <input type="text" name="price" value="<?php echo ($product['price']); ?>" required>
            </label>
        </div>
        <div>
            <label for="quantity">Quantity:
                <input type="text" name="quantity" value="<?php echo ($product['quantity']); ?>" required>
            </label>
        </div>
        <div>
            <button type="submit" name="update">Update Product</button>
            <a href="index.php">Back</a>
        </div>
    </form>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</body>
</html>
