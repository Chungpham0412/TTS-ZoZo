<?php 
include "header.php";

$product = mysqli_query($connection,"SELECT * FROM product WHERE status = 1");
?>		
			
			<!-- Begin Top Selling -->
			<section class="products-slide">
				<div class="container">
					<br>
					<!-- <h2 class="title" style="font-family: Georgia"><span>Sản phẩm thời trang</span></h2> -->
					<div class="row">
						<div >
						<?php foreach ($product as $pro ) { ?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 animation">
								<div class="item product">
									<div class="product-thumb-info">
										<div class="product-thumb-info-image"  style="height: 300px; overflow:hidden;" >
											<span class="product-thumb-info-act">
												<a href="product_detail.php?id=<?php echo $pro['id'] ?>">
													<span><i class="fa fa-external-link"></i></span>
												</a>
											</span>
											<img alt="" class="img-responsive" src="uploads/<?php echo $pro['image'] ?>" >
										</div>
										<?php if($pro['sale_price']==0) :?>
										<div class="product-thumb-info-content" style="height: 50px">
											<span class="price pull-right" style="text-decoration: none"><?php echo number_format($pro['price'])." "."đ" ; ?></span>
											<h4><a href="product_detail.php?id=<?php echo $pro['id'] ?>"><?php echo $pro['name'] ?></a></h4>
										</div>
										<?php elseif ($pro['sale_price']>0) :?>
										<div class="product-thumb-info-content" style="height: 50px">
											<span class="price_ pull-right" style="text-decoration: line-through"><?php echo number_format($pro['price'])." "."đ" ; ?></span>
											<h4><a href="product_detail.php?id=<?php echo $pro['id'] ?>"><?php echo $pro['name'] ?></a></h4>
											<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo number_format($pro['sale_price'])." "."đ" ?></span></span>
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

<?php include "footer.php" ?>