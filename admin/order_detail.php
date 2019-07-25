<?php include"header_admin.php" ?>
  <!-- Left side column. contains the sidebar -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb" style="left: 10px">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="order.php">Danh sách đơn hàng</a></li>
        <li class="active">Chi tiết đơn hàng</li>
      </ol>
       <!-- <h1>Chi tiết đơn hàng</h1> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <?php  $id = isset($_GET['id']) ? $_GET['id'] : 0;

              $sql_Join="SELECT o.id,o.created,o.status,a.name,a.email,a.phone,a.address,SUM(dt.quantity*dt.price) as 'total' FROM orders o JOIN account a ON o.account_id = a.id JOIN order_detail dt ON o.id = dt.order_id WHERE o.id = $id";
              $qr = mysqli_query($connection,$sql_Join);
              // $oder = mysqli_fetch_assos($qr);
              $row = mysqli_fetch_assoc($qr);
            ?>
            <div class="col-md-6">
              <h3>Thông tin đơn hàng</h3>
              <table class="table table-hover">
                <tr>
                  <td>ID</td>
                  <td><?php echo $row['id'] ?></td>
                </tr>
                <tr>
                  <td>Ngày đặt</td>
                  <td><?php echo $row['created'] ?></td>
                </tr>
                <tr>
                  <td>Tổng tiền</td>
                  <td><?php echo number_format($row['total'])." "."đ" ?></td>
                </tr>
                <tr>
                  <td>Trạng thái</td>
                  <td>
                    <?php if($row['status']==2) :?>
                      <span class="label label-primary">Đã giao hàng</span>
                      <?php elseif($row['status']==1) :?>
                      <span class="label label-success">Đã duyệt</span>
                      <a href="order_status.php?id=<?php echo $row['id']?>&status=0" class="label label-danger">Bỏ duyệt</a>
                      <a href="order_status.php?id=<?php echo $row['id']?>&status=2" class="label label-primary">Giao hàng</a>
                    <?php else : ?>
                      <span class="label label-danger">Chưa duyệt</span>
                      <a href="order_status.php?id=<?php echo $row['id']?>&status=1" class="label label-success">Duyệt</a>
                    <?php endif; ?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <h3>Thông tin người mua</h3>
              <table class="table table-hover">
                <tr>
                  <td>Tên</td>
                  <td><?php echo $row['name'] ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php echo $row['email'] ?></td>
                </tr>
                <tr>
                  <td>Số điện thoại</td>
                  <td><?php echo $row['phone'] ?></td>
                </tr>
                <tr>
                  <td>Địa chỉ</td>
                  <td><?php echo $row['address'] ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="box-body">
         <table class="table table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên sản phẩm</th>
              <th>Hành ảnh</th>
              <th>Màu sắc</th>
              <th>Kích thước</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php 
             
              $sqlJoin = "SELECT dt.price,dt.quantity,dt.color,dt.size,p.name,p.image FROM order_detail dt JOIN product p ON dt.product_id = p.id WHERE order_id = $id";

              $order_detail = mysqli_query($connection,$sqlJoin);
            ?>
            <?php $n=1; if($order_detail) : foreach ($order_detail as $c ) :?>
            <tr>
              <td><?php echo $n ?></td>
              <td><?php echo $c['name'] ?></td>
              <td>
                <img src="../uploads/<?php echo $c['image']?>" width="50px">
              </td>
              <td><?php echo $c['color'] ?></td>
              <td><?php echo $c['size'] ?></td>
              <td><?php echo number_format( $c['price']).'đ' ?></td>
              <td>
                <?php echo $c['quantity'] ?>
              </td>
              <td><?php echo number_format( $c['price']*$c['quantity']) ?>đ</td>

            </tr>
          <?php $n++; endforeach; endif;?>
          </tbody>
        </table>
      </div>
        </div>
        <!-- /.box-body -->

      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"?>