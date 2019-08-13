  <?php 
  include "header_admin.php";
  $cate = mysqli_query($connection,"SELECT * FROM `category`");
  $categoty=array();
  // $ca = mysqli_fetch_assoc($cate);
  while ($row = mysqli_fetch_assoc($cate)) {
    $categoty[]=$row;
  }
  
  function dequy($categoty,$parent_id=0,$text=""){
          foreach ($categoty as $key => $value) {
            if($value['parent_id']==$parent_id){
              echo '<option value="'.$value['id'].'">';
                echo $text.$value['name'];
              echo '</option>';
              $id = $value['id'];
              unset($categoty[$key]);
              dequy($categoty,$id,$text.$value['name']." > ");
            }
          }
  }
 ?>

  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Thêm mới danh mục</h1>
    </section>  
        <?php 
      if (in_array("add_cate", $decode)) {
        // echo "Trong mảng có chứa freetuts.net";
      }else{
        echo "<script type='text/javascript'>alert('Bạn đ** đủ quyền để vào');
        window.location.assign('http://localhost:88/%C4%90%E1%BB%93%20%C3%81n%20PHP/admin/index.php');
        </script>";
      }
    ?>
    <!-- Main content -->
    <section class="content">
  <?php 
  // echo "<pre>";
  // dequy($categoty);

  // var_dump($ca);
  // echo "</pre>";
  ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
         <?php
         if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $parent_id=$_POST['parent_id'];
          $ordering=$_POST['ordering'];
          $status=$_POST['status'];
          $sql_1 = "INSERT INTO `category` ( `name`, `parent_id`,`ordering`, `status`) VALUES ('$name',$parent_id,$ordering, $status)";
          $res = mysqli_query($connection,$sql_1);
          if ($res) {
            header('location:DS_category.php');
            // echo "Thành công";
           // echo "<script type='text/javascript'>alert('Thành công');</script>";
          }else{
            echo "Thêm mới không thành công. Bạn đã có tên này trong danh mục";
          }
        }
        ?>

          <form action="" method="POST">
            <div class="form-group">
              <label for="">Tên danh mục</label>
              <input type="text" name="name" class="form-control" placeholder="Tên danh mục" >
            </div>
            <div class="form-group">
              <label for="">Danh mục cha</label>
              <select name="parent_id" id="input" class="form-control" >
                <option value="0">------------Chọn danh mục-----------</option>
               <?php dequy($categoty); ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Thứ tự sắp xếp</label>
              <input type="text" name="ordering" class="form-control" placeholder="Thứ tự sắp xếp" >
            </div>
            <div class="form-group">
              <label for="">Trạng thái</label>
              <div class="radio">
                <label>
                  <input type="radio" name="status" id="input" value="1" checked="checked">Hiện
                </label> 
                <label>
                  <input type="radio" name="status" id="input" value="0" checked="checked">Ẩn
                </label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary" name ="submit" >Gửi</button>
          </form>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <?php include"footer.php" ?>