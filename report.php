<?php
include 'conn.php';
if(isset($_POST['btn'])){
    $date = $_POST['date'];

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>berwa shop </h1>
        <p>any shop slogan</p>
    </header>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="dashboard.php">Products</a></li>
        <li><a href="pro_in.php">product in</a></li>
        <li><a href="pro_out.php">product out</a></li>
        <li><a href="report.php">report</a></li>
    </ul>
    <form action="" method="post">
        <input type="date" name="date">
        <input type="submit" value="search" name="btn">
    </form>
</body>

</html>