<?php
include('connect.php');

$user_type = $_GET['user_type'];  // Nhận tham số 'user_type' từ URL

// Truy vấn lọc tài khoản theo user_type (admin hoặc user)
$sql = "SELECT * FROM user_form WHERE user_type = '$user_type'";
$result = $conn->query($sql);

// Kiểm tra và trả về kết quả dưới dạng JSON
$accounts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
}
echo json_encode($accounts);

$conn->close();
?>