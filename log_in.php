<?php
include("conn.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h1>LOGIN</h1>
        <input type="text" name="username" id="" placeholder="name">
        <input type="password" name="password" id="" placeholder="pass">
        <input type="submit" value="login"name="okay">
        <?php
        if(isset($_POST['okay'])){
            $nm=$_POST['username'];
            $pass=$_POST['password'];
            $insert="SELECT * FROM `shopkeeper` WHERE `username`='$nm'AND`password`='$pass'";
            $qry=mysqli_query($db,$insert);
            if($qry){
                $row=mysqli_fetch_assoc($qry);
                $_SESSION['username']=$row['username'];
                header("location:dashboard.php");
            }
            else{
                echo "fail";
            }

        }
        ?>
    </form>

</body>
</html>