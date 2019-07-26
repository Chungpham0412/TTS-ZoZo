<?php include "header.php"; 
	$carts= isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>
<br>
<div class="container">
	<div class="panel panel-success" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="panel-heading">
			<h3 class="panel-title">Tiến hành đặt hàng</h3>
		</div>
		<div class="panel-body">
			<?php if (isset($_SESSION['login'])) :
				$od=$_SESSION['login'];
				if (isset($_POST['btn-orders'])) {
					//1 Lưu vào bảng orders để lấy account_id
					$account_id=$od['id'];
					$name=$_POST['name'];
					$email=$_POST['email'];
					$phone=$_POST['phone'];
					$address=$_POST['address'];
					$qrod=mysqli_query($connection,"INSERT INTO orders(account_id,name,email,phone,address) VALUES ($account_id,'$name','$email',$phone,'$address')");
					if ($qrod) {
						$orders_id = mysqli_insert_id($connection);
					//2 Duyệt giỏ hàng và lưu thông tin tên sản phẩm trong giỏ hàng vào bẳng order_detail
						$a = "";
						foreach ($carts as $c) {
							$product_id = $c['id'];
							$quantity= $c['quantity'];
							$price = $c['price'];
							$color = $c['colorBuy'];
							$size = $c['sizeBuy'];
							$a = mysqli_query($connection,"INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`, `color`, `size`) VALUES ('$orders_id', '$product_id', '$quantity', '$price', '$color', '$size')");
						}
							if($a){
								// echo "Bạn đã đặt hàng thành công. Cảm ơn bạn đã tin tưởng Flatize Shop.";

							}else{
								echo "Đặt hàng không thành công. Xin vui lòng thử lại!";
							}
								//Sẽ thực hiện gửi mail
								include "email.php";
								if(sentMail($od['email'],$od['name'],$html)){
									unset($_SESSION['cart']);
									echo "<script type='text/javascript'>alert('Bạn đã đặt hàng thành công. Cảm ơn bạn đã tin tưởng Flatize Shop.');
									window.location.assign('http://localhost/%C4%90%E1%BB%93%20%C3%81n%20PHP/index.php');
									</script>";
									// echo "<script type='text/javascript'><div>OnClick='return confirm('blah blah');</div></script>";
									// header('location: index.php');
								}else{
									echo "Gửi mail không thành công";
								}
									//Chuyển hướng về trang cảm ơn ♥
					}
									// echo "<script >confirm('Do you like freetuts.net');</script>";
				}
			?>

			<?php if (tong_so_luong()>0) :?>
				<!-- đặt hàng -->
				<form action="" method="POST" role="form">

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Tên người đặt</label>
			<input type="text" class="form-control" name="" id="name" value="<?php echo $od['name'] ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input type="text" class="form-control" name="" id="email" value="<?php echo $od['email'] ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Số điện thoại</label>
			<input type="text" class="form-control" name="" id="phone" value="<?php echo $od['phone'] ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Địa chỉ</label>
			<input type="text" class="form-control" name="" id="address" value="<?php echo $od['address'] ?>" readonly>
		</div>
		</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Tên người nhận</label>
			<input type="text" class="form-control" name="name" id="name1" value="" placeholder="Tên người nhận">
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input type="text" class="form-control" name="email" id="email1" value="" placeholder="Email người nhận">
		</div>
		<div class="form-group">
			<label for="">Số điện thoại</label>
			<input type="text" class="form-control" name="phone" id="phone1" value="" placeholder="Số điện thoại người nhận">
		</div>
		<div class="form-group">
			<label for="">Địa chỉ</label>
			<input type="text" class="form-control" name="address" id="address1" value="" placeholder="Địa chỉ người nhận">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6">
			<input type="checkbox" id="check" value="1"> Nếu người nhận là bạn thì vui lòng tích vào ô.
		</div>
		<div class="col-md-2">
			<button type="submit" name="btn-orders" class="btn btn-primary">Đặt hàng ngay</button>
		</div>
	</div>
</div>
				</form>
					<?php else : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Lỗi</strong> Bạn chưa có sản phẩm trong giỏ hàng
						</div>
						<div class="row">
						<div class="col-md-10"></div>
						<div class="col-md-2">
							<a type="button" href="index.php"  class="btn btn-primary">Tiếp tục mua hàng</a>
						</div>
					</div>
					<?php endif; ?>
			<?php else : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Lỗi</strong> Bạn chưa đăng nhập!
				</div>
				<a type="button" href="login.php" class="btn btn-lg btn-success">Đăng nhập ngay</a>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php include "footer_cart.php" ?>

<script type="text/javascript">
	$('input#check').click(function(){
		console.log($('input#check').prop('checked'));
		if($('input#check').prop('checked')){
			$('input#name1').val($('input#name').val());
			$('input#email1').val($('input#email').val());
			$('input#phone1').val($('input#phone').val());
			$('input#address1').val($('input#address').val());
		}else{
			$('input#name1').val('');
			$('input#email1').val('');
			$('input#phone1').val('');
			$('input#address1').val('');

		}
	})

</script>