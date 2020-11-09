<?php $pg=2;include('include/header.php');?>

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                    <?php
                        $conn = mysqli_connect("localhost","root","","giuaky");
                        $sql = "select * from danhmuc";
                        $kq = mysqli_query($conn,$sql);
                        $rows = mysqli_num_rows($kq);
                        while($row = mysqli_fetch_assoc($kq)){
                            echo '<li><a href="shop.php?iddanhmuc='.$row['id'].'">'.$row["tendanhmuc"].'</a>';
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role']=='admin'){
                                echo '<a style="margin-top:-55px;margin-left:120px" class="dell" href="upda.php?id='.$row['id'].'"><i class="fas fa-pencil-alt" style='.'font-size:17px'.'></i></a>
                                    <a style="margin-top:-55px;margin-left:143px"class="dell" href="dele.php?id='.$row['id'].'" ><i class="fa fa-trash" style="font-size:17px"></i></a></li>';
                                }
                            }
                        }
                        ?>
                    
                    </ul>
                </div>
            </div>

<!-- ##### Single Widget ##### -->
<!-- <div class="widget brands mb-50">
    Widget Title
    <h6 class="widget-title mb-30">Brands</h6>

    <div class="widget-desc">
        Single Form Check
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="amado">
            <label class="form-check-label" for="amado">Amado</label>
        </div>
        Single Form Check
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="ikea">
            <label class="form-check-label" for="ikea">Ikea</label>
        </div>
        Single Form Check
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="furniture">
            <label class="form-check-label" for="furniture">Furniture Inc</label>
        </div> -->
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="factory">
            <label class="form-check-label" for="factory">The factory</label>
        </div> -->
        <!-- Single Form Check -->
        <!-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="artdeco">
            <label class="form-check-label" for="artdeco">Artdeco</label>
        </div>
    </div>
</div> -->



<!-- ##### Single Widget ##### -->
<!-- <div class="widget color mb-50"> -->
    <!-- Widget Title -->
    <!-- <h6 class="widget-title mb-30">Color</h6>

    <div class="widget-desc">
        <ul class="d-flex">
            <li><a href="#" class="color1"></a></li>
            <li><a href="#" class="color2"></a></li>
            <li><a href="#" class="color3"></a></li>
            <li><a href="#" class="color4"></a></li>
            <li><a href="#" class="color5"></a></li>
            <li><a href="#" class="color6"></a></li>
            <li><a href="#" class="color7"></a></li>
            <li><a href="#" class="color8"></a></li>
        </ul>
    </div>
</div> -->



<!-- ##### Single Widget ##### -->
<!-- <div class="widget price mb-50"> -->
    <!-- Widget Title -->
    <!-- <h6 class="widget-title mb-30">Price</h6>

    <div class="widget-desc">
        <div class="slider-range">
            <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            </div>
            <div class="range-price">$10 - $1000</div>
        </div>
    </div>
</div> -->


        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <!-- <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort by</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Date</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Popular</option>
                                        </select>
                                    </form>
                                </div> -->
                                <div class="view-product d-flex align-items-center">
                                    <p>View</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">4</option>
                                            <option value="value">8</option>
                                            <option value="value">16</option>
                                            <option value="value">20</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <?php
                    $iddanhmuc = $_GET['iddanhmuc'];
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = 1;
                    }
                    $limit = 4;
                    $start = ($page -1)* $limit;
                    $conn = mysqli_connect("localhost","root","","giuaky");
                    $sql = "SELECT * FROM hanghoa WHERE iddanhmuc=$iddanhmuc limit $start,$limit";
                    $kq = mysqli_query($conn,$sql);  
                    $total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM hanghoa where iddanhmuc = $iddanhmuc"));
                    $rows = ceil($total/$limit);
                    $list = '';
                    for($i = 1;$i<=$rows;$i++){
                        if($page == $i){
                            $list.= '<li class="page-item active"><a class="page-link" href="shop.php?iddanhmuc='.$iddanhmuc.'&page='.$i.'">'.$i.'</a></li>';
                        }else{
                            $list.= '<li class="page-item"><a class="page-link" href="shop.php?iddanhmuc='.$iddanhmuc.'&page='.$i.'">'.$i.'</a></li>';
                        }
                    }
                    while($row = mysqli_fetch_assoc($kq)){
                        
                        echo '<div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">

                            <div class="product-img">
                                <img style="width:423px;height:437px;" src="img/product-img/'.$row["images"].'" alt="">

                                <img style="width:423px;height:437px;" class="hover-img" src="img/product-img/'.$row["hovers"].'" alt="">
                            </div>


                            <div class="product-description d-flex align-items-center justify-content-between">

                            <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">$'.number_format($row["dongia"],"3",",",".").'</p>
                                    <a href="product.php?id='.$row['id'].'&iddanhmuc='.$row['iddanhmuc'].'">
                                        <h6>'.$row["tenhang"].'</h6>
                                    </a>
                                </div>

                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <a href="adcart.php?id='.$row['id'].'" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                ?>

                </div>
                
                <div class="row">
                    <div class="col-12">
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
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php include('include/footer.php');?>