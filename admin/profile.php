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
             <table class="table table-hover">
                    <tr>
                     <td>Họ và tên</td>
                     <td><?php echo $row['name'] ?></td>
                   </tr>
                   <tr>
                     <td>Số điện thoại</td>
                     <td><?php echo $row['phone'] ?></td>
                   </tr>
                   <tr>
                     <td>Email</td>
                     <td><?php echo $row['email'] ?></td>
                   </tr>
                   <tr>
                     <td>Địa chỉ</td>
                     <td><?php echo $row['address'] ?></td>
                   </tr>
                   <tr>
                     <td>password</td>
                     <td><?php echo $row['password'] ?></td>
                   </tr>
             </table>
               <br>
                   <a href="profile_edit.php" class="btn btn-default">Sửa thông tin</a>
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