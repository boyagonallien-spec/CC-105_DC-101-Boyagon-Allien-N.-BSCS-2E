<?php include 'db.php';
$id = $_GET['id'];
$p = $conn->query("SELECT * FROM products WHERE product_id=$id")->fetch_assoc();
if(isset($_POST['sell'])){
    $qty = $_POST['q'];
    if($qty <= $p['stock_qty']){
        $total = $qty * $p['price'];
        $conn->query("INSERT INTO sales (product_id, qty_sold, total_price) VALUES ($id, $qty, $total)");
        $conn->query("UPDATE products SET stock_qty = stock_qty - $qty WHERE product_id=$id");
        header("Location: sales.php");
    } else { echo "<script>alert('No Stock!');</script>"; }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>Sell <?= $p['product_name'] ?></h2>
        <form method="POST">
            <input type="number" name="q" placeholder="Qty to Sell" required>
            <button type="submit" name="sell">Confirm Sale</button>
        </form>
    </div>
</body>
</html>