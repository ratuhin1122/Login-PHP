

<?php
 require_once('connection.php');


 if (!isset($_COOKIE["email"])){
    header("Location: index.php");
    exit;
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        </div>
        <nav>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">Home</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">Profile</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">Messages</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">Settings</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200">Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Welcome, <?php if(isset($_COOKIE['email'])){
                    $email = $_COOKIE['email'];
                    $sql = "SELECT * FROM users WHERE email = :email";
                    $result = $conn->prepare($sql);
                    $result->bindParam(':email', $email);
                    $result->execute();
                    $user = $result->fetch(PDO::FETCH_ASSOC);
                    if(!$user){
                        header("Location: index.php");
                        exit;
                    }
                    echo $user['name'];
                
                } ?></h2>
            </div>
            <div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"><a href="logout.php">Log Out</a></button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"><a href="delete.php">Delete Account</a></button>
            </div>
        </header>

        <!-- Content -->
        <main class="p-6 flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Card Title 1</h3>
                    <p class="text-gray-600">Some quick example text to build on the card title.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Card Title 2</h3>
                    <p class="text-gray-600">Some quick example text to build on the card title.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Card Title 3</h3>
                    <p class="text-gray-600">Some quick example text to build on the card title.</p>
                </div>
            </div>
        </main>
    </div>


</body>
</html>
