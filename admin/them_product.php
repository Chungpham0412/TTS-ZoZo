  <?php
  include "header_admin.php";
  $categoryy= mysqli_query($connection,"SELECT * FROM category where parent_id != 0 && status = 1");
  $size = mysqli_query($connection,"SELECT * FROM attribute WHERE type = 'size' ");
  $color = mysqli_query($connection,"SELECT * FROM attribute WHERE type = 'color' ");
  ?>


  <div class="content-wrapper">
    <?php 
    if(isset($_SESSION['login_admin'])){
      $admin = $_SESSION['login_admin'];
      $id = $admin['level'];
      $sql = mysqli_query($connection,"SELECT * FROM permission WHERE id = $id");
        // $per=[];
      foreach ($sql as $value) {
          // print_r($value['permissions']);
          // $per[]=json_decode($value['permissions'],true);
        $decode=json_decode($value['permissions'],true);
      }

      if (in_array("add_p", $decode)) {
        // echo "Trong mảng có chứa freetuts.net";
      }else{
        echo "<script type='text/javascript'>alert('Bạn đ** đủ quyền để vào');
        window.location.assign('http://localhost:88/%C4%90%E1%BB%93%20%C3%81n%20PHP/admin/index.php');
        </script>";
      }
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thêm mới sản phẩm</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
            // var_dump($_FILES);
          if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $sale_price = $_POST['sale_price'];
            $status = $_POST['status'];
            $image = '';
            //thêm thuộc tính cho sản phẩm
            $size = $_POST['size'];
            $color = $_POST['color'];
            //upload ảnh chính
            if (!empty($_FILES['image']['name'])) {
              $f = $_FILES['image'];
              $f_name = time(). '-' .$f['name'];

              if (move_uploaded_file($f['tmp_name'], '../uploads/'.$f_name)) {
               $image = $f_name;
             }
           }
          // echo "<pre>";
          // print_r($_POST);
          // echo "</pre>"; die;

           $sql = "INSERT INTO `product` ( `name`, `image`, `content`, `price`, `sale_price`, `status`) VALUES ('$name', '$image', '$content', '$price', '$sale_price', '$status')"   ;

           if (mysqli_query($connection,$sql)) {

            $product_id = mysqli_insert_id($connection);
            //add category
             if (count($category_id)>0) {
              foreach ($category_id as $cate) {
                mysqli_query($connection, "INSERT INTO product_category VALUES ($product_id,$cate) ");
              }
            }
              //add size
            if (count($size)>0) {
              foreach ($size as $ss) {
                mysqli_query($connection, "INSERT INTO product_attribute VALUES ($product_id,$ss) ");
              }
            }
              //add color
            if (count($color)>0) {
              foreach ($color as $cl) {
                mysqli_query($connection, "INSERT INTO product_attribute VALUES ($product_id,$cl) ");
              }
            }

             //upload nhiều ảnh
            if (!empty($_FILES['image_else']['name']) && count($_FILES['image_else']['name'])>0) {
             $quantity=count($_FILES['image_else']['name']);
             $f = $_FILES['image_else'];
             for ($i=0; $i < $quantity; $i++) { 
              $f_name = time(). '-' .$f['name'][$i];
              if (move_uploaded_file($f['tmp_name'][$i], '../uploads/'.$f_name)) {
                mysqli_query($connection, "INSERT INTO product_image(product_id,image) VALUES ($product_id,'$f_name') ");
                }
              }
            }
            header('location:DS_Product.php');


          }else{
            echo "Lỗi Thêm mới";
          }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm.." >
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" id="add_img">
                <img src="" alt="" id="show_img" width="200px">
              </div>
            </div>
           <div class="col-md-8">
              <div class="form-group">
                <label for="">Ảnh khác</label>
                <input type="file" name="image_else[]" class="form-control" id="add_img_else" multiple>
                <div id="show_img_else"></div>
              </div>
           </div>
          </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <?php 
          $cate = mysqli_query($connection,"SELECT * FROM `category`");
          $categoty=array();
          // $ca = mysqli_fetch_assoc($cate);
          while ($row = mysqli_fetch_assoc($cate)) {
            $categoty[]=$row;
          }
          function dequy($categoty,$parent_id=0,$text=""){
          foreach ($categoty as $key => $value) {
            if($value['parent_id']==$parent_id){
              echo '<input name="category_id[]" type="checkbox" value="'.$value['id'].'">';
                echo $text.$value['name'];
              echo '<br/>';
              $id = $value['id'];
              unset($categoty[$key]);
              dequy($categoty,$id,$text.$value['name']." > ");
            }
          }
         } 
              ?>
              <label for="">Danh mục</label>
              <!-- <select name="category_id" class="form-control" required="required"> -->
                <div class="checkbox">
                  <label>
                    <?php 
                          dequy($categoty);
                     ?>
                  </label>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Giá</label>
              <input type="text" name="price" class="form-control" id="" placeholder="Giá sản phẩm..">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Giá khuyến mãi</label>
              <input type="text" name="sale_price" class="form-control" id="" placeholder="Giá khuyến mãi..">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Kích thước</label>
              <?php foreach ($size as $s ) { ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="size[]" value="<?php echo $s['id'] ?>">
                    <?php echo $s['name'] ?>
                  </label>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Màu sắc</label>
              <?php foreach ($color as $c) {?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="color[]" value="<?php echo $c['id'] ?>">
                    <?php echo $c['name'] ?>
                  </label>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Mô tả</label>
          <textarea name="content" id="content" class="form-control" ></textarea>
        </div>
        <div class="form-group">
          <label for="">Trạng thái</label>
          <div class="radio">
            <label>
              <input type="radio" name="status" id="input" value="1" checked="checked">Hiện
            </label> 
            <label>
              <input type="radio" name="status" id="input" value="0" checked="checked">Ẩn
            </label>
          </div>
        </div>
        <div class="form-group">

          <button type="submit" class="btn btn-primary" >Gửi</button>
        </div>
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