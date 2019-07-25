  <?php
  include "header_admin.php";

 $accounts=mysqli_query($connection,"SELECT * FROM account WHERE level = 1" );
   if(isset($_POST["SubmitSearch"])){
    $search = $_POST["search"];
    $sqli_1 = mysqli_query($connection,"SELECT * FROM account WHERE level = 1 AND name LIKE '%$search%'");
    if($sqli_1){
      $accounts = $sqli_1;
    }else{
      echo "Lỗi tìm kiếm. Vui lòng thử lại ";
    }
  }
 
  ?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quản lý account</h1>
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
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($accounts as $acc) { ?>
              <tr>
                <td><?php echo $acc['id'] ?></td>
                <td><?php echo $acc['name'] ?></td>
                <td><?php echo $acc['email'] ?></td>
                <td><?php echo $acc['phone'] ?></td>
                <td><?php echo $acc['address'] ?></td>
                <td><?php echo $acc['created'] ?></td>
                <td>
                  <a href="delete_account_admin.php?id=<?php echo $acc['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản không?')">Xóa</a>
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