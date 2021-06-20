<?php
include "koneksi.php";
include "layout/header.php";
include "layout/navbar.php";
?>

<!-- banner -->
<div class="banner_inner">
	<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>/ Single Page</li>
			</ul>
		</div>
	</div>
</div>
</div>
<!--//banner -->
<!--/shop-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container">
		<div class="inner-sec-shop pt-lg-4 pt-3">
			<h4 class="tittle-w3layouts my-lg-4 my-4"> Detail Product </h4>
			<div class="row">
				<?php
				$id_produk = $_GET["id"];

				$ambil = $koneksi->query("SELECT * FROM tb_product WHERE id_produk='$id_produk'");
				$single = $ambil->fetch_assoc();

				//echo "<pre>";
				//print_r($detail);
				//echo"<pre>";
				?>

				<div class="col-lg-4 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider1">
							<img src="fotoproduk/<?php echo $single['foto_produk']; ?>" class="img-fluid" alt="">
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $single["nama_produk"] ?></h3>
					<div class="color-quality">
						<div class="color-quality-right">
							<span class="money ">Rp. <?= number_format($single['harga_produk']) ?></span>
						</div>
					</div>
					<div class="rating1">
						<ul class="stars">
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<form action="" method="post">
						<div class="color-quality">
							<h5 id="stok"> Stok : <?php echo $single['stok_produk'] ?> </h5>
						</div>
					</form>
					<div class="description">
						<h3> description </h3>
						<p3><?php echo $single["keterangan_produk"] ?></p3>
					</div>
					<form action="" method="post">
						<div class="color-quality">
							<h5> Qty : </h5>
						</div>
					</form>

					<div class="occasion-cart">
						<div class="googles single-item singlepage">	
							<form action="" method="post" id="tambah_keranjang">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="id_produk" value="<?= $single['id_produk'] ?>">
								<input type="hidden" name="googles_item" value="<?= $single['nama_produk'] ?>">
								<input type="hidden" name="amount" value="<?= $single['harga_produk'] ?>" id='jumlah'>
								<!-- input type="hidden" name="currency_code" value="IDR">-->
								<input type="number" min="1" name="quantity" max="<?php echo $single['stok_produk']?>" id="quantity">
								<input type="hidden" name="berat_produk" value="<?= $product['berat_produk']?>">
								<input type="hidden" id="maksimum" value="<?php echo $single['stok_produk']?>">
								<button type="submit" class="googles-cart pgoogles-cart">
									<i class="fas fa-cart-plus"></i>
									<span> Add Cart </span>
								</button>
								</form>
							</div>
						</div>
					</form>
				</div>
				<div class="clearfix"> </div>
				<!--/tabs-->
				<div class="responsive_tabs">

					<div class="resp-tabs-container">
						<!--/tab_one-->
						<!--//tab_one-->
						<!--//tabs-->
					</div>
				</div>
			</div>
</section>
<!-- /clients-sec -->
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
<!-- //clients-sec -->
<script>
	$('#quantity').keyup(function() {
		const max = $('#maksimum').val();
		let hitung = max - this.value;
		if (hitung < 0){
			$('#stok').html('Stok : ' + 0)
		} else {
			$('#stok').html('Stok : ' + (max - this.value)) 
		}
		if (parseInt(this.value) > max){
			console.log(max)

			$('#quantity').val(max)
		}
	})
</script>
<!--footer -->
<?php
include "layout/footer.php";
?>
<!-- //footer -->