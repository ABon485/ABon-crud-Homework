<?php

// Kết nối đến cơ sở dữ liệu
require_once('./database/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['image_url'])
    && !empty($_POST['age']) && !empty($_POST['email'])) {
    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $img = $_POST['image_url'];
    

    // Gọi hàm createStudent để thêm sinh viên mới
    createStudent($_POST);
    header('Location: index.php');
    exit();
}

header('Location: index.php');
exit();
?>
