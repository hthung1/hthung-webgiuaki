<?php
    $conn = mysqli_connect("localhost","root","","giuaky");
    $sql = "delete from hanghoa where id = ".$_GET['id'];
    mysqli_query($conn,$sql);
?>