<?php
    $pg = 8;
    include('include/header.php');
?>
<?php
    $conn = mysqli_connect("localhost","root","","giuaky");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        // $img = $_POST['images'];
        // $img2 = $_POST['images2'];
        // $img3 = $_POST['images3'];
        // $img4 = $_POST['images4'];
        // $img1 = $_POST['hovers'];
        $th = $_POST['tenhang'];
        $mt = $_POST['mota'];
        // $sl = $_POST['soluong'];
        $dg = $_POST['dongia'];
        $iddm = $_POST['iddanhmuc'];
        $sql = "update hanghoa set tenhang='$th',motasp='$mt',dongia='$dg',iddanhmuc='$iddm' where id =".$_GET['id'];
        $ketqua = mysqli_query($conn,$sql);
    }
?>
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Update Product</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <!-- <label> Hình ảnh 1: </label><input type="file" name="images" value="<?php //echo $img;?>"><br>
                                        <label> Hình ảnh 2: </label><input type="file" name="images2" value="<?php //echo $img2;?>"><br>
                                        <label> Hình ảnh 3: </label><input type="file" name="images3" value="<?php //echo $img3;?>"><br>
                                        <label> Hình ảnh 4: </label><input type="file" name="images4" value="<?php //echo $img4;?>"><br>
                                        <label> Hover: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="file" name="hovers" value="<?php //echo $img1;?>"><br> -->
                                    </div>
                                    <?php
                                        $sql1 = "select * from hanghoa where id = ".$_GET['id'];
                                        $row1 = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
                                    ?>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="tenhang" value="<?php echo $row1['tenhang'];?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="mota" value="<?php echo $row1['motasp'];?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="dongia" value="<?php echo $row1['dongia'];?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                            
                                        <select class="w-100" name="iddanhmuc">
                                        <?php
                                            $sql = "SELECT * FROM danhmuc";
                                            $ketqua = mysqli_query($conn,$sql);
                                            while($row = mysqli_fetch_assoc($ketqua)){
                                                $selected = '';
                                                if($row['id']==$row1['iddanhmuc']) $selected = "selected";
                                                echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['tendanhmuc'].'</option>';
                                            }
                                        ?>
                                        </select>

                                    </div>
                                    <div class="cart-btn mt-100 col-12 md-3">
                                        <input type="submit" class="btn amado-btn w-100" value="Update Product">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include('include/footer.php');
?>