<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <?php
                $datakategori = array();

                $ambil = $koneksi->query("SELECT * FROM tb_category");
                while($tiap = $ambil->fetch_assoc())
                {
                    $datakategori[]= $tiap;
                } ?>

                <h2> Add Product </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=products" class="btn btn-primary">
                    Back
                </a> 
            </div>
        </div> 
    </div>
<div class="card-body"> 
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="id_kategori">
        <option value="">pilih kategori </option>
        <?php foreach ($datakategori as $key => $value): ?>

        <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>

        <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Price (Rp)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Weight (Gr)</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok">
    </div>
    <div class="form-group">
        <label>Search</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="keterangan" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="save">Save</button>
</form>
    <?php
    if (isset($_POST['save']))
    {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        
        move_uploaded_file($lokasi, "../fotoproduk/".$nama); 

        $koneksi->query("INSERT INTO tb_product
        (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,keterangan_produk,id_kategori)
        VALUES('$_POST[nama]', '$_POST[harga]','$_POST[berat]','$_POST[stok]','$nama','$_POST[deskripsi]','$_POST[keterangan]', $_POST[id_kategori])");

        echo "<div class='alert alert-info'>Saved data </div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?page=products'> ";
    }
        ?>
    </div>
    <script>
    function preventNumberInput(e) {
      var keyCode = (e.keyCode ? e.keyCode : e.which);
      if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107) {
        e.preventDefault();
      }
    }

    $(document).ready(function() {
      $('#text_field').keypress(function(e) {
        preventNumberInput(e);
      });
    })
  </script>
    
</div>