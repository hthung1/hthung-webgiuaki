<?php
    $pg = 8;
    include('include/header.php');
?>
<?php
    $conn = mysqli_connect("localhost","root","","giuaky");
    if(isset($_POST['categories'])){
        $th = $_POST['tendanhmuc'];
        $sql = "update danhmuc set tendanhmuc='$th' where id =".$_GET['id'];
        $ketqua = mysqli_query($conn,$sql);
    }
?>
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Update Categories</h2>
                            </div>
                    <?php
                        $sql = "select * from danhmuc where id = ".$_GET['id'];
                        $kq = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($kq);
                    ?>
                            
                        </div>
                    </div>
                    <form action="" method="post">
                    <div class="col-12 mb-3">
                        <div class="cart-summary">
                            <h5>Add Categories</h5>
                            <br>
                            
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="tendanhmuc" placeholder="Name Categories" value="<?php echo $row['tendanhmuc']?>">
                            </div>
                            <div class="cart-btn mt-100">
                                <input type="submit" name="categories" class="btn amado-btn w-100" value="Update Categories">
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