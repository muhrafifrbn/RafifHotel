<?php
require 'koneksi.php';

// AMBIL DATA KAMAR
$data = mysqli_query($koneksi,"SELECT * FROM kamar");
$rows = [];
while($row = mysqli_fetch_assoc($data)){
	$rows[] = $row;
}

// AMBIL DATA FASILITAS
$data2 = mysqli_query($koneksi,"SELECT * FROM fasilitas");
$rows2 = [];
while($row = mysqli_fetch_assoc($data2)){
	$rows2[] = $row;
}

// AMBIL DATA FASILITAS HOTEL
$data3 = mysqli_query($koneksi,"SELECT * FROM fasilitas_hotel");
$rows3 = [];
while($row = mysqli_fetch_assoc($data3)){
	$rows3[] = $row;
}

// AMBIL DATA PPEMESANAN
$data4 = mysqli_query($koneksi,"SELECT * FROM pemesanan");
$rows4 = [];
while($row = mysqli_fetch_assoc($data4)){
	$rows4[] = $row;
}



// Fungsi Tambah Data Kamar
if(isset($_POST['tambah_kamar'])){
    $type_kamar = $_POST['typekamar'];
    $nomor_kamar = $_POST['nomorkamar'];
    $status = $_POST['status'];
    $harga = $_POST['harga'];
     $gambar = upload();
     if($gambar === false){
        echo "<script>
        document.location.href = 'admin.php';
        </script>";
     }
     else{
        $tambah = mysqli_query($koneksi, "INSERT INTO kamar VALUES
        ('','$type_kamar','$nomor_kamar','$status','$harga','$gambar')"
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
// Akhir Fungsi Tambah Data Kamar


// Fungsi Tambah Data Fasilitas
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
// Akhir Fungsi Tambah Data Fasilitas

// Fungsi Tambah Data Fasilitas Hotel
if(isset($_POST['tambah_fasilitas_hotel'])){
    $nama_fasilitas_hotel = $_POST['namafasilitashotel'];
    $keterangan_fasilitas_hotel = $_POST['keteranganfasilitashotel'];
     $gambar = upload();
     if($gambar === false){
        echo "<script>
        document.location.href = 'admin.php';
        </script>";
     }
     else{
        $tambah = mysqli_query($koneksi, "INSERT INTO fasilitas_hotel VALUES
        ('','$nama_fasilitas_hotel','$keterangan_fasilitas_hotel','$gambar')"
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
// Akhir Fungsi Tambah Data Fasilitas Hotel

// Fungsi Edit Data Fasilitas
if(isset($_POST['ubahfasilitas'])){
    $id = $_POST['id'];
    $nama = $_POST['namafasilitas'];
    $keterangan = $_POST['keteranganfasilitas'];
    $nomor_kamar = $_POST['status'];

    $query = "UPDATE fasilitas SET 
    nama_fasilitas = '$nama', 
    keterangan_fasilitas = '$keterangan',
    id_kamar = '$nomor_kamar'
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
// Akhir Fungsi Edit Data Fasilitas


// FUNGSI EDIT DATA KAMAR
if(isset($_POST['editkamar'])){
    $id = $_POST['id'];
    $type_kamar = $_POST['typekamar'];
    $nomor_kamar = $_POST['nomorkamar'];
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
    jumlah_kamar = '$nomor_kamar',
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
// AKHIR FUNGSI EDIT DATA KAMAR

// FUNGSI HAPUS DATA KAMAR
if(isset($_POST['hapusdatakamar'])){
    $id = $_POST['id'];
    mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar = $id");
    if(mysqli_affected_rows($koneksi) > 0){
        mysqli_query($koneksi, "DELETE FROM fasilitas WHERE id_kamar = $id");
        echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'admin.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'admin.php';
        </script>";
    }
}

//FUNGSI HAPUS DATA FASILITAS KAMAR
if(isset($_POST['hapus_data_fasilitas_kamar'])){
    $id = $_POST['id'];
    mysqli_query($koneksi,"DELETE FROM fasilitas WHERE id_fasilitas = $id");
    if(mysqli_affected_rows($koneksi) > 0){
        echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'admin.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'admin.php';
        </script>";
    }
}


// FUNGSI PESANAN KAMAR
function pesanKamar($data){
    global $koneksi;
    $nama_pemesan = $data['nama_pemesan'];
    $email_pemesan = $data['email_pemesan'];
    $no_handphone = $data['hp_pemesan'];
    $nama_tamu = $data['nama_tamu'];
    $id_kamar = $data['id_kamar'];
    $tanggal_cekIn = $data['cekin'];
    $tanggal_cekOut = $data['cekout'];
    $jumlah_kamar = $data['jumlah_kamar'];

    $data_kamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id_kamar = $id_kamar");
    $data_jumlah_kamar = mysqli_fetch_assoc($data_kamar)['jumlah_kamar'];

    if($jumlah_kamar <= $data_jumlah_kamar){
        $hasil_jumlah_kamar = $data_jumlah_kamar - $jumlah_kamar;
        if($hasil_jumlah_kamar == 0){
            $status = "sold";
        }
        else{
            $status = "ready";
        }
        mysqli_query($koneksi,"INSERT INTO pemesanan VALUES 
        ('','$nama_pemesan','$email_pemesan','$no_handphone','$nama_tamu','$tanggal_cekIn','$tanggal_cekOut','$jumlah_kamar','$id_kamar','1')
       ");

        mysqli_query($koneksi,"UPDATE kamar SET jumlah_kamar = '$hasil_jumlah_kamar', status = '$status'  WHERE id_kamar = $id_kamar");
      
    }
    else{
        echo "<script>
        alert('Pastikan Anda Memesan Jumlah Kamar Yang Benar');
        document.location.href = 'index.php';
        </script>";
    }

    if(mysqli_affected_rows($koneksi) > 0){
        echo "<script>
        alert('Pemesanan Berhasil');
        document.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Pemesanan Gagal');
        document.location.href = 'index.php';
        </script>";
    }
   
}

// FUNGSI KONFIRMASI PESANAN
function konfirmasi_pesanan($data){
    global $koneksi;
    $id_pesanan = $data['id_pesanan'];
    $status = $data['status'];

    mysqli_query($koneksi, "update pemesanan set status='$status' where id_pesanan='$id_pesanan'");

    if(mysqli_affected_rows($koneksi) > 0){
       header("location:resepsionis.php");
    }
    else{
        header("location:resepsionis.php");
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