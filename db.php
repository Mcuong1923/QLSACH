<?php
$host = 'mysql-17f72f2a-nvancuong792.l.aivencloud.com';
$db = 'defaultdb';
$user = 'avnadmin';
$pass = 'AVNS_TsuvVXHushW9LQ0hdqo';
$port = 13805;
$ssl_ca = 'C:/Users/Admin/Downloads/ca.pem'; // Đường dẫn đến CA certificate

$mysqli = new mysqli();
$mysqli->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);
$mysqli->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

if (!$mysqli->real_connect($host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

echo 'Success... ' . $mysqli->host_info . "\n";
?>
