<?php
require 'db.php';
session_start(); // Bắt đầu session

// Kết nối tới database
// $mysqli = new mysqli('mysql-17f72f2a-nvancuong792.l.aivencloud.com', 'avnadmin', 'AVNS_TsuvVXHushW9LQ0hdqo', 'defaultdb','13805');

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $query = "SELECT * FROM User WHERE TenUser = '$username' AND MatKhau = '$password'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['user'] = $username; // Lưu tên người dùng vào session
        header('Location: Sach.php'); // Chuyển đến trang Sach.php
    } else {
        $error = 'Invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
