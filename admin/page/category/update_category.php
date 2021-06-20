
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Category Updates </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=category" class="btn btn-primary">
                    Back
                </a> 
            </div>
        </div>
    </div>       
<div class="card-body">        
<?php
$ambil=$koneksi->query("SELECT * FROM tb_category WHERE id_kategori='".$_GET['id']."' ");
$pecah= $ambil->fetch_assoc();

//echo "<pre>";
//print_r($pecah);
//echo "</pre>";
?> 

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label> Name Category </label>
        <input type="text" name="nama" class="form-control" value=" <?php echo $pecah 
        ['nama_kategori'];?> ">
    </div>
    <button class="btn btn-primary" onclick="return confirm('data kategori akan diubah?')"name="update" > Update </button>
</form>

<?php
if (isset($_POST['update']))
{
    if (!empty($lokasi)) {
        $koneksi->query("UPDATE tb_category SET nama_kategori ='$_POST[nama]',
         WHERE id_kategori='$_GET[id]' ");
    }
    else
    {
        $koneksi->query("UPDATE tb_category SET nama_kategori ='$_POST[nama]',
         WHERE id_kategori='$_GET[id]' ");
    }
    echo "<script> alert ('data kategori telah diubah'); </script>";
    echo "<script> location='index.php?page=category'; </script>";
}
?>
    </div>
</div>