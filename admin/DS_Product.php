  <?php
  include "header_admin.php";
  if(isset($_POST["SubmitSearch"])){
    $search = $_POST["search"];

    $sqli = mysqli_query($connection,"SELECT * FROM product WHERE name LIKE '%$search%' ORDER BY id DESC");
    if($sqli){
      $product = $sqli;
    }else{
      echo "Thử lại ";
    }
  }
  ?>
  <?php 
    if (in_array("list_p", $decode)) {
      // echo "Trong mảng có chứa freetuts.net";
    }else{
      echo "<script type='text/javascript'>alert('Bạn đ** đủ quyền để vào');
      window.location.assign('http://localhost:88/%C4%90%E1%BB%93%20%C3%81n%20PHP/admin/index.php');
      </script>";
    }
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Quản lý sản phẩm</h1>
    </section>
<?php 
// Tìm ssoongr số id trong bảng product
$test= mysqli_query($connection,"SELECT count(id) as total FROM product");
$t = mysqli_fetch_assoc($test);
$total_records = $t['total'];


//Lấy limit và trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 1;


//TÍNH TOÁN TOTAL_PAGE VÀ START

//tổng số trang
 $total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }

// Tìm Start
        $start = ($current_page - 1) * $limit;


// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $product = mysqli_query($connection, "SELECT * FROM product ORDER BY id DESC LIMIT $start, $limit ");
 ?>


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


          <div class="pagination" style="text-align: center;display: block;">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
           $k = (($current_page+2>$total_page)?$total_page-2:(($current_page-2<1)?3:$current_page));
           if ($current_page > 1 && $total_page > 1){
            echo '<a href="DS_product.php?page=1"><span class="glyphicon glyphicon-triangle-left"></span></a>  ';
            echo '<a href="DS_product.php?page='.($current_page-1).'"><span class="glyphicon glyphicon-chevron-left"></span></a>  ';
          }

            // Lặp khoảng giữa
          for ($i = -2; $i <= 2; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
            if ($k + $i == $current_page){
              echo '<span style="padding:10px"><a href="DS_Product.php?page='.($k+$i).'">'.($k+$i).'</a></span>';
            }
            else{
              echo '<span style="padding:10px"><a href="DS_Product.php?page='.($k+$i).'">'.($k+$i).'</a></span>';
            }
          }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
          if ($current_page < $total_page && $total_page > 1){
            echo '<a href="DS_product.php?page='.($current_page+1).'"><span class="glyphicon glyphicon-chevron-right"></span> </a> ';
            echo '<a href="DS_product.php?page='.$total_page.'"><span class="glyphicon glyphicon-triangle-right"></span> </a> ';
          }else{
            echo '<span>Hết</span>   ';
          }
          ?>
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