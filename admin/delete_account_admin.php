<?php 
  include "../config/connect.php";

  //Lấy giá reij theo id
  $id=$_GET['id'];

  // thực hiện xóa
  $sql = mysqli_query($connection,"DELETE FROM `account` WHERE `account`.`id` = $id");

  //Chuyển hướng
  if($sql){
  	 header('location:DS_Account_admin.php');

  	}else{
  		echo "Xóa tài khoản thất bại!";
  	}
 
?>
