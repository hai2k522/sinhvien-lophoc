<?php
$host = "localhost";  // Hoặc IP của máy chủ
$user = "root";       // Tên người dùng MySQL (mặc định là root)
$password = "";       // Mật khẩu MySQL (mặc định là rỗng)
$database = "74dcht21_qlthuvien"; // Thay bằng tên cơ sở dữ liệu của bạn

// Kết nối đến cơ sở dữ liệu
$con = mysqli_connect($host, $user, $password, $database);

// Kiểm tra kết nối
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
