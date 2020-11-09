<?php
    $conn = mysqli_connect("localhost","root","","giuaky");
    $sql = "delete from danhmuc where id = ".$_GET['id'];
    mysqli_query($conn,$sql);
    header('location:shop.php?iddanhmuc=1');
?>