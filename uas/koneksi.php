<?php
    $conn = mysqli_connect("localhost", "id19708120_uas", "sdj(Bum|P2!_{($@", "id19708120_db_smja");

    if (!$conn) {
        die("Gagal terhubung ke database". mysqli_connect_eror());
    }


// ----------------- index -----------------

function queryTire($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $product = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $product[] = $row;
    }
    return $product;
}

function queryVelg($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $product1 = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $product1[] = $row;
    }
    return $product1;
}

function cariTire($keyword) {
    $query = "SELECT * FROM product WHERE jenis = 'Tire' AND nama LIKE '%$keyword%'
    OR harga LIKE '%$keyword%'";

    return queryTire($query);
}

function cariVelg($keyword) {
    $query = "SELECT * FROM product WHERE jenis = 'Velg' AND nama LIKE '%$keyword%'
    OR harga LIKE '%$keyword%'";

    return queryVelg($query);
}
