<?php include"header_admin.php";

		

 ?>
      <?php 
      if(isset($_SESSION['login_admin'])){
        $admin = $_SESSION['login_admin'];
        $id = $admin['level'];
        $sql = mysqli_query($connection,"SELECT * FROM permission WHERE id = $id");
        foreach ($sql as $value) {
          $decode=json_decode($value['permissions'],true);
        }

        if (in_array("add_gr", $decode)) {
          // echo "Trong mảng có chứa freetuts.net";
        }else{
          echo "<script type='text/javascript'>alert('Bạn đ** đủ quyền để vào');
          window.location.assign('http://localhost:88/%C4%90%E1%BB%93%20%C3%81n%20PHP/admin/index.php');
          </script>";
        }
      }
      ?>
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Thêm nhóm account</h1>
    	<?php if (isset($_POST['btn-add-group'])) {
    		$name= isset($_POST['name']) ? $_POST['name'] : '';
    		$permissions= isset($_POST['permissions']) ? $_POST['permissions'] : '';
    		$json=json_encode($permissions);
    		$sql="INSERT INTO `permission` (`name`, `permissions`) VALUES ('$name', '$json')";
    		if ($sql) {
    			if (mysqli_query($connection,$sql)) {
    				header('location: DS_Permissions.php');
    			}else{
    				echo "Tạo nhosm quyenfe thất bại";
    			}
    		}
    	} 
// print_r($sql);
    	?>
    </section>

    		<!-- Main content -->
    		<section class="content">
    		
    		  <!-- Default box -->
    		  <div class="box">
    		    <div class="box-body">
    		    <form action="" method="POST" role="form" >
    		    	<div class="form-group">
    		    		<label for="">Tên nhóm tài khoản</label>
    		    		<input type="text" class="form-control" name="name" placeholder="Tên nhóm tài khoản">
    		    	</div>
    		    	<div  class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">Product</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="list_p" name="permissions[]">Danh sách
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="add_p" name="permissions[]">Thêm mới
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="edit_p" name="permissions[]">Sửa
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="delete_p" name="permissions[]">Xóa
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">Thuộc tính</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="list_attr" name="permissions[]">Danh sách
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="add_attr" name="permissions[]">Thêm mới
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="edit_attr" name="permissions[]">Sửa
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="delete_attr" name="permissions[]">Xóa
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">Danh mục</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="list_cate" name="permissions[]">Danh sách
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="add_cate" name="permissions[]">Thêm mới
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="esit_cate" name="permissions[]">Sửa
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="delete_cate" name="permissions[]">Xóa
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">Banner</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="list_b" name="permissions[]">Danh sách
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="add_b" name="permissions[]">Thêm mới
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="edit_b" name="permissions[]">Sửa
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="delete_b" name="permissions[]">Xóa
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">QL đơn hàng</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="" name="permissions[]">Danh sách
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">QL khách hàng</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="add_ac" name="permissions[]">Danh sách
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    		    		<label for="">QL nhóm group</label>
    		    		<div class="checkbox">
    		    			<label>
    		    				<input type="checkbox" value="list_gr" name="permissions[]">Danh sách
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="add_gr" name="permissions[]">Danh sách
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="edit_gr" name="permissions[]">Sửa
    		    			</label><br/>
    		    			<label>
    		    				<input type="checkbox" value="delete_gr" name="permissions[]">Xóa
    		    			</label><br/>
    		    		</div>
    		    	</div>
    		    <div class="clearfix"></div>
    		    	<button type="submit" name="btn-add-group" class="btn btn-primary">Lưu</button>
    		    </form>
    		    </div>
    		    <!-- /.box-body -->
    		  </div>
    		  <!-- /.box -->
    		
    		</section>
    	</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include "footer.php"?>