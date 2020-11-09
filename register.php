<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $u = $_POST['username'];
        $e = $_POST['email'];
        $p = md5($_POST['password']);
        $p1 = md5($_POST['password1']);
        $conn = mysqli_connect("localhost","root","","giuaky");
        $sql = "select * from user where username = '$u'";
        $kq = mysqli_query($conn,$sql);
        if(mysqli_num_rows($kq)>1 || $u == '' || $e == '' || $p == '' || $p1 == ''||$p != $p1){
            header("location:login.php");
        }else{
            $sql = "insert into user(username,email,password,role) values('$u','$e','$p','user')";
            $kq = mysqli_query($conn,$sql);
            header("location:login.php");
        }
    }
?>