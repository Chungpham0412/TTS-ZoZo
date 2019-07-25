<?php include "header.php";

?>
<br>
<div class="container">
	<div class="panel panel-danger" class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="panel-heading">
			<h3 class="panel-title">Chi tiết đơn hàng</h3>
		</div>
		<div class="panel-body">
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
					</tr>
				</thead>
				<tbody>
					<?php 
						$id = isset($_GET['id']) ? $_GET['id'] : 0;
						$sqlJoin = "SELECT dt.quantity,dt.color,dt.size,p.name,p.image,p.price FROM order_detail dt JOIN product p ON dt.product_id = p.id WHERE order_id = $id";
						$order_detail = mysqli_query($connection,$sqlJoin);
					?>
					<?php $n=1; if($order_detail) : foreach ($order_detail as $c ) :?>
					<tr>
						<td><?php echo $n ?></td>
						<td><?php echo $c['name'] ?></td>
						<td>
							<img src="uploads/<?php echo $c['image']?>" width="50px">
						</td>
						<td><?php echo $c['color'] ?></td>
						<td><?php echo $c['size'] ?></td>
						<td><?php echo number_format( $c['price']).'đ' ?></td>
						<td>
							<?php echo $c['quantity'] ?>
						</td>
						<td><?php echo number_format( $c['price']*$c['quantity']) ?>đ</td>

					</tr>
				<?php $n++; endforeach; endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer_cart.php" ?>