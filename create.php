<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO products (name,description,price,quantity) VALUES(:name,:description,:price,:quantity)");

    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':price',$price);
    $stmt->bindParam(':quantity',$quantity);

    if ($stmt->execute()){
        echo "Product added successfully";
    } else {
        echo "Error adding product";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Add Product</h1>

        <form action="create.php" method="POST">
            <div>
            <label for="">Name:
                <input type="text" name="name">
            </label>
            </div>
          <div>
          <label for="">Description:
                <input type="text" name="description">
            </label>
          </div>
          <div>
          <label for="">Price:
                <input type="text" name="price">
            </label>
          </div>
          <div>
          <label for="">Quantity:
                <input type="text" name="quantity">
            </label>
          </div>
          <div>
            <button type="submit" name="add">Add Product</button>
            <button>
                <a href="index.php">Back</a>
            </button>
          </div>
        </form>
    </div>
</body>
</html>