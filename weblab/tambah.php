<?php

require '../koneksi.php';

if(isset($_POST['tambah_kamar'])){
    $type_kamar = $_POST['typekamar'];
    $nomor_kamar = $_POST['nomorkamar'];
    $kapasitas_tamu = $_POST['kapasitastamu'];
    $status = $_POST['status'];
   
    $harga = $_POST['harga'];
  

     // Upload Gambar
     $gambar = upload(); // Hasil Dari Fungsi upload
     // Fungsi Upload Kalau Berhasil, Ada 2 Hal Yaitu Gambar DiUpload dan Mengirimkan Nama Gambar
     if($gambar === false){
        echo "<script>
        document.location.href = 'admin.php';
        </script>";
     }
     else{
        $tambah = mysqli_query($koneksi, "INSERT INTO kamar VALUES
        ('','$type_kamar','$nomor_kamar','$kapasitas_tamu','$status','$harga','$gambar')"
        );
     }
   

    if(mysqli_affected_rows($koneksi) > 0){
        echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'admin.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'admin.php';
        </script>";
    }
}

if(isset($_POST['tambah_fasilitas'])){
    $nomor_kamar = $_POST['status'];
    $nama_fasilitas = $_POST['namafasilitas'];
    $keterangan = $_POST['keteranganfasilitas'];
  


    $tambah = mysqli_query($koneksi, "INSERT INTO fasilitas VALUES
    ('','$nama_fasilitas','$keterangan','$nomor_kamar')"
    );

    if(mysqli_affected_rows($koneksi) > 0){
        echo "<script>
        alert('Data Berhasil Ditambahkan!');
        document.location.href = 'admin.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data Gagal Ditambahkan!');
        document.location.href = 'admin.php';
        </script>";
    }
}


function upload(){
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tmpName = $_FILES["foto"]["tmp_name"];

    // Cek Apakah Tidak Ada Gambar Yang Di Upload
    if( $error === 4){
          echo "
          <script>
          alert('Pilih Gambar Terlebih Dahulu!');
          </script>
          ";
          return false;
    }

    // Cek Apakah Yang Diupload Adalah Gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    // explode() = Fungsi Untuk Memecah Sebuah String Menjadi Array
    // Artinya Dalam Satu String Ketemu Karakter Apa, Maka Stringnya Akan Dipecah Menjadi Array
    // Contoh Rafif.jpg = ['Rafif','jpg'];
    $ekstensiGambar = explode('.', $namaFile);
    // end($ekstensiGambar) = Fungsi Untuk Mengambil Nilai Array Paling Akhir
    // strtolower() = Fungsi Untuk Mengubah Huruf Menjadi Kecil Semua
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // in_array() = Fungsi Untuk Mengecek Adakah Sebuah String Di Dalam Array
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){  // Mengecek Ekstensi Gambar Yang Di Upload Ada Atau Tidak
          echo "
          <script>
          alert('File Yang Anda Upload Bukan Gambar!');
          </script>
          ";
          return false;
    }

    // Cek Jika Ukurannya Terlalu Besar
    if( $ukuranFile > 500000){
          echo "
          <script>
          alert('Ukuran Gambar Terlalu Besar!');
          </script>
          ";
          return false;
    }

    // Lolos Pengecekan, Gambar Siap DiUpload
    // move_uploaded_file() = Fungsi Untuk Memindahkan File Yang Diunggah Ke Tujuan Baru
    // Generate Nama Gambar Baru
    // uniqid() = Fungsi Untuk Membangkitkan String Atau Angka Random
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namaFileBaru); die;
    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

    return $namaFileBaru;
}

?>