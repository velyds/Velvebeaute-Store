<?php
include "koneksi.php";
include "layout/header.php";
session_start();
if (!isset($_SESSION['pelanggan'])) {
?>
    <script>
        alert("masuk login dahulu")
        window.location.href = "index.php"
    </script>
<?php
}

$pelanggan = $koneksi->query("SELECT * FROM tb_customers WHERE id_pelanggan = $_SESSION[id_pelanggan]")->fetch_assoc();

?>
<link rel="stylesheet" type="text/css" href="css/checkout.css">
<?php
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
                <li>/ Checkout</li>
            </ul>
        </div>
    </div>
</div>
</div>
<!--//banner -->
<!--/shop-->

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
            <div class="checkout-right">
                <table class="timetable_sub" id="tabel_belanjaan">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="checkout-left row">
                <div class="col-md-4 checkout-left-basket">
                    <h4> <a href="index.php"> Continue Shopping</a></h4>
                    <ul id="produk">
                    </ul>
                </div>
                <div class="col-md-8 address_form">
                    <h4>Add a new Details</h4>
                    <form action="#" method="post" class="creditly-card-form agileinfo_form">
                        <section class="creditly-wrapper wrapper">
                            <div class="information-wrapper">
                                <div class="first-row form-group">
                                    <div class="controls">
                                        <label class="control-label">Full name: </label>
                                        <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name" value="<?= $pelanggan['nama_pelanggan'] ?>">
                                    </div>
                                    <div class="card_number_grids">
                                        <div class="card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">Mobile number:</label>
                                                <input class="form-control" type="text" placeholder="Mobile number" value="<?= $pelanggan['telepon_pelanggan'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Pilih ALamat: </label>
                                        <select name="alamat" class="form-control option-w3ls" id="alamat">
                                            <option value="pilih">Pilih Alamat</option>
                                            <?php
                                            $sql = $koneksi->query("SELECT * FROM tb_addresses WHERE id_pelanggan = $_SESSION[id_pelanggan]");
                                            while ($alamat = $sql->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $alamat['id_alamat'] ?>" data-provinsi="<?= $alamat['provinsi'] ?>" data-kota="<?= $alamat['kota'] ?>"><?= $alamat['nama'] ?></option>
                                                <?php
                                                if ($sql->num_rows == 0) {
                                                    echo "Isi Alamat Dahulu di <a href='me.php?page=alamat'> Sini</a>";
                                                }
                                                ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php
                                    if ($sql->num_rows == 0) {
                                        echo "Isi Alamat Dahulu di <a href='me.php?page=alamat'> Sini</a>";
                                    }
                                    ?>
                                    <div class="controls">
                                        <label class="control-label">Provinsi: </label>
                                        <input type="text" id='provinsi' class="form-control" readonly>
                                        </select>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Kota: </label>
                                        <input type="text" id='kota' class="form-control" readonly>
                                        </select>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Pilih Ekspedisi: </label>
                                        <select name="ekspedisi" class="form-control option-w3ls" id="ekspedisi">
                                            <option value="pilih">Pilih Ekspedisi</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS Indonesia</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Pilih Paket: </label>
                                        <select name="paket" class="form-control option-w3ls" id="paket">
                                        </select>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Ongkir: </label>
                                        <input type="text" class="form-control" id="ongkir" readonly>
                                        </select>
                                    </div>
                                    <p id="estimasi"></p>
                                    <!-- <div class="controls">
                                        <label class="control-label">Postage: </label>
                                        <select class="form-control option-w3ls">
                                            <option>Pilih Ongkos Kirim</option>
                                            <?php
                                            //$ambil = $koneksi->query("SELECT * FROM tb_ongkir");
                                            //while ($perongkir = $ambil->fetch_assoc()) {
                                            ?>
                                                <option value="<?php //echo $perongkir["id_ongkir"] 
                                                                ?>">
                                                    <?php //echo $perongkir['nama_kota'] 
                                                    ?> -
                                                    Rp. <?php // echo number_format($perongkir['tarif_ongkir']) 
                                                        ?>
                                                </option>
                                            <?php //} 
                                            ?>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                        </section>
                    </form>
                    <div class="checkout-right-basket">
                        <input type="hidden" id="id" value="<?= $_SESSION['id_pelanggan'] ?>">
                        <input type="hidden" id="estimasiHari">
                        <a href="" id="prosesTransaksi">Make a Payment </a>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</section>
<!--footer -->
<?php
include "layout/footer.php"; ?>
<!-- //footer -->

<script>
    let products = [];
    let dataProvinsi = {}; // Object
    let dataKota = {}; // Object

    const id_pelanggan = $('#id').val();
    let ekspedisiDipilih;
    let paketDiPilih ;
    let ongkir
    let estimasiHari
    let id_alamat
    let total = 0;
    let totalBerat = 0;

    $(document).ready(function() {

        let banyakBelanjaan = googles.cart._items.length;
        let i = 0;


        for (i; i < banyakBelanjaan; i++) {
            $("#tabel_belanjaan").append("<tr><td>" + (i + 1) + "</td> " +
                "<td>" + googles.cart._items[i]._data.googles_item + "</td>" +
                "<td>" + googles.cart._items[i]._data.quantity + "</td>" +
                "<td>" + googles.cart._items[i]._data.amount + "</td>" +
                "</tr>");

            $('#produk').append("<li>" + googles.cart._items[i]._data.googles_item + "<span>" + googles.cart._items[i]._data.amount + "</span></li>");

            total += (googles.cart._items[i]._data.amount * googles.cart._items[i]._data.quantity)
            totalBerat += (googles.cart._items[i]._data.berat_produk * googles.cart._items[i]._data.quantity)

            // Simpan data ke variabel
            product = {
                id_produk: googles.cart._items[i]._data.id_produk,
                nama: googles.cart._items[i]._data.googles_item,
                quantity: googles.cart._items[i]._data.quantity,
                harga: googles.cart._items[i]._data.amount,
            }

            products.push(product);
        }

        if (i == banyakBelanjaan) {
            $('#produk').append("<li>Total <span>" + total + "</span></li>");
        }
        
        // Ambil semua data provinsi
        $.ajax({
            type: "POST",
            url: "module/ambilProvinsi.php",
            success(hasil) {
                hasilParsed = JSON.parse(hasil);
                provinsi = hasilParsed.rajaongkir.results;
                dataProvinsi = provinsi;
                // Loop 
                // for (let i = 0; i < provinsi.length; i++) {
                //     $('#provinsi').append(`<option value='${provinsi[i].province_id}'>${provinsi[i].province}</option>`);
                // }
            }
        })

        // Ambil semua data kota
        $.ajax({
            type: "POST",
            url: "module/ambilKota.php",
            success(hasil) {
                hasilParsed = JSON.parse(hasil);
                kota = hasilParsed.rajaongkir.results;
                dataKota = kota;
                // Loop
                // for (let i = 0; i < kota.length; i++) {
                //     $('#kota').append(`<option value='${kota[i].city_id}'>${kota[i].city_name}</option>`);
                // }
            }
        })

    });

    $('#prosesTransaksi').click(function(e) {

        const dataKirim = {
            produk: products,
            id_pelanggan: id_pelanggan,
            paket: paketDiPilih,
            ekspedisi: ekspedisiDipilih,
            ongkir: ongkir,
            estimasi: estimasiHari,
            id_alamat: id_alamat,
            total: total
        }

        const dataKirimJson = JSON.stringify(dataKirim)
        e.preventDefault();
        // baru ajaxnya
        $.ajax({
            type: "POST",
            url: "checkout_ajax.php",
            data: {
                data: dataKirimJson
            },
            success(hasil) {
                // alert(hasil)
                window.location.href = "me.php?page=transaksi&act=detail&id=" + hasil
            }
        })
    });

    let id_kota;

    // Ketika milih alamat
    $('#alamat').on('change', function() {
        id_alamat = this.value
        namaProvinsi = $('option:selected', this).attr('data-provinsi');
        namaKota = $('option:selected', this).attr('data-kota');
        provinsiPelanggan = dataProvinsi.filter(getProvince => getProvince.province == namaProvinsi);
        kotaPelanggan = dataKota.filter(getKota => getKota.city_name == namaKota);

        id_kota = kotaPelanggan[0].city_id;

        $('#provinsi').val(namaProvinsi);
        $('#kota').val(namaKota);

    });

    // Ketika milih ekspedisi
    $('#ekspedisi').on('change', function() {
        let kurir = this.value
        ekspedisiDipilih = kurir
        $.ajax({
            type: "POST",
            url: `module/cekOngkir.php?id_kota=${id_kota}&kurir=${kurir}&berat=1000`,
            success(hasil) {
                hasilParsed = JSON.parse(hasil);
                paket = hasilParsed.rajaongkir.results[0].costs;
                $('#paket option').remove()
                // Loop
                for (let i = 0; i < paket.length; i++) {
                    $('#paket').append(`<option value='${paket[i].service}' data-estimasi='${paket[i].cost[0].etd}' data-harga='${paket[i].cost[0].value}'>${paket[i].service}</option>`);
                }
            }
        })
    });

    $('#paket').on('change', function() {

        let harga = $('option:selected', this).attr('data-harga');
        let estimasi = $('option:selected', this).attr('data-estimasi');
        estimasiHari = estimasi
        ongkir = harga
        paketDiPilih = this.value

        $('#ongkir').val(harga);
        $('#estimasi').html('Estimasi: ' + estimasi);
        $('#estimasiHari').val(estimasi)
    });
</script>