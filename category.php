<?php 
include "header.php";
$id = $_GET['id'] ? $_GET['id'] : 0;
// $product= mysqli_query($connection, "SELECT * FROM product WHERE status = 1 AND category_id = $id");
$product= mysqli_query($connection, "SELECT id, name, image, content, price, sale_price,status FROM `product_category` JOIN `product` ON product_id = id AND category_id = $id ");
?>
<?php 
	$cate = mysqli_query($connection,"SELECT * FROM `category`");
 	$categoty=array();
  // $ca = mysqli_fetch_assoc($cate);
  while ($row = mysqli_fetch_assoc($cate)) {
    $categoty[]=$row;
  }
  		$arr=array();
  		$arr[]=$id;
  function mang($categoty,$parent_id,&$arr){
          foreach ($categoty as $key => $value) {
            if($value['parent_id']==$parent_id){
               // echo $value['id'];
               $arr[] = $value['id'];
              unset($categoty[$key]);
              mang($categoty,$value['id'],$arr);
            }
          }
  }


  // echo "<pre>";
  // print_r($id."*");
	// print_r($arr);
  	mang($categoty,$id,$arr);
	$arrcate="'".implode("'".","."'",$arr)."'";
	$products = mysqli_query($connection, "SELECT * FROM product LEFT JOIN product_category ON product.id = product_category.product_id WHERE product_category.category_id IN ($arrcate) GROUP BY product.id");
	// $rows=mysqli_fetch_assoc($product)
	// print_r($arrcate);
  // echo "</pre>";
?>
<div role="main" class="main">

			<section class="products-slide">
				<div class="container">
					<br>

					<div class="row">
						<div >
						<?php foreach ($products as $p ) {?>
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
											<span class="price pull-right" style="text-decoration: none"><?php echo $p['price']." "."đ" ; ?></span>
											<h4><a href="product_detail.php?id=<?php echo $p['id']?>"><?php echo $p['name'] ?></a></h4>
										</div>
										<?php elseif ($p['sale_price']>0) :?>
										<div class="product-thumb-info-content" style="height: 50px">
											<span class="price_ pull-right" style="text-decoration: line-through"><?php echo $p['price']." "."đ" ; ?></span>
											<h4><a href="product_detail.php?id=<?php echo $p['id']?>"><?php echo $p['name'] ?></a></h4>
											<span class="item-cat"><small><a href="#">Giá khuyến mãi </a> </small> <span class="price pull-right"><?php echo $p['sale_price']." "."đ" ?></span></span>
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
		<?php include "footer.php" ?>