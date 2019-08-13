<?php include "header.php";
$id =$_GET['id'];
$a = mysqli_query($connection,"SELECT * FROM account WHERE id = '$id'");
if (mysqli_num_rows($a)==1) {
	$row= mysqli_fetch_assoc($a);
}
// echo "<pre>";
// print_r($row);
// echo "</pre>";
?>
<?php 
$errors = [];
if(isset($_POST['btn-forgot-password'])){

	$password= isset($_POST['password']) ? $_POST['password'] : '';
	if ($_POST['password'] == '') {
		$errors['password']='Hãy nhập mật khẩu';
	}

	$repassword= isset($_POST['repassword']) ? $_POST['repassword'] : '';
	if ($_POST['repassword'] != $_POST['password']) {
		$errors['repassword']='Mật khẩu không khớp';
	}

	if(!$errors){
		$passHash = password_hash("$password", PASSWORD_BCRYPT);

		$pas= mysqli_query($connection, "UPDATE `account` SET `password` = '$passHash' WHERE `id` = $id");
		if($pas){
			echo "thanhf cong";
			header('location: index.php');
			$_SESSION['login']=$row;
		}else{
			echo "that abi";
		}
	}
}

?>
<div class="container-login100" style="background-image: url('public/images/bg-01.jpg');  ">
	<div class="modal-dialog" >
		<div class="modal-body">
			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-49" >
					Quên mật khẩu
				</span>

				<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
					<span class="label-input100">Mật khẩu</span>
					<input class="input100" type="password" name="password" placeholder="Type your password">
					<?php if (isset($errors['password'])) {?>
						<div class="help-block" style="color: red">
							<?php echo $errors['password'] ?>
						</div>
					<?php } ?>
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
					<span class="label-input100">Nhập lại mật khẩu</span>
					<input class="input100" type="password" name="repassword" placeholder="Type your password">
					<?php if (isset($errors['repassword'])) {?>
						<div class="help-block" style="color: red">
							<?php echo $errors['repassword'] ?>
						</div>
					<?php } ?>
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" type="submit" name="btn-forgot-password">
							Lấy lại
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