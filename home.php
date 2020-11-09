<?php
    $pg=1;
    include("include/header.php");
?>

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
                <?php 
                    $conn = mysqli_connect("localhost","root","","giuaky");
                    $sql = "SELECT * FROM hanghoa order by rand() limit 9";
                    $kq = mysqli_query($conn,$sql);  
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
                ?>
                
            </div>
        </div>
        <!-- Product Catagories Area End -->
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php
        include("include/footer.php");
    ?>