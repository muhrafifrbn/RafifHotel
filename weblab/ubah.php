<?php
require '../koneksi.php';
require 'tambah.php';

// print_r($_POST);

if(isset($_POST['ubahfasilitas'])){
    $id = $_POST['id'];
    $nama = $_POST['namafasilitas'];
    $keterangan = $_POST['keteranganfasilitas'];
    $nomor_kamar = $_POST['status'];

    $query = "UPDATE fasilitas SET 
    nama_fasilitas = '$nama', 
    keterangan_fasilitas = '$keterangan'
    WHERE id_fasilitas = $id
   ";

    mysqli_query($koneksi, $query);
if(mysqli_affected_rows($koneksi) > 0){
    echo "<script>
    alert('Data Berhasil Diubah!');
    document.location.href = 'admin.php';
    </script>";
}
else{
    echo "<script>
    alert('Data Gagal Diubah!');
    document.location.href = 'admin.php';
    </script>";
}

}


if(isset($_POST['editkamar'])){
    $id = $_POST['id'];
    $type_kamar = $_POST['typekamar'];
    $nomor_kamar = $_POST['nomorkamar'];
    $kapasitas_tamu = $_POST['kapasitastamu'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $gambarLama = $_POST['gambarlama'];

    if($_FILES['foto']['error'] === 4){
        $gambar = $gambarLama;
    }
    else{
        $gambar =  upload();
    }

    $query = "UPDATE kamar SET 
    type_kamar = '$type_kamar', 
    nomor_kamar = '$nomor_kamar',
    status = '$status',
    harga = '$harga',
    foto = '$gambar'
    WHERE id_kamar = $id
   ";

    mysqli_query($koneksi, $query);
if(mysqli_affected_rows($koneksi) > 0){
    echo "<script>
    alert('Data Berhasil Diubah!');
    document.location.href = 'admin.php';
    </script>";
}
else{
    echo "<script>
    alert('Data Gagal Diubah!');
    document.location.href = 'admin.php';
    </script>";
}
 
 
}


?>