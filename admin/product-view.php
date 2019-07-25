  <?php
  include "header_admin.php";
   // $img_else = mysqli_query($connection,"SELECT * FROM product JOIN product_image ON product.id = product_image.product_id");
   $id = $_GET['id'];
   $sql = mysqli_query($connection,"SELECT * FROM product WHERE id=$id");
   $pro = mysqli_fetch_assoc($sql);
   $img_else = mysqli_query($connection,"SELECT * FROM product_image WHERE product_id = $id");
  $color = mysqli_query($connection,"SELECT attribute_id , name FROM `product_attribute` JOIN `attribute`ON attribute_id = id AND product_id=$id AND type = 'color' " );
  $size = mysqli_query($connection,"SELECT attribute_id , name FROM `product_attribute` JOIN `attribute`ON attribute_id = id AND product_id=$id AND type = 'size'");
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <ol class="breadcrumb" style="left: 10px">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="DS_Product.php">Danh sách sản phẩm</a></li>
        <li class="active">Chi tiết sản phẩm</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container">
      <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-md-5">
                <img src="../uploads/<?php echo $pro['image']?>" class="img-responsive" alt="Image" style="width: 100%">
                    <?php foreach ( $img_else as $im) : ?>
                <div class="col-md-3">
                  <div class="thumbnail">
                       <img src="../uploads/<?php echo $im['image'] ?>" alt="" >
                  </div>
                </div>
                    <?php endforeach; ?>
            </div>
            <div class="col-md-7">
            <div class="summary entry-summary">

              <h1 style="padding:0 0 20px 0; text-align: center; font-weight: bold; font-family: Time New Roman; font-size: 30px"><?php echo $pro['name']  ?></h1>

              <span class="amount" style="padding: 15px 0">
                <?php if($pro['sale_price']==0) :?>
                  <div class="product-thumb-info-content">
                    <h3 class="price pull-left" style="text-decoration: none">Giá sản phẩm: <?php echo $pro['price']." "."VNĐ" ; ?></h3>
                  </div>
                  <?php elseif ($pro['sale_price']>0) :?>
                    <div class="product-thumb-info-content">
                      <h3 class="pull-leftl" style="text-decoration: line-through">Gía sản phẩm: <?php echo $pro['price']." "."VNĐ" ; ?></h3>
                      <h3 class="item-cat"><span class="price pull-left">Giá khuyến mãi: <?php echo $pro['sale_price']." "."VNĐ" ?></span></h3>
                    </div>
                  <?php endif; ?>
                </span>
                <div class="clearfix"></div>

                <form action="handling_cart.php" method="get" class="myForm">
                  <ul class="list-inline list-select clearfix">
                    <li class="col-md-6">
                      <h4><option>Size sản phẩm</option></h4>
                      <?php foreach ($size as $si): ?>
                        <option><?php echo $si['name'] ?> </option>
                      <?php endforeach; ?>
                    </li>
                    <li class="col-md-6">
                      <h4><option>Màu sản phẩm</option></h4>
                       <?php foreach ($color as $cl): ?>
                          <option><?php echo $cl['name'] ?></option>
                      <?php endforeach; ?>
                    </li>
                  </ul>
                </form>
                <div class="clearfix"></div><br>
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Chi tiết sản phẩm</a> </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body"> 
                        <?php echo $pro['content'] ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          </div>
          </div>
      </div>
    </div>
    </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
include "footer.php"; 
?>