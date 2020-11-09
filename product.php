<?php
    $pg = 0;
    include('include/header.php');
?>
        
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <?php
                                    $iddanhmuc = $_GET['iddanhmuc'];
                                    $id = $_GET['id'];
                                    $conn =mysqli_connect("localhost","root","","giuaky");
                                    $sql = "select * from danhmuc where id=".$iddanhmuc;
                                    $sql1 = "select * from hanghoa where id=".$id;
                                    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                                    $row1 = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
                                    $iddanhmuc1 = $row1['iddanhmuc'];
                                    $idhanghoa = $row1['id'];
                                    $dg = $row1['dongia'];
                                    $th = $row1['tenhang'];
                                    $mt = $row1['motasp'];
                                    $im = $row1['images'];
                                    $im2 = $row1['images2'];
                                    $im3 = $row1['images3'];
                                    $im4 = $row1['images4'];
                                    echo '<li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="shop.php?iddanhmuc='.$row['id'].'">'.$row['tendanhmuc'].'</a></li>
                                    <li class="breadcrumb-item active"><a href="#">'.$row1['tenhang'].'</a></li>';    
                                ?>
                                <?php
                                    if(isset($_SESSION['role'])){
                                        if($_SESSION['role'] == 'admin'){
                                            echo '<a style="position:relative;right:-430px" class="dell" href="update.php?id='.$idhanghoa.'"><i class="fas fa-wrench" style="font-size:36px"></i></a>'; 
                                            echo '<a style="position:relative;right:-460px" class="dell" href="xoahanghoa.php?id='.$idhanghoa.'"><i class="fas fa-trash" style="font-size:36px"></i></a>'; 
                                        }
                                    }
                                    
                                        
                                ?>
                                
                            </ol>
                        </nav>
                    </div>
                </div>


                <?php
                        echo '<div class="row">
                        <div class="col-12 col-lg-7">
                            <div class="single_product_thumb">
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/'.$im.');">
                                        </li>
                                        <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/'.$im2.');">
                                        </li>
                                        <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/'.$im3.');">
                                        </li>
                                        <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/'.$im4.');">
                                        </li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a class="gallery_img" href="img/product-img/'.$im.'">
                                                <img style="width:498px;height:564px;" class="d-block w-100" src="img/product-img/'.$im.'" alt="First slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="img/product-img/'.$im2.'">
                                                <img style="width:498px;height:564px;" class="d-block w-100" src="img/product-img/'.$im2.'" alt="Second slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="img/product-img/'.$im3.'">
                                                <img style="width:498px;height:564px;" class="d-block w-100" src="img/product-img/'.$im3.'" alt="Third slide">
                                            </a>
                                        </div>
                                        <div class="carousel-item">
                                            <a class="gallery_img" href="img/product-img/'.$im4.'">
                                                <img style="width:498px;height:564px;" class="d-block w-100" src="img/product-img/'.$im4.'" alt="Fourth slide">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="single_product_desc">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">$'.$dg.'</p>
                                    <a href="product-details.html">
                                        <h6>'.$th.'</h6>
                                    </a>
                                    <!-- Ratings & Review -->
                                    <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="review">
                                            <a href="#">Write A Review</a>
                                        </div>
                                    </div>
                                    <!-- Avaiable -->
                                    <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                                </div>

                                <div class="short_overview my-5">
                                    <p>'.$mt.'</p>
                                </div>

                                <!-- Add to Cart Form -->
                                <form class="cart clearfix" action="" method="POST">
                                    
                                    <button type="submit" name="addtocart" class="btn amado-btn">Add to cart</button>
                                </form>

                            </div>
                        </div>
                    </div>';
                    
                    
                ?>
                <?php 
                    if(isset($_POST['addtocart'])){
                        if(isset($_SESSION['cart'][$id])){
                            $_SESSION['cart'][$id] = $_SESSION['cart'][$id] + 1;
                        }
                        else{
                            $_SESSION['cart'][$id] = 1;
                        }
                        echo '<script>document.location="cart.php?id='.$id.'"</script>';
                        
                    }
                ?>
                <?php
                    if(isset($_POST['cmt'])){
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $ngaygio = date("l. d, m, Y").' at '.date("H:i"); 
                        $chat = $_POST['post_content'];
                        $user = $_SESSION['name'];
                        if($user != ''){
                            if($chat!=''){
                                $sql = "insert into binhluan(user,binhluan,ngaygio,idhanghoa) values('$user','$chat','$ngaygio',$idhanghoa) ";
                                $kq = mysqli_query($conn,$sql);
                            }
                        }
                        
                        
                        echo '<script> document.location="product.php?id='.$idhanghoa.'&iddanhmuc='.$iddanhmuc1.'"</script>';
                    }
                ?>
                
                <div class="comment-form-wrap pt-5">
                    <form action="" method="post" class="p-4 p-md-5 bg-light">
                      <div class="form-group" style="margin-left: -40px;">
                        <label for="message">Message</label>
                        
                        <!-- <input type="text" name="chat"> -->
                        <textarea name="post_content" id="post_content" style="width:620px;" rows="5" class="form-control a2a" require></textarea>
                      </div>
                      <div class="form-group" style="margin-left: -40px;">
                        <input type="submit" name="cmt" value="Post Comment" class="btn py-3 px-4 btn-primary a3a">
                      </div>
      
                    </form>
                  </div>


                  <div class="pt-5 mt-5">
                    <h3 class="mb-5 h4 font-weight-bold p-4 bg-light" style="margin-left: -20px;">
                        <?php 
                            // $dembl = mysqli_num_rows(mysqli_query($conn,"select count(idbinhluan) from binhluan"));
                            // echo $dembl;
                        ?>
                         Feedbacks</h3>
                    <ul class="comment-list">
                      <li class="comment">
                        <div class="comment-body">
                        <?php
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }
                            else{
                                $page = 1;
                            }
                            $limit = 5;
                            $start = ($page - 1)*$limit;
                            $sql = "select * from binhluan where idhanghoa=$idhanghoa limit $start,$limit ";
                            $kq = mysqli_query($conn,$sql);
                            $total = ceil(mysqli_num_rows(mysqli_query($conn,"select * from binhluan where idhanghoa = $idhanghoa"))/$limit);
                            $list = '';
                            for($i = 1;$i<=$total;$i++){
                                if($page == $i){
                                    $list.='<li class="page-item active"><a class="page-link" href="product.php?id='.$idhanghoa.'&iddanhmuc='.$iddanhmuc1.'&page='.$i.'">'.$i.'</a></li>';
                                }else{
                                    $list.='<li class="page-item"><a class="page-link" href="product.php?id='.$idhanghoa.'&iddanhmuc='.$iddanhmuc1.'&page='.$i.'">'.$i.'</a></li>';
                                }
                            }
                            while($row = mysqli_fetch_assoc($kq)){
                                echo '<h4 style="color:#fbb710;text-transform: capitalize;">'.$row['user'].'</h3>
                                <div class="meta mb-2">'.$row['ngaygio'].'</div>
                                <p>'.$row['binhluan'].'</p><p><a class="dell" href="#" class="reply">Reply</a></p>';
                            }
                            
                        ?>
                          
                          
                        </div>
                      </li>
                    </ul>
                    
                    <div class="row">
                        <div class="col-12" style="margin-left: -800px;">
                            <!-- Pagination -->
                            <nav aria-label="navigation">
                                <ul class="pagination justify-content-end mt-50">
                                    <?php echo $list;?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                  </div>
            </div>
        </div>
        
        <!-- Product Details Area End -->
    </div>
    <!-- <script>
        function add(id){
            num = $("#num").val();
            $.post('adcart.php' ,{'id': id,'num':num},function(data){

            });
        }
    </script> -->
    <!-- ##### Main Content Wrapper End ##### -->
    <script>
    // Thay thế <textarea id="post_content"> với CKEditor
    CKEDITOR.replace( 'post_content' );// tham số là biến name của textarea
</script>
    <?php
        include('include/footer.php');
    ?>