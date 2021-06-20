<?php
$id = $_GET['id'];
$id_pelanggan = $_SESSION['id_pelanggan'];

$pembelian = $koneksi->query("SELECT * FROM tb_purchase AS p
INNER JOIN tb_product_purchase AS pp ON p.id_pembelian = pp.id_pembelian
INNER JOIN tb_product ON tb_product.id_produk = pp.id_produk
INNER JOIN tb_addresses ON tb_addresses.id_alamat = p.id_alamat
WHERE p.id_pembelian = $id");

$pembelian2 = $koneksi->query("SELECT * FROM tb_purchase AS p
INNER JOIN tb_product_purchase AS pp ON p.id_pembelian = pp.id_pembelian
INNER JOIN tb_product ON tb_product.id_produk = pp.id_produk
INNER JOIN tb_addresses ON tb_addresses.id_alamat = p.id_alamat
WHERE p.id_pembelian = $id");

$b = $pembelian2->fetch_assoc();

$pelanggan = $koneksi->query("SELECT * FROM tb_customers
WHERE id_pelanggan = $id_pelanggan")->fetch_assoc();
//coba transaksi
?>

<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">
            <ul class="short">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>/ Detail </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <h3 class="mb-2 text-center">Detail Pembelian</h3>
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-lg-3">
                <table class="table">
                    <tr>
                        <th>Nama: </th>
                        <td><?= $pelanggan['nama_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <th>No HP: </th>
                        <td><?= $pelanggan['telepon_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <th>Penerima: </th>
                        <td><?= $b['penerima'] ?></td>
                    </tr>
                    <tr>
                        <th>Jalan: </th>
                        <td><?= $b['alamat'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-3 ">
            <table class="table">
                    <tr>
                        <th>Kota: </th>
                        <td><?= $b['kota'] ?></td>
                    </tr>
                    <tr>
                        <th>Provinsi: </th>
                        <td><?= $b['provinsi'] ?></td>
                    </tr>
                    <tr>
                        <th>Kode Pos: </th>
                        <td><?= $b['kode_pos'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <h3>Produk yang dibeli</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = $pembelian->fetch_assoc()) {
                $total_pembelian = $data['total_pembelian'];
            
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_produk'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><?= $total_pembelian?></td>
            </tr>
        </tbody>
    </table>

    <?php

    $sql2 = $koneksi->query("SELECT * FROM tb_payment WHERE id_purchase = $id");
    $pembayaran = $sql2->fetch_assoc();

    ?>
    <h3 class="mb-2">Pembayaran</h3>
    <div class="card shadow mb-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="">Nama Pengirim</label>
                            <input type="text" class="form-control" name="nama_pengirim" value="<?= $pembayaran['nama_pengirim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Rekening Pengirim</label>
                            <input type="text" class="form-control" name="rek_pengirim" value="<?= $pembayaran['rek_pengirim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Bank Pengirim</label>
                            <input type="text" class="form-control" name="bank_pengirim" value="<?= $pembayaran['bank_pengirim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Rekening Tujuan</label>
                            <select id="" class="form-control" name="rek_tujuan">
                             
                                <?php
                                $rekening = $koneksi->query("SELECT * FROM tb_rekening");
                                while ($rek = $rekening->fetch_assoc()) :
                                ?>>
                                <option value="<?= $rek['id_rekening'] ?>" <?= $pembayaran['id_rekening'] == $rek['id_rekening'] ? 'selected' : '' ?>><?= $rek['nama_bank'] . " " . $rek['no_rek'] . " a/n " . $rek['nama_pemilik_rek'] ?></option>
                            <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="">Upload bukti pembayaran</label>
                            <input type="file" class="form-control-file" name="struk">
                        </div>
                        <small>atau</small>
                        <div class="form-group">
                            <label>Kirim bukti transfer ke Whatsapp</label>
                            <a href="https://api.whatsapp.com/send?phone=+6285776412558&text=Hallo saya, ingin mengirim bukti transfer" class="form-control btn btn-primary"><i class="fab fa-whatsapp"></i> Kirim ke WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="me.php?page=transaksi" class="btn btn-primary">Riwayat belanja</a>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {


    $nama_pengirim = $_POST['nama_pengirim'];
    $rek_pengirim = $_POST['rek_pengirim'];
    $bank_pengirim = $_POST['bank_pengirim'];
    $rek_tujuan = $_POST['rek_tujuan'];

    // ambil data file
    $namaFile = $_FILES['struk']['name'];
    $namaSementara = $_FILES['struk']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "upload/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

    // Kalo ga upload foto
    if (!$namaFile) {
        // Kalo sebelumnya udah pernah ngirim struk
        if ($sql2->num_rows > 0) {
            $simpanKeDatabase = $koneksi->query("UPDATE tb_payment SET nama_pengirim = '$nama_pengirim', rek_pengirim = '$rek_pengirim', bank_pengirim = '$bank_pengirim' WHERE id_purchase = $id");

            if ($simpanKeDatabase) {

                $updateStatusPembayaran = $koneksi->query("UPDATE tb_purchase SET status_pembelian = 'Menunggu verifikasi' WHERE id_purchase = $id");

                if ($updateStatusPembayaran) {
                    echo "Berhasil menyimpan";
                } else {
                    echo "Gagal menyimpan";
                }
            } else {
                echo "error";
            }
        }
    } else {
        // Kalo upload foto
        if ($terupload) {

            // Kalo sebelumnya pernah ngirim struk
            if ($sql2->num_rows > 0) {
                // Kalo upload foto
                $simpanKeDatabase = $koneksi->query("UPDATE tb_payment SET nama_pengirim = '$nama_pengirim', rek_pengirim = '$rek_pengirim', bank_pengirim = '$bank_pengirim', bukti_pembayaran = '$namaFile' WHERE id_purchase = $id");

                $sqlPayment = $koneksi->query("SELECT * FROM tb_payment WHERE id_purchase = $id");
                $dataPayment = $sqlPayment->fetch_assoc();

                $id_purchase = $dataPayment['id_purchase'];

            } else {
                // kalo blm pernah ngirim struk
                $simpanKeDatabase = $koneksi->query("INSERT INTO tb_payment (id_purchase, id_rekening, nama_pengirim, rek_pengirim, bank_pengirim, bukti_pembayaran) VALUES ($id, $rek_tujuan, '$nama_pengirim', '$rek_pengirim', '$bank_pengirim', '$namaFile')");
            
                // ini $id kan didapet pas insert
                $id_purchase = $koneksi->insert_id;
            }


            if ($simpanKeDatabase) {
                                
                $updateStatusPembayaran = $koneksi->query("UPDATE tb_purchase SET status_pembelian = 'Menunggu verifikasi' WHERE id_purchase = $id_purchase");
                
                if ($updateStatusPembayaran) {
                    echo "Berhasil menyimpan";
                } else {
                    echo "Gagal menyimpan";
                }
            } else {
                echo "Gagal menyimpan 1";
            }
        } else {
            echo "Upload Gagal!";
        }
    }
}
?>