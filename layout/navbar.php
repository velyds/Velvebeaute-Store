<?php
session_start();
include "koneksi.php";
?>
<div class="banner-top container-fluid" id="home">
	<!-- header -->
	<header>
		<div class="row">
			<div class="col-md-3 top-info text-left mt-lg-4">
				<h6>Instagram</h6>
				<ul>
					<li><i class="fab fa-instagram"></i> velve.beaute</li>
				</ul>
			</div>
			<div class="col-md-6 logo-w3layouts text-center">
				<h1 class="logo-w3layouts">
					<a class="navbar-brand" href="index.php">
					VELVE BEAUTE </a>
				</h1>
			</div>
			<div class="col-md-3 top-info-cart text-right mt-lg-4">
				<ul class="cart-inner-info">
					<li class="button-log">
						<?php if (isset($_SESSION['pelanggan'])) {
							$pelanggan = $koneksi->query("SELECT * FROM tb_customers WHERE id_pelanggan = $_SESSION[id_pelanggan]")->fetch_assoc();

						?>
							<a class="" href="#">
								<span class="fa fa-user" aria-hidden="true"> <?= $pelanggan['nama_pelanggan']; ?></span>
							</a>
						<?php
						} else {
						?>
							<a class="btn-open" href="#">
								<span class="fa fa-user" aria-hidden="true"></span>
							</a>
						<?php } ?>
					</li>
					<li class="galssescart galssescart2 cart cart box_1">
						<form action="checkout.php" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="top_googles_cart" type="submit" name="submit" value="">
								My Cart
								<i class="fas fa-cart-arrow-down"></i>
							</button>
						</form>
					</li>
				</ul>
				<!---->
				<div class="overlay-login text-left">
					<button type="button" class="overlay-close1">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<div class="wrap">
						<?php if (isset($_SESSION['pelanggan'])) {
						?>
				
							<form action="" method="post">
								<a href="me.php?page=alamat" class="btn btn-primary submit mb-4">Alamat</a>
								<button type="submit" name="logout" class="btn btn-primary submit mb-4"> Logout</button>
							</form>
							<?php
							if (isset($_POST['logout'])) {
								session_destroy();
								header("location: index.php");
							}
						} else {
							?>
							<h5 class="text-center mb-4">Login Now</h5>
							<div class="login p-5 bg-dark mx-auto mw-100">
								<form action="" method="post">
									<div class="form-group">
										<label class="mb-2">Email address</label>
										<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
									</div>
									<div class="form-group">
										<label class="mb-2">Password</label>
										<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
									</div>
									<a>
										<button type="submit" name="login" class="btn btn-primary submit mb-4"> Login</button></a>
										<button type="button" name="regis" class="btn btn-primary submit mb-4" onclick="window.location.href='regis.php'"> Register</button></a>
								</form>
							</div>
						<?php } ?>
						<!---->
					</div>
				</div>

				<?php
				if (isset($_POST["login"])) {
					$email = $_POST["email"];
					$password = md5($_POST["password"]);
					$ambil = $koneksi->query("SELECT * FROM tb_customers
                    WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

					$akunyangcocok = $ambil->num_rows;

					if ($akunyangcocok == 1) {
						$akun = $ambil->fetch_assoc();

						// $_SESSION["tb_customers"] = $akun;
						$_SESSION['pelanggan'] = true;
						$_SESSION['id_pelanggan'] = $akun['id_pelanggan'];
						echo "<script>alert('anda sukses login');</script>";
						echo "<script>location='checkout.php';</script>";
					} else {
						echo "<script>alert('anda gagal login, periksa akun anda');</script>";
						echo "<script>location='index.php';</script>";
					}
				} ?>
				<!---->
			</div>
		</div>
		<div class="search">
			<div class="mobile-nav-button">
				<button id="trigger-overlay" type="button">
					<i class="fas fa-search"></i>
				</button>
			</div>
			<!-- open/close -->
			<div class="overlay overlay-door">
				<button type="button" class="overlay-close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
				<form action="product.php" method="GET" class="d-flex">
					<input class="form-control" type="search" placeholder="Search here..." name="q">
					<button type="submit" class="btn btn-primary submit">
						<i class="fas fa-search"></i>
					</button>
				</form>
			</div>
			<!-- open/close -->
		</div>
		<label class="top-log mx-auto"></label>
		<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">
			<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">

				</span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-mega mx-auto">
					<li class="nav-item active">
						<a class="nav-link ml-lg-0" href="index.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<?php
					include "layout/menu.php";
					?>
				</ul>
			</div>
		</nav>
	</header>
	<!-- //header -->
	<!-- banner -->
	<?php
	if ($_SERVER['REQUEST_URI'] == "/toko_online/index.php") { ?>
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="carousel-caption text-center">
							<h3>Body Care
								<span>Best Product</span>
							</h3>
							<a href="product.php?category=bodycare" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
					<div class="carousel-item item2">
						<div class="carousel-caption text-center">
							<h3>Skin Care
								<span> Pre-Order</span>
							</h3>
							<a href="product.php?category=skincare" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item3">
						<div class="carousel-caption text-center">
							<h3>Lip Care
								<span>Pre-Order</span>
							</h3>
							<a href="product.php?category=skincare" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item4">
						<div class="carousel-caption text-center">
							<h3> Shopping Now
								<!DOCTYPE html>
								<html lang="en">
								<span>For Your Best Skin</span>
							</h3>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--//banner -->
		</div>
	<?php
	} ?>
</div>