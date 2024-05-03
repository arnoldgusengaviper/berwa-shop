<?php
include 'conn.php';
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
        <li><a href="#pro">Products</a></li>
        <li><a href="#pro_in">product in</a></li>
        <li><a href="#pro_out">product out</a></li>
    </ul>
    <form action="" method="post">
        <?php
        $id = $_GET['id'];
        $sel  = "SELECT * FROM `product` WHERE `productcode` ='$id'";
        $res = mysqli_query($db,$sel);
        $row = mysqli_fetch_array($res);
        ?>
        <h3>Update Product</h3>
        <label for="pro_name">Product Name:</label>
        <input type="text" value="<?php echo $row[1]?>" name="pro_name" required>
        <input type="submit" value="Update" name="save">
        <?php
        if (isset($_POST['save'])) {
            $pro_name = $_POST['pro_name'];
            $sql = "UPDATE `product` SET `p_name`='$pro_name' WHERE `productcode` = '$id'";
            $res = mysqli_query($db, $sql);
            if ($res) {
                header('location:dashboard.php');
            } else {
                echo "<p style='color:red;' >Opps!TRY AGAIN</p>";
            }
        }
        ?>
    </form>

    
</body>

</html>