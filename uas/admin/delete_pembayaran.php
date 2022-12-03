<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: ../login.php");
        exit;
    }
    require '../koneksi.php';

    $id = $_GET['id'];

    $hapus_data = mysqli_query($conn,
                  "SELECT * FROM buy WHERE id = '$id'");
    $row = mysqli_fetch_array($hapus_data);

    $gambar = $row['nama_file'];
    $hapus = "../gambar/bukti_pembayaran/$gambar";

    if(file_exists($hapus))
    {
        unlink($hapus);
    }

    $result = mysqli_query($conn, "DELETE FROM buy WHERE id = $id");

    if ( $result ) {
        echo "
        <script>
            alert('Data deleted successfully');
            document.location.href = 'transaksi.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data failed to delete');
            document.location.href = 'transaksi.php';
        </script>";
    }
?>