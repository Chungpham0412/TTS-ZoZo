<?php include"header_admin.php" ?>
  <!-- Left side column. contains the sidebar -->
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php 
       if(isset($_SESSION['login_admin'])){
        $admin = $_SESSION['login_admin'];
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
           <table class="table table-hover">
             <thead>
               <tr>
                 <th>s</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>s</td>
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