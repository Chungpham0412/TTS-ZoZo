<?php include"header_admin.php";
$id = $_SESSION['login_admin']['id'];
  $profile = mysqli_query($connection, "SELECT * FROM account WHERE id = $id");
  $row = mysqli_fetch_assoc($profile);
  // var_dump($profile);
  
?>
  <!-- Left side column. contains the sidebar -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="container" style="width: 50%">
        <div class="box">
          <div class="box-header with-border">
              <h3 style="text-align:center;">Thông tin tài khoản</h3>
          </div>
          <div class="box-body">
             <?php 
                if (isset($_POST['btnProfile'])) {
                  $name = $_POST['name'];
                  $phone = $_POST['phone'];
                  $email = $_POST['email'];
                  $address = $_POST['address'];

                  $sql = mysqli_query($connection,"UPDATE `account` SET `name` = '$name',`phone` = '$phone',`email` = '$email',`address` = '$address' WHERE id = $id ");
                  header('location: profile.php');
                }
             ?>
               <form action="" method="POST" role="form">
                 <div class="form-group">
                   <label for="">Họ và tên</label>
                   <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>">
                 </div>
                 <div class="form-group">
                   <label for="">Số điện thoại</label>
                   <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']?>">
                 </div>
                 <div class="form-group">
                   <label for="">Email</label>
                   <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>">
                 </div>
                 <div class="form-group">
                   <label for="">Địa chỉ</label>
                   <input type="text" class="form-control" name="address" value="<?php echo $row['address']?>">
                 </div>
               
                 
               
                 <button type="submit" class="btn btn-primary" name="btnProfile">Cập nhập</button>
               </form>
            </div>
          </div>
      </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"?>