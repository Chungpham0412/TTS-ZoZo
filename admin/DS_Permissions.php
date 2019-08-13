  <?php
  include "header_admin.php";
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quản lý account</h1>
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

    if (in_array("list_gr", $decode)) {
    // echo "Trong mảng có chứa freetuts.net";
    }else{
      echo "<script type='text/javascript'>alert('Bạn đ** đủ quyền để vào');
                      window.location.assign('http://localhost:88/%C4%90%E1%BB%93%20%C3%81n%20PHP/admin/index.php');
                      </script>";
    }
  }
  ?>
      <?php 
         $account_gr=mysqli_query($connection,"SELECT * FROM `permission`" );
         $per=[];
                  foreach ($account_gr as  $value) {
                   $per[]=$value['permissions']; 
                  }
      ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
              <input type="text" class="form-control" id="" placeholder="Tìm kiếm" name="search">
            </div>
            <button type="submit" class="btn btn-primary " name ="SubmitSearch"><i class="fa fa-search"></i></button>
            <!-- <a href="" class="btn btn-success">Thêm mới</a> -->
          </form>
        </div>
        <div class="box-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Hành động</th>

            </thead>
            <tbody>
            <?php foreach($account_gr as $acc) { ?>
              <tr>
                <td><?php echo $acc['id'] ?></td>
                <td><?php echo $acc['name'] ?></td>
                <td>
                   <a href="edit_group.php?id=<?php echo $acc['id'] ?>" class="btn btn-xs btn-primary">Sửa</a>
                </td>
               
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"?>