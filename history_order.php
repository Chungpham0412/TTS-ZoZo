<?php include "header.php"; ?>
<br>
<div class="container">
	<div class="panel panel-primary"class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<div class="panel-heading">
			<h3 class="panel-title">Lịch sử đơn hàng</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<?php 
						$account_id = $_SESSION['login']['id'];
						$sqlJoin = "SELECT orders.id, orders.created, orders.status, SUM(order_detail.price*order_detail.quantity) as 'total' FROM orders JOIN order_detail ON orders.id = order_detail.order_id WHERE orders.account_id = $account_id GROUP BY  orders.id, orders.created, orders.status";
						$orders = mysqli_query($connection,$sqlJoin);
					?>
					<tr>
						<th>STT</th>
						<th>Ngày đặt</th>
						<th>Tổng tiền</th>
						<th>Trạng thái</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $n=1; if($orders) : foreach ($orders as $od ) :?>
					<tr>
						<td><?php echo $n ?></td>
						<td><?php echo $od['created'] ?></td>
						<td><?php echo number_format($od['total'])." "."đ" ?></td>
						<td>
							<?php if($od['status']==2) :?>
									<span class="label label-primary">Đã giao hàng</span>
								<?php elseif($od['status']==1) :?>
									<span class="label label-success">Đã duyệt</span>
								<?php else : ?>
									<span class="label label-danger">Chưa dyệt</span>
							<?php endif; ?>
						</td>
						<td>
							<a href="order_detail.php?id=<?php echo $od['id'] ?>" class=" btn-xs btn-success">Xem</a>
						</td>
					</tr>
				<?php $n++; endforeach; endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer_cart.php" ?>