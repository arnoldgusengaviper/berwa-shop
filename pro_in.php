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
        <li><a href="report.php">report</a></li>

    </ul>
    <form action="" method="post">
        <h3>Record Product in</h3>
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
        <input type="date" name="date" id="">
        <label for="">Quantity</label>
        <input type="number" name="quantity" id="">
        <label for="">Unity Price</label>
        <input type="number" name="price" id="">
        <input type="submit" value="save" name="save">
        <?php
        if (isset($_POST['save'])) {
            $pro_id = $_POST['pro_id'];
            $date = $_POST['date'];
            $qua = $_POST['quantity'];
            $u_price = $_POST['price'];
            $t_price = $qua * $u_price;

            $sql = "INSERT INTO `product_in`(`productcode`, `date`, `quantity`, `uniqueprice`, `totalprice`) VALUES ('$pro_id','$date','$qua','$u_price','$t_price')";
            $qry = mysqli_query($db, $sql);
            if ($qry) {
                echo "<p style='color:blue;'>Recorded succesfully</p>";
            } else {
                echo "<p style='color:red;'>Ops! TRY AGAIN...</p>";
            }
        }
        ?>
    </form>

    <table>
        <tr>
            <td>Product Id</td>
            <td>Product Name</td>
            <td>date</td>
            <td>quantity</td>
            <td>Unity price</td>
            <td>Total price</td>
            <td>Action</td>
        </tr>
        <?php
        $sel = "SELECT * FROM product_in NATURAL join product ";
        $res = mysqli_query($db, $sel);
        while ($row = mysqli_fetch_array($res)) { ?>
            <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[5] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[2] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><?php echo $row[4] ?></td>
                <td><a href="edit_pro_in.php?id=<?php echo $row[0] ?>">edit</a>|
                    <a href="del_pro_in.php?id=<?php echo $row[0] ?>">delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>