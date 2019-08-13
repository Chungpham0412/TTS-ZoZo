<?php include"header_admin.php";
    $quanOrder = mysqli_query($connection,"SELECT COUNT(id) FROM orders");
    $quanAccount = mysqli_query($connection,"SELECT COUNT(id) FROM account WHERE level = 0");
    $quanPrice = mysqli_query($connection,"SELECT SUM(quantity*price) FROM order_detail");
    $quanProduct = mysqli_query($connection,"SELECT COUNT(id) FROM product");
    $row = mysqli_fetch_assoc($quanOrder);
    $row1 = mysqli_fetch_assoc($quanAccount);
    $row2 = mysqli_fetch_assoc($quanPrice);
    $row3 = mysqli_fetch_assoc($quanProduct);
?>
  <!-- Left side column. contains the sidebar -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php 
       if(isset($_SESSION['login_admin'])){
        $admin = $_SESSION['login_admin'];
        // print_r($admin['level']);
        $id = $admin['level'];
        $sql = mysqli_query($connection,"SELECT * FROM permission WHERE id = $id");
        // $per=[];
        foreach ($sql as $value) {
          // print_r($value['permissions']);
          // $per[]=json_decode($value['permissions'],true);
          $decode=json_decode($value['permissions'],true);
        }
        // print_r($sql);
        //   echo "<pre>";
        // print_r($decode);
        //   // print_r($per);
        //   echo "</pre>";
       }
      ?>
      <h1>
       <div class="alert">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <strong>Xin chào bạn:</strong> <?php echo $admin['name'] ?>
       </div>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <table class="table table-hover" border="1px solid black">
            <thead>
              <tr>
                <td align="center">TỔNG SỐ ĐƠN HÀNG</td>
                <td align="center">TỔNG SỐ KHÁCH HÀNG</td>
                <td align="center">TỔNG SỐ DOANH THU</td>
                <td align="center">TỔNG SỐ SẢN PHẨM</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="pull-left">
                    <img src="https://www.freepngimg.com/thumb/cart/2-2-cart-png-file.png" width="100">
                  </div>
                  <div class="pull-right" style="line-height: 100px"><?php echo $row['COUNT(id)'] ; ?> đơn hàng</div>
                </td>
                <td>
                  <div class="pull-left">
                    <img src="https://www.freepngimg.com/thumb/youtube/62644-profile-account-google-icons-computer-user-iconfinder.png" width="100">
                  </div>
                  <div class="pull-right" style="line-height: 100px"><?php echo $row1['COUNT(id)'] ; ?> khách hàng</div>
                </td>
                <td>
                  <div class="pull-left">
                    <img src="https://cdn3.iconfinder.com/data/icons/cash-card-add-on-glyph/48/Sed-36-512.png" width="100">
                  </div>
                  <div class="pull-right" style="line-height: 100px"><?php echo number_format($row2['SUM(quantity*price)'])." "."đ" ; ?></div>
                </td>
                <td>
                  <div class="pull-left">
                    <img src="http://pngriver.com/wp-content/uploads/2018/04/Download-Product-Png-Image-59157-For-Designing-Projects.png" width="100">
                  </div>
                  <div class="pull-right" style="line-height: 100px"><?php echo $row3['COUNT(id)'] ; ?> sản phẩm</div>
                </td>
              
              </tr>
            </tbody>
          </table>
        </div>
<!--         <div class="box-body">
          hihi
        </div> -->
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"?>