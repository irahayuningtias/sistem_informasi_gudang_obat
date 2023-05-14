<?php
    include 'koneksi.php';
    include 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - Sistem Informasi Gudang Obat</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Gudang Obat</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Stock Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Stock Obat yang ada di gudang</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah barang
                            </button>

                            </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Tambah Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                                            
                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="text" name="idbarang" placeholder="ID Barang" class="form-control">
                                    <br>
                                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control">
                                    <br>
                                    <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control">
                                    <br>
                                    <input type="num" name="stock" placeholder="Stock" class="form-control">
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                                    </div>
                                    </form>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                                            
                                </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Stock</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $ambilsemuadataStock=mysqli_query($connect, "select * from barang");
                                    while($data=mysqli_fetch_array($ambilsemuadataStock)){
                                        $idbarang = $data['id_barang'];
                                        $namabarang = $data['nama_barang'];
                                        $deskripsi = $data ['deskripsi'];
                                        $stock = $data['stock'];
                                    
                                    ?>
                                    <tr>
                                    <td><?=$idbarang;?></td>
                                    <td><?=$namabarang;?></td>
                                    <td><?=$deskripsi;?></td>
                                    <td><?=$stock;?></td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idbarang;?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idbarang;?>">
                                        Delete
                                    </button>
                                    </td>
                                    </tr>
                                    

                                    <!-- Edit The Modal -->
                            <div class="modal fade" id="edit<?=$idbarang;?>">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                                            
                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="text" name="idbarang" value="<?=$idbarang;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control">
                                    <br>
                                    <input type="hidden" name="idbarang" value="<?=$idbarang;?>">
                                    <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                    </div>
                                    </form>

                                </div>
                                </div>
                                </div>

                                     <!-- DELETE The Modal -->
                                <div class="modal fade" id="delete<?=$idbarang;?>">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Hapus Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                                            
                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    Apakah Anda yakin menghapus data <?=$namabarang;?> ini?
                                    <input type="hidden" name="idbarang" value="<?=$idbarang;?>">
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                    </div>

                                    </form>
                                </div>
                                </div>
                                </div>   

                                    <?php
                                    };
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
