
<div class="card shadow mb-4">
    <div class="card-header py-3 mb-3">
        <div class="row">
            <div class="col-lg">
                <h2> Add Category </h2>
            </div>
            <div class="col-lg text-right">
                <a href="index.php?page=category" class="btn btn-primary">
                    Back
                </a> 
            </div>
        </div> 
    </div>
<div class="card-body"> 
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name category</label>
        <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)"  class="form-control" name="nama">
    </div>
    <button class="btn btn-primary" name="save">Save</button>
</form>
    <?php
    if (isset($_POST['save']))
    {
       
        $koneksi->query("INSERT INTO tb_category
        (nama_kategori)
        VALUES('$_POST[nama]')");

        echo "<div class='alert alert-info'>Saved data </div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?page=category'> ";
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