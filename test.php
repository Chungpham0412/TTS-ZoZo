<?php include "header.php";
$id = $_SESSION['login']['id'];
$profile = mysqli_query($connection,"SELECT * FROM account WHERE id = $id");
$row = mysqli_fetch_assoc($profile);
?>
<br>
<div class="container" style="width: 50%">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Thông tin tài khoản</h3>
    </div>
    <div class="panel-body">
      <table class="table table-hover">
        <tr>
          <td>passss</td>
          <td><?php echo $row['password'] ?></td>
        </tr>
        <tr>

<!--        <tr>
          <td>password</td>
          <td><?php //echo $row['password'] ?></td>
        </tr> -->
      </table>
      <a href="profile_edit1.php" class="btn btn-primary">Sửa thông tin</a>
    </div>
  </div>
</div>


<?php include "footer_cart.php" ?>