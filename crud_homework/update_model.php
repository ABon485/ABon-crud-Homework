<?php
require_once('./database/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['image_url'])
    && !empty($_POST['age']) && !empty($_POST['email'])) {

    // Retrieve form data
    $id =$_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $img = $_POST['image_url'];

    // Perform student update (replace with appropriate logic)
    updateStudent($id,$name, $age, $email,$img);

    header('Location: index.php');
}
?>