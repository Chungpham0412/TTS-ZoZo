<?php 
  include "../config/connect.php";

  //Lấy giá reij theo id
  $id=$_GET['id'];

  // thực hiện xóa
  $sql = mysqli_query($connection,"DELETE FROM banner WHERE id=$id");

  //Chuyển hướng
  if($sql){
  	 header('location:DS_Banner.php');

  	}else{
  		echo "Xóa banner không thành công vui lòng thử lại.";
  	}
 
?>