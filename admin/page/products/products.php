
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2 class="h2">Products</h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=products&action=add" class="btn btn-primary">
                    Add Data
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <th>No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Stok</th>
                <th>Photo</th>
                <th>Search</th>
                <th>Description</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM tb_product LEFT JOIN tb_category ON tb_product.id_kategori=tb_category.id_kategori"); ?>
                <?php foreach ($ambil as $pecah) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_kategori']; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td><?php echo $pecah['berat_produk']; ?></td>
                        <td><?php echo $pecah['harga_produk']; ?></td>
                        <td><?php echo $pecah['stok_produk']; ?></td>
                        <td>
                            <img src="../fotoproduk/<?php echo $pecah['foto_produk']; ?>" width="100">
                        </td>
                        <td><?php echo $pecah['deskripsi_produk']; ?></td>
                        <td><?php echo $pecah['keterangan_produk']; ?></td>
                        <td>
                            <a href="index.php?page=products&action=delete&id=<?php echo $pecah['id_produk'];
                            ?>" class="btn-danger btn" onclick="return confirm('Produk akan dihapus?')">Delete</a>
                            <a href="index.php?page=products&action=update&id=<?php echo $pecah['id_produk'];
                            ?>" class="btn btn-warning">Update</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>