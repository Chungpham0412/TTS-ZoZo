<?php include"header_admin.php";

		$errors = [];

		if (isset($_POST['dangki'])) {
			$name= isset($_POST['name']) ? $_POST['name'] : '';
			if ($_POST['name'] == '') {
				$errors['Full name']='Hãy nhập họ và tên';
			}

			$email= isset($_POST['email']) ? $_POST['email'] : '';
			if ($_POST['email'] == '') {
				$errors['email']='Hãy nhập email';
			}

			$phone= isset($_POST['phone']) ? $_POST['phone'] : '';
			if ($_POST['phone'] == '') {
				$errors['phone']='Hãy nhập số diện thoại';
			}

			$password= isset($_POST['password']) ? $_POST['password'] : '';
			if ($_POST['password'] == '') {
				$errors['password']='Hãy nhập mật khẩu';
			}

			$repassword= isset($_POST['repassword']) ? $_POST['repassword'] : '';
			if ($_POST['repassword'] != $_POST['password']) {
				$errors['repassword']='Mật khẩu không khớp';
			}

			$address= isset($_POST['address']) ? $_POST['address'] : '';
			if ($_POST['address'] == '') {
				$errors['address']='Hãy nhập địa chỉ';
			}

			if (!$errors) {
				$passHash = password_hash("$password", PASSWORD_BCRYPT);

				$sql="INSERT INTO `account`(`name`,`email`,`phone`,`password`,`address`,`level`) VALUES('$name','$email','$phone','$passHash','$address',1)";
				if (mysqli_query($connection,$sql)) {
					header('location: DS_Account_admin.php');
				}else{
					echo "Tạo tài khoản thất bại";
				}
			}
		}

 ?>

  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    		<section class="content-header">
    		  <h1>From đăng kí</h1>
    		</section>
    		
    		<!-- Main content -->
    		<section class="content">
    		
    		  <!-- Default box -->
    		  <div class="box">
    		    <div class="box-body">
    		    <form action="" method="POST" role="form" >
    		    	<div class="form-group">
    		    		<label for="">Họ và tên</label>
    		    		<input type="text" class="form-control" name="name" placeholder="Mời bạn nhập Họ và tên">
    		    		<?php if (isset($errors['Full name'])) {?>
							<div class="help-block" style="color: red">
								<?php echo $errors['Full name'] ?>
							</div>
						<?php } ?>
    		    	</div>
    		    	<div class="form-group">
    		    		<label for="">Số điện thoại</label>
    		    		<input type="text" class="form-control" name="phone" placeholder="Mời bạn nhập Số điện thoại">
    		    		<?php if (isset($errors['phone'])) {?>
							<div class="help-block" style="color: red">
								<?php echo $errors['phone'] ?>
							</div>
						<?php } ?>
    		    	</div>
    		    	<div class="form-group">
    		    		<label for="">Email</label>
    		    		<input type="email" class="form-control" name="email" placeholder="Mời bạn nhập Email">
    		    		<?php if (isset($errors['email'])) {?>
							<div class="help-block" style="color: red">
								<?php echo $errors['email'] ?>
							</div>
						<?php } ?>
    		    	</div>
    		    	<div class="form-group">
    		    		<label for="">Mật khẩu</label>
    		    		<input type="password" class="form-control" name="password" placeholder="Mời bạn nhập Mật khẩu">
    		    		<?php if (isset($errors['password'])) {?>
							<div class="help-block" style="color: red">
								<?php echo $errors['password'] ?>
							</div>
						<?php } ?>
    		    	</div>
    		    	<div class="form-group">
    		    		<label for="">Nhập lại mật khẩu</label>
    		    		<input type="password" class="form-control" name="repassword" placeholder="Mời bạn nhập lại mật khẩu">
    		    		<?php if (isset($errors['repassword'])) {?>
							<div class="help-block" style="color: red">
								<?php echo $errors['repassword'] ?>
							</div>
						<?php } ?>
    		    	</div>
    		    	<div class="form-group">
    		    		<label for="">Địa chỉ</label>
    		    		<input type="text" class="form-control" name="address" placeholder="Mời bạn nhập Địa chỉ">
	    		    	<?php if (isset($errors['address'])) {?>
							<div class="help-block" style="color: red">
								<?php echo $errors['address'] ?>
							</div>
						<?php } ?>
    		    	</div>
    		    
    		    	<button type="submit" name="dangki" class="btn btn-primary">Đăng kí</button>
    		    </form>
    		    </div>
    		    <!-- /.box-body -->
    		  </div>
    		  <!-- /.box -->
    		
    		</section>
    	</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"?>