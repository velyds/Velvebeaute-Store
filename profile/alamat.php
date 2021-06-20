
<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">
            <ul class="short">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>/ Alamat </li>
            </ul>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
         <h2 class="mb-2 text-center">Daftar Alamat</h2>
            <div class="row">
                <div class="col-lg text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add data
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="">
            <thead>
                <th>No</th>
                <th>Penerima</th>
                <th>Tempat</th>
                <th>Alamat Pengiriman</th>
                <th>provinsi</th>
                <th>kota</th>
                <th>kodepos</th>
                <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                $id = $_SESSION['id_pelanggan'];
                $ambil = $koneksi->query("SELECT * FROM tb_addresses WHERE id_pelanggan = $id");
                foreach ($ambil as $pecah) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['penerima']; ?></td>
                        <td><?php echo $pecah['nama']; ?></td>
                        <td><?php echo $pecah['alamat']; ?></td>
                        <td><?php echo $pecah['provinsi']; ?></td>
                        <td><?php echo $pecah['kota']; ?></td>
                        <td><?php echo $pecah['kode_pos']; ?></td>
                        <td>
                            <a href="me.php?page=alamat&action=delete&id=<?php echo $pecah['id'];
                                                                                ?>" class="btn-danger btn" onclick="return confirm('Alamat akan dihapus?')">Delete</a>
                             <a href="checkout.php" class="btn btn-success">Checkout</a>   
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Penerima</label>
                        <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"  class="form-control" name="penerima">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Alamat</label>
                        <input type="text" class="form-control" name="nama" placeholder="Cth: Rumah, Kantor">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="provinsi" id="provinsi"></select>
                    </div>
                    <div class="form-group">
                        <label for="">kota</label>
                        <select name="kota" id="kota"></select>
                    </div>
                    <div class="form-group">
                        <label for="">Kode pos</label>
                        <input type="text" class="form-control" name="kode_pos">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpanAlamat" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['simpanAlamat'])){
    $penerima = $_POST['penerima'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kode_pos = $_POST['kode_pos'];


    $insert = $koneksi->query("INSERT INTO tb_addresses (id_pelanggan, penerima, nama, alamat, provinsi, kota, kode_pos) VALUES ($id, '$penerima', '$nama', '$alamat', '$provinsi', '$kota', '$kode_pos')");

    if ($insert){
        ?>
            <script>
                alert("Berhasil menyimpan alamat");
                window.location.href = "me.php?page=alamat"
            </script>
        <?php
    } else {
        ?>
            <script>
                alert("Gagal menyimpan alamat");
                window.location.href = "me.php?page=alamat"
            </script>
        <?php
    }
}

?>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "module/ambilProvinsi.php",
            success(hasil) {
                hasilParsed = JSON.parse(hasil);
                provinsi = hasilParsed.rajaongkir.results;
                // Loop
                for (let i = 0; i < provinsi.length; i++) {
                    $('#provinsi').append(`<option value='${provinsi[i].province}'>${provinsi[i].province}</option>`);
                }
            }
        })

        // Ambil semua data kota
        $.ajax({
            type: "POST",
            url: "module/ambilKota.php",
            success(hasil) {
                hasilParsed = JSON.parse(hasil);
                kota = hasilParsed.rajaongkir.results;
                // Loop
                for (let i = 0; i < kota.length; i++) {
                    $('#kota').append(`<option value='${kota[i].city_name}'>${kota[i].city_name}</option>`);
                }
            }
        })
    });
</script>