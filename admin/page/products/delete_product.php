<?php

$ambil = $koneksi->query("SELECT * FROM tb_product WHERE id_produk='".$_GET['id']."' ");

$pecah = $ambil-> fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../fotoproduk/$fotoproduk"))
{
    unlink("../fotoproduk/$fotoproduk");
}

$koneksi->query("DELETE FROM tb_product WHERE id_produk='".$_GET['id']."' ");

echo "<script> alert('Data Terhapus');</script>";
echo "<script> location='index.php?page=products' ;</script>";

?>