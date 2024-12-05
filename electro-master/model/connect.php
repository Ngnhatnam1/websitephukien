<?php
  
        $servername = "auth-db1637.hstgr.io";
        $username = "u773112933_admin";
        $password = "Loivanam123";
        $dbname = "u773112933_db_phukien";

        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
        }
        else{
            echo "kết nối thành công";
        }
        // $sql = "SELECT * FROM `Category`";
        // $result = $conn->query($sql);
    
        // if ($result->num_rows > 0) {
        //     print_r($result->fetch_assoc());
        // } else {
        //     echo "0 results";
        // }
        // $conn->close();
 
?>

