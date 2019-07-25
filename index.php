<?php 
include "header.php";
//Banner
$banner = mysqli_query($connection,"SELECT * FROM banner where status = 1 ORDER BY ordering ASC");
//Top 10 sell
$product_sale = mysqli_query($connection,"SELECT * FROM product where sale_price > 0 && status = 1 ORDER BY sale_price DESC LIMIT 10");
//man
$nam="SELECT product.id, product.name,product.image,product.price,product.sale_price,product.status,category.parent_id FROM product join category on product.category_id=category.id WHERE parent_id = 1 && product.status = 1 ORDER BY product.id DESC LIMIT 8";
$product_man = mysqli_query($connection,$nam);
//women
$nu="SELECT product.id, product.name,product.image,product.price,product.sale_price,product.status,category.parent_id FROM product join category on product.category_id=category.id WHERE parent_id = 2 && product.status = 1 ORDER BY product.id DESC LIMIT 8";
$product_woman = mysqli_query($connection,$nu);
?>		
		<!-- Begin Login -->

		<!-- End Login -->
		
		<!-- Begin Main -->
		<div role="main" class="main">
			<!-- Begin Main Slide -->
			<section class="main-slide">
				<div id="owl-main-demo" class="owl-carousel main-demo">
				<?php foreach ($banner as $ban){ ?>
					<div class="item" id="item1"><img src="uploads/<?php echo $ban['image'] ?>" class="img-responsive" alt="Photo">
						<div class="item-caption">
							<div class="item-caption-inner">
								<div class="item-caption-wrap">
									<p class="item-cat"><a href="#"></a></p>
									<h2><?php echo $ban['name'] ?></h2>
									<!-- <a href="#" class="btn btn-white hidden-xs">Shop Now</a> -->
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</section>
			<!-- End Main Slide -->
			
			<!-- Begin Ads -->
			<section class="highlight">
				<div class="container">
					<div class="row row-narrow">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 animation">
							<div class="cat-item">
								<figure>
									<a href="blog.php"><img class="img-responsive" alt="" src="public/images/content/products/cat-4.jpg"></a>
									<figcaption>
										<div class="cat-description">
											<h3>Fashion and Style</h3>
											<a href="#">Read More</a>
										</div>
									</figcaption>
								</figure>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 animation">
							<div class="cat-item">
								<figure>
									<a href="blog.php"><img class="img-responsive" alt="" src="public/images/content/products/cat-5.jpg"></a>
									<figcaption>
										<div class="cat-description">
											<h3>Men’s Shoes</h3>
											<a href="#">Read More</a>
										</div>
									</figcaption>
								</figure>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 animation">
							<div class="cat-item">
								<figure>
									<a href="blog.php"><img class="img-responsive" alt="" src="public/images/content/products/cat-6.jpg"></a>
									<figcaption>
										<div class="cat-description">
											<h3>Watch Style</h3>
											<a href="#">Read More</a>
										</div>
									</figcaption>
								</figure>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- End Ads -->
			
			<!-- Begin Top Selling -->
			<section class="products-slide">
				<div class="container">
					<h2 class="title"><span>Top 10 giảm giá</span></h2>
					<div class="row">
						<div id="owl-product-slide" class="owl-carousel product-slide">
						<?php foreach ($product_sale as $pro ) {?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animation" >
								<div class="item product">
									<div class="product-thumb-info">
										<div class="product-thumb-info-image" style="height: 300px; overflow:hidden;">
											<span class="product-thumb-info-act">
												<a href="product_detail.php?id=<?php echo $pro['id']?>" class="view-product">
													<span><i class="fa fa-external-link"></i></span>
												</a>
											</span>
											<img alt="" class="img-responsive" src="uploads/<?php echo $pro['image'] ?>">
										</div>

										<div class="product-thumb-info-content">
											<span class="price_ pull-right" style="text-decoration: line-through"><?php echo number_format($pro['price'])." "."đ" ; ?></span>
											<h4><a href=""><?php echo $pro['name'] ?></a></h4>
											<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo number_format($pro['sale_price'])." "."đ" ?></span></span>
										</div>
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
			<section id="lookbook">
				<div class="container">
					<div class="lookbook">
						<h2><a href="#">Cavett Robert</a></h2>
						<p style = "font-size: 15px">Cuộc đời tựa như 1 viên đá, chính bạn là người quyết định để viên đá ấy bám rêu hay trở thành viên ngọc sáng.</p>
					</div>
				</div>
			</section>
			<!-- End Lookbook Women -->
			
			<!-- Begin New Products -->
			<section class="product-tab" style="padding-bottom: 50px">
				<div class="container">
					<h2 class="title"><span>Sản phẩm mới nhất</span></h2>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs pro-tabs text-center animation" role="tablist">
						<li class="active"><a href="#man" role="tab" data-toggle="tab">Nam</a></li>
						<li><a href="#woman" role="tab" data-toggle="tab">Nữ</a></li>
						<!-- <li><a href="#accesories" role="tab" data-toggle="tab">Accesories</a></li> -->
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="man">
							<div class="row">
								<?php foreach ($product_man as $pro_man ) {?>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 animation" >
										<div class="product">
											<div class="product-thumb-info" >
												<div class="product-thumb-info-image" style="height: 300px; overflow:hidden;">
													<span class="product-thumb-info-act">
														<a href="product_detail.php?id=<?php echo $pro_man['id'] ?>">
															<span><i class="fa fa-external-link"></i></span>
														</a>
														<!-- <a href="handling_cart.php?id=<?php //echo $pro_man['id']?>" class="add-to-cart-product">
															<span><i class="fa fa-shopping-cart"></i></span>
														</a> -->
													</span>
													<img alt="" class="img-responsive" src="uploads/<?php echo $pro_man['image']?>">
												</div>
												<div class="product-thumb-info-content" style="height: 50px">
													<?php if($pro_man['sale_price']==0) :?>
														<div class="product-thumb-info-content">
															<span class="price pull-right" style="text-decoration: none"><?php echo number_format($pro_man['price'])." "."đ" ; ?></span>
															<h4><a href="product_detail.php?id=<?php echo $pro_man['id'] ?>"><?php echo $pro_man['name'] ?></a></h4>
														</div>
														<?php elseif ($pro_man['sale_price']>0) :?>
															<div class="product-thumb-info-content">
																<span class="price_ pull-right" style="text-decoration: line-through"><?php echo number_format($pro_man['price'])." "."đ" ; ?></span>
																<h4><a href="product_detail.php?id=<?php echo $pro_man['id'] ?>"><?php echo $pro_man['name'] ?></a></h4>
																<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo number_format($pro_man['sale_price'])." "."đ" ?></span></span>
															</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									<?php }?>
							</div>
						</div>

						<!-- Sản phẩm -->
						<div class="tab-pane" id="woman">
							<div class="row">
								<?php foreach ($product_woman as $pro_woman ) { ?>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 animation">
										<div class="product">
											<div class="product-thumb-info">
												<div class="product-thumb-info-image" style="height: 300px; overflow:hidden;">
													<span class="product-thumb-info-act">
														<a href="product_detail.php?id=<?php echo $pro_woman['id'] ?>">
															<span><i class="fa fa-external-link"></i></span>
														</a>
														
													</span>
													<img alt="" class="img-responsive" src="uploads/<?php echo $pro_woman['image'] ?>">
												</div>
												<div class="product-thumb-info-content" style="height: 50px">
													<?php if($pro_woman['sale_price']==0) :?>
														<div class="product-thumb-info-content" >
															<span class="price pull-right" style="text-decoration: none"><?php echo number_format($pro_woman['price'])." "."đ" ; ?></span>
															<h4><a href="product_detail.php?id=<?php echo $pro_woman['id'] ?>"><?php echo $pro_woman['name'] ?></a></h4>
														</div>
														<?php elseif ($pro_woman['sale_price']>0) :?>
															<div class="product-thumb-info-content">
																<span class="price_ pull-right" style="text-decoration: line-through"><?php echo number_format($pro_woman['price'])." "."đ" ; ?></span>
																<h4><a href="product_detail.php?id=<?php echo $pro_woman['id'] ?>"><?php echo $pro_woman['name'] ?></a></h4>
																<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo number_format($pro_woman['sale_price'])." "."đ" ?></span></span>
															</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						
					</div>
					
				</div>
			</section>
			<!-- End New Products -->
			
			<!-- Begin Parallax -->
			
			<section class="pi-parallax" data-stellar-background-ratio="0.6" >
				<div class="container">
					<div id="owl-text-slide" class="owl-carousel">
						<div class="item">
							<blockquote>
								<p>Hãy làm những thứ bạn phải làm cho đến khi bạn có thể làm những thứ bạn muốn làm.</p>
								<footer>by <cite title="Steve Jobs">Khuyết danh</cite></footer>
							</blockquote>
						</div>
						<div class="item">
							<blockquote>
								<p>Người ta rất ít khi thành công trừ khi họ tìm thấy niềm vui trong những gì họ đang làm.</p>
								<footer>by <cite title="Steve Jobs">Dale Camegie</cite></footer>
							</blockquote>
						</div>
					</div>
			
			</section>
		</div>
			<!-- End Parallax -->
			
			<!-- Begin Latest Blogs -->
			<section class="latest-blog">
				<div class="container">
					<h2 class="title"><span>Latest from the blog</span></h2>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 animation">
							<article class="post">
								<div class="post-image">
									<span class="post-info-act">
										<a href="blog.php"><i class="fa fa-caret-right"></i></a>
									</span>
									<img class="img-responsive" src="public/images/content/blog/demo-1.jpg" alt="Blog">
								</div>
								<h3><a href="blog-single.html">Paris Fashion Week S/S 2014: womenswear collections</a></h3>
								<p class="post-meta">15th December 2014</p>
							</article>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 animation">
							<article class="post">
								<div class="post-image">
									<span class="post-info-act">
										<a href="blog.php"><i class="fa fa-camera"></i></a>
									</span>
									<img class="img-responsive" src="public/images/content/blog/demo-2.jpg" alt="Blog">
								</div>
								<h3><a href="blog-single.html">Show tunes: London Fashion Week S/S 2014's runway playlist</a></h3>
								<p class="post-meta">15th December 2014</p>
							</article>
						</div>
					</div>
				</div>
			</section>
			<!-- End Latest Blogs -->
			
		</div>
		<!-- End Main -->
<?php include "footer.php" ?>