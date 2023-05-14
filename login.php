<?php
    include 'koneksi.php';

    //Cek Login
    if (isset($_POST['login'])){
        $username = $_POST['Username'];
        $pass = $_POST['Password'];

        //cocokkan dengan database kolom user
        $cekDB = mysqli_query($connect, "SELECT * FROM user where Username='$username' and Password='$pass'");
        //hitung jumlah data
        $hitung = mysqli_num_rows($cekDB);
        if ($hitung > 0){
            $_SESSION['log'] = 'True';
            header('location:index.php');
        } else{
            header('location:login.php');
        }
    }

    if (!isset($_SESSION['log'])){

    } else{
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Informasi Gudang Obat</title>
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="Username" id="inputUsername" type="username" placeholder="username" />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="Password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>   
        </div>
    </body>
</html>