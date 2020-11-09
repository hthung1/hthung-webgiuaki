<?php
    $pg=7;
    include('include/header.php');
 ?>
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
<?php
    if(isset($_GET['search']))
        $se = $_GET['search'];
        $conn = mysqli_connect("localhost","root","","giuaky");
        $sql = "select * from hanghoa where tenhang like '%$se%'";
        $sql1 = "select * from hanghoa where dongia like '%$se%'";
        $kq = mysqli_query($conn,$sql);
        $kq1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($kq)>0){
            while($row = mysqli_fetch_assoc($kq)){
                echo '<div class="single-products-catagory clearfix">
                        <a href="product.php?id='.$row['id'].'&iddanhmuc='.$row['iddanhmuc'].'">
                            <img style="width:423px;height:437px;" src="img/product-img/'.$row['images'].'" >
                            
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>From $'.$row['dongia'].'</p>
                                <h4>'.$row['tenhang'].'</h4>
                            </div>
                        </a>
                    </div>';
            }
            
        }
        if(mysqli_num_rows($kq1)>0){
            while($row1 = mysqli_fetch_assoc($kq1)){
                echo '<div class="single-products-catagory clearfix">
                        <a href="product.php?id='.$row1['id'].'&iddanhmuc='.$row1['iddanhmuc'].'">
                            <img style="width:423px;height:437px;" src="img/product-img/'.$row1['images'].'" >
                            
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>From $'.$row1['dongia'].'</p>
                                <h4>'.$row1['tenhang'].'</h4>
                            </div>
                        </a>
                    </div>';
            }
            
        }
?>
        </div>
    </div>
<?php include('include/footer.php');?>