  <?php
  include "header_admin.php";

  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thêm mới Banner</h1>
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
            $ordering = $_POST['ordering'];
            $status = $_POST['status'];
            $image = '';

            if (!empty($_FILES['image']['name'])) {
            $f = $_FILES['image'];
            $f_name = time(). '-' .$f['name'];

            if (move_uploaded_file($f['tmp_name'], '../uploads/'.$f_name)) {
             $image = $f_name;
           }
         }
          $sql = "INSERT INTO `banner` ( `name`, `image`, `ordering`, `status`) VALUES ('$name', '$image', '$ordering', '$status')" ;
         if (mysqli_query($connection,$sql)) {
            header('location:DS_Banner.php');
          }else{
            echo "Lỗi Thêm mới";
          }
        }
        ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Tên Banner</label>
              <textarea name="name" id="desc" class="form-control" placeholder="Tên Banner"></textarea>
              <!-- <input id="content" type="text" name="name" class="form-control" placeholder="Tên sản phẩm.." > -->
            </div>
            <div class="form-group">
              <label for="">Ảnh Banner</label>
              <input type="file" name="image" class="form-control">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="">Thứ tự</label>
                <input type="text" name="ordering" class="form-control" id="" placeholder="Thứ tự sắp xếp">
                </div>
              </div>
              <div class="col-md-6">
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
              </div>
            </div>
            <button type="submit" class="btn btn-primary" >Gửi</button>
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