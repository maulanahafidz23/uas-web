<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Us</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 black;
  margin: 8px;
  background-color: rgb(54, 50, 50);
  
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: white;
  color:  black;
}

.about-section h1{
  color:  royalblue;
}

.container-2 {
  padding: 0 16px;
  background-color: rgb(54, 50, 50);
}
.container-2 h2{
  color:white;
}
.container-2::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: royalblue;
}

.title2 {
  color: white;
}

.title3 {
  color: white;
}

.button6 {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: royalblue;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button6:hover {
  background-color: white;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>About Us</h1>
  <p>Pusat Online Store Jam Tangan Nomor 1 terbesar di mana-mana Eleganzwatch merupakan pusat penjualan 100% produk jam tangan original dari 
     berbagai brand ternama dunia, dengan beragam penawaran menarik yang sayang untuk dilewatkan. Eleganzwatch adalah sebuah e-commerce dimana 
     hanya produk jam tangan pilihan yang berkualitas, lengkap dengan garansi resmi yang memberikan keamanan dan kenyamanan berbelanja online bagi 
     penggunanya. Di bawah payung besar nama Machtwatch, saat ini Eleganzwatch adalah platform penjualan online produk jam tangan nomor 1 
     terbesar di mana-mana.
  </p>
</div>

  <div class="column">
    <div class="card">
      <img src="gambar/image2.png" alt="Mike" style="width:100%">
      <div class="container-2">
        <h2>Maulana</h2>
        <p class="title">Creator</p>
        <div class="title2">
          <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>Maulana Muhammad Hafidz</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td>2109106070</td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td>Informatika</td>
                </tr>
                <tr>
                    <td>Angkatan&nbsp;</td>
                    <td>:&nbsp;</td>
                    <td>2021</td>
                </tr>
            </table>
          </div>
        <p class="title3 ">maulanahfdz23@gmail.com</p>
        <p><button6 class="button6">Contact</button6></p>
      </div>
    </div>
  </div>

</div>

</body>
</html>