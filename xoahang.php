<?php 
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
    }
    echo '<script> document.location="cart.php"</script>'
?>