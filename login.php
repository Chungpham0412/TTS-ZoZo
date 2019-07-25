<?php include "header.php";?>

	<?php 
	$errors = [];
	$email = '';			
	if (isset($_POST['login'])) {
		$email= isset($_POST['email']) ? $_POST['email'] : '';
			if ($email == '') {
				$errors['email']='Hãy nhập email';
			}
		$password= isset($_POST['password']) ? $_POST['password'] : '';
			if ($password == '') {
				$errors['password']='Hãy nhập mật khẩu';
			}
			if (!$errors) {
				//Lấy tài khoản theo Email
			$sql_email=mysqli_query($connection,"SELECT * FROM account WHERE email = '$email' AND level = 0 ");
				if(mysqli_num_rows($sql_email)==1) {
					$row= mysqli_fetch_assoc($sql_email);
					$check = password_verify($password,$row['password']);
						if (!$check) {
						// $errors['password']
						$errors['password']="Mật khẩu của bạn không chính xác";
						}else{
						//Lưu thông tin ngừi dung vào session
						$_SESSION['login']=$row;
						header('location: index.php');
						}
				}else{
					$errors['email']="Email của bạn không tồn tại";
				}
			}
		}
	?>
<div class="container-login100" style="background-image: url('public/images/bg-01.jpg');  ">
	<div class="modal-dialog" >
		<div class="modal-body">
			<form class="login100-form validate-form" method="post" >

				<span class="login100-form-title p-b-49" >
					Đăng nhập
				</span>

			<div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
				<span class="label-input100">Email</span>
				<input class="input100" type="text" name="email" placeholder="Type your Email" value="<?php echo $email ?>">
				<?php if (isset($errors['email'])) {?>
					<div class="help-block" style="color: red">
						<?php echo $errors['email'] ?>
					</div>
				<?php } ?>
				<?php if (isset($errors['errorEmail'])) {?>
					<div class="help-block" style="color: red">
						<?php echo $errors['errorEmail'] ?>
					</div>
				<?php } ?>
				<span class="focus-input100" data-symbol="&#xf190;"></span>
			</div>
	
			<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
				<span class="label-input100">Mật khẩu</span>
				<input class="input100" type="password" name="password" placeholder="Type your password">
				<?php if (isset($errors['password'])) {?>
					<div class="help-block" style="color: red">
						<?php echo $errors['password'] ?>
					</div>
				<?php } ?>
				<?php if (isset($errors['errorPass'])) {?>
					<div class="help-block" style="color: red">
						<?php echo $errors['errorPass'] ?>
					</div>
				<?php } ?>
				<span class="focus-input100" data-symbol="&#xf190;"></span>
			</div>
	
				<div class="text-right p-t-8 p-b-31">
					<a href="#">
						Quên mật khẩu?
					</a>
				</div>
	
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" type="submit" name="login">
							login
						</button>
					</div>
				</div>
	
				<div class="flex-col-c p-t-155">
					<span class="txt1 p-b-17">
						Bạn chưa có tài khoản?
					</span>
	
					<a href="registration.php" class="txt2">
						Đăng kí ngay
					</a>
				</div>
			</form>
		</div>
	</div>
</div>