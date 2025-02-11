
<?php
 require_once('connection.php');
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT email, password FROM users WHERE email = :email";
    $result = $conn->prepare($sql);
    $result->bindParam(':email', $email);
    $result->execute();
    $user = $result->fetch(PDO::FETCH_ASSOC);


    if ($user && password_verify($password, $hashed_password)) {
        setcookie("email", $email, time() + 2 * 24 * 60 * 60); 
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
        <form action="login.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-600">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-600">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Login</button>
        </form>
        <p class="mt-4 text-center">Don't have an account? <a href="register.php" class="text-blue-500">Register</a></p>
    </div>
</body>
</html>
