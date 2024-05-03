<?php
    include 'conn.php';
    $id = $_GET['id'];
    $del = "DELETE FROM `product_in` WHERE `productcode`='$id'";
    $res = mysqli_query($db,$del);
    header('location:pro_in.php');
?>