<?php 
  include "../config/connect.php";

  //Lấy giá reij theo id
  $id=$_GET['id'];
  $qr = mysqli_query($connection,"SELECT * FROM product WHERE id = $id");
  $pro = mysqli_fetch_assoc($qr);
  if ($pro) {
    //Xóa ảnh
    $file_name = '../uploads/'.$pro['image'];
    if (file_exists($file_name)) {
    unlink($file_name);
    }
  }
  // thực hiện xóa
  $sql = mysqli_query($connection,"DELETE FROM product WHERE id=$id");

  //Chuyển hướng
  if($sql){
  	 header('location:DS_Product.php');

  	}else{
  		echo "Xóa không thành công";
  	}
 
?>