<?php include 'db.php';
if(isset($_POST['reg'])){
    $u = $_POST['u']; $p = $_POST['p'];
    $conn->query("INSERT INTO users (username, password) VALUES ('$u', '$p')");
    header("Location: user.php");
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>New User</h2>
        <form method="POST">
            <input type="text" name="u" placeholder="Username" required>
            <input type="password" name="p" placeholder="Password" required>
            <button type="submit" name="reg">Create User</button>
        </form>
    </div>
</body>
</html>