<?php


session_start();
if(!isset($_SESSION['admin'])){
  header('location : login.php');
}

require 'koneksi.php';
include 'controller.php';

// echo $_SESSION['admin'];
// die;

// $data = mysqli_query($koneksi,"SELECT * FROM kamar");
// $rows = [];
// while($row = mysqli_fetch_assoc($data)){
// 	$rows[] = $row;
// }

// $data2 = mysqli_query($koneksi,"SELECT * FROM fasilitas");
// $rows2 = [];
// while($row = mysqli_fetch_assoc($data2)){
// 	$rows2[] = $row;
// }

// $id = $rows2[0]['']
// $id = mysqli_query($koneksi, "SELECT nomor_kamar FROM kamar WHERE id_kamar = $id");
// $d =  mysqli_fetch_array($data)['nomor_kamar'];


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>crud dashboard</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

  </head>
  <body >
  
      <!-------page-content start----------->
   
      <div style="width:100%;" id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form>
							    <div class="input-group">
								  <input type="search" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">Go
									 </button>
								  </div>
								</div>
							 </form>
						 </div>
					 </div>
					 
					 
					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							   <li class="dropdown nav-item active">
							     <a class="nav-link bg-primary" href="#" >
								 Nama :	
								 <?= $_SESSION['admin']; ?>
								 </a>
							   </li>
							   <li class="dropdown nav-item active">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <span class="material-icons">notifications</span>
								  <span class="notification">4</span>
								 </a>
								  <ul class="dropdown-menu">
								     <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
								  </ul>
							   </li>
							   
							   <li class="nav-item">
							     <a class="nav-link" href="#">
								   <span class="material-icons">question_answer</span>
								 </a>
							   </li>
							   
							   <li class="dropdown nav-item">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <img src="img/user.jpg" style="width:40px; border-radius:50%;"/>
								  <span class="xp-user-live"></span>
								 </a>
								  <ul class="dropdown-menu small-menu">
								     <li><a href="#">
									 <span class="material-icons">person_outline</span>
									 Profile
									 </a></li>
									 <li><a href="#">
									 <span class="material-icons">settings</span>
									 Settings
									 </a></li>
									 <li><a href="../logout.php">
									 <span class="material-icons">logout</span>
									 Logout
									 </a></li>
									 
								  </ul>
							   </li>
							   
							   
							   </ul>
							</nav>
						 </div>
					 </div>
					 
				 </div>
				 
				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Dashboard</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">Vishweb</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
					</ol>
				 </div>
				 
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		     
		      <div class="main-content">
			     <div class="row">
				 <div class="container d-flex justify-content-center"">
					<nav>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Kamar</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Fasilitas Kamar</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Fasilitas Hotel</button>
						</li>
						</ul>
					</nav>
				 </div>
				 <div class=" col-md-12">
						<div class="text-center tab-content" id="myTabContent">
							<div class=" table-wrapper tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">		
								<div class="table-title">
									<div class="row">
										<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
											<h2 class="ml-lg-2">Kamar</h2>
										</div>
										<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#addkamar" class="btn btn-success" data-toggle="modal">
										<i class="material-icons">&#xE147;</i>
										<span>Tambah</span>
										</a>
										</div>
									</div>
								</div>
								
								<table class="table table-striped table-hover">
									<thead>
										<tr>
										<th>No</th>
										<th>Type Kamar</th>
										<th>Nomor Kamar</th>
										<th>Kapasitas Tamu</th>
										<th>Status</th>
										
										<th>Harga</th>
										<th>Foto</th>
										<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										<!-- <tr>
										<th><span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="option[]" value="1">
										<label for="checkbox1"></label></th>
										<th>Thomas Hardy</th>
										<th>ThomasHardy@gmail.com</th>
										<th>90r parkdground poland Usa.</th>
										<th>(78-582552-9)</th>
										<th>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal">
										<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
										</a>
										<a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
										<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
										</a>
										</th>
										</tr> -->
										<?php $i = 1; ?>
										<?php foreach($rows as $kmr):  ?>
										<tr>
										<th><?= $i ?></th>
										<th><?= $kmr['type_kamar']; ?></th>
										<th><?= $kmr['jumlah_kamar']; ?></th>
									
										<th><?= $kmr['status']; ?></th>
										
										<th><?= $kmr['harga']; ?></th>
										<th><img src="img/<?= $kmr['foto']; ?>" alt="" srcset="" width="150"></th>
										
										<th>
									    <a href="#ubahKamar<?= $kmr['id_kamar'] ?>" class="edit" data-toggle="modal" >
										<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
										</a>
										
										<a href="#hapusDataKamar<?= $kmr['id_kamar']?>" class="delete" data-toggle="modal">
										<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
										</a>
										</th>
										</tr>
										<?php $i++; ?>
										<?php endforeach;  ?>
									</tbody>
									
									
								</table>
								
								
							</div>

							<div class=" table-wrapper tab-pane fade "id="profile" role="tabpanel" aria-labelledby="profile-tab">		
								<div class="table-title">
									<div class="row">
										<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
											<h2 class="ml-lg-2">Fasilitas Kamar</h2>
											</div>
											<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
											<a href="#addfasilitas" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Tambah</span>
											</a>
											
										</div>
									</div>
								</div>
								
								<table class="table table-striped table-hover">
									<thead>
										<tr>
										<th>NO</th>
										<th>Nomor Kamar</th>
										<th>Nama Fasilitas</th>
										<th>Keterangan Fasilitas</th>
										<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										<?php $i=1; foreach($rows2 as $fsl): ?>
									   <tr>
										<th><?= $i; ?></th>
										<?php
										$id = $fsl['id_kamar'];
										$data = mysqli_query($koneksi, "SELECT type_kamar FROM kamar WHERE id_kamar = $id");
										$d =  mysqli_fetch_assoc($data)['type_kamar'];
										?>
										<th><?= $d  ?></th>
										<th><?= $fsl['nama_fasilitas'] ?></th>
										<th><?= $fsl['keterangan_fasilitas'] ?></th>
										<th>
											<a href="#editFasilitas<?= $fsl['id_fasilitas'] ?>" class="edit" data-toggle="modal">
										<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
										</a>
										<a href="#hapusDataFasilitasKamar<?= $fsl['id_fasilitas'] ?>" class="delete" data-toggle="modal">
										<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
										</a>
										</th>
										</tr> 
									   
									    <?php $i++; endforeach; ?>		
									
									</tbody>
									
									
								</table>
								
									
							</div>
							<div class=" table-wrapper tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">		
								<div class="table-title">
									<div class="row">
										<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
											<h2 class="ml-lg-2">Fasilitas Hotel</h2>
										</div>
										<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#addfasilitashotel" class="btn btn-success" data-toggle="modal">
										<i class="material-icons">&#xE147;</i>
										<span>Tambah</span>
										</a>
										</div>
									</div>
								</div>
								
								<table class="table table-striped table-hover">
									<thead>
										<tr>
										<th>No</th>
										<th>Nama Fasilitas</th>
										<th>Keterangan Fasilitas</th>
										<th>Foto</th>
										<th>Actions</th>
										</tr>
									</thead>
									
									<tbody>
										<?php  $no = 1;?>
										<?php foreach($rows3 as $htl) :?>
										<tr>
										<th><?= $no; ?></th>
										<th><?= $htl['nama_fasilitas'] ?></th>
										<th><?= $htl['keterangan_fasilitas'] ?></th>
										<th><img src="img/<?= $htl['foto']; ?>" alt="" srcset="" width="150"></th>
										<th>
										   <a href="#edit_data_fasilitas_hotel<?= $htl['id_fasilitas_hotel'] ?>" class="edit" data-toggle="modal">
											<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
											</a>
										<a href="#hapusDataFasilitas<?= $htl['id_fasilitas_hotel'] ?>" class="delete" data-toggle="modal">
										<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
										</a>
										</th>
										</tr>
									    <?php endforeach; ?>
									</tbody>
									
									
								</table>
								
								

							</div>
						</div>
					</div>
					
					
