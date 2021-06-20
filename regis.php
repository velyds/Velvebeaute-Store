
<?php

include('koneksi.php');

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $telephone = mysqli_real_escape_string($koneksi, $_POST['telephone']);


    $passwordHash = md5($password);
    $insertData = $koneksi->query("INSERT INTO tb_customers (nama_pelanggan, password_pelanggan, email_pelanggan, telepon_pelanggan) VALUES ('$name', '$passwordHash', '$email', '$telephone')");

    if ($insertData) {
        header("location: index.php");

        echo "berhasil";
    } else {
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title> REGISTRASI </title>
    <link rel="stylesheet" href="css/regis.css">
</head>

<body>
    <div class="regis-box">
        <h1>CREATE ACCOUNT</ha>
            <form method="POST">
                <input type="text" onkeydown="preventNumberInput(event)" onkeyup="preventNumberInput(event)" name="name" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="number" name="telephone" placeholder="Mobile Number">
                <input type="submit" name="register" value="Register"> 
                           
            </form>
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
</body>
</html>