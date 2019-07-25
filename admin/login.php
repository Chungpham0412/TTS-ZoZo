<?php 
 session_start();

 include "../config/connect.php";

 if (isset($_POST['login_btn'])) {
     $email = $_POST['email'];
     $password = $_POST['password'];


     $check_email = mysqli_query($connection,"SELECT * FROM account WHERE email = '$email' AND level = 1");
     if (mysqli_num_rows($check_email)==1) {
         $admin = mysqli_fetch_assoc($check_email);
         if (password_verify($password, $admin['password'])) {
             $_SESSION['login_admin']=$admin;
             header('location: index.php');
         }else{
            // echo "Mật khẩu không đúng";
            $errors['password']="Mật khẩu không đúng";
         }
     }else{
       $errors['email']="Tài khoản không tồn tại";
     }
     // $sql= mysqli_query($connection,"SELECT * FROM `account` WHERE `email` = '$email' AND `password` = '$password'");

     // $row= mysqli_fetch_assoc($sql);
     // print_r($row);
     // if ($row) {
     //     $_SESSION['login']=$row;
         // header('location: index.php');
     // }
 }
?>
  
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập - Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Hãy nhập thông tin tài khoản.</span></div>
            <div class="card-body">
                <form method="POST" role="form" action="">
                    <div class="form-group">
                       <input  class="form-control form-control-lg" name="email" type="text" placeholder="Tài Khoản">
                       <?php if (isset($errors['email'])) {?>
                            <div class="help-block" style="color: red">
                                <?php echo $errors['email'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <input  class="form-control form-control-lg" name="password" type="password" placeholder="Mật khẩu">
                        <?php if (isset($errors['password'])) {?>
                            <div class="help-block" style="color: red">
                                <?php echo $errors['password'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" ><span class="custom-control-label" value="1">Ghi nhớ đăng nhập</span>
                        </label>
                    </div> -->
                    <button type="submit" name="login_btn" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>

        <!-- ============================================================== -->
        <!-- end login page  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    </body>

    </html>