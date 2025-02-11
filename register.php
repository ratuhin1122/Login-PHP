<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check password length
    $passlength = 8;
    if (strlen($password) < $passlength) {
        echo "Password must be at least 8 characters long.";
        exit(); 
    }

    // Check validate email
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (!preg_match($pattern, $email)) {
        echo "The email address '$email' is considered invalid.";
        exit(); 
    }

    // Hash the password after validation
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
  
    $result = $conn->prepare($sql);
    $result->bindParam(':name', $name);
    $result->bindParam(':email', $email);
    $result->bindParam(':password', $password);
   
    if($result->execute()){
        header("Location: login.php");  
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
        <form action="register.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-600">Username</label>
                <input type="text" name="name" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-600">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-600">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded-lg" required>
            </div>
            <button type="submit" name="submit" class="w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">Register</button>
        </form>
        <p class="mt-4 text-center">Already have an account? <a href="login.php" class="text-blue-500">Login</a></p>
    </div>
</body>
</html>
