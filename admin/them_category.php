  <?php 
  include "header_admin.php";
  $cate = mysqli_query($connection,"SELECT * FROM category WHERE parent_id = 0");
 ?>

  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thêm mới danh mục</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
         <?php
         if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $parent_id=$_POST['parent_id'];
          $ordering=$_POST['ordering'];
          $status=$_POST['status'];
          $sql_1 = "INSERT INTO `category` ( `name`, `parent_id`,`ordering`, `status`) VALUES ('$name',$parent_id,$ordering, $status)";
          $res = mysqli_query($connection,$sql_1);
          if ( $res) {
            header('location:DS_category.php');
            // echo "Thành công";
           // echo "<script type='text/javascript'>alert('Thành công');</script>";
          }else{
            echo "Bạn đã có tên này trong danh mục";
          }
        }
        ?>

          <form action="" method="POST">
            <div class="form-group">
              <label for="">Tên danh mục</label>
              <input type="text" name="name" class="form-control" placeholder="Tên danh mục" >
            </div>
            <div class="form-group">
              <label for="">Danh mục cha</label>
              <select name="parent_id" id="input" class="form-control" required="required">
                <option value="">Chọn danh mục</option>
                <?php foreach ($cate as $cats ) {?>
                  <option value="<?php echo $cats['id']?>"><?php echo $cats['name'] ?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Thứ tự sắp xếp</label>
              <input type="text" name="ordering" class="form-control" placeholder="Thứ tự sắp xếp" >
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

            <button type="submit" class="btn btn-primary" name ="submit" >Gửi</button>
          </form>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <?php include"footer.php" ?>