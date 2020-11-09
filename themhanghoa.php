<?php
    $pg = 8;
    include('include/header.php');
    if(!isset($_SESSION['totalprice'])){
        $_SESSION['totalprice'] = 0;
    }
?>
<?php
    $conn = mysqli_connect("localhost","root","","giuaky");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $img = $_POST['images'];
        $img2 = $_POST['images2'];
        $img3 = $_POST['images3'];
        $img4 = $_POST['images4'];
        $img1 = $_POST['hovers'];
        $th = $_POST['tenhang'];
        $mt = $_POST['mota'];
        $sl = $_POST['soluong'];
        $dg = $_POST['dongia'];
        $iddm = $_POST['iddanhmuc'];
        $sql = "INSERT INTO hanghoa(tenhang,motasp,images,images2,images3,images4,hovers,soluong,dongia,iddanhmuc) VALUES('$th','$mt','$img','$img2','$img3','$img4','$img1','$sl','$dg','$iddm')";
        $ketqua = mysqli_query($conn,$sql);
    }
?>
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Add Product</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label> Hình ảnh1:</label><input type="file" name="images"><br>
                                        <label> Hình ảnh2:</label><input type="file" name="images2"><br>
                                        <label> Hình ảnh3:</label><input type="file" name="images3"><br>
                                        <label> Hình ảnh4:</label><input type="file" name="images4"><br>
                                        <label> Hover: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="file" name="hovers"><br>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="tenhang" placeholder="Name Product">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="mota" placeholder="Describe">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="dongia" placeholder="Price">
                                    </div>
                                    <div class="col-12 mb-3">
                                            
                                        <select class="w-100" name="iddanhmuc">
                                            <?php
                                                $sql = "SELECT * FROM danhmuc";
                                                $ketqua = mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($ketqua)){
                                                    echo '<option value="'.$row['id'].'">'.$row['tendanhmuc'].'</option>';
                                                }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="cart-btn mt-100 col-12 md-3">
                                        <input type="submit" class="btn amado-btn w-100" value="Add Product">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <?php 
                        if(isset($_GET['cate'])){
                            if(isset($_GET['tendanhmuc'])){
                                $tdm = $_GET['tendanhmuc'];
                                $conn = mysqli_connect("localhost","root","","giuaky");
                                $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES('$tdm')";
                                $ketqua = mysqli_query($conn , $sql);
                            }
                        }
                    ?>
                    <form action="" method="get">
                    <div class="col-12 mb-3">
                        <div class="cart-summary">
                            <h5>Add Categories</h5>
                            <br>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="tendanhmuc" placeholder="Name Categories" required>
                            </div>
                            <div class="cart-btn mt-100">
                                <input type="submit" name="cate" class="btn amado-btn w-100" value="Add Categories">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include('include/footer.php');
?>