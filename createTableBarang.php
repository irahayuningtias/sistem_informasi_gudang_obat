<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "inventory";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect){
    echo "BERHASIL MENAMBHAKAN TABEL";
}
else {
    echo "" . mysqli_connect_error();
}
$sql = " CREATE TABLE barang (
    nomor INT,
    id_barang VARCHAR(5) PRIMARY KEY,
    nama_barang VARCHAR(30),
    deskripsi VARCHAR(50),
    stock INT)
    ";

    if(mysqli_query($connect, $sql)){
        echo " ";
    }
    else {
        echo " " . mysqli_error($connect);
    }

    mysqli_close($connect);
    ?>