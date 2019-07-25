<?php include "header.php";
$id = $_SESSION['login']['id'];
$profile = mysqli_query($connection,"SELECT * FROM account WHERE id = $id");
$row = mysqli_fetch_assoc($profile);
?>
<br>
<div class="container" style="width: 50%">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin tài khoản</h3>
		</div>
		<div class="panel-body">
			<?php 
				  if (isset($_POST['btnProfile'])) {
                  $name = $_POST['name'];
                  $phone = $_POST['phone'];
                  $email = $_POST['email'];
                  $address = $_POST['address'];

                  $sql = mysqli_query($connection,"UPDATE `account` SET `name` = '$name',`phone` = '$phone',`email` = '$email',`address` = '$address' WHERE id = $id ");
                  header('location: profile.php');
                }
			?>
			<form action="" method="POST" role="form">
                 <div class="form-group">
                   <label for="">Họ và tên</label>
                   <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>">
                 </div>
                 <div class="form-group">
                   <label for="">Số điện thoại</label>
                   <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']?>">
                 </div>
                 <div class="form-group">
                   <label for="">Email</label>
                   <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>">
                 </div>
                 <div class="form-group">
                   <label for="">Địa chỉ</label>
                   <input type="text" class="form-control" name="address" value="<?php echo $row['address']?>">
                 </div>
               
                 
               
                 <button type="submit" class="btn btn-primary" name="btnProfile">Cập nhập</button>
               </form>
		</div>
	</div>
</div>


<?php include "footer_cart.php" ?>