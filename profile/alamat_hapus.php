<?php

$ambil = $koneksi->query("SELECT * FROM tb_addresses WHERE id_pelanggan='".$_GET['id']."' ");

$pecah = $ambil-> fetch_assoc();

$koneksi->query("DELETE FROM tb_addresses WHERE id_pelanggan='".$_GET['id']."' ");

echo "<script> alert('Data Terhapus');</script>";
echo "<script> location='me.php?page=alamat' ;</script>";
?>