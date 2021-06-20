<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Product Updates </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=products" class="btn btn-primary">
                    Back
                </a> 
            </div>
        </div>
    </div>       
<div class="card-body">        
<?php
$ambil=$koneksi->query("SELECT * FROM tb_product WHERE id_produk='".$_GET['id']."' ");
$pecah= $ambil->fetch_assoc();

//echo "<pre>";
//print_r($pecah);
//echo "</pre>";
?> 
<?php
        $datakategori = array();

        $ambil = $koneksi->query("SELECT * FROM tb_category");
                while($tiap = $ambil->fetch_assoc())
        {
            $datakategori[]= $tiap;
        } 
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="id_kategori">
        <option value="">pilih kategori </option>
        <?php foreach ($datakategori as $key => $value): ?>

        <option value="<?php echo $value["id_kategori"] ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"])
            { echo "selected"; } ?> > 
            <?php echo $value["nama_kategori"] ?>
        
        </option>
        <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label> Nama Produk </label>
        <input type="text" name="nama" class="form-control" value=" <?php echo $pecah 
        ['nama_produk'];?> ">
    </div>
    <div class="form-group">
        <label> Harga (Rp) </label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah 
        ['harga_produk']; ?>">
        
    </div> 
    <div class="form-group"> 
        <label> Berat (Gr) </label>
        <input type="number" name="berat" class="form-control" value="<?php echo $pecah 
        ['berat_produk']; ?>">
    </div>
    <div class="form-group"> 
        <label> Stok </label>
        <input type="number" name="stok" class="form-control" value="<?php echo $pecah 
        ['stok_produk']; ?>">
    </div>
    <div class="from-group">
        <img src="../fotoproduk/<?php echo $pecah['foto_produk'] ?>" width="200">
    </div>
    <div class="form-group">
        <label> Ganti foto </label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label> Search </label>
        <textarea name="deskripsi" class="form-control" rows="10">
        <?php echo $pecah['deskripsi_produk']; ?> </textarea>
    </div>
    <div class="form-group">
        <label> Deskripsi </label>
        <textarea name="keterangan" class="form-control" rows="10">
        <?php echo $pecah['keterangan_produk']; ?> </textarea>
    </div>
    <button class="btn btn-primary" onclick="return confirm('Produk akan diubah?')"name="update" > Update </button>
</form>

<?php
if (isset($_POST['update']))
{
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi))
    {
        move_uploaded_file($lokasi, "../fotoproduk/".$nama);

        $koneksi->query("UPDATE tb_product SET nama_produk ='$_POST[nama]',
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',stok_produk='$_POST[stok]',
        foto_produk='$nama',deskripsi_produk='$_POST[deskripsi]',keterangan_produk='$_POST[keterangan]'
        ,id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]' ");
    }
    else
    {
        $koneksi->query("UPDATE tb_product SET nama_produk ='$_POST[nama]',
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]',stok_produk='$_POST[stok]',
        deskripsi_produk='$_POST[deskripsi]',keterangan_produk='$_POST[keterangan]'
        ,id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]' ");
    }
    echo "<script> alert ('data produk telah diubah'); </script>";
    echo "<script> location='index.php?page=products'; </script>";

} 
?>
    </div>
</div>