<?php 
  include "../config/connect.php";
  //Lấy giá reij theo id
  $id=$_GET['id'];

  // thực hiện xóa
  $sql = mysqli_query($connection,"DELETE FROM attribute WHERE id=$id");

  //Chuyển hướng
  if($sql){
  	 header('location:DS_attribute.php');

  	}else{
  		echo "Xóa không thành công";
  	}
 
?>