  <?php
  include "header_admin.php";

  if(isset($_POST["SubmitSearch"])){
    $search = $_POST["search"];

    $sqli = mysqli_query($connection,"SELECT * FROM product WHERE name LIKE '%$search%'");
    if($sqli){
      $product = $sqli;
    }else{
      echo "Thử lại ";
    }
  }

 
  ?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quản lý sản phẩm</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
            </div>
            <button type="submit" class="btn btn-primary" name ="SubmitSearch"><i class="fa fa-search"></i></button>
            <a href="them_product.php" class="btn btn-success">Thêm mới</a>
          </form>
        </div>
        <div class="box-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($product as $pro) { ?>
              <tr>
                <td><?php echo $pro['id'] ?></td>
                <td><?php echo $pro['name'] ?></td>
                <td><img src="../uploads/<?php echo $pro['image'] ?>"style="width:50px"></td>
                <td><?php if($pro['status']==1): ?>
                    <span>Hiển thị</span>
                    <?php else: ?>
                      <span>Ẩn</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $pro['created'] ?></td>
                <td>
                  <a href="product-view.php?id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-success">Xem</a>
                  <a href="edit_product.php?id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-primary">Sửa</a>
                  <a href="delete_product.php?id=<?php echo $pro['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn btn-xs btn-danger">Xóa</a>
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