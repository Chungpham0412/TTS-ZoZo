<?php 

$carts= isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

function tong_so_luong(){
	$t = 0;
	global $carts;
	if (isset($_SESSION['cart'])) {
	foreach ($carts as $c ) {
		$t = $t + $c['quantity'];
	}
}

	return $t;
}
function tong_tien(){
	$t = 0;
	global $carts;
	if(isset($_SESSION['cart'])) {
		foreach ($carts as $c ) {
		$t =$t + ($c['quantity']*$c['price']);
	}}

	return $t;
}

?>