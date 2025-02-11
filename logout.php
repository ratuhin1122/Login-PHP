<?php
if(isset($_COOKIE['email'])){
    setcookie("email", "", time() - 3600); // Deletes the "username" cookie by setting its expiry to one hour ago [1, 2, 3].
    //  echo($_COOKIE);
     header('location: index.php');
}

?>
