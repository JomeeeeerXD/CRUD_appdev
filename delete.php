<?php
require_once "database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM products where id = :id");
    $stmt->execute([':id'=>$id]);

    if ($stmt->rowCount()){
        header("Location: index.php?delete_success=true");  
    } else {
        header("Location: index.php?delete_error=true");
    }
}
?>