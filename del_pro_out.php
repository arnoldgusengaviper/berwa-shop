<?php
    include 'conn.php';
    $id = $_GET['id'];
    $del = "DELETE FROM `product_out` WHERE `productcode`='$id'";
    $res = mysqli_query($db,$del);
    header('location:pro_out.php');
?>