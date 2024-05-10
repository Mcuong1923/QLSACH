<?php
require 'db.php'; // Sử dụng kết nối đã được thiết lập trong db.php
session_start(); // Tiếp tục session

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    exit();
}

// Truy vấn lấy 5 sách từ database
$query = "SELECT TenSach, SoLuong FROM Sach LIMIT 5";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sách</title>
</head>
<body>
    <h2>Danh Sách Sách</h2>
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><?php echo htmlspecialchars($row['TenSach']) . " - Số lượng: " . htmlspecialchars($row['SoLuong']); ?></li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Không có sách nào.</p>
    <?php endif; ?>
</body>
</html>
