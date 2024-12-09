<?php
@include 'model/connect.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];


    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] ='Người dùng đã tồn tại';

    }
    else
    {
        if($pass != $cpass){
            $error[] ='Mật khẩu xác nhận không khớp!'; 
        }
        else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass',
            '$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
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
            <h3>Đăng ký</h3>

            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>

            <input type="text" name="name" required placeholder="Nhập tên bạn">
            <input type="email" name="email" required placeholder="Nhập email bạn">
            <input type="password" name="password" required placeholder="Nhập pass">
            <input type="password" name="cpassword" required placeholder="Xác nhận mật khẩu">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Đăng ký ngay" class="form-btn">
            <p>Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
        </form>
    </div>






























    <!-- JS cho Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- JS thông thường -->
<script src="js/js.js">
    
</script>
</body>
</html>