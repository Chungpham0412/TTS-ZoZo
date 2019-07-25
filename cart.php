<?php include "header.php"; 
	$carts= isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>
<br>
<div class="container">
	<div class="panel panel-danger " >
		<div class="panel-heading">
			<h3 class="panel-title">Giỏ hàng</h3>
		</div>
		<div class="panel-body ">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Hành ảnh</th>
						<th>Màu sắc</th>
						<th>Kích thước</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $n=1; if($carts) : foreach ($carts as $c ) :?>
					<tr>
						<td><?php echo $n ?></td>
						<td><?php echo $c['name'] ?></td>
						<td>
							<img src="uploads/<?php echo $c['image']?>" width="50px">
						</td>
						<td><?php echo $c['colorBuy'] ?></td>
						<td><?php echo $c['sizeBuy'] ?></td>
						<td><?php echo number_format( $c['price']).'đ' ?></td>
						<td>
							<form action="handling_cart.php" method="GET">
								<input name="id" type="hidden" value="<?php echo $c['id'] ?>">
								<input name="action" type="hidden" value="update">
								<input name="quantity" class="input-text qty" value="<?php echo $c['quantity']?>">
								<input type="submit" name="" value="cập nhập">
							</form>
						</td>
						<td><?php echo number_format( $c['price']*$c['quantity']) ?>đ</td>
						<td>
							<a href="delete_cart.php?id=<?php echo $c['id'] ?>" class="btn btn-xs btn-success">Xóa</a>
						</td>
					</tr>
				<?php $n++; endforeach; endif;?>
				</tbody>
				<tr>
					<td><b>Tổng cộng</b></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<?php echo number_format(tong_tien()).'đ' ?>
					</td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-10 col-lg-10">
			
			<a type="button" href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
			<a type="button" href="handling_cart.php?action=clear" class="btn btn-primary">Xóa hết</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
			<a type="button" href="orders.php" class="btn btn-primary">Thanh toán</a>
		</div>
	</div>
</div>
<?php include "footer_cart.php" ?>