<h1>Welcome Administrator</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2 class="h2"> detail login</h2>
            </div>
        </div>
    </div>
    <?php

    $ambil = $koneksi->query("SELECT * FROM tb_users WHERE id=$_SESSION[id] ");
    $pecah = $ambil->fetch_assoc();
    ?>

    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="col-lg-3">
                <table class="table">
                    <tr>
                        <th>Nama: </th>
                        <td><?= $pecah['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><?= $pecah['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Level: </th>
                        <td><?= $pecah['level'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2 class="h2"> user admin</h2>
            </div>
           <!-- <div class="col-lg text-right">
                <a href="index.php?page=user&action=add" class="btn btn-primary">
                    Add Data
                </a>
            </div> -->
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Level</th>
                <!--<th>Action</th>-->
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM tb_users"); ?>
                <?php foreach ($ambil as $pecah) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama']; ?></td>
                        <td><?php echo $pecah['email']; ?></td>
                        <td><?php echo $pecah['password']; ?></td>
                        <td><?php echo $pecah['level']; ?></td>
                        <!--<td>
                            <a href="index.php?page=users&action=delete&id=<?php echo $pecah['id'];
                                                                            ?>" class="btn-danger btn" onclick="return confirm('Produk akan dihapus?')">Delete</a>
                            <a href="index.php?page=users&action=update&id=<?php echo $pecah['id'];
                                                                            ?>" class="btn btn-warning">Update</a>
                        </td>-->
                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>