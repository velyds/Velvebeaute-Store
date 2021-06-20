<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Purchase Detail </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=purchase" class="btn btn-primary">
                    Back
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php
        $ambil = $koneksi->query("SELECT * FROM tb_purchase JOIN tb_customers
        ON tb_purchase.id_pelanggan=tb_customers.id_pelanggan
        WHERE tb_purchase.id_pembelian='$_GET[id]' ");
        $detail =  $ambil->fetch_assoc();
        ?>

        <!-- <pre><?= print_r($detail); ?></pre> -->

        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
        <p>
            <?php echo $detail['email_pelanggan']; ?>
        </p>
        <p>
            Tanggal :<?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])); ?> <br>
            Total :Rp.<?php echo number_format ($detail['total_pembelian']); ?>
        </p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk </th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM tb_product_purchase JOIN tb_product ON
                tb_product_purchase.id_produk=tb_product.id_produk
                WHERE tb_product_purchase.id_pembelian= $detail[id_pembelian]");
                // var_dump($koneksi->query("SELECT * FROM tb_product_pruchase WHERE id = '".$_GET['id']."'"));
                
                while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td><?php echo $pecah['harga_produk']; ?></td>
                        <td><?php echo $pecah['jumlah']; ?></td>
                        <td><?php echo $pecah['harga_produk'] * $pecah['jumlah']; ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php

$sql2 = $koneksi->query("SELECT * FROM tb_payment WHERE id_purchase = $detail[id_pembelian]");
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
                        <input type="text" class="form-control" name="nama_pengirim" value="<?= $pembayaran['nama_pengirim'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Rekening Pengirim</label>
                        <input type="text" class="form-control" name="rek_pengirim" value="<?= $pembayaran['rek_pengirim'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Bank Pengirim</label>
                        <input type="text" class="form-control" name="bank_pengirim" value="<?= $pembayaran['bank_pengirim'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Rekening Tujuan</label>
                        <select id="" class="form-control" name="rek_tujuan" disabled>
                        
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
                    <div class="form-group mb-2">
                        <label>Bukti Pembayaran</label>
                        <br>
                        <img src="/toko_online/upload/<?= $pembayaran['bukti_pembayaran'] ?>" width="200" height="200">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_pembelian" class="form-control">
                            <option value="pending" <?= $detail['status_pembelian'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Menunggu verifikasi" <?= $detail['status_pembelian'] == 'Menunggu verifikasi' ? 'selected' : '' ?>>Menunggu verifikasi</option>
                            <option value="Sudah diverifikasi" <?= $detail['status_pembelian'] == 'Sudah diverifikasi' ? 'selected' : '' ?>>Sudah diverifikasi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>


<?php

if (isset($_POST['simpan'])) {

    $status = $_POST['status_pembelian'];

    $updateStatusPembayaran = $koneksi->query("UPDATE tb_purchase SET status_pembelian = '$status' WHERE id_pembelian = $detail[id_pembelian]");


    // update status pembayaran

    if ($updateStatusPembayaran) {
        echo "Berhasil menyimpan";
    } else {
        echo "Gagal menyimpan";
    }
}

?>