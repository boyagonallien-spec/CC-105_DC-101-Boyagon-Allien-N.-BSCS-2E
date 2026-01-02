<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <nav class="navbar"><a href="index.php">Inventory</a><a href="sales.php">Sales</a><a href="user.php">Users</a></nav>
    <div class="container">
        <h2>Inventory Stock</h2>
        <a href="add_product.php" class="btn-add">+ Add New Product</a>
        <table>
            <tr><th>Product</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
            <?php 
            $res = $conn->query("SELECT * FROM products ORDER BY product_id DESC");
            while($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $row['product_name'] ?></td>
                <td>$<?= number_format($row['price'], 2) ?></td>
                <td style="color: <?= ($row['stock_qty'] < 5) ? 'red' : 'green' ?>;"><b><?= $row['stock_qty'] ?></b></td>
                <td>
                    <a href="sell_product.php?id=<?= $row['product_id'] ?>" style="color:green;">Sell</a> |
                    <a href="edit_product.php?id=<?= $row['product_id'] ?>" style="color:blue;">Edit</a> |
                    <a href="delete_product.php?id=<?= $row['product_id'] ?>" style="color:red;" onclick="return confirm('Delete item?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>