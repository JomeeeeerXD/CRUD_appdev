<?php
require_once "database.php";

$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>My Products</h1>
    <a href="create.php">Add Product</a>
    <table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>   
        </thead>
        <tbody>
            <?php foreach($result as $data): ?>
            <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['description'];?></td>
                <td><?php echo $data['price'];?></td>
                <td><?php echo $data['quantity'];?></td>
                <td><?php echo $data['created_at'];?></td>
                <td><?php echo $data['updated_at'];?></td>
                <td>
                    <button><a href="update.php?id=<?php echo $data['id']; ?>">Update</a></button>
                    <button><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>