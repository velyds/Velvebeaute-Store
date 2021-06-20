
<?php
include "koneksi.php";
?>
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4"> Best Product </h3>
				<div class="row">
					<!-- /womens -->
					<?php 
						$sql = $koneksi->query("SELECT * FROM tb_product");

						while ($product = $sql->fetch_assoc()) :
					?>
					<div class="col-md-3 product-men women_two pt-3">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img src="fotoproduk/<?= $product['foto_produk'] ?>" class="img-fluid" alt="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
											<a href="single.php?id=<?php echo $product["id_produk"]; ?>"
											 class="link-product-add-cart"> Quick View</a>
										</div>
									</div>
									<span class="product-new-top">Best</span>
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a><?= $product['nama_produk'] ?></a>
												</h4>
												<div class="grid-price mt-2">
													<span class="item_price">Rp. <?= number_format($product['harga_produk']) ?></span>
												</div>
											</div>
											<ul class="stars">
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
										<div class="googles single-item hvr-outline-out">
											<form action="" method="post">
												<input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="id_produk" value="<?= $product['id_produk']?>">
												<input type="hidden" name="googles_item" value="<?= $product['nama_produk']?>">
												<input type="hidden" name="berat_produk" value="<?= $product['berat_produk']?>">
												<input type="hidden" name="amount" value="<?= $product['harga_produk']?>">
												<!-- <input type="hidden" name="currency_code" value="IDR"> -->
												<button type="submit" class="googles-cart pgoogles-cart">
													<i class="fas fa-cart-plus"></i>
												</button>
											</form>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<?php
						endwhile;
					?>
				</div>
				<div class="row">
					<div class="col-md-12 middle-slider my-4">
						<div class="middle-text-info ">
							<h3 class="tittle-w3layouts two text-center my-lg-4 mt-3">The best product is here!</h3>
							<div class="simply-countdown-custom" id="simply-countdown-custom"></div>
						</div>
					</div>
				</div>
				<!--//meddle-->
				<!--/slide-->
				<div class="slider-img mid-sec">
					<!--//banner-sec-->
					<div class="mid-slider">
						<div class="owl-carousel owl-theme row">
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="man-pro-item">
												<div class="man-thumb-item">
													<img src="images/sar1.jpg" class="img-fluid" alt="">
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a>Body lotion (Romansa)</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">Rp.75.000</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">
															<form action="#" method="post">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Body lotion (Romansa)">
																<input type="hidden" name="amount" value="75.000">
																<!--<button type="submit" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>-->
															</form>

														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="man-pro-item">
												<div class="man-thumb-item">
													<img src="images/sar2.jpg" class="img-fluid" alt="">
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a>Body lotion (Charming)</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">Rp.75.000</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">
															<form action="#" method="post">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Body lotion (Charming)">
																<input type="hidden" name="amount" value="75.000">
																<!--<button type="submit" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>-->
															</form>

														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="man-pro-item">
												<div class="man-thumb-item">
													<img src="images/sar3.jpg" class="img-fluid" alt="">
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a>Body lotion (Fantasia)</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">Rp.75.000</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">
															<form action="#" method="post">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Body lotion (Fantasia)">
																<input type="hidden" name="amount" value="75.000">
																<!--<button type="submit" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>-->
																</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="man-pro-item">
												<div class="man-thumb-item">
													<img src="images/sar7.jpg" class="img-fluid" alt="">
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a>Body Scrub (Romansa)</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">Rp.75.000</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">
															<form action="#" method="post">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Body Scrub (Romansa)">
																<input type="hidden" name="amount" value="75.000">
																<!--<button type="submit" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>-->
															</form>

														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="man-pro-item">
												<div class="man-thumb-item">
													<img src="images/sar8.jpg" class="img-fluid" alt="">
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a>Body Scrub (Pomegrante)</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">Rp.75.000</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">
															<form action="#" method="post">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Body Scrub (Pomegrante)">
																<input type="hidden" name="amount" value="75.000">
																<!--<button type="submit" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>-->
															</form>

														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="man-pro-item">
												<div class="man-thumb-item">
													<img src="images/sar6.jpg" class="img-fluid" alt="">
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a>Face Serum (Acne)</a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">Rp.75.000</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<div class="googles single-item hvr-outline-out">
															<form action="#" method="post">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1">
																<input type="hidden" name="googles_item" value="Face Serum (Acne)">
																<input type="hidden" name="amount" value="75.000">
																<!--<button type="submit" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>-->
															</form>

														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /testimonials -->
				<div class="testimonials py-lg-4 py-3 mt-4">
					<div class="testimonials-inner py-lg-4 py-3">
						<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Tesimonials</h3>
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
									<div class="testimonials_grid text-center">
										<h3>Maderay
											<span>Customer</span>
										</h3>
										<label>Indonesia</label>
										<p>Muka saya jadi glowing gitu mengkilap walaupun cerah perlahan tapi bikin
											kulit lembut banget.
										</p>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testimonials_grid text-center">
										<h3>Sultan
											<span>Customer</span>
										</h3>
										<label>Indonesia</label>
										<p>Pake sabun ini (chocowhite) emang bikin cerah gitu,bisa balikin warna kulit asli.gue baru
											4 hari pemakaian padahal.</p>
									</div>
								</div> 
								<div class="carousel-item">
									<div class="testimonials_grid text-center">
										<h3>Anisa
											<span>Customer</span>
										</h3>
										<label>Indonesia</label>
										<p> Sabun gluta collagen ini wangi suka banget!</p>
									</div>
								</div>
								<a class="carousel-control-prev test" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="fas fa-long-arrow-alt-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next test" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>

								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- //testimonials -->
				<!-- simbol -->
				<div class="row galsses-grids pt-lg-5 pt-3">
					<div class="col-lg-6 galsses-grid-left">
						<figure class="effect-lexi">
							<img src="images/review.jpg" alt="" class="img-fluid">
							<figcaption>
								<h3>REVIEW PRODUCT</h3>
								<p> Shopping now.</p>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-6 galsses-grid-left">
						<figure class="effect-lexi">
							<img src="images/thnkyou.jpg" alt="" class="img-fluid">
							<figcaption>
								<h3>THANK YOU</h3>
								<p> Shopping now.</p>
							</figcaption>
						</figure>
					</div>
				</div>
				<div class="testimonials p-lg-5 p-3 mt-4">
					<div class="row last-section">
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-gift"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Genuine Product</h3>
								<p>Original Product and Best Seller</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-shield-alt"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Secure Products</h3>
								<p>Safe Product Packaging</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Payment</h3>
								<p>BCA , DANA </p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-truck"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Delivery</h3>
								<p>GRAB SEND, JNE , SICEPAT , J&T </p>
							</div>
						</div>
					</div>
				</div>
				<!-- simbol -->
			</div>
		</div>
	</section>