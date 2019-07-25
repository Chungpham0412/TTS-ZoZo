 <?php 
	session_start();
	// session_destroy();
	include 'config/connect.php';
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$action = isset($_GET['action']) ? $_GET['action'] : 'add';
	$sizeBuy = isset($_GET['sizeBuy']) ? $_GET['sizeBuy'] : '';
	$colorBuy = isset($_GET['colorBuy']) ? $_GET['colorBuy'] : '';

	$size = mysqli_query($connection,"SELECT id FROM attribute WHERE name ='$sizeBuy'");
	$sizeVa = mysqli_fetch_assoc($size);
	$si = $sizeVa['id'];

	$color = mysqli_query($connection,"SELECT id FROM attribute WHERE name ='$colorBuy'");
	$colorVa = mysqli_fetch_assoc($color);
	$co = $colorVa['id'];

	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;


	$quantity = $quantity > 0 ? $quantity : 1;

	$qr = mysqli_query($connection, "SELECT * FROM product WHERE id = $id");
	
	$row= mysqli_fetch_assoc($qr);
	$price = $row['sale_price'] ? $row['sale_price'] : $row['price'];

	if ($row && $action == 'add') {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id.$si.$co]['quantity'] += 1;
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
		var_dump($co)  ;die;
		// print_r($_SESSION['cart'][$id]);die;
		if (isset ($_SESSION['cart'][$id]) ){
	
			$_SESSION['cart'][$id]['quantity'] = $quantity;
		}
	}
	if ( $action == 'clear') {
		if (isset($_SESSION['cart'])) {
		unset($_SESSION['cart']);
		}
	}
	if ($row && $action == 'delete') { 
		if(isset($_SESSION['cart'][$id])){
					unset($_SESSION['cart'][$id]);

		}
	}
	echo '<pre>';
	print_r($_SESSION['cart']);
	header('location: cart.php');
?>