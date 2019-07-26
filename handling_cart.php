<?php 
	session_start();

	include 'config/connect.php';

	$id = isset($_GET['id']) ? $_GET['id'] : 0;

	$action = isset($_GET['action']) ? $_GET['action'] : 'add';
	$sizeBuy = isset($_GET['sizeBuy']) ? $_GET['sizeBuy'] : '';
	$colorBuy = isset($_GET['colorBuy']) ? $_GET['colorBuy'] : '';

	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

	$quantity = $quantity > 0 ? $quantity : 1;

	$qr = mysqli_query($connection, "SELECT * FROM product WHERE id = $id");
	
	$row= mysqli_fetch_assoc($qr);
	$price = $row['sale_price'] ? $row['sale_price'] : $row['price'];
	$si = mysqli_query($connection,"SELECT id from attribute WHERE name = '$sizeBuy'");
	$s = mysqli_fetch_assoc($si);
	$size = $s["id"];
	$co = mysqli_query($connection,"SELECT id from attribute WHERE name = '$colorBuy'");
	$c = mysqli_fetch_assoc($co);
	$color = $c["id"];


	echo "</pre>";
	if ($row && $action == 'add') {
		if (isset($_SESSION['cart'][$id.$size.$color])) {
			$_SESSION['cart'][$id.$size.$color]['quantity'] += 1;
		}else{
			$_SESSION['cart'][$id.$size.$color]=[
				'id' => $row['id'],
				'name' => $row['name'],
				'image' => $row['image'],
				'price' => $price,
				'quantity' => $quantity,
				'sizeBuy' => $sizeBuy,
				'colorBuy' => $colorBuy,
				'tatolPrice' => $price*$quantity,
			];	
		}
	}

	if ($action == 'update') {

		if (isset($_SESSION['cart'][$id.$size.$color])) {
		if($quantity>0 && is_numeric($quantity) ){
			$_SESSION['cart'][$id.$size.$color]['quantity'] = $quantity;
		}else{
			$_SESSION['cart'][$id.$size.$color]['quantity']=1;
		}
		
		}
	}
	if($action == 'xoa'){
		if (isset($_SESSION['cart'][$id.$size.$color])) {
			unset($_SESSION['cart'][$id.$size.$color]);
		}
		
	}
	if ($action == 'clear') {
		if (isset($_SESSION['cart'])) {
		unset($_SESSION['cart']);
		}
	}

	header('location: cart.php');
?>