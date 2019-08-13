  <?php 
  include "header_admin.php";
  $attribute = mysqli_query($connection,"SELECT * FROM attribute ");
 ?>

  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thêm mới thuộc tính</h1>
      <?php 
        if (in_array("add_attr", $decode)) {
          // echo "Trong mảng có chứa freetuts.net";
        }else{
          echo "<script type='text/javascript'>alert('Bạn đ** đủ quyền để vào');
          window.location.assign('http://localhost:88/%C4%90%E1%BB%93%20%C3%81n%20PHP/admin/index.php');
          </script>";
        }
      ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
         <?php
         if(!empty($_POST['name'])){
          $name = $_POST['name'];
          $value=$_POST['value'];
          $type=$_POST['type'];
          $sql_2 = "INSERT INTO attribute (name,value,type) VALUES ('$name','$value','$type')";
          // $res = mysqli_query($connection,$sql_2);

          if (mysqli_query($connection,$sql_2)) {
            header('location: DS_attribute.php');
           // echo "<script type='text/javascript'>alert('Thành công');</script>";
          }else{
            echo "Lỗi thêm mới!";
          }
        }
        ?>

          <form action="" method="POST">
            <div class="form-group">
              <label for="">Tên thuộc tính</label>
              <input type="text" name="name" class="form-control" placeholder="Tên thuộc tính.." >
            </div>
            <div class="form-group">
              <label for="">Giá trị</label>
              <input type="text" name="value" class="form-control" placeholder="Tên giá trị.." >
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="type" value="color" checked>Color
                </label>
                <label>
                  <input type="radio" name="type" value="size" >Size
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