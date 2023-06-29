<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "inventory";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect){
    echo "BERHASIL MENAMBAHKAN TABEL";
}
else {
    echo "" . mysqli_connect_error();
}
$sql = " CREATE TABLE keluar (
    id_keluar INT PRIMARY KEY AUTO_INCREMENT,
    id_barang VARCHAR(5),
    tanggal VARCHAR(10),
    jumlah INT,
    penerima VARCHAR(50),
    FOREIGN KEY (id_barang) REFERENCES barang(id_barang)
    )";

if(mysqli_query($connect, $sql)){
    echo " ";
}
else {
    echo " " . mysqli_error($connect);
}

mysqli_close($connect);
?>