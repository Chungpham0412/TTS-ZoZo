  <?php
  include "header_admin.php";

 $banner=mysqli_query($connection,"SELECT * FROM banner");
 if(isset($_POST["SubmitSearch"])){
    $search = $_POST["search"];
    $sqli_1 = mysqli_query($connection,"SELECT * FROM banner WHERE name LIKE '%$search%'");
    if($sqli_1){
      $banner = $sqli_1;
    }else{
      echo "Lỗi tìm kiếm. Vui lòng thử lại ";
    }
  }
  ?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quản lý Banner</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <form action="" method="POST" class="form-inline" role="form" >
            <div class="form-group">
              <input type="text" class="form-control" id="" placeholder="Tìm kiếm" name="search">
            </div>
            <button type="submit" class="btn btn-primary " name ="SubmitSearch"><i class="fa fa-search"></i></button>
            <a href="them_banner.php" class="btn btn-success">Thêm mới</a>
          </form>
        </div>
        <div class="box-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên banner</th>
                <th>Hình ảnh</th>
                <th>Thứ tự sắp xếp</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($banner as $ban) { ?>
              <tr>
                <td><?php echo $ban['id'] ?></td>
                <td><?php echo $ban['name'] ?></td>
                <td><img src="../uploads/<?php echo $ban['image'] ?>"style="width:50px"></td>
                <td><?php echo $ban['ordering'] ?></td>
                <td><?php if($ban['status']==1): ?>
                    <span>Hiển thị</span>
                    <?php else: ?>
                      <span>Ẩn</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $ban['created'] ?></td>
                <td>
                  <a href="edit_Banner.php?id=<?php echo $ban['id'] ?>" class="btn btn-xs btn-primary">Sửa</a>
                  <a href="delete_banner.php?id=<?php echo $ban['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
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