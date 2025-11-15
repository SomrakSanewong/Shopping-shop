<?php
    $server = "localhost";
    $username = "root";
    $password = "1234";
    $database = "shoppingcart";

    $conn = mysqli_connect($server ,$username ,$password , $database);
    
    if($conn) {
        
    }else{
        die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . mysqli_connect_error());
    }

?>