<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "inventory";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect){
    echo "";
}
else {
    echo "" . mysqli_connect_error();
}

$sql = " CREATE TABLE user (
    id VARCHAR(5) PRIMARY KEY,
    nama VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(50)
    )";

    if(mysqli_query($connect, $sql)){
        echo " ";
    }
    else {
        echo " " . mysqli_error($connect);
    }

    mysqli_close($connect);
    ?>


