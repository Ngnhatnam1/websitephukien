
<?php
include('model/connect.php');



// Truy vấn lấy thông tin về các tài khoản đã tạo
$user_sql = "SELECT * FROM user_form";
$user_result = $conn->query($user_sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Admin</title>
    <style>
         body{
            background-color: #FFCCE1;
         }
    </style>
    <!-- Thư viện Swiper, dùng cho các tính năng dạng trượt cho mượt hơn (áp dụng cho CSS và JS)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- dùng font awesome thông qua link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/js.js" defer></script>
</head>
<body>
    <div class="wrapper">
        <!-- Thanh sidebar -->
        <div class="sidebar" id="sidebar">
            <button class="close-btn" onclick="toggleSidebar()">X</button>
            <h3>Quản lý</h3>
            <ul>
                <li><a href="#" id="tour-list-link" onclick=""></a></li>
                    <!-- <div id="tour-info" style="display: none;"> -->
                    <!-- Bảng thông tin tour sẽ được chèn vào đây khi dữ liệu được tải về -->
                    
                
                <!-- Tạo dropdown cho tài khoản đã tạo -->
                <li class="dropdown">
                    <a href="#">Tài khoản đã tạo</a>
                    <div class="dropdown-content">
                        <a href="#" onclick="filterAccounts('admin')">Admin</a>
                        <a href="#" onclick="filterAccounts('user')">User</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Nội dung chính -->
        <div class="content">
            <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
            <h1>Giao diện Admin</h1>
            
            <!-- Hiển thị thông tin tài khoản -->
            <div id="account-details" style="display:none;">
                <h4>Danh sách Tài Khoản:</h4>
                <div id="account-info">
                    <!-- Dữ liệu tài khoản sẽ được hiển thị ở đây -->
                </div>
            </div>
        </div>
    </div>
</body>


<!-- Nút Log out -->
<a href="login.php">
    <button class="logout-btn">Log out</button>
</a>
</html>

<?php
// Đóng kết nối sau khi truy vấn xong
$conn->close();
?>



