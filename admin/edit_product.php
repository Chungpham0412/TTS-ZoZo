  <?php
  include "header_admin.php";
   $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $categoryy= mysqli_query($connection,"SELECT * FROM category where parent_id != 0 && status = 1");
  $sizes = mysqli_query($connection,"SELECT * FROM attribute WHERE type= 'size' ");
  $colors = mysqli_query($connection,"SELECT * FROM attribute WHERE type= 'color' ");
  $img_elses = mysqli_query($connection,"SELECT * FROM product_image WHERE product_id = $id");
  $attr = mysqli_query($connection,"SELECT attribute_id FROM product_attribute WHERE product_id = $id");
   
        $arrayCheck = [];
          foreach ($attr as $at) {

            $arrayCheck[] = $at['attribute_id'];
        }
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sửa sản phẩm</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          //lấy id
          
          $query= mysqli_query($connection,"SELECT * FROM product WHERE id = $id");
          $pro = mysqli_fetch_assoc($query);
      

          
        
           //sửa tên ảnh
           $image = $pro['image'];
            if (!empty($_FILES['image']['name'])) {
              $f = $_FILES['image'];
              $f_name = time(). '-' .$f['name'];

              if (move_uploaded_file($f['tmp_name'], '../uploads/'.$f_name)) {
               $image = $f_name;
             }
           }
      // upload multiple image
           if (!empty($_FILES['image_else']['name']) && count($_FILES['image_else']['name'])>0) {
              $quantity=count($_FILES['image_else']['name']);
              if( $quantity >= 1){
                      $deleteImage = mysqli_query($connection, "DELETE FROM product_image WHERE product_id = $id");
              }
              $f = $_FILES['image_else'];
                for ($i=0; $i < $quantity; $i++) { 
                  $f_name = time(). '-' .$f['name'][$i];
                    if (move_uploaded_file($f['tmp_name'][$i], '../uploads/'.$f_name)) {
                      $p =  mysqli_query($connection, "INSERT INTO product_image(product_id,image) VALUES ($id,'$f_name') ");
                  }

                
              }
            }




          if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $sale_price = $_POST['sale_price'];
            $status = $_POST['status'];
           
            $size = $_POST['size'];
            $color = $_POST['color'];


           //Update dữ liệu

           $sql = "UPDATE `product` SET `name` = '$name', `image` = '$image', `content` = ' $content ',`category_id`='$category_id', `price` = ' $price', `sale_price` = ' $sale_price', `status` = '$status' WHERE `product`.`id` = $id";
          if (mysqli_query($connection,$sql)) {
            // echo " thanh cong"; 

            $deleteAttr = mysqli_query($connection,"DELETE FROM product_attribute WHERE product_id = $id");
         

            if(isset($_POST['color'])){
              foreach ($color as $col) {
               $updateColor = mysqli_query($connection,"INSERT INTO `product_attribute` (`product_id`, `attribute_id`) VALUES ('$id', '$col')");
              }
            }
             if(isset($_POST['size'])){
              foreach ($size as $sis) {
               $updateColor = mysqli_query($connection,"INSERT INTO `product_attribute` (`product_id`, `attribute_id`) VALUES ('$id', '$sis')");
              header('location:DS_Product.php');
              }
            }
          }else{
            echo "Lỗi cập nhập!";
          }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm.." value="<?php echo $pro['name'] ?>" >
          </div>
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
              <label for="">Ảnh sản phẩm</label>
              <input type="file" name="image" id="add_img" class="form-control">
              <div class="col-md-3">
                <a href="#" class="thumbnail">
                  <img src="../uploads/<?php echo $pro['image']?>" id="show_img">
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
            <label for="">Ảnh khác</label>
            <input type="file" name="image_else[]" id="add_img_else" class="form-control" multiple>
            <div id="show_img_else">
              <?php if($img_elses): foreach($img_elses as $img) : ?>
                <div class="col-md-3">
                  <a href="#" class="thumbnail">
                    <img src="../uploads/<?php echo $img['image'] ?>" alt="">
                  </a>
                </div>
              <?php endforeach; endif; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Danh mục</label>
            <select name="category_id" class="form-control" required="required">
              <option value="">Chọn danh mục</option>
              <?php foreach ($categoryy as $ca) { 
                $selected=$ca['id']==$pro['category_id'] ? 'selected' : '';
                ?>
                <option <?php echo $selected ?> value="<?php echo $ca['id']  ?>"><?php echo $ca['name'] ?></option>

              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Giá</label>
            <input type="text" name="price" class="form-control" id="" placeholder="Giá sản phẩm.." value="<?php echo $pro['price'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Giá khuyến mãi</label>
            <input type="text" name="sale_price" class="form-control" id="" placeholder="Giá khuyến mãi.." value="<?php echo $pro['sale_price'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Kích thước</label>
            <?php foreach ($sizes as $s ) {  ?>
          
              <div class="checkbox">
                <label>
                  <input <?php echo in_array($s['id'], $arrayCheck) ? 'checked' : '' ; ?>  type="checkbox" name="size[]" value="<?php echo $s['id'] ?>">
                  <?php echo $s['name'] ?>
                </label>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Màu sắc</label>
            <?php foreach ($colors as $cl) {?>
              <div class="checkbox">
                <label>
                  <input <?php echo in_array($cl["id"], $arrayCheck) ? 'checked' : ''; ?>  type="checkbox" name="color[]" value="<?php echo $cl['id'] ?>">
                  <?php echo $cl['name'] ?>
                </label>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="">Mô tả</label>
        <textarea name="content" id="content" class="form-control" placeholder="Mô tả sản phẩm" ><?php echo $pro['content'] ?></textarea>
      </div>
      <div class="form-group">
        <label for="">Trạng thái</label>
        <div class="radio">
          <label>
            <input type="radio" name="status" id="input" value="1" <?php if($pro['status']==1) echo "checked" ?>>Hiện
          </label> 
          <label>
            <input type="radio" name="status" id="input" value="0" <?php if($pro['status']==0) echo "checked" ?>>Ẩn
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Gửi</button>

    </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
include "footer.php"; 
?>