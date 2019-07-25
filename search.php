<?php 
include "config/connect.php";
include "header.php";
if(isset($_POST['btnSearch'])){
	$search = $_POST['product_search'];
	$product = mysqli_query($connection, "SELECT * FROM product WHERE name like '%$search%'");
}
?>

<div role="main" class="main">
			<!-- Begin Main Slide -->

			<!-- End Main Slide -->
			
			<!-- Begin Ads -->
	
			<!-- End Ads -->
			
			<!-- Begin Top Selling -->
			<section class="products-slide">
				<div class="container">
					<br>

					<div class="row">
						<div >
						<?php foreach ($product as $p ) {?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 animation">
								<div class="item product">
									<div class="product-thumb-info">
										<div class="product-thumb-info-image" style="height: 300px; overflow:hidden;">
											<span class="product-thumb-info-act">
												<a href="product_detail.php?id=<?php echo $p['id']?>" class="view-product">
													<span><i class="fa fa-external-link"></i></span>
												</a>
											</span>
											<img alt="" class="img-responsive" src="uploads/<?php echo $p['image'] ?>">
										</div>
										<?php if($p['sale_price']==0) :?>
										<div class="product-thumb-info-content" style="height: 50px">
											<span class="price pull-right" style="text-decoration: none"><?php echo $p['price']." "."VNĐ" ; ?></span>
											<h4><a href="product_detail.php?id=<?php echo $p['id']?>"><?php echo $p['name'] ?></a></h4>
										</div>
										<?php elseif ($p['sale_price']>0) :?>
										<div class="product-thumb-info-content" style="height: 50px">
											<span class="price_ pull-right" style="text-decoration: line-through"><?php echo $p['price']." "."VNĐ" ; ?></span>
											<h4><a href="product_detail.php?id=<?php echo $p['id']?>"><?php echo $p['name'] ?></a></h4>
											<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo $p['sale_price']." "."VNĐ" ?></span></span>
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
			<!-- End Top Selling -->
			
			<!-- Begin Lookbook Women -->

			<!-- End Lookbook Women -->
			
			<!-- Begin New Products -->

			<!-- End New Products -->
			
			<!-- Begin Parallax -->
			

		</div>
		<?php include "footer_cart.php" ?>