<!-- TAMBAH DATA KAMAR -->
					<div class="modal fade " tabindex="-1" id="addkamar" role="dialog">
							<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Tambah Kamar</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
								<form class="row g-4" action="controller.php" method="post" enctype="multipart/form-data">
								<div class="col-md-6">
									<label style="display:block;" for="typekamar" class="form-label">Type Kamar</label>
									<select class="form-select  " style="width:100%;" name="typekamar"  aria-label="Default select example">
									<option value="Residence">Residence</option>
									<option value="Deluxe">Deluxe</option>
									<option value="Master">Master</option>
									</select>
								</div>
								<div class="col-md-6">
									<label for="nomorkamar" class="form-label">Nomor Kamar</label>
									<input type="number" class="form-control" id="nomorkamar" name="nomorkamar">
								</div>
								<div class="col-md-6">
									<label for="kapasitastamu" class="form-label">Kapasitas Tamu</label>
									<input type="text" class="form-control" id="kapasitastamu" placeholder="" name="kapasitastamu">
								</div>
								<div class="col-md-6">
								    <label style="display:block;" for="status" class="form-label">Status</label>
									<select class="form-select  " style="width:100%;" name="status"  aria-label="Default select example">
									<option value="terisi">Terisi</option>
									<option value="kosong">Kosong</option>
									</select>
								</div>
								<!-- <div class="col-8">
									<label for="fasilitas" class="form-label">Fasilitas</label>
									<input type="text" class="form-control" id="fasilitas"" placeholder="" name="fasilitas"> 
								</div> -->
								<div class="col-4">
									<label for="harga" class="form-label">Harga</label>
									<input type="text" class="form-control" id="harga" name="harga">
								</div>
								<div class="col-md-12">
								<label for="foto" class="form-label">Foto</label>
								<input class="form-control" type="file" id="foto" name="foto">
								</div>
								

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="tambah_kamar">Add</button>
									</div>
									</form>
									</div>
							</div>
					</div>
<!-- AKHIR TAMBAH DATA KAMAR -->


<!-- TAMBAH DATA FASILITAS KAMAR-->
					<div class="modal fade " tabindex="-1" id="addfasilitas" role="dialog">
							<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Tambah Fasilitas</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
								<form class="row g-4" action="controller.php" method="post">
								<div class="col-md-6">
								    <label style="display:block;" for="status" class="form-label">Nomor Kamar</label>
									<select class="form-select  " style="width:100%;" name="status"  aria-label="Default select example">
									<option value="">--- Pilih Kamar ---</option>
										<?php
										$data = mysqli_query($koneksi, "SELECT * FROM kamar");
										while ($d = mysqli_fetch_array($data)) { 
										?>
										<option value="<?php echo $d['id_kamar']; ?>"><?php echo $d['nomor_kamar']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-6">
									<label for="namafasilitas" class="form-label">Nama Fasilitas</label>
									<input type="text" class="form-control" id="namafasilitas" name="namafasilitas">
								</div>						
								<div class="col-md-12">
									<label for="exampleFormControlTextarea1" class="form-label">Keterangan Fasilitas</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keteranganfasilitas"></textarea>
								</div>								

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="tambah_fasilitas">Add</button>
									</div>
									</form>
									</div>
							</div>
					</div>
<!-- AKHIR TAMBAH DATA FASILITAS KAMAR-->


<!-- TAMBAH DATA FASILITAS HOTEL -->
					<div class="modal fade " tabindex="-1" id="addfasilitashotel" role="dialog">
							<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Tambah Fasilitas Hotel</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
								<form class="row g-4" action="controller.php" method="post" enctype="multipart/form-data">
								<div class="col-md-12">
									<label for="namafasilitashotel" class="form-label">Nama Fasilitas</label>
									<input type="text" class="form-control" id="namafasilitashotel" name="namafasilitashotel">
								</div>
								<div class="col-md-12">
									<label for="keteranganfasilitashotel" class="form-label">Keterangan Fasilitas</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keteranganfasilitashotel"></textarea>
								</div>
								<div class="col-md-12">
								<label for="foto" class="form-label">Foto</label>
								<input class="form-control" type="file" id="foto" name="foto">
								</div>
								

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="tambah_fasilitas_hotel">Add</button>
									</div>
									</form>
									</div>
							</div>
					</div>
<!-- AKHIR TAMBAH DATA FASILITAS HOTEL -->

				
<!-- UBAH DATA KAMAR -->
<?php foreach($rows as $kmr):  ?>		   			   
				 
	<div class="modal fade" tabindex="-5" id="ubahKamar<?= $kmr['id_kamar'] ?>" role="dialog">
		<div class="modal-dialog" role="document">
							<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Kamar</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
							 <div class="modal-body">
								<form class="row g-4" action="controller.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="gambarlama" value="<?= $kmr['foto'];?>" >	
								<input type="hidden" name="id" value="<?= $kmr['id_kamar'];?>" >
								<div class="col-md-6">
								<label style="display:block;" for="status" class="form-label">Type Kamar</label>
									<select class="form-select  " style="width:100%;" name="typekamar"  aria-label="Default select example">
									<?php if($kmr['type_kamar'] == "Residence") { ?>
									<option value="Residence" selected>Residence</option>
									<option value="Deluxe">Deluxe</option>
									<option value="Master">Master</option>
									<?php } elseif($kmr['type_kamar'] == "Deluxe") { ?>
									<option value="Residence">Residence</option>
									<option value="Deluxe" selected>Deluxe</option>
									<option value="Master">Master</option>
									<?php } else { ?>
									<option value="Residence">Residence</option>
									<option value="Deluxe">Deluxe</option>
									<option value="Master" selected>Master</option>
									<?php } ?> 
									</select>
								</div>
								<div class="col-md-6">
									<label for="nomorkamar" class="form-label">Nomor Kamar</label>
									<input type="number" class="form-control" id="nomorkamar" name="nomorkamar" value="<?= $kmr['nomor_kamar'];?>">
								</div>
								<div class="col-md-6">
									<label for="kapasitastamu" class="form-label">Kapasitas Tamu</label>
									<input type="text" class="form-control" id="kapasitastamu" placeholder="" name="kapasitastamu" value="<?= $kmr['kapasitas_tamu'];?>">
								</div>
								<div class="col-md-6">
								    <label style="display:block;" for="status" class="form-label">Status</label>
									<select class="form-select  " style="width:100%;" name="status"  aria-label="Default select example">
									<?php if($kmr['status'] == "terisi"){ ?>
									<option value="terisi" selected>terisi</option>
									<option value="kosong">Kosong</option>
									<?php } if($kmr['status'] == "kosong"){ ?>
									<option value="terisi">terisi</option>
									<option value="kosong" selected>Kosong</option>
									<?php } ?>
									</select>
								</div>
								<div class="col-4">
									<label for="harga" class="form-label">Harga</label>
									<input type="text" class="form-control" id="harga" name="harga" value="<?= $kmr['harga'];?>">
								</div>
								<div class="col-md-8 mt-3">
								<img src="img/<?= $kmr['foto']; ?>" alt="" width="150">
								</div>
								<div class="col-md-12">
								<label for="foto" class="form-label">Foto</label>
								<input class="form-control" type="file" id="foto" name="foto">
								</div>
							</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="editkamar">edit</button>
									</div>
									</form>
									</div>
			</div>
    </div>
<?php endforeach; ?>
<!-- AKHIR UBAH DATA KAMAR -->


<!-- UBAH DATA FASILITAS KAMAR-->
<?php foreach($rows2 as $fsl):  ?>		   
					   
				   <!----edit-modal start--------->
	<div class="modal fade" tabindex="-5" id="editFasilitas<?=$fsl['id_fasilitas']?>" role="dialog">
		<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Fasilitas</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
								<form class="row g-4" action="controller.php" method="post">
								<input type="hidden" name="id" value="<?= $fsl['id_fasilitas'];?>" >
								<div class="col-md-6">
								    <label style="display:block;" for="status" class="form-label">Nomor Kamar</label>
									<select class="form-select  " style="width:100%;" name="status"  aria-label="Default select example">
									<option value="">--- Pilih Kamar ---</option>
											<?php 
											$id_fasilitas = $fsl['id_fasilitas'];
											$data = mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id_fasilitas='$id_fasilitas'");
											while($d = mysqli_fetch_array($data)){
											$kamar = mysqli_query($koneksi, "select * from kamar");
											while ($a = mysqli_fetch_array($kamar)) {
											if ($a['id_kamar'] == $d['id_kamar']) { ?>
												<option value="<?php echo $a['id_kamar']; ?>" selected><?php echo $a['nomor_kamar']; ?></option>";
											<?php }else{ ?>
												<option value="<?php echo $a['id_kamar']; ?>"><?php echo $a['nomor_kamar']; ?></option>";
											<?php }
											}
									     	}
											?>  
									</select>
								</div>
								<div class="col-md-6">
									<label for="typekamar" class="form-label">Nama Fasilitas</label>
									<input type="text" class="form-control" id="typekamar" name="namafasilitas" value="<?= $fsl['nama_fasilitas'];?>" >
								</div>
								<div class="col-md-12">
								    <label for="exampleFormControlTextarea1" class="form-label">Keterangan Fasilitas</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keteranganfasilitas"  ><?= $fsl['keterangan_fasilitas'];?></textarea>
								</div>
								
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="ubahfasilitas">Ubah</button>
									</div>
									</form>
									</div>
			</div>
    </div>
<?php endforeach; ?>
<!--AKHIR UBAH DATA FASILITAS KAMAR-->



<!-- UBAH DATA FASILITAS HOTEL-->
<?php foreach($rows3 as $htl):  ?>		   
					   
				   <!----edit-modal start--------->
	<div class="modal fade" tabindex="-5" id="edit_data_fasilitas_hotel<?= $htl['id_fasilitas_hotel'] ?>" role="dialog">
		<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Edit Fasilitas Hotel</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
								<form class="row g-4" action="controller.php" method="post">
								<input type="hidden" name="id" value="<?= $htl['id_fasilitas_hotel'];?>" >
								<div class="col-md-12">
									<label for="typekamar" class="form-label">Nama Fasilitas Hotel</label>
									<input type="text" class="form-control" id="typekamar" name="namafasilitas" value="<?= $htl['nama_fasilitas'];?>" >
								</div>
								<div class="col-md-12">
								    <label for="exampleFormControlTextarea1" class="form-label">Keterangan Fasilitas Hotel</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keteranganfasilitas"  ><?= $htl['keterangan_fasilitas'];?></textarea>
								</div>
								<div class="col-md-8 mt-3">
								<img src="img/<?= $htl['foto']; ?>" alt="" width="150">
								</div>
								<div class="col-md-12">
								<label for="foto" class="form-label">Foto</label>
								<input class="form-control" type="file" id="foto" name="foto">
								</div>
								
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-success" name="ubahfasilitas">Ubah</button>
									</div>
									</form>
									</div>
			</div>
    </div>
 <?php endforeach; ?>
 <!-- UBAH DATA FASILITAS HOTEL-->

					   <!----edit-modal end--------->	   
					   
					   

					 <!----delete-modal start--------->
 <?php foreach($rows as $kmr) :?>
				<div class="modal fade" tabindex="-1" id="hapusDataKamar<?= $kmr['id_kamar'] ?>" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hapus Data Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="controller.php" method="post">
			<input type="hidden" name="id" value="<?= $kmr['id_kamar'];?>" >
			<div class="modal-body row g-4 text-center">
				<p>Apakah Anda yakin ingin menghapus Catatan ini?</p>
				<div class="col-md-6">
				<p>Type Kamar = <?= $kmr['type_kamar'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Nomor Kamar = <?= $kmr['nomor_kamar'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Kapasitas Tamu = <?= $kmr['kapasitas_tamu'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Status = <?= $kmr['status'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Harga = <?= $kmr['harga'] ?></p>
				</div>
				<div class="col-md-6">
				<p>Foto = <img src="img/<?= $kmr['foto']; ?>" alt="" width="150"></p>
				</div>
				<p class="text-warning"><small>this action Cannot be Undone,</small></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success" name="hapusdatakamar">Delete</button>
			</div>
			</form>
			</div>
		</div>
		</div>
<?php endforeach; ?>
<!--AKHIR UBAH DATA FASILITAS HOTEL-->


<!-- HAPUS DATA KAMAR -->
 <?php foreach($rows as $kmr) :?>
				<div class="modal fade" tabindex="-1" id="hapusDataKamar<?= $kmr['id_kamar'] ?>" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hapus Data Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="controller.php" method="post">
			<input type="hidden" name="id" value="<?= $kmr['id_kamar'];?>" >
			<div class="modal-body row g-4 text-center">
				<p>Apakah Anda yakin ingin menghapus Catatan ini?</p>
				<div class="col-md-6">
				<p>Type Kamar = <?= $kmr['type_kamar'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Nomor Kamar = <?= $kmr['nomor_kamar'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Kapasitas Tamu = <?= $kmr['kapasitas_tamu'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Status = <?= $kmr['status'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Harga = <?= $kmr['harga'] ?></p>
				</div>
				<div class="col-md-6">
				<p>Foto = <img src="img/<?= $kmr['foto']; ?>" alt="" width="150"></p>
				</div>
				<p class="text-warning"><small>this action Cannot be Undone,</small></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success" name="hapusdatakamar">Delete</button>
			</div>
			</form>
			</div>
		</div>
		</div>
<?php endforeach; ?>
<!-- AKHIR HAPUS DATA KAMAR -->


<!-- HAPUS DATA FASILITAS KAMAR-->
 <?php foreach($rows2 as $fsl) :?>
				<div class="modal fade" tabindex="-1" id="hapusDataFasilitasKamar<?= $fsl['id_fasilitas'] ?>" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hapus Data Fasilitas Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="controller.php" method="post">
			<input type="hidden" name="id" value="<?= $fsl['id_fasilitas'];?>" >
			<div class="modal-body row g-4 text-center">
			<?php
					$id = $fsl['id_kamar'];
					$data = mysqli_query($koneksi, "SELECT nomor_kamar FROM kamar WHERE id_kamar = $id");
					$d =  mysqli_fetch_assoc($data)['nomor_kamar'];
			?>							
				<p>Apakah Anda yakin ingin menghapus Catatan ini?</p>
				<div class="col-md-6">
				<p>Nomer Kamar = <?= $d ?></p>
				</div>
				<div class="col-md-5">
				<p>Nama Fasilitas = <?= $fsl['nama_fasilitas'] ?></p>
				</div>
				<div class="col-md-5">
				<p>Keterangan Fasilitas = <?= $fsl['keterangan_fasilitas'] ?></p>
				</div>
				<p class="text-warning"><small>this action Cannot be Undone,</small></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success" name="hapus_data_fasilitas_kamar">Delete</button>
			</div>
			</form>
			</div>
		</div>
		</div>
<?php endforeach; ?>
<!-- AKHIR HAPUS DATA FASILITAS KAMAR-->
					   
					   
					
					
				 
			     </div>
			  </div>
		  
		    <!------main-content-end-----------> 
		  
		 
		 
		 <!----footer-design------------->
		 
		 
		 <footer class="footer mt-auto py-3">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2021 Vishweb Design . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>



<!-------complete html----------->





  
     <!-- Optional JavaScript -->
	  <!-- Option 1: Bootstrap Bundle with Popper -->
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  </body>
  
  </html>


