<?php
require "./vendor/autoload.php";

// MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
session_start();
error_reporting(E_ERROR | E_PARSE);
$user = $_SESSION['logData'];
if ($user['status'] != 1) {
	echo "<script>alert('invalid user');</script>";
    echo "<script>location.href='./Login.php'</script>";
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<!-- <div class="colorlib-loader"></div> -->

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index.php">Ascot</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
							<form action="#" class="search-wrap">
								<div class="form-group">
									<input type="search" class="form-control search" placeholder="Search">
									<button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="#">products</a>
									<ul class="dropdown">
										<li><a href="product-detail.html">Product Detail</a></li>
										<li><a href="cart.html">Shopping Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="order-complete.html">Order Complete</a></li>
										<li><a href="add-to-wishlist.html">Wishlist</a></li>
									</ul>
								</li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
								<li class="cart"><a href="cart.php"><i class="icon-shopping-cart"></i> Cart</a></li>
								<li class="logout"><a href="userlogout.php"><i class="icon-user-x"></i></a>Logout</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/img_bg_1.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 offset-sm-3 text-center slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Men's</h1>
											<h2 class="head-2">Shoes</h2>
											<h2 class="head-3">Collection</h2>
											<p class="category"><span>New trending shoes</span></p>
											<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_2.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 offset-sm-3 text-center slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">Huge</h1>
											<h2 class="head-2">Sale</h2>
											<h2 class="head-3"><strong class="font-weight-bold">50%</strong> Off</h2>
											<p class="category"><span>Big sale sandals</span></p>
											<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_3.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6 offset-sm-3 text-center slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<h1 class="head-1">New</h1>
											<h2 class="head-2">Arrival</h2>
											<h2 class="head-3">up to <strong class="font-weight-bold">30%</strong> off</h2>
											<p class="category"><span>New stylish shoes for men</span></p>
											<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">It started with a simple idea: Create quality, well-designed products that I wanted myself.</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/men.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Men's Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/women.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Women's Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
						<h2>Best Sellers</h2>
					</div>
				</div>
				<?php
				require "./vendor/autoload.php";

				// MongoDB connection
				$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
				$collection = $mongoClient->Micro->Product_tbl;
				$count=0;
				$products = $collection->find();

				?>
				<div class="row row-pb-md">
					<?php foreach ($products as $product) {
						if ($count< 6) {  ?>

						<div class="col-lg-3 mb-4 text-center">
							<div class="product-entry border">
								<a href="#" class="prod-img">
									<img src="./images/products/<?= $product['Image'] ?>" class="img-fluid">
								</a>
								<div class="desc">
									<h2><a href="#"><?= $product['Name'] ?></a></h2>
									<span class="price"><?= $product['Price'] ?></< /span>
								</div>
								<div class="add-to-cart">
                     			 <button class="btn  btn-primary addToCartBtn" id="<?= $product['_id'] ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
							</div>
						</div>
					<?php
					$count++ ;
					}
					else{
					break;}
					
				} ?>
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<p><a href="#" class="btn btn-primary btn-lg">Shop All Products</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">Contact</a></li>
							<li><a href="#">Returns/Exchange</a></li>
							<li><a href="#">Gift Voucher</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Special</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Site maps</a></li>
						</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Delivery Information</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Order Tracking</a></li>
						</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 Kerala 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">Ascot@gmail.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- popper -->
	<script src="js/popper.min.js"></script>
	<!-- bootstrap 4.1 -->
	<script src="js/bootstrap.min.js"></script>
	<!-- jQuery easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

</body>
<script>
  $(document).ready(function() {
    $(".addToCartBtn").click(function() {
      var proid = $(this).attr("id");
      alert(proid);
      $.ajax({
        url: "./addcart.php", // Assuming addToCart.php is your PHP script
        type: "POST",
        data: {
          id: proid
        },
        success: function(response) {
          console.log(response);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
  });
</script>

</html>