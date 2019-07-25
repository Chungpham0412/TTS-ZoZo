<?php include "config/connect.php";
session_start();
ob_start();
include "config/cart-function.php";
include "config/function_sent_mail.php";
// include '../Mailler/PHPMailerAutoload.php'
 $man = mysqli_query($connection, "SELECT * FROM category WHERE parent_id = 1 AND status = 1");
 $woman = mysqli_query($connection, "SELECT * FROM category WHERE parent_id = 2 AND status = 1");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Flatize - Shop HTML5 Responsive Template">
	<meta name="author" content="pixelgeeklab.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flatize</title>
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>

	<!-- Bootstrap -->
	<link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Icon Fonts -->
	<link href="public/css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Owl Carousel Assets -->
	<link href="public/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="public/vendor/owl-carousel/owl.theme.css" rel="stylesheet">
	<link href="public/vendor/owl-carousel/owl.transitions.css" rel="stylesheet">
	
	<!-- bxslider -->
	<link href="public/vendor/bxslider/jquery.bxslider.css" rel="stylesheet">
	<!-- flexslider -->
	<link rel="stylesheet" href="public/vendor/flexslider/flexslider.css" media="screen">

	<!-- Theme -->
	<link href="public/css/theme-animate.css" rel="stylesheet">
	<link href="public/css/theme-elements.css" rel="stylesheet">
	<link href="public/css/theme-blog.css" rel="stylesheet">
	<link href="public/css/theme-shop.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="public/css/main.css">

	<link href="public/css/theme.css" rel="stylesheet">
	<!-- <link href="theme.css" rel="stylesheet"> -->
	
	<!-- Style Switcher-->
	<link rel="stylesheet" href="public/style-switcher/css/style-switcher.css">
	<link href="public/css/colors/cyan/style.html" rel="stylesheet" id="layoutstyle">

	<!-- Theme Responsive-->
	<link href="public/css/theme-responsive.css" rel="stylesheet">

	<!-- login -->
	<link rel="stylesheet" type="images/png" href="public/images/icons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="public/css/util.css">
</head>
<body>
	<header>

		<nav class="navbar navbar-default navbar-main navbar-main-slide" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span> 
							<span class="icon-bar"></span> <span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
						</button>
					<a class="logo" href="index.php"><img src="public/images/logo.png" alt="Flatize"></a> 

					<!-- Tìm kiếm -->
						
				</div>
					<div class="navbar-collapse collapse" >
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								
									
								<?php if (isset($_SESSION['login'])) :
									$c= $_SESSION['login'];
								?>
									<a href="#"><i class="fa fa-user-circle"></i></a>
									<ul class="dropdown-menu">
										<li><a href="profile.php">Hi, <?php echo $c['name'] ?></a></li>
										<li><a href="history_order.php">Lịch sử đặt hàng</a></li>
										<li><a href="logout.php">Đăng xuất</a></li>
									</ul>
								<?php else : ?>
									<a href="#"><i class="fa fa-user"></i></a>
									<ul class="dropdown-menu">
										<li><a href="registration.php">Đăng kí</a></li>
										<li><a href="login.php">Đăng nhập</a></li>
									</ul>
								<?php endif; ?>
								
							</li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<li class="dropdown"><a href="product.php">Sản phẩm</a>
								<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a> -->
								<ul class="dropdown-menu">
									<li class="dropdown-submenu">
										<a href="product_man.php">Thời trang nam</a>
										<ul class="dropdown-menu">
											<?php foreach ($man as $cat) {?>
										<li><a href="category.php?id=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
											<?php } ?>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="product_woman.php">Thời trang nữ</a>
										<ul class="dropdown-menu">
											<?php foreach ($woman as $cat) {?>
										<li><a href="category.php?id=<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
											<?php } ?>
										</ul>
									</li>							
								</ul>
							</li>
							<li><a href="blog.php">Blog</a></li>
							<li>
								<a href="cart.php" class="glyphicon glyphicon-shopping-cart">
									<?php echo tong_so_luong() ?>
								</a>
							</li>
							<li class="search"><a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a></li>
						</ul>
					</div><!--/.nav-collapse --> 
				</div><!--/.container-fluid --> 
			</nav>
		</header>
		
