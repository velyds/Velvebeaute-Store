<?php
include "layout/header.php";

?>
<body>
    <?php

    include "layout/navbar.php";

    if (!isset($_SESSION['pelanggan'])){
        header("location: index.php");
    }

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'alamat':
                include "profile/alamat.php";
            break;
            case 'transaksi':
                if (isset($_GET['act']) == 'detail'){
                    include "profile/transaksi_detail.php";
                } else {
                    include "profile/transaksi.php";
                }
            break;
            default:
                echo "me";
        }
    } else {
        echo "me";
    }

    include "layout/footer.php";
    ?>