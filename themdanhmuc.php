<?php
    if(isset($_GET['tendanhmuc'])){
        $tdm = $_GET['tendanhmuc'];
        $img = $_GET['images'];
        $conn = mysqli_connect("localhost","root","","giuaky");
        $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES('$tdm')";
        $ketqua = mysqli_query($conn , $sql);
        
    }
?>
<html>
    <body>
        <?php include('addmin.php');?>
        <h1>Thêm Hãng Điện Thoại</h1>
        <form action="themdanhmuc.php" method="GET">
            Nhãn Thương Hiệu: <input type="text" name="images">
            Tên Hãng: <input type="text" name="tendanhmuc">
            <input type="submit" value="Thêm Danh Mục">
        </form>
    </body>
</html>