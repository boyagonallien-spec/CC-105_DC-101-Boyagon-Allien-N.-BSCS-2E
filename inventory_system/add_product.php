<?php include 'db.php';
if(isset($_POST['add'])){
    $name = $_POST['name']; $price = $_POST['price']; $qty = $_POST['qty'];
    $conn->query("INSERT INTO products (product_name, price, stock_qty) VALUES ('$name', '$price', '$qty')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>Add Product</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="number" name="qty" placeholder="Stock" required>
            <button type="submit" name="add">Save Product</button>
        </form>
    </div>
</body>
</html>