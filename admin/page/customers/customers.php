
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2 class="h2"> Customers</h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=customers&action=add" class="btn btn-primary">
                    Add Data
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-bordered" id="dataTable">
    <thead>
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Telephone</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM tb_customers"); ?>
    <?php foreach ($ambil as $pecah) { ?>
 
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama_pelanggan']; ?></td>
        <td><?php echo $pecah['email_pelanggan']; ?></td>
        <td><?php echo $pecah['password_pelanggan']; ?></td>
        <td><?php echo $pecah['telepon_pelanggan']; ?></td>
        <td>
            <a href="index.php?page=customers&action=delete&id=<?php echo $pecah['id_pelanggan'];
            ?>" class="btn-danger btn" onclick="return confirm('Produk akan dihapus?')">Delete</a>
            <a href="index.php?page=customers&action=update&id=<?php echo $pecah['id_pelanggan'];
            ?>" class="btn btn-warning">Update</a>

        </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>

            </tbody>
        </table>
    </div>
</div>
