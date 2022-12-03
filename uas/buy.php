<?php
session_start();
require 'koneksi.php';

date_default_timezone_set('asia/kuala_lumpur');

$id = $_GET['id'];
$userr = $_GET['username'];

$result = mysqli_query($conn, "SELECT * FROM product WHERE id=$id");

while ($row = mysqli_fetch_assoc($result)) {
    $barang[] = $row;
}

$product = $barang[0];
$pdt = $product['id'];


$hasil = mysqli_query($conn, "SELECT * FROM user WHERE username='$userr'");

while ($row = mysqli_fetch_assoc($hasil)) {
    $user[] = $row;
}

$akun = $user[0];
$username__ = $akun['username'];

if (isset($_POST['tambah'])) {
    $barang = htmlspecialchars($_POST["barang"]);
    $nama_barang = htmlspecialchars($_POST["nama_barang"]);
    $nama_customer = htmlspecialchars($_POST["nama_customer"]);
    $email = htmlspecialchars($_POST["email"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $pembayaran = htmlspecialchars($_POST["pembayaran"]);
    $waktu = date("Y-m-d H-i-s");

    $foto = $_FILES['gambar']['name'];
    $unique = uniqid();
    $x = explode('.', $foto);
    $extensi = strtolower(end($x));
    $bukti_pembayaran = "$unique.$extensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    $sql = "INSERT INTO buy values('','$barang', '$nama_barang', '$nama_customer', '$email', '$alamat', '$harga', '$jumlah', '$pembayaran', '$bukti_pembayaran', '$waktu')";
    $result = mysqli_query($conn, $sql);
    
    if ( $result ) {
        echo "
        <script>
            alert('Purchase Successful!');
            document.location.href = 'struk.php?username=$username__';
        </script>";
        move_uploaded_file($tmp, 'gambar/bukti_pembayaran/'.$bukti_pembayaran);
    } else {
        echo "
        <script>
            alert('Purchase Failed!');
            document.location.href = 'buy.php?id=$pdt1';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy_Watch</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- Link BoxIcon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <script src="main.js"></script>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container1">
            <button id="pencet" onclick="openNav()" style="display: none;">Try it</button>
            <label for="pencet">
                <a class="nav__menu">
                    <i class='bx bx-menu' ></i>
                </a>
            </label>

            <a href="#" class="nav__logo">
                SMJA
            </a>

            <div class="wrap">
                <div class="search">
                </div>
            </div>
        </nav>
    </header>

    <!--==================== Menu ====================-->
    <section >
        <div id="myNav" class="overlay">
            <div class="topoverlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class='bx bx-x' ></i></a>
                <a href="#" class="nav__logo1">
                    User
                </a>
            </div>
            <div class="overlay-content">
                <a href="index.php?username=<?php echo $akun['username']; ?>">Home</a>
                <a href="about_us.php">About Us</a>
            </div>
            <div class="logout">
                <a href="logout.php"><i class='bx bx-log-out' ></i>Logout</a>
            </div>
          </div>
    </section>

    <div class="kotak">
        <form action="" method="post" enctype="multipart/form-data">

            <table class="tabel-buy" border="0" >
                    <tr>
                        <td colspan="3" align="center">
                            <h1>Form Order</h1> 
                            <hr color="white"> 
                        </td>
                    </tr>
                    <input type="hidden" name="barang" value="<?php $barang = $product['nama_file']; echo $barang; ?>">
                    <input type="hidden" name="nama_barang" value="<?php $nama_barang = $product['nama']; echo $nama_barang; ?>">
                    <tr >
                        <td class="form-buy"><label for="nama_customer">Customer Name </label></td>
                        <td>:&nbsp;&nbsp;</td>
                        <td class="isi-buy">
                            <input type="hidden" name="nama_customer" value="<?php $username = $akun['username']; echo $username; ?>">
                            <input type="text" name="nama" class="harga-buy" value="<?php $username = $akun['username']; echo $username; ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-buy"><label for="e_mail">Email </label></td>
                        <td>:</td>
                        <td class="isi-buy">
                            <input type="hidden" name="email" value="<?php $email = $akun['email']; echo $email; ?>">
                            <input type="email" maxlength="100" name="e_mail" class="harga-buy" value="<?php $email = $akun['email']; echo $email; ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-buy"><label for="ukuran">Address</label></td>
                        <td>:</td>
                        <td class="isi-buy"><textarea class="alamat" name="alamat" placeholder="Address" required=""></textarea></td>
                    </tr>
                    <tr>
                        <td class="form-buy"><label for="harga">Price</label></td>
                        <td>:</td>
                        <td class="isi-buy">
                            Rp. <input type="text" name="harga1" class="harga-buy" disabled value="<?php $harga = $product['harga']; echo $harga; ?>">
                            <input type="hidden" name="harga" value="<?php $harga = $product['harga']; echo $harga; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-buy"><label for="jumlah">Many Purchases</label></td>
                        <td>:</td>
                        <td class="isi-buy"><input type="number" name="jumlah" class="input-add" min="1"></td>
                    </tr>
                    <tr>
                        <td class="form-buy"><label for="">Proof of payment</label></td>
                        <td>:</td>
                        <td><input type="file" class="form-buy" name="gambar" id="gambar" accept="image/*"></td>
                    </tr>
                    <tr>
                        <td colspan="4"> <br> <hr color="white"> <br> </td>
                    </tr>
                </table>
            <div class="submit" align="center">
                <button type="submit" name="tambah">Buy</button> &emsp;
                <button type="reset" name="batal">Reset</button>
            </div>
        </form>
    </div>
    
</body>
</html>