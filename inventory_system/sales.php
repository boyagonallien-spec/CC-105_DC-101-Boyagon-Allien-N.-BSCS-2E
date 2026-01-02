<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <nav class="navbar"><a href="index.php">Inventory</a><a href="sales.php">Sales</a><a href="user.php">Users</a></nav>
    <div class="container">
        <h2>Sales History</h2>
        <table>
            <tr><th>Date</th><th>Product</th><th>Total</th><th>Action</th></tr>
            <?php 
            $res = $conn->query("SELECT s.*, p.product_name FROM sales s JOIN products p ON s.product_id = p.product_id ORDER BY s.sale_date DESC");
            while($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $row['sale_date'] ?></td>
                <td><?= $row['product_name'] ?></td>
                <td>$<?= number_format($row['total_price'], 2) ?></td>
                <td><a href="delete_sale.php?id=<?= $row['sale_id'] ?>" style="color:red;">Remove</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>