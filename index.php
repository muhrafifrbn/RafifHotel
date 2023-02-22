<?php


require  'weblab/controller.php';
require  'weblab/koneksi.php';
session_start();


if(isset($_POST['pesan_kamar'])){
   $hasil = pesanKamar($_POST);
}

$kamar = mysqli_query($koneksi,"SELECT * FROM kamar");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
     <!-- ICON BOOSTRAPE -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <!-- ICON FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body id="home">
    <header>
      <div class="container naik">
        <nav>
          <div class="logo"><a href="#">Hotel Hebat</a></div>
          <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#kamar">Kamar</a></li>
            <li><a href="#fasilitas">Fasilitas</a></li>
          </ul>
        </nav>
        <div class="hero-image">
          <div class="text-hero-image">
            <p>WELCOME,</p>
            <p>Hotel Hebat</p>
            <?php if(isset($_SESSION['tamu'])){ ?>
            <p><?= $_SESSION['tamu']; ?></p>
            <?php } else{ ?>
              <p>"WE ARE -RAVF-"</p>
            <?php } ?>
          
            <?php if(isset($_SESSION['tamu'])) {?>
              <button class="down-cv"><a href="logout.php">Logout</a></button>
            <?php } else{?>
              <button class="hire-btn"><a href="login.php">Login</a></button>
            <button class="down-cv"><a href="registrasi.php">Registrasi</a></button>
             
            <?php } ?> 
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <section class="form">
          <form action="" method="post">
            <div class="box-input">
              <label for="cekin"> Tanggal Cek In </label>
              <input type="date" name="cekin" id="cekin" />
            </div>
            <div class="box-input">
              <label for="cekout"> Tanggal Cek Out </label>
              <input type="date" name="cekout" id="cekout" />
            </div>
            <div class="box-input">
              <label for="jmlkamar"> Jumlah Kamar </label>
              <input type="number" name="jumlah_kamar" id="jmlkamar" />
            </div>
            <div class="box-input">
              <?php if(isset($_SESSION['tamu'])){ ?>
              <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan</button>
               <?php } else {?>
              <a href="login.php" style="text-decoration:none; color:black;"><button type="button" >Pesan</button></a>
               <?php } ?>
            </div>
          
         
        </section>
        <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <label>Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" placeholder="Masukan Nama Pemesan">
                      </div>
                      <div class="form-group">
                        <label>Email Pemesan</label>
                        <input type="text" name="email_pemesan" class="form-control" placeholder="Masukan Email Pemesan">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="text" name="hp_pemesan" class="form-control" placeholder="Masukan No. Handphone">
                      </div>
                      <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu">
                      </div>
                      <div class="form-group">
                        <label>Pilih Kamar</label>
                        <select name="id_kamar" class="form-control">
                          <option value="">--- Pilih Kamar ---</option>
                          <?php
                          // include 'koneksi.php';
                          // $data = mysqli_query($koneksi, "select * from kamar");
                          // while ($d = mysqli_fetch_array($data)) { 
                            foreach($rows as $kmr){
                            ?>
                            <option value="<?php echo $kmr['id_kamar']; ?>"><?php echo $kmr['type_kamar']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="pesan_kamar">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          </form>
        <article class="about">
          <h1>tentang kami</h1>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id aliquam suscipit at asperiores error totam rerum saepe sit, corporis adipisci ducimus eveniet harum quibusdam iure obcaecati fugiat! Pariatur sunt ipsum molestiae sed,
            et culpa, eveniet quia sequi, minus vero iste id veniam assumenda fugit. Provident mollitia corporis dolorem a ab ex non ut consectetur sint inventore, quae itaque ratione blanditiis! Ea obcaecati rem qui? Ducimus optio eaque
            consequuntur unde sed tenetur, sit molestiae deserunt labore culpa velit facere aut. Repudiandae possimus animi repellendus a nemo id iure voluptatum. Consectetur vitae a qui minima perspiciatis nemo ab, fuga voluptates saepe
            cumque?
          </p>
        </article>
        <article id="kamar">
          <h1>Kamar</h1>
          <div class="flex-kamar">
          <?php while( $data = mysqli_fetch_assoc($kamar)) { 
               $id = $data['id_kamar'];
               $fasilitas = mysqli_query($koneksi,"SELECT * FROM fasilitas WHERE id_kamar = $id");
               if(mysqli_num_rows($fasilitas) > 0){
                $keterangan = mysqli_fetch_assoc($fasilitas)['keterangan_fasilitas'];
               }
               else{
                 $keterangan = "Data fasilitias belum ditambahkan";
               }
             
               
            ?>
           <div class="box-kamar">
              <div class="header">
                <img src="weblab/img/<?= $data['foto'] ?>" alt="foto_kamar_hotel" />
              </div>
              <div class="text">
                <h2><?= $data['type_kamar'] ?></h2>
                <ul>
                 <li>Fasilitas : </li>
                 <li><?= $keterangan ?></li>
                 <li>Harga : Rp.<?= $data['harga'] ?></li>
                 <li>Jumlah Kamar Tersedia: <?= $data['jumlah_kamar'] ?></li>
                 <?php if($data['status']== "ready") {?>
                 <li style="color:green;">Status : READY</li>
                 <?php } ?>
                 <?php if($data['status']== "sold") {?>
                 <li style="color:red;">Status : SOLD</li>
                 <?php } ?>
                </ul>
              </div>
            </div>
            <?php } ?>
          </div> 
        </article>
        <article id="fasilitas">
          <h1>Fasilitas Hotel</h1>
          <div class="flex-fasilitas">
           <div class="box-fasilitas">
              <div class="header">
                <img src="img/sauna.jpg"alt="foto_fasilitas_hotel" />
              </div>
              <div class="text">
                <h2>Sauna</h2>
                <ul>
                 <li>ruangan dengan suhu panas dan kering yang digunakan untuk membantu tubuh mengeluarkan keringat dan membakar lebih banyak kalori.</li>
                </ul>
              </div>
            </div>
           <div class="box-fasilitas">
              <div class="header">
                <img src="img/kolam.jpg" alt="foto_fasilitas_hotel" />
              </div>
              <div class="text">
                <h2>Kolam Renang</h2>
                <ul>
                <li>Kolam renang ini dirancang untuk tamu dan beroperasi dari 6:00-21:00 setiap hari, dengan dikelilingi taman tropis yang indah.</li>
                </ul>
              </div>
            </div>
           <div class="box-fasilitas">
              <div class="header">
                <img src="img/taman.jpg" alt="foto_fasilitas_hotel" />
              </div>
              <div class="text">
              <h2>Area Terbuka</h2>
                <ul>
                <li>bersifat terbuka, tempat tumbuh tanaman, baik yang tumbuh tanaman secara alamiah maupun yang sengaja ditanam.</li>
                </ul>
              </div>
            </div>
           <div class="box-fasilitas">
              <div class="header">
                <img src="img/basment.jpg" alt="foto_fasilitas_hotel" />
              </div>
              <div class="text">
              <h2>Parkir Basement</h2>
                <ul>
                <li>Tempat parkir yang luas dan nyaman, lobby yang luas dan nyaman, check in/out cepat.</li>
                </ul>
              </div>
            </div>
           <div class="box-fasilitas">
              <div class="header">
                <img src="img/pantai.jpg" alt="foto_fasilitas_hotel" />
              </div>
              <div class="text">
              <h2>Pantai Pribadi</h2>
                <ul>
                <li>Pantai yang luas dan nyaman, menikmati keindahan alam pantai, melihat matahari terbit atau tenggelam.</li>
                </ul>
              </div>
            </div>
           <div class="box-fasilitas">
              <div class="header">
                <img src="img/clubhouse.jpg" alt="foto_fasilitas_hotel" />
              </div>
              <div class="text">
              <h2>Club House</h2>
                <ul>
                <li> fasilitas modern yang meliputi aktivitas olahraga dan rekreasi, yang berada di satu area khusus. </li>
                </ul>
              </div>
            </div>
          </div> 
        </article>
      </div>
    </main>
    <footer>
      <div class="container flex-footer">
        <p>Social Media Account</p>

        <!--paragraph-->
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores labore dolore vel!</p>
        <!--social-->
        <div class="social-icons">
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>

        <!--copyright-->
        <p class="copyright">Copyright by Rafif Rabbani</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>
