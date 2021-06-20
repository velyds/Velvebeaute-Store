
<?php
session_start();
include('..//koneksi.php');

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($koneksi, $_POST['email']);

    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $cekUser = $koneksi->query("SELECT * FROM tb_users WHERE email = '" . $email . "'");

    $data = mysqli_num_rows($cekUser);

    if ($data > 0) {

        $row = mysqli_fetch_assoc($cekUser);

        if (md5($password) == $row['password']) {
            echo "kosong / ";

            $idSaya = $row['id'];
            $_SESSION['id'] = $idSaya;
            if ($row['level'] == "admin") {

                $_SESSION['admin'] = true;
                header("location: index.php");
            }
            echo "udah login";;
        } else {
            $_SESSION['error_login'] = "Email atau password salah";
            header("location: login.php");
            }
        } else {
            $_SESSION['error_login'] = "Email atau password salah";
            header("location: login.php");
    }
}

if (isset($_POST["regis"])) {
    header('Location: regis.php');
}
