
<?php

$ambil = $koneksi->query("SELECT * FROM tb_category WHERE id_kategori='".$_GET['id']."' ");

$pecah = $ambil-> fetch_assoc();

$koneksi->query("DELETE FROM tb_category WHERE id_kategori='".$_GET['id']."' ");

echo "<script> alert('Data Terhapus');</script>";
echo "<script> location='index.php?page=category' ;</script>";

?>