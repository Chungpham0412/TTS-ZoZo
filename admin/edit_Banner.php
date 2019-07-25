  <?php
  include "header_admin.php";
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Chỉnh sửa Banner</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <?php 
          $id = isset($_GET['id']) ? $_GET['id'] : 0;
          $query = mysqli_query($connection,"SELECT * FROM banner WHERE id = $id");
          $bann=mysqli_fetch_assoc($query);
          $image = $bann['image'];
          if (!empty($_FILES['image']['name'])) {
          $f = $_FILES['image'];
          $f_name = time(). '-' .$f['name'];
          if (move_uploaded_file($f['tmp_name'], '../uploads/'.$f_name)) {
          $image = $f_name;
          // laays id cua banner
           }
         }

          if (isset($_POST['btn'])) {
              $name = $_POST['name'];
              $ordering = $_POST['ordering'];
              $status = $_POST['status'];
              // $image = $image;
             $sql_2 = " UPDATE `banner` SET `name` = '$name', `image` = '$image', `ordering` = '$ordering', `status` = '$status' WHERE `id` = $id" ;

             if (mysqli_query($connection,$sql_2)) {
                header('location:DS_Banner.php');
              }else{
                echo "Lỗi Thêm mới";
              }
            }
          
        
        ?>

          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                   <?php if($bann): ?>
                  <label for="">Tên Banner</label>
                  <input type="text" name="name" class="form-control" placeholder="Tên Banner.." value="<?php echo $bann['name'] ?>">
                </div>
              <div class="form-group">
                <label for="">Thứ tự</label>
                <input type="text" name="ordering" class="form-control" id="" placeholder="Giá khuyến mãi.." value="<?php echo $bann['ordering'] ?>">
              </div>
              <div class="form-group">
                  <label for="">Trạng thái</label>

                  <div class="radio">
                   
                    <label>
                      <input type="radio" name="status" value="1" <?php if( $bann['status']==1) echo "checked"; ?>>Hiện
                    </label> 
                    <label>
                      <input type="radio" name="status" value="0" <?php if(  $bann['status']==0) echo "checked"; ?>>Ẩn
                    </label>
                  <?php endif; ?>
                  </div>
              </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Ảnh Banner</label>
                  <input type="file" name="image" class="form-control" id="add_img">
                  <img src="../uploads/<?php echo $bann['image'] ?>" alt="" style="width: 800px" id="show_img">
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary" name="btn">Cập nhập</button>
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