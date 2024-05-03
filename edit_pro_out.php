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
        <li><a href="dashboard.php">Products</a></li>
        <li><a href="pro_in.php">product in</a></li>
        <li><a href="pro_out.php">product out</a></li>
    </ul>
    <form action="" method="post">
        <?php
        $id = $_GET['id'];
        $sele = "SELECT * FROM `product_out` WHERE `productcode` ='$id'";
        $result = mysqli_query($db,$sele);
        $ro = mysqli_fetch_array($result);
        ?>
        <h3>Update Product out</h3>
        <select name="pro_id" id="">
            <option value="">Select product</option>
            <?php
            $sel = "SELECT * FROM `product`";
            $res = mysqli_query($db, $sel);
            while ($row = mysqli_fetch_array($res)) { ?>
                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php
            }
            ?>
        </select>
        <label for="date">Date</label>
        <input type="date" value="<?php echo $ro[1] ?>" name="date" id="">
        <label for="">Quantity</label>
        <input type="number" value="<?php echo $ro[2] ?>" name="quantity" id="">
        <label for="">Unity Price</label>
        <input type="number" value="<?php echo $ro[3] ?>" name="price" id="">
        <input type="submit" value="update" name="save">
        <?php
        if (isset($_POST['save'])) {
            $pro_id = $_POST['pro_id'];
            $date = $_POST['date'];
            $qua = $_POST['quantity'];
            $u_price = $_POST['price'];
            $t_price = $qua * $u_price;

            $sql = "UPDATE `product_out` SET `productcode`='$pro_id',`date`='$date',`quantity`='$qua',`uniqueprice`='$u_price',`total_price`='$t_price' WHERE `productcode` = '$id'";
            $qry = mysqli_query($db, $sql);
            if ($qry) {
                header('location:pro_out.php');
            } else {
                echo "<p style='color:red;'>Ops! TRY AGAIN...</p>";
            }
        }
        ?>
    </form>

</body>

</html>