<?php include "header.php";
	include "config/function_sent_mail_forgot.php";
	$token = openssl_random_pseudo_bytes(16);
 	$token1 = openssl_random_pseudo_bytes(5);
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token);
$token1 = bin2hex($token1);
 
//Print it out for example purposes.
echo $token1;
?>
<?php 
if(isset($_POST['btn-forgot'])){
	$email = isset($_POST['email'])?$_POST['email']:"";
	$a = mysqli_query($connection,"SELECT * FROM account WHERE email = '$email'");
if (mysqli_num_rows($a)==1) {
	 $row= mysqli_fetch_assoc($a);
	 $id=$row['id'];
	 $passHash = password_hash($token1, PASSWORD_BCRYPT);
	// print_r($passHash);
	 $passwordUpdate = mysqli_query($connection,"UPDATE `account` SET `password` = '$passHash' WHERE `id` = $id");
}
	// print_r($email);

	include "email_password.php";
	if(sentMail($_POST['email'],$html)){
		echo "<script type='text/javascript'>alert('Bạn check email');</script>";
	}else{
		echo "Gửi mail không thành công";
	}
}

?>
<div class="container-login100" style="background-image: url('public/images/bg-01.jpg');  ">
	<div class="modal-dialog" >
		<div class="modal-body">
			<form class="login100-form validate-form" method="post" >
				<span class="login100-form-title p-b-49" >
				 Quên mật khẩu
				</span>
			<div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
				<span class="label-input100">Địa chỉ email</span>
				<input class="input100" type="text" name="email" placeholder="Type your Email" value="">
				
				<span class="focus-input100" data-symbol="&#xf190;"></span>
			</div>
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" type="submit" name="btn-forgot">
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