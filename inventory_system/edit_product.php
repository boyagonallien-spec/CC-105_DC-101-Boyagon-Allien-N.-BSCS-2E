<?php include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM products WHERE product_id=$id")->fetch_assoc();
if(isset($_POST['upd'])){
    $name = $_POST['name']; $price = $_POST['price']; $qty = $_POST['qty'];
    $conn->query("UPDATE products SET product_name='$name', price='$price', stock_qty='$qty' WHERE product_id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form method="POST">
            <input type="text" name="name" value="<?= $row['product_name'] ?>">
            <input type="number" step="0.01" name="price" value="<?= $row['price'] ?>">
            <input type="number" name="qty" value="<?= $row['stock_qty'] ?>">
            <button type="submit" name="upd">Update</button>
        </form>
    </div>
</body>
</html>