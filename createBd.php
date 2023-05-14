<?php
$hostname = "localhost";
$username = "root";
$password = "";

$connect = mysqli_connect($hostname, $username, $password);
if($connect){
    echo "DATABASE BERHASIL DIBUAT";
}
else {
    echo " " . mysqli_connect_error();
}

$sql = "CREATE DATABASE inventory";
if(mysqli_query($connect, $sql)){
    echo "";
}
else {
    echo " " . mysqli_error($connect);
}

mysqli_close($connect);
?>