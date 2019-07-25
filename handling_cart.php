<?php 
	session_start();
	// session_destroy();
	include 'config/connect.php';

	// var_dump($_SESSION['cart']); die();
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$action = isset($_GET['action']) ? $_GET['action'] : 'add';
	$sizeBuy = isset($_GET['sizeBuy']) ? $_GET['sizeBuy'] : '';
	$colorBuy = isset($_GET['colorBuy']) ? $_GET['colorBuy'] : '';
	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
	$quantity = $quantity > 0 ? $quantity : 1;
	$qr = mysqli_query($connection, "SELECT * FROM product WHERE id = $id");
	
	$row= mysqli_fetch_assoc($qr);
	$price = $row['sale_price'] ? $row['sale_price'] : $row['price'];

	if ($row && $action == 'add') {
		if (isset($_SESSION['cart'][$id]['sizeBuy'])) {
			$_SESSION['cart'][$id]['quantity'] += 1;
		}else{
			$_SESSION['cart'][$id]=[
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
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantity'] = $quantity;
		}
	}
	if ($action == 'clear') {
		if (isset($_SESSION['cart'])) {
		unset($_SESSION['cart']);
		}
	}
	echo '<pre>';
	print_r($_SESSION['cart']);
	header('location: cart.php');
?>