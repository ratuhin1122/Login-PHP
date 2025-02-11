<?php
include 'connection.php';
// var_dump($_COOKIE);
if(isset($_COOKIE)){
    $email = $_COOKIE['email'];
    $sql = "DELETE  FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    if($stmt->execute()){
        setcookie('email', '', time() - 3600);
        header('Location: register.php');
    }
    $conn = null;

}

?>