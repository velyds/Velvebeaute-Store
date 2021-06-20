
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Add User </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?dashboard.php" class="btn btn-primary">
                    Back
                </a> 
            </div>
        </div> 
    </div>
<div class="card-body"> 
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>Level</label>
        <input type="text" class="form-control" name="level">
    </div>
    <button class="btn btn-primary" name="save">Save</button>
</form>
    <?php
    if (isset($_POST['save']))
    {
       
        $koneksi->query("INSERT INTO tb_users
        (nama,email,'password','level')
        VALUES('$_POST[nama]', '$_POST[email]','$_POST[password]', '$_POST[level]')");

        echo "<div class='alert alert-info'>Saved data </div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?dashboard.php'> ";
    }
        ?>
    </div>
</div>