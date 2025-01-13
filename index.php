
<?php
$difference = null;
if (isset($_POST['calculate']) && !empty($_POST['birthday'])) {
    $birthdate = new DateTime(date("Y-m-d", strtotime($_POST['birthday'])));
    $currentdate = new DateTime(date("Y-m-d"));

    $difference = date_diff($birthdate, $currentdate);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Birth-Date || Calculator</title>
    <!-- Matcha CSS Link -->
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css" />
</head>
<body>
    <h1 style="margin-top: 100px; margin-bottom: 50px; display: flex; align-items: center; justify-content: center;"> Birth-Date Calculator  </h1>
    <form style="max-width: 300px;" action="" method="post">
    <input type="date"  name="birthday" ><br><br>
    <p style="color: aqua;">
    <?php
    if ($difference) {
        printf("Your Age is %d years %d months %d days", $difference->y, $difference->m, $difference->d);
        header("Refresh:5");
    } 
    ?>
</p>
    <input type="submit" value="CALCULATE" name="calculate">
    </form>


    
    
</body>
</html>