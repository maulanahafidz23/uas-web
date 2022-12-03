<?php
    session_start();
    require 'koneksi.php';

    $username_ = $_GET['username'];

    $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username='$username_'");

    while ($row = mysqli_fetch_assoc($hasil)) {
        $user[] = $row;
    }

    $username = $user[0];

    $result = mysqli_query($conn, "SELECT * FROM buy WHERE nama='$username_' ORDER BY id DESC");

    $barang = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $barang[] = $row;
    }
    $produk = $barang[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
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
                    
                </a>
            </label>

            <a href="#" class="nav__logo">
                <b>SMJA</b>
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
                <a href="index.php?username=<?php echo $username['username']; ?>">Home</a>
                <a href="addreq.php?username=<?php echo $username['username']; ?>">Request Product</a>
                <a href="reqlist.php?username=<?php echo $username['username']; ?>">Request List</a>
                <a href="about_us.php">About Us</a>
            </div>
            <div class="logout">
                <a href="logout.php"><i class='bx bx-log-out' ></i>Logout</a>
            </div>
          </div>
    </section>

    <section class="kotak1">
        <table class="tabel-struk" border="0" >
                <tr>
                    <td colspan="3" align="center">
                        <h1>Thank You</h1> 
                        <hr color="white"> 
                    </td>
                </tr>
                <tr >
                    <td class="form-struk">Name</td>
                    <td>:&nbsp;&nbsp;</td>
                    <td class="isi-struk">
                        <?php echo $produk['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="form-struk">Email</td>
                    <td>:</td>
                    <td class="isi-struk">
                        <?php echo $produk['email']; ?> 
                    </td>
                </tr>
                <tr>
                    <td class="form-struk">Address</td>
                    <td>:</td>
                    <td class="isi-struk">
                        <?php echo $produk['alamat']; ?> 
                    </td>
                </tr>
                <tr>
                    <td class="form-struk">Product</td>
                    <td>:</td>
                    <td class="isi-struk">
                        <?php echo $produk['nama_barang']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="form-struk">Many Purchases</td>
                    <td>:</td>
                    <td class="isi-struk">
                        <?php echo $produk['jumlah']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="form-struk"><label for="">Price</label></td>
                    <td>:</td>
                    <td>
                        Rp. <?php echo $produk['harga']; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><hr color="white"> </td>
                </tr>
                <tr>
                    <td class="form-struk">Total</td>
                    <td>:</td>
                    <td class="isi-struk">
                        Rp. <?php $total=$produk['harga'] * $produk['jumlah']; echo $total; ?>
                    </td>
                </tr>
            </table>
        <div class="thank">
            <a href="index.php?username=<?php echo $username['username']; ?>"><h3>Done</h3></a>
        </div>
    
    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>
</body>
</html>