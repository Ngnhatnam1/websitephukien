
<?php
include('model/connect.php');



// Truy vấn lấy thông tin về các tài khoản đã tạo
$user_sql = "SELECT * FROM user_form";
$user_result = $conn->query($user_sql);
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		
		<?php

			include('header.php');
			include('navigation.php');
			
		?>
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">sản phẩm mới</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">tay nghe</a></li>
									<li><a data-toggle="tab" href="#tab1">bàn phím</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php
											$sql = "SELECT sanpham.tensanpham,sanpham.gia,sanpham.linkanh,Category.tenloai FROM sanpham JOIN new ON sanpham.masp = new.masp
												JOIN Category ON sanpham.maloai =Category.maloai
													";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo '<div class="product">
															<div class="product-img">
																<img src="' . htmlspecialchars($row['linkanh']) . '" alt="' . htmlspecialchars($row['tensanpham']) . '">
																<div class="product-label">
																	<!-- Vị trí ghi giảm giá (nếu có) -->
																</div>
															</div>
															<div class="product-body">
																<p class="product-category">' . htmlspecialchars($row['tenloai']) . '</p>
																<h3 class="product-name"><a href="#">' . htmlspecialchars($row['tensanpham']) . '</a></h3>
																<h4 class="product-price">$' . number_format($row['gia'], 2) . '</h4>
																<div class="product-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																</div>
																<div class="product-btns">
																	<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
																	<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
																	<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
																</div>
															</div>
															<div class="add-to-cart">
																<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
															</div>
														</div>';
												}
											} else {
												echo "Không có sản phẩm nào!";
											}
											
											// Đóng kết nối
											
										?>						
										<!-- /product -->

										

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">tay nghe </a></li>
									<li><a data-toggle="tab" href="#tab2">bàn phím</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">chuột</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">

										<!-- product -->
										<?php
											
											$sql = "SELECT sanpham.tensanpham,sanpham.gia,sanpham.linkanh,Category.tenloai FROM sanpham JOIN topcelling ON sanpham.masp = topcelling.masp
												JOIN Category ON sanpham.maloai =Category.maloai";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													echo '<div class="product">
															<div class="product-img">
																<img src="' . htmlspecialchars($row['linkanh']) . '" alt="">
																<div class="product-label">
																	<!-- Vị trí ghi giảm giá (nếu có) -->
																</div>
															</div>
															<div class="product-body">
																<p class="product-category">' . htmlspecialchars($row['tenloai']) . '</p>
																<h3 class="product-name"><a href="product.php">' . htmlspecialchars($row['tensanpham']) . '</a></h3>
																<h4 class="product-price">$' . number_format($row['gia'], 2) . '</h4>
																<div class="product-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																</div>
																<div class="product-btns">
																	<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
																	<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
																	<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
																</div>
															</div>
															<div class="add-to-cart">
																<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
															</div>
														</div>';
												}
											} else {
												echo "Không có sản phẩm nào!";
											}
											 
											// Đóng kết nối
											
										?>						
										<!-- /product -->

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
		<?php
		include('footer.php')
		?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>

<?php
// Đóng kết nối sau khi truy vấn xong
$conn->close();
?>



