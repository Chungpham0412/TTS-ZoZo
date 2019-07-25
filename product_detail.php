		<?php include "header.php"; 
	//sanr phaam lien qua
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$c = mysqli_query($connection,"SELECT * FROM product WHERE id =$id");
		$cat_id = mysqli_fetch_assoc($c);
		$a = $cat_id['category_id'];
		$productRelate = mysqli_query($connection,"SELECT * FROM product WHERE status = 1 AND category_id = $a  LIMIT 10  ");


		$query= mysqli_query($connection,"SELECT * FROM product WHERE id = $id");
		$pro_detail = mysqli_fetch_assoc($query);
		$images = mysqli_query($connection,"SELECT * FROM product_image WHERE product_id =$id");
		$attribute_id = mysqli_query($connection,"SELECT * FROM product_attribute WHERE product_id=$id");
		$color = mysqli_query($connection,"SELECT attribute_id , name FROM `product_attribute` JOIN `attribute`ON attribute_id = id AND product_id=$id AND type = 'color' " );
		$size = mysqli_query($connection,"SELECT attribute_id , name FROM `product_attribute` JOIN `attribute`ON attribute_id = id AND product_id=$id AND type = 'size'");


		?>
<div class="content">
	<div id="contain">
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="product-preview">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="uploads/<?php echo $pro_detail['image'] ?>">
									<img src="uploads/<?php echo $pro_detail['image'] ?>" alt="">
								</li>
								<?php if($images) :foreach ($images as $img) : ?>
									<li data-thumb="uploads/<?php echo $img["image"] ?>">
										<img src="uploads/<?php echo $img["image"] ?>" alt="">
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
									<span class="price pull-left" style="text-decoration: none"><?php echo $pro_detail['price']." "."đ" ; ?></span>
								</div>
								<?php elseif ($pro_detail['sale_price']>0) :?>
									<div class="product-thumb-info-content">
										<span class="pull-leftl" style="text-decoration: line-through"><?php echo $pro_detail['price']." "."đ" ; ?></span>
										<span class="item-cat"><span class="price pull-left"><?php echo $pro_detail['sale_price']." "."đ" ?></span></span>
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
														<?php echo $cl['name']?>

													</option>
												<?php endforeach; ?>
											</select>
										</div>
									</li>

									<?php 

									?>

								</ul>

								<ul>
									<div class="quantity pull-left">
										<input type="hidden" name="id" value="<?php echo $id;?>" >
										<input type="button" class="minus" value="  -  " id="tru">
										<input  type="text" class="input-text qty" title="Qty" value="1" name="quantity" id="quantityItem"  readonly>
										<input type="button" class="plus" value="  +  " id="cong" >
									</div>
									<button class="btn btn-primary btn-icon pull-right" id="addCart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
								</ul>
							</form>
							<div class="clearfix"></div><br>
							<!-- <ul class="list-unstyled product-meta">
								<li>Sku: 54329843</li>
								<li>Categories: <a href="#">Leather</a> <a href="#">Jeans</a> <a href="#">Men</a></li>
								<li>Tags: <a href="#">Shoes</a> <a href="#">Jeans</a> <a href="#">Men</a> <a href="#">T-shirt</a></li>
							</ul> -->

							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Mô tả</a> </h4>
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
			<section class="products-slide">
				<div class="container">
					<h2 class="title"><span>Sản phẩm liên quan</span></h2>
					<div class="row">
						<div id="owl-product-slide" class="owl-carousel product-slide">
							<?php foreach ($productRelate as $p) {?>
								<div class="col-md-12">
									<div class="item product">
										<div class="product-thumb-info">
											<div class="product-thumb-info-image">
												<span class="product-thumb-info-act">
													<a href="product_detail.php?id=<?php echo $p['id'] ?>">
														<span><i class="fa fa-external-link"></i></span>
													</a>
													<!-- <a href="handling_cart.php?id=<?php //echo $p['id']?>" class="add-to-cart-product">
														<span><i class="fa fa-shopping-cart"></i></span>
													</a> -->
												</span>
												<img alt="" class="img-responsive" src="uploads/<?php echo $p['image'] ?>">
											</div>
											<?php if($p['sale_price']==0) :?>
												<div class="product-thumb-info-content" style="height: 30px">
													<span class="price pull-right" style="text-decoration: none"><?php echo number_format($p['price'])." "."đ" ; ?></span>
													<h4><a href=""><?php echo $p['name'] ?></a></h4>
												</div>
												<?php elseif ($p['sale_price']>0) :?>
													<div class="product-thumb-info-content" style="height: 30px">
														<span class="price_ pull-right" style="text-decoration: line-through"><?php echo number_format($p['price'])." "."đ" ; ?></span>
														<h4><a href=""><?php echo $p['name'] ?></a></h4>
														<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo number_format($p['sale_price'])." "."đ" ?></span></span>
													</div>

												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php include "footer.php" ?></div>