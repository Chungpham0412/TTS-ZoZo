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
         $query= mysqli_query($connection,"SELECT * FROM category WHERE id = $id");
         $cat = mysqli_fetch_assoc($query);



         if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $parent_id=$_POST['parent_id'];
          $ordering=$_POST['ordering'];
          $status=$_POST['status'];


          $sql_1 = "UPDATE `category` SET name = '$name',parent_id='$parent_id',ordering=$ordering,status=$status WHERE id = $id";
          $res = mysqli_query($connection,$sql_1);
          if ( $res) {
            header('location:DS_category.php');
          }else{
            echo "Lỗi sửa chữa.";
          }
        }
        ?>

          <form action="" method="POST">
            <div class="form-group">
              <label for="">Tên danh mục</label>
              <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm.." value="<?php echo $cat['name']  ?>" >
            </div>
            <div class="form-group">
              <label for="">Danh mục cha</label>
              <select name="parent_id" id="input" class="form-control" required="required" >

                <option value="">Mời bạn chọn</option>
                
                <?php foreach ($cate as $cats) {
                  $selected = $cats['id'] == $cat['parent_id'] ? 'selected' : '';
                ?>
  
                <option <?php echo $selected ?> value="<?php echo $cats['id'] ?>"><?php echo $cats['name'] ?></option>

                <?php } ?> 

              </select>
            </div>
            <div class="form-group">
              <label for="">Thứ tự sắp xếp</label>
              <input type="text" name="ordering" class="form-control" placeholder="Tên sản phẩm.." value="<?php echo $cat['ordering']  ?>">
            </div>
            <div class="form-group">
              <label for="">Trạng thái</label>
              <div class="radio">
                <label>
                  <input type="radio" name="status" id="input" value="1" <?php if ($cat['status']==1) echo "checked"; ?>>Hiện
                </label> 
                <label>
                  <input type="radio" name="status" id="input" value="0" <?php if ($cat['status']==0) echo "checked"; ?>>Ẩn
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