<?php 
  include "../config/connect.php";

  //Lấy giá reij theo id
  $id=$_GET['id'];

  // thực hiện xóa
  $sql = mysqli_query($connection,"DELETE FROM category WHERE id=$id");

  //Chuyển hướng
  if($sql){
  	 header('location:DS_category.php');

  	}else{
  		echo "Xóa danh mục không thành công vui lòng thử lại";
  	}
 
?>