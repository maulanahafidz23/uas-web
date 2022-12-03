<?php
    session_set_cookie_params(0);
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }

    require('koneksi.php');
    
    $username_ = $_GET['username'];
    
    $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username='$username_'");
    
    while ($row = mysqli_fetch_assoc($hasil)) {
        $user[] = $row;
    }
    
    $username = $user[0];
    $name = $username['username'];

    if (isset($_POST['cari'])) {
        $product = cariTire($_POST["keyword"]);
        $product1 = cariVelg($_POST["keyword"]);
    } else {
        $product = queryTire("SELECT * FROM product WHERE jenis = 'Tire'");
        $product1 = queryVelg("SELECT * FROM product WHERE jenis = 'Velg'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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

            <a href="index.php?username=<?php echo $username['username']; ?>" class="nav__logo">
                <b>SMJA</b>
            </a>

            <div class="wrap">
                <form action="" method="post">
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
                    User
                </a>
            </div>
            <div class="overlay-content">
                <a href="index.php?username=<?php echo $username['username']; ?>">Home</a>
                <a href="#Velg">Velg</a>
                <a href="#Tire">Tire</a>
                <a href="about_us.php">About Us</a>
            </div>
            <div class="logout">
                <a href="logout.php"><i class='bx bx-log-out' ></i>Logout</a>
            </div>
          </div>
    </section>

    <!--==================== slider ====================-->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="gambar/promo/bmw.png" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="gambar/promo/lamborghini.png" style="width:100%">
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}
</script>

    <!--==================== PRODUCT ====================-->

    <section class="product container">
        <div class="heading">
            <h2 id="Tire"><b>TIRE</b></h2>
        </div>
        <div class="list-catalog">
            <?php $i = 1; foreach ($product as $pdt): ?>
            <div class="catalog">
                <div class="catalog-image"><img src="gambar/produk/<?=$pdt['nama_file']?>"></div>
                <div class="catalog-text">
                    <div class="nama">
                        <h2><?php echo $pdt["nama"]; ?></h2>
                    </div>
                    <div class="harga">
                        <p>Rp. <?php echo $pdt["harga"]; ?></p>
                    </div>
                    <div class="buy">
                        <a href="buy.php?id=<?php echo $pdt['id']; ?>&username=<?php echo $username['username']; ?>"><h2>BUY</h2></a>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach ?>
        </div>
    </section>
    
    <section class="product container">
        <div class="heading">
            <h2 id="Velg"><b>VELG</b></h2>
        </div>
        <div class="list-catalog">
            <?php $i1 = 1; foreach ($product1 as $pdt1): ?>
            <div class="catalog">
                <div class="catalog-image"><img src="gambar/produk/<?=$pdt1['nama_file']?>"></div>
                <div class="catalog-text">
                    <div class="nama">
                        <h2><?php echo $pdt1["nama"]; ?></h2>
                    </div>
                    <div class="harga">
                        <p>Rp. <?php echo $pdt1["harga"]; ?></p>
                    </div>
                    <div class="buy">
                        <a href="buy.php?id=<?php echo $pdt1['id']; ?>&username=<?php echo $username['username']; ?>"><h2>BUY</h2></a>
                    </div>
                </div>
            </div>
            <?php $i1++; endforeach ?>
        </div>
    </section>

    <!--==================== FOOTER ====================-->
    <footer class="footer">
        <div class="footer1 container">

            <div class="footer__content">
                <h3 class="footer__title">Contact Person</h3>

                <ul class="footer__list">
                    <li>maulanahfdz23@gmail.com - Maulana </li>
                </ul>
            </div>
            <div class="footer__content">
                <h3 class="footer__title">About Us</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Customer Support</a>
                    </li>
                    <li>
                        <a href="about_us.php" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Copy Right</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Product</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Tire</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Velg</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Nut</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Big Brake Kit</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="footer__copy">&#169; Copyright 2022 by Maulana M Hafidz</div>
    </footer>
    
    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>
</body>
</html>