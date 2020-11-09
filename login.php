<?php session_start();?>
<?php include('include/header-login.php');?>

<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
   <form action="" method="post">
      <input type="text" class="login" placeholder="Username" name="username" />
      <input type="password" class="login" placeholder="Password" name="password" /><br>
      <input type="radio" name="role" value="admin">Admin
      <input type="radio" name="role" value="user">User <br>
      <input type="submit" class="login1" value="LOGIN">
   </form>
<br>
   <?php
      if($_SERVER["REQUEST_METHOD"]=="POST"){
         $u = $_POST['username'];
         $role = $_POST['role'];
         $p = md5($_POST['password']);
         $conn = mysqli_connect("localhost","root","","giuaky");
         $sql = "select * from user where username = '$u' and password = '$p' and role ='$role'";
         $kq = mysqli_query($conn,$sql);
         if(mysqli_num_rows($kq)<1 || $u =='' || $p == ''|| $role == ''){
            echo '<p style="color:red;">Đăng nhập thất bại</p>';
        }else{
            $_SESSION['name'] = $u;
            $_SESSION['role'] = $role;
            echo '<script> document.location="home.php"</script>';
        }
      }
   ?>


 
  </div>
  
   <div class="cont_form_sign_up">
     
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>


   <h2>SIGN UP</h2>
   <form action="register.php" method="post">
      <input type="text" class="signup" placeholder="Email" name="email" />
      <input type="text" class="signup" placeholder="Username" name="username"/>
      <input type="password" class="signup" placeholder="Password" name="password"/>
      <input type="password" class="signup" placeholder="Confirm Password" name="password1" />
      <input type="submit" class="signup1" value="SIGN UP">
   </form>

<?php include('include/footer-login.php');?>