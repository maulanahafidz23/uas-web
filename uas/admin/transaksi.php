<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: ../login.php");
        exit;
    }

    require('../koneksi.php');
    $result = mysqli_query($conn, "SELECT * FROM buy");

    $buy = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $buy[] = $row;
    }

    if (isset($_GET['cari'])) {
        $keyword = $_GET['keyword'];

        $result = mysqli_query($conn, "SELECT * FROM buy WHERE email LIKE '%$keyword%' OR nama LIKE '%$keyword%'");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM buy");
    }

    $buy = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $buy[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaction</title>
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
                <b>SMJA</b>
            </a>

            <div class="wrap">
                <form action="" method="get">
                    <div class="search">
                        <input type="text" name="keyword" class="searchTerm" placeholder="Search..">
                        <button type="submit" name="cari" class="searchButton"><i class='bx bx-search'></i></button>
                    </div>
                </form>
            </div>
        </nav>
    </header>

    <!--==================== Menu ====================-->
    <section >
        <div id="myNav" class="overlay">
            <div class="topoverlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class='bx bx-x' ></i></a>
                <a href="#" class="nav__logo1">
                    Admin
                </a>
            </div>
            <div class="overlay-content">
                <a href="index.php">Product</a>
                <a href="transaksi.php">User Transaction</a>
                <a href="add_admin.php">Add Admin </a>
                <a href="../about_us.php">About Us </a>
            </div>
            <div class="logout">
                <a href="logout.php"><i class='bx bx-log-out' ></i>Logout</a>
            </div>
          </div>
    </section>

    <div class="kotak">
        <tr>
            <h1 class="tabel-product"> User Transaction </h1>
        </tr>
        <table class="tabel-data" border="1">
            <tr class="atas">
                <td>No</td>
                <td class="watch">Information</td>
                <td>Payment</td>
                <td>Date</td>
            </tr>
            <?php $i = 1; foreach ($buy as $buy): ?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <td> 
                    <table class="tabel-info1" >
                        <tr>
                            <td class="info">Nama</td>
                            <td>:</td>
                            <td><?php echo $buy["nama"]; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $buy["email"]; ?></td>
                        </tr>
                        <tr>
                            <td>Product</td>
                            <td>:</td>
                            <td><?php echo $buy["nama_barang"]; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $buy["alamat"]; ?></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>Rp. <?php echo $buy["harga"]; ?></td>
                        </tr>
                        <tr>
                            <td>Total Buy</td>
                            <td>:</td>
                            <td><?php echo $buy["jumlah"]; ?></td>
                        </tr>
                        <tr>
                            <td>Total &nbsp;&nbsp;</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td>Rp. <?php echo $buy["harga"] * $buy["jumlah"]; ?></td>
                        </tr>
                    </table>
                </td>
                <td class="bukti-img"> <img src="../gambar/bukti_pembayaran/<?=$buy['nama_file']?>"> </td>
                <td> <?=$buy['waktu'] ?> </td>
            </tr>
            <?php $i++; endforeach ?>
        </table>
    </div>
</body>
</html>