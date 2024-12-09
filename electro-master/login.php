<?php
session_start();
@include 'model/connect.php';

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);


    $select = " SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' "; //lấy email và pass từ db 
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
     
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin.php');           //Chuyển đến php admin nếu user_type truy cập là loại Admin
        }

        elseif ($row['user_type'] == 'user'){
            $_SESSION['user_name'] = $row['name'];
            header('location:#.php');            //Chuyển đến php index nếu user_type truy cập là loại user
        }

        else{
            $error[] = 'Thông tin bị sai sót!';
        }
    
    }
    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));  // In ra lỗi nếu câu lệnh SQL không thành công
    }



};



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện Login / Register </title>

    <!-- Thư viện Swiper, dùng cho các tính năng dạng trượt cho mượt hơn (áp dụng cho CSS và JS)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- dùng font awesome thông qua link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="form-container">
        <form action="" method="post">
            <h3>Đăng nhập</h3>

            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>
          
            
            <input type="email" name="email" required placeholder="Nhập email bạn">
            <input type="password" name="password" required placeholder="Nhập pass">
            <input type="submit" name="submit" value="Đăng nhập ngay" class="form-btn">
            <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
        </form>
    </div>






























    <!-- JS cho Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- JS thông thường -->
<script src="js/js.js">
    
</script>
</body>
</html>