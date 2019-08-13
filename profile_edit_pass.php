<?php include "header.php";
$id = $_SESSION['login']['id'];
$pass = $_SESSION['login']['password'];
print_r($pass);
?>
<br>
<div class="container" style="width: 50%">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin tài khoản</h3>
		</div>
		<div class="panel-body">
			<?php 
      $errors=[];
      if (isset($_POST['btnProfile'])) {
        $password= isset($_POST['password']) ? $_POST['password'] : '';
        if ($_POST['password'] == $pass) {
          $errors['passwordnew']='Mật khẩu không đúng';
        }
        $passwordnew= isset($_POST['passwordnew']) ? $_POST['passwordnew'] : '';
        if ($_POST['passwordnew'] == '') {
          $errors['passwordnew']='Hãy nhập mật khẩu';
        }

        $repassword= isset($_POST['repassword']) ? $_POST['repassword'] : '';
        if ($_POST['repassword'] != $_POST['passwordnew']) {
          $errors['repassword']='Mật khẩu không khớp';
        }
        if(!$errors){
          $passHash = password_hash("$passwordnew", PASSWORD_BCRYPT);
          $sql = mysqli_query($connection,"UPDATE `account` SET `password` = '$passHash' WHERE id = $id ");
          if($sql){
            header('location: index.php');
          }
        }
      }
      ?>
			<form action="" method="POST" role="form">
                 <div class="form-group">
                   <label for="">Nhập mật khẩu của bạn</label>
                   <input type="password" class="form-control" name="password" >
                 </div>
                 <div class="form-group">
                   <label for="">Nhập mật khẩu mới</label>
                   <input type="password" class="form-control" name="passwordnew" >
                 </div>
                  <div class="form-group">
                   <label for="">Nhập lại mật khẩu</label>
                   <input type="password" class="form-control" name="repassword" >
                 </div>
               
                 
               
                 <button type="submit" class="btn btn-primary" name="btnProfile">Cập nhập</button>
               </form>
		</div>
	</div>
</div>


<?php include "footer_cart.php" ?>