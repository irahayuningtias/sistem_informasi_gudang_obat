<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'inventory');

    if ($connect)
        echo '';
    
    //Menambah barang baru
    if (isset($_POST['addnewbarang'])){
        $nomor = $_POST['nomor'];
        $idbarang = $_POST['idbarang'];
        $namabarang = $_POST['namabarang'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];

        $addtotable = mysqli_query($connect, "INSERT INTO barang (id_barang, nama_barang, deskripsi, stock) values ('$idbarang', '$namabarang', '$deskripsi', '$stock')");
        if ($addtotable){
            header('location:index.php');
        } else{
            echo 'Gagal';
            header('location:index.php');
        }
    };

    //barangmasuk
    if(isset($_POST['barangmasuk'])){
        $barangnya = $_POST['barangnya'];
        $penerima = $_POST['penanggungjawab'];
        $qty = $_POST['qty'];

        $cekstocksekarang = mysqli_query($connect, "select * from barang where id_barang='$barangnya'");
        $ambildatanya = mysqli_fetch_array($cekstocksekarang);

        $stocksekarang = $ambildatanya['stock'];
        $tambahkanstokdgqty = $stocksekarang+$qty;

        $addtomasuk = mysqli_query($connect, "insert into masuk (id_barang, penanggungjawab, qty) values ('$barangnya', '$penerima', '$qty') ");
        $updatestockmasuk = mysqli_query($connect, "update barang set stock='$tambahkanstokdgqty' where id_barang='$barangnya'");
        if ($addtomasuk&&$updatestockmasuk){
            header('location:masuk.php');
        } else{
            echo 'Gagal';
            header('location:masuk.php');
        }
    }

    //barang keluar
    if(isset($_POST['barangkeluar'])){
        $barangnya = $_POST['barangnya'];
        $penerima = $_POST['penerima'];
        $qty = $_POST['qty'];

        $cekstocksekarang = mysqli_query($connect, "select * from barang where id_barang='$barangnya'");
        $ambildatanya = mysqli_fetch_array($cekstocksekarang);

        $stocksekarang = $ambildatanya['stock'];
        $tambahkanstokdgqty = $stocksekarang-$qty;

        $addtokeluar = mysqli_query($connect, "insert into keluar (id_barang, penerima, qty) values ('$barangnya', '$penerima', '$qty') ");
        $updatestockmasuk = mysqli_query($connect, "update barang set stock='$tambahkanstokdgqty' where id_barang='$barangnya'");
        if ($addtokeluar&&$updatestockmasuk){
            header('location:keluar.php');
        } else{
            echo 'Gagal';
            header('location:keluar.php');
        }
    }

    //update info barang
    if (isset($_POST['updatebarang'])){
        $idbarang = $_POST['idbarang'];
        $namabarang = $_POST['namabarang'];
        $deskripsi = $_POST['deskripsi'];

        $update = mysqli_query($connect, "UPDATE barang set nama_barang='$namabarang', deskripsi='$deskripsi' where id_barang='$idbarang'");
        if ($update){
            header('location:index.php');
        } else{
            echo 'Gagal';
            header('location:index.php');
        }
    }

    //Menghapus barang
    if (isset($_POST['hapusbarang'])){
        $idbarang = $_POST['idbarang'];

        $hapus = mysqli_query($connect, "DELETE FROM barang where id_barang='$idbarang'");
        if ($hapus){
            header('location:index.php');
        } else{
            echo 'Gagal';
            header('location:index.php');
        }
    }
?>