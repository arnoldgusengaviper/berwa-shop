<?php
include 'conn.php';
session_start();
if(empty($_SESSION['username'])){
    header("location:log_in.php");
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

        <li><a href="logout.php">Log Out</a></li>
    </ul>
    <form action="" method="post">
        <h3>Record Product</h3>
        <label for="pro_name">Product Name:</label>
        <input type="text" name="pro_name" required>
        <input type="submit" value="save" name="save">
        <?php
        if (isset($_POST['save'])) {
            $pro_name = $_POST['pro_name'];
            $sql = "INSERT INTO `product`(`productcode`, `p_name`) VALUES ('','$pro_name')";
            $res = mysqli_query($db, $sql);
            if ($res) {
                echo "<p style='color:blue;' >Recorded successfully</p>";
            } else {
                echo "<p style='color:red;' >Opps!TRY AGAIN</p>";
            }
        }
        ?>
    </form>

    <table>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Action</th>
        </tr>
        <?php
        $sel = "SELECT * FROM `product`";
        $qry = mysqli_query($db, $sel);
        while ($row = mysqli_fetch_array($qry)) { ?>
            <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><a href="edit_pro.php?id=<?php echo $row[0] ?>">edit</a>|
                    <a href="del_pro.php?id=<?php echo $row[0] ?>">delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
