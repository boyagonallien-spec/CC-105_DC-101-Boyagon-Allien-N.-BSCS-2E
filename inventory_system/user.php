<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <nav class="navbar"><a href="index.php">Inventory</a><a href="sales.php">Sales</a><a href="user.php">Users</a></nav>
    <div class="container">
        <h2>System Users</h2>
        <a href="add_user.php" class="btn-add">+ Register User</a>
        <table>
            <tr><th>ID</th><th>Username</th><th>Action</th></tr>
            <?php 
            $res = $conn->query("SELECT * FROM users ORDER BY user_id DESC");
            while($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><a href="delete_user.php?id=<?= $row['user_id'] ?>" style="color:red;">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>