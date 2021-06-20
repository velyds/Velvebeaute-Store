
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Purchasing </h2>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <th>No</th>
                <th>Customer name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM tb_purchase JOIN tb_customers ON tb_purchase.id_pelanggan=tb_customers.id_pelanggan"); ?>
                <?php foreach ($ambil as $pecah) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_pelanggan']; ?></td>
                        <td><?php echo date("d F Y",strtotime($pecah['tanggal_pembelian'])); ?></td>
                        <td><?php echo $pecah['status_pembelian']; ?></td>
                        <td>Rp.<?php echo number_format($pecah['total_pembelian']); ?></td>
                        <td>
                            <a href="index.php?page=purchase&action=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-primary btn">Detail</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>