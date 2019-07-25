<?php include"header_admin.php" ?>
  <!-- Left side column. contains the sidebar -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách đơn hàng
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
        <div class="box-body">
         <table class="table table-hover">
        <thead>
          <?php 
            $sqlJoin = "SELECT orders.id, orders.created, orders.status, SUM(order_detail.price*order_detail.quantity) as 'total' FROM orders JOIN order_detail ON orders.id = order_detail.order_id GROUP BY  orders.id, orders.created, orders.status";
            $orders = mysqli_query($connection,$sqlJoin);
          ?>
          <tr>
            <th>STT</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $n=1; if($orders) : foreach ($orders as $od ) :?>
          <tr>
            <td><?php echo $n ?></td>
            <td><?php echo $od['created'] ?></td>
            <td><?php echo number_format($od['total'])." "."đ" ?></td>
            <td>
              <?php if($od['status']==2) :?>
                <span class="label label-primary">Đã giao hàng</span>
              <?php elseif($od['status']==1) :?>
                <span class="label label-success">Đã duyệt</span>
              <?php else : ?>
                <span class="label label-danger">Chưa dyệt</span>
              <?php endif; ?>
            </td>
            <td>
              <a href="order_detail.php?id=<?php echo $od['id'] ?>" class=" btn-xs btn-success">Xem</a>
            </td>
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