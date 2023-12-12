<?php

// Kết nối đến cơ sở dữ liệu
require_once('./database/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sinh viên dựa trên id
    deleteStudentById($id);
    header('Location: index.php');
    exit();
}

header('Location: index.php');
exit();
?>