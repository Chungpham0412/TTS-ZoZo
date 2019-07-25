  <?php 
  include "header_admin.php";
   $cate = mysqli_query($connection,"SELECT * FROM category WHERE parent_id = 0");
 ?>

  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sửa danh mục</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
         <?php
         //laasy id
         $id = isset($_GET['id']) ? $_GET['id'] : 0;
         $query= mysqli_query($connection,"SELECT * FROM attribute WHERE id = $id");
         $attr = mysqli_fetch_assoc($query);



         if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $value=$_POST['value'];
          $type=$_POST['type'];


          $sql_1 = "UPDATE `attribute` SET name = '$name',value='$value',type='$type' WHERE id = $id";
          $res = mysqli_query($connection,$sql_1);
          if ($res) {
            header('location:DS_attribute.php');
          }else{
            echo "Lỗi sửa chữa.";
          }
        }
        ?>

          <form action="" method="POST">
            <div class="form-group">
              <label for="">Tên thuộc tính</label>
              <input type="text" name="name" class="form-control" value="<?php echo $attr['name']?>" >
            </div>
            <div class="form-group">
              <label for="">Giá trị</label>
              <input type="text" name="value" class="form-control" value="<?php echo $attr['value']?>" >
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="type" value="color" <?php if($attr['type']=='color') echo "checked"; ?>>Color
                </label>
                <label>
                  <input type="radio" name="type" value="size" <?php if($attr['type']=='size') echo "checked"; ?>>Size
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