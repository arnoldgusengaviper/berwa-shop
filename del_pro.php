<?php
    include 'conn.php';
    $id = $_GET['id'];
    $del = "DELETE FROM `product` WHERE `productcode`='$id'";
    $res = mysqli_query($db,$del);
    if($res){
        header('location:dashboard.php');
    }else{
        echo "<p style='color:red;' >Opps!TRY AGAIN</p>";
    }
?>