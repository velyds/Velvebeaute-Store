
<?php
include "koneksi.php";
include "layout/header.php";
include "layout/navbar.php";
$query = $_GET['q'];
$category = $_GET['category'];
?>

<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">

            <ul class="short">
                <li>
                    <a href="index.php">Home </a>
                </li>
                <?php if ($query) { ?>
                    <li> Search </li>
                    <li><?= $query ?></li>
                <?php } ?>
                <?php if ($category) { ?>
                    <li>/ Category </li>
                    <li><?= $category ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">
                <?php
                if (isset($query)) {
                    echo $query;
                    $sql = $koneksi->query("SELECT * FROM tb_product WHERE nama_produk LIKE '%$query%' OR deskripsi_produk LIKE '%$query%'");
                } else if (isset($category)) {
                    echo $category;
                    $sql = $koneksi->query("SELECT * FROM tb_product INNER JOIN tb_category ON tb_product.id_kategori = tb_category.id_kategori WHERE tb_category.nama_kategori LIKE '%$category%'");
                } else {
                    echo 'Produk';
                    $sql = $koneksi->query("SELECT * FROM tb_product");
                }
                ?>
            </h3>
            <div class="row">
                <?php

                if ($sql->num_rows < 1) {
                    echo "NOT FOUND !";
                } else {

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
                                    <span class="product-new-top">Best seller</span>
                                </div>
                                    <div class="item-info-product">
                                        <div class="info-product-price">
                                            <div class="grid_meta">
                                                <div class="product_price">
                                                    <h4>
                                                        <a><?= $product['nama_produk'] ?></a>
                                                    </h4>
                                                    <div class="grid-price mt-2">
                                                        <span class="money ">Rp. <?= number_format($product['harga_produk']) ?></span>
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
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
include "layout/footer.php";
?>