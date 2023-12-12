<?php
/**
 * Connect to database
 */
function db() {
    $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
    $database = 'web_a'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
    $user     = 'root'; // Default username to connect to MySQL is root
    $password = ''; // Default password to connect to MySQL is empty
try {
    $db = new PDO("mysql:host=$host;dbname=$database",$user, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

/**
 * Create new student record
 */

 function createStudent($value) {
    $db = db();
    // Chuẩn bị câu lệnh SQL với các placeholder
    $stmt = $db->prepare("INSERT INTO student 
    (name, age,email, profile)
     VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $value['name']);
    $stmt->bindParam(2, $value['age']);
    $stmt->bindParam(3, $value['email']);
    $stmt->bindParam(4, $value['image_url']);
    
    // Thực thi câu lệnh đã chuẩn bị
    $stmt->execute();
    return true;
}





/**
 * Get all data from table student
 */
function selectAllStudents() {
    $db = db();
    $stmt = $db->prepare("SELECT * FROM student");
    $stmt->execute();
    return $stmt->fetchAll();
}
/**
 * Get a single record from table students by id
 */
function SelectoneStudent($id) {
    $db = db();

    $stmt = $db->prepare("SELECT * FROM student WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetchAll();

}
/**
 * Delete student by id
 */
function deleteStudentById($id) {
    $db = db();

    $stmt = $db->prepare("DELETE FROM student WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return true;
}


/**
 * Update students
 * 
 */
function updateStudent( $id,$newname,$newage,$newemail,$newprofile) {
    $db = db();

    $stmt = $db->prepare("UPDATE student SET name = ?, age = ?, email = ?,profile = ? WHERE id= ? " );

    $stmt->bindParam(1, $newname);
    $stmt->bindParam(2, $newage);
    $stmt->bindParam(3, $newemail);
    $stmt->bindParam(4, $newprofile);
    $stmt->bindParam(5,$id);
    
    if($stmt->execute()){
        return true;
    }
    return false;

}
