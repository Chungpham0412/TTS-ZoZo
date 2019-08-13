<?php
	$connection = mysqli_connect('localhost','root','','test');
	mysqli_set_charset($connection,'utf8');
	$cats = mysqli_query($connection, "SELECT * FROM category");
  	$product = mysqli_query($connection, "SELECT * FROM product ORDER BY id DESC");
  
?>