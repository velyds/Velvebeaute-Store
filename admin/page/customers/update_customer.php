
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Customers Updates </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=customers" class="btn btn-primary">
                    Back
                </a> 
            </div>
        </div>
    </div>       
<div class="card-body">        
<?php
$ambil=$koneksi->query("SELECT * FROM tb_customers WHERE id_pelanggan='".$_GET['id']."' ");
$pecah= $ambil->fetch_assoc();

//echo "<pre>";
//print_r($pecah);
//echo "</pre>";
?> 

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label> Name </label>
        <input type="text" name="nama" class="form-control" value=" <?php echo $pecah 
        ['nama_pelanggan'];?> ">
    </div>
    <div class="form-group">
        <label> Email </label>
        <input type="text" name="email" class="form-control" value="<?php echo $pecah 
        ['email_pelanggan']; ?>">
        
    </div> 
    <div class="form-group"> 
        <label> Password </label>
        <input type="text" name="password" class="form-control" value="<?php echo $pecah 
        ['password_pelanggan']; ?>">
    </div>
    <div class="form-group"> 
        <label> Telephone </label>
        <input type="text" name="telepon" class="form-control" value="<?php echo $pecah 
        ['telepon_pelanggan']; ?>">
    </div>
    <button class="btn btn-primary" onclick="return confirm('data pelanggan akan diubah?')"name="update" > Update </button>
</form>

<?php
if (isset($_POST['update']))
{
    if (!empty($lokasi)) {
        $koneksi->query("UPDATE tb_customers SET nama_pelanggan ='$_POST[nama]',
        email_pelanggan='$_POST[email]', password_pelanggan='$_POST[password]', 
        telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]' ");
    }
    else
    {
        $koneksi->query("UPDATE tb_customers SET nama_pelanggan ='$_POST[nama]',
        email_pelanggan='$_POST[email]', password_pelanggan='$_POST[password]',
        telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]' ");
    }
    echo "<script> alert ('data pelanggan telah diubah'); </script>";
    echo "<script> location='index.php?page=customers'; </script>";
}
?>
    </div>
</div>