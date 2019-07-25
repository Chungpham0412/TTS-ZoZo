
<?php include"header_admin.php" ?>
<?php  
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$c = mysqli_query($connection,"SELECT * FROM product WHERE id =$id");
$cat_id = mysqli_fetch_assoc($c);
$a = $cat_id['category_id'];
$productRelate = mysqli_query($connection,"SELECT * FROM product WHERE status = 1 AND category_id = $a  LIMIT 10  ");

$query= mysqli_query($connection,"SELECT * FROM product WHERE id = $id");
$pro_detail = mysqli_fetch_assoc($query);
$images = mysqli_query($connection,"SELECT * FROM product_image WHERE product_id =$id");
$attribute_id = mysqli_query($connection,"SELECT * FROM product_attribute WHERE product_id=$id");
$color = mysqli_query($connection,"SELECT * FROM attribute WHERE type='color'");
$size = mysqli_query($connection,"SELECT * FROM attribute WHERE type='size'");
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
<!--       <h1>
        Blank page
        <small>it all starts here</small>
    </h1> -->
    <ol class="breadcrumb" style="left: 10px">
    	<li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    	<li><a href="DS_Product.php">Danh sách sản phẩm</a></li>
    	<li class="active">Chi tiết sản phẩm</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="container">
		<div class="box">
			<div class="box-header with-border">
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="product-preview">
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="../uploads/<?php echo $pro_detail['image'] ?>">
										<img src="../uploads/<?php echo $pro_detail['image'] ?>" alt="">
									</li>
									<?php if($images) :foreach ($images as $img) : ?>
										<li data-thumb="../uploads/<?php echo $img["image"] ?>">
											<img src="../uploads/<?php echo $img["image"] ?>" alt="">
										</li>
									<?php endforeach; endif; ?>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="summary entry-summary">

							<h1 style="padding:0 0 20px 0; text-align: center; font-weight: bold; font-family: Time New Roman; font-size: 30px"><?php echo $pro_detail['name']  ?></h1>

							<span class="amount" style="padding: 15px 0">
								<?php if($pro_detail['sale_price']==0) :?>
									<div class="product-thumb-info-content">
										<span class="price pull-left" style="text-decoration: none"><?php echo $pro_detail['price']." "."VNĐ" ; ?></span>
									</div>
									<?php elseif ($pro_detail['sale_price']>0) :?>
										<div class="product-thumb-info-content">
											<span class="pull-leftl" style="text-decoration: line-through"><?php echo $pro_detail['price']." "."VNĐ" ; ?></span>
											<span class="item-cat"><span class="price pull-left"><?php echo $pro_detail['sale_price']." "."VNĐ" ?></span></span>
										</div>
									<?php endif; ?>
								</span>
								<div class="clearfix"></div>

								<form action="handling_cart.php" method="get" class="myForm">
									<ul class="list-inline list-select clearfix">
										<li>
											<div class="list-sort">
												<select name="sizeBuy"class="formDropdown" id="size">
													<option value="" >Mời bạn chọn size</option>}
													<?php foreach ($size as $si): ?>
														<option>
															<?php echo $si['name'] ?>
														</option>
													<?php endforeach; ?>
												</select>
											</div>
										</li>
										<li>
											<div class="list-sort" >
												<select class="formDropdown" name="colorBuy" id="color">
													<option  value="">Mời bạn chọn màu</option>}
													<?php foreach ($color as $cl): ?>
														<option>
															<?php echo $cl['name'] ?>

														</option>
													<?php endforeach; ?>
												</select>
											</div>
										</li>

										<?php 

										?>

									</ul>
								</form>
								<div class="clearfix"></div><br>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Description</a> </h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body"> 
												<?php echo $pro_detail['content'] ?>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>

			</div>
			<?php include "footer.php" ?></div>
		</div>
		<div class="box-body">

		</div>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"?>