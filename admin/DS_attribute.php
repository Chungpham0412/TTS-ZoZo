  <?php
  include "header_admin.php";
  $attribute = mysqli_query($connection,"SELECT * FROM attribute");
  if(isset($_POST["SubmitSearch"])){
    $search = $_POST["search"];
    $sqli_1 = mysqli_query($connection,"SELECT * FROM attribute WHERE name LIKE '%$search%'");
    if($sqli_1){
      $attribute = $sqli_1;
    }else{
      echo "Thử lại ";
    }
  }
  ?>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quản lý thuộc tính</h1>
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
            <button type="submit" class="btn btn-primary" name="SubmitSearch" ><i class="fa fa-search"></i></button>
            <a href="add_attribute.php" class="btn btn-success">Thêm mới</a>
          </form>
        </div>
        <div class="box-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên thuộc tính</th>
                <th>Kiểu</th>
                <th>Giá trị</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($attribute as $attri) { ?>
              <tr>
                <td><?php echo $attri['id'] ?></td>
                <td><?php echo $attri['name'] ?></td>
                <td>
                  <?php if ($attri['type'] == 'color') :?>
                      <span style="background: <?php echo $attri['value']; ?>;display: inline-block; width: 20px; height: 20px; border-radius: 100%"></span>
                  <?php else : ?>
                      <?php echo $attri['value'] ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?php echo $attri['type'] ?>
                </td>
                <td>
                  <a href="edit_attribute.php?id=<?php echo $attri['id'] ?>" class="btn btn-xs btn-primary">Sửa</a>
                  <a href="delete_attribute.php?id=<?php echo $attri['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa thuộc tính này không?')" class="btn btn-xs btn-danger">Xóa</a>
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
<?php include"footer.php" ?>