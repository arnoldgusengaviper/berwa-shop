<?php
include("conn.php");

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
        <h1>REGISTER</h1>
        <input type="text" name="username" id="" placeholder="name">
        <input type="password" name="password" id="" placeholder="pass">
        <input type="submit" value="register"name="okay">
        <?php
        if(isset($_POST['okay'])){
            $nm=$_POST['username'];
            $pass=$_POST['password'];
            $insert="INSERT INTO `shopkeeper`(`shopkeeper_id`, `username`, `password`) VALUES ('','$nm','$pass')";
            $qry=mysqli_query($db,$insert);
            if($qry){
                echo "done";
                header("location:log_in.php");
            }
            else{
                echo "fail";
            }

        }
        ?>
    </form>

</body>
</html>