<?php
include "koneksi.php";
$data = json_decode($_REQUEST['data']);
// print_r($data->produk[1]->id_produk);


// print_r ($data->id_pelanggan);

// query insert ke database

// Variabel2
$id_pelanggan = $data->id_pelanggan;
$tanggal_pembelian = date('Y-m-d');
$status_pembelian = "pending";
$ekspedisi = $data->ekspedisi;
$paket = $data->paket;
$ongkir = $data->ongkir;
$estimasi = $data->estimasi;
$total_pembelian = $data->total + $ongkir;
$id_alamat = $data->id_alamat;

// Masukin ke tb purchase
$insertKePurchase = $koneksi->query("INSERT INTO tb_purchase (id_pelanggan, id_alamat, tanggal_pembelian, total_pembelian, status_pembelian, ekspedisi, paket, ongkir, estimasi) VALUES ($id_pelanggan, $id_alamat,'$tanggal_pembelian', $total_pembelian, '$status_pembelian', '$ekspedisi', '$paket', $ongkir, '$estimasi')");
// dah cobalg

if ($insertKePurchase){
    $id_pembelian = $koneksi->insert_id;
    
    // Insert to tb_product_purchase
    $totalProduk[] = $data->produk;
    
    for ($i = 0; $i <= sizeof($totalProduk); $i++) {
        // Inisialisasi variabel buat dimasukin ke produk purchase
        $id_produk = $data->produk[$i]->id_produk;
        $quantity = $data->produk[$i]->quantity;
        $koneksi->query("INSERT INTO tb_product_purchase (id_pelanggan, id_produk, id_pembelian, jumlah) VALUES ($id_pelanggan, $id_produk, $id_pembelian, $quantity)");
    }

    echo $id_pembelian;
}

