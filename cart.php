<?php
    $pg = 3;
    $totalPriceAll = 0;
    include('include/header.php');
?>


    <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <?php 

                                if(isset($_SESSION['cart'])){
                                    if(isset($_POST['num'])){
                                        foreach($_POST['num'] as $id=>$num){
                                            if($num == 0 ){
                                                unset($_SESSION['cart'][$id]);
                                            }else if($num > 0){
                                                $_SESSION['cart'][$id]= $num;
                                            }
                                        } 
                                    }
                                    $arrId = array(); 
                                    foreach($_SESSION['cart'] as $id=>$number){
                                        $arrId[] = $id;
                                    }
                                    $strId = implode(',',$arrId);
                                    $conn = mysqli_connect("localhost","root","","giuaky");
                                    $sql = "select * from hanghoa where id in($strId)";
                                    $kq = mysqli_query($conn,$sql);
                            ?>
                            <form id="cart" method="post">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Update&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete</th>
                                    </tr>
                                </thead>
                                
                                    <tbody>
                                
                                    
                                            <?php
                                            while($row = mysqli_fetch_array($kq)){
                                                $id1 = $row['id'];
                                                $totalPrice = $row['dongia'] * $_SESSION['cart'][$row['id']];
                                                echo '<tr><td class="cart_product_img">
                                                        <a href="product.php?id='.$row['id'].'&iddanhmuc='.$row['iddanhmuc'].'"><img src="img/product-img/'.$row['images'].'" alt="Product"></a>
                                                    </td>
                                                    <td class="cart_product_desc">
                                                        <h5>'.$row['tenhang'].'</h5>
                                                    </td>
                                                    <td class="price">
                                                        <span>$'.$totalPrice.'</span>
                                                    </td>
                                                    <td class="qty">
                                                        <div class="qty-btn d-flex">
                                                            <p>Qty</p>
                                                            <div class="quantity">
                                                                <span class="qty-minus" onclick="var effect = document.getElementById('."'num$id1'".'); var num = effect.value; if( !isNaN( num ) &amp;&amp; num &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                                <input type="number" name="num['.$row['id'].']" class="qty-text" id="num'.$id1.'" step="1" min="1" max="300" name="quantity" value="'.$_SESSION['cart'][$row['id']].'">
                                                                <span class="qty-plus" onclick="var effect = document.getElementById('."'num$id1'".'); var num = effect.value; if( !isNaN( num )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            </div>
                                                            <span style="margin-left:25px;margin-top:5px;"><a onclick="document.getElementById('."'cart'".').submit();" href="#" class="dell"><i class="fas fa-edit" style="font-size:24px"></i></a></span>
                                                            <span style="margin-left:25px;margin-top:5px;"><a href="xoahang.php?id='.$id.'" class="dell"><i class="fa fa-trash" style="font-size:24px"></i></a></span>
                                                        </div>
                                                    </td>
                                                </tr>';
                                                $totalPriceAll += $totalPrice;
                                            }
                                        $_SESSION['totalprice']=$totalPriceAll;
                                        
                                    ?>
                                    
                                        
                                    
                                    
                                </tbody>
                                
                            </table>
                        </form>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                    


                    
                    <div class="col-12 col-lg-4" style="margin-left: 670px;margin-top: -100px;">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                
                                <li><span>total:</span> <span>$<?php echo $totalPriceAll;?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="checkout.php" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
<?php include('include/footer.php');?>