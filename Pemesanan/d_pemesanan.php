<?php
	// menghubungkan dengan koneksi database
    require ('../koneksi.php');
	
	session_start();
    //mengecek user pada session
    if(!isset($_SESSION['id_karyawan'])) {
        header('Location: ../index.php');
      }
                $sesID = $_SESSION['id_karyawan'];
                $sesName = $_SESSION['nama'];
                $jabatan  = mysqli_query($koneksi, "SELECT * FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_karyawan.id_jabatan=tb_jabatan.id_jabatan WHERE id_karyawan='$sesID'");
                $rows = mysqli_fetch_array($jabatan);
                $sesLvl = $_SESSION['id_jabatan'];

            $ID_pemesanan = $_GET['id_pemesanan'];
            $query = "SELECT * FROM tb_pemesanan WHERE id_pemesanan='$ID_pemesanan'";
            $result = mysqli_query($koneksi, $query) or die (mysql_error());
    
            while ($row = mysqli_fetch_array($result)) {
                $ID_pemesanan = $row['id_pemesanan'];
                $Nama_pelanggan = $row['id_pelanggan'];
                $Katalog = $row['id_katalog'];
                $tgl_pemesanan = $row['tgl_pemesanan'];
 ?>


 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
     <head>
         <!-- Required meta tags -->
         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1" />
 
         <!-- Bootstrap CSS -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
 
         <!-- Tempat CSS-->
         <link rel="stylesheet" href="../style.css"/>
 
         <!-- Tempat Font Awesome-->
         <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
 
         <title>Tunas Cahaya Build</title>
     </head>
     <body style="background-color:#ffffff">
         <!-- AWAL WRAPPER -->
         <div id="wrapper">
             <!-- NAVBAR -->
             <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1E3163;">
                     <div class="container-fluid">
                         <a class="navbar-brand" href="#">
                             <img src="../img/Logo.png" alt="" width="85px" class="d-inline-block align-text-top pe-3 ps-2 mb-1" />
                             <a class="nav-link" aria-current="page" href="#" style="text-decoration: none; font-size: 20px; margin-left: -410px; color: #fff; font-weight: 600; letter-spacing: 1px">CV TUNAS CAHAYA</a>
                         </a> 
                         <form class="d-flex" style="margin-left: 40%;">
                             <span style="color: white">
                                 <i class="fas fa-user-circle h3 " ></i>
                                 <span class="navbar-brand h3 ms-2"><?php echo $sesName; ?></span>
                             </span>
                             </button>
                         </form>
                         
                     </div>
                 </div>
             </nav>
             <!-- AKHIR NAVBAR -->
             
             <!-- /. AWAL NAV SIDE  -->
             <aside class="sidebar">
                 <div class="user" style="background-color: #B2DFFB; height: 30%;">
                     <span style="color: white">
                         <p style="text-align: center; "><i class="fas fa-user-circle fa-5x" style="margin-top: 10%;" ></i>
                         <p class="navbar-brand h3 ms-2" style="text-align: center; color: black"><b><?php echo $sesName; ?></b></p>
                         <p class="navbar-brand h3 ms-2" style="text-align: center; color: black"><?php echo $rows['nama_jabatan'];?></p>
                     </span>
                 </div>
                 <menu>
                     <ul class="menu-content" >
                     <?php
							if($sesLvl <= 4) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Karyawan/tampilanawal_karyawan.php " style="padding:20px;"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images"  style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Pelanggan/tampilanawal_pelanggan.php" style="padding:20px;"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php } elseif($sesLvl <= 7) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Pemesanan/tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;"  onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php } elseif($sesLvl <= 9) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php }
						?>
                     </ul>
                 </menu>
             </aside>
                 <div id="page-wrapper" >
                     <div id="page-inner">
                         <div class="row" style="width: 50%; margin-left: 20%; margin-top: 3%;">
                             <div class="col-sm-6" style="padding-bottom:40px;">
                                 <div class="card-style" style="background-color: #1E3163; width:310%; height: 100%;">
                                     <div class="card-body">
                                     <h5 style="color: #fff;"><b>Detail Pemesanan</b></h5>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row" style="width: 50%; margin-left: 20%; ">
                             <div class="col-sm-6" style="padding-bottom:40px;">
                                 <div class="card-style" style="background-color: #B2DFFB; height: 350px; width:310%">
                                     <div class="card-body">
                                     <form action="detail_pemesanan.php" method="POST">
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; font-size: 14px; padding-top: 5px; margin-left: 50px; margin-top: 10px;"><b>ID PEMESANAN</b></label>
                                             <input type="text" name="txt_id" style="margin-left: 50px; width: 70%;" value="<?php echo $ID_pemesanan; ?>" readonly/>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; font-size: 14px; padding-top: 5px; margin-left: 50px; margin-top: 10px;"><b>PELANGGAN</b></label>
                                             <input type="text" name="txt_nama_pelanggan" style="margin-left: 50px; width: 70%;" value="<?php echo $Nama_pelanggan ?>" readonly/>
                                         </p>
                                         <?php 
                                            $katalog = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan LEFT JOIN tb_katalog ON tb_pemesanan.id_katalog=tb_katalog.id_katalog WHERE id_pemesanan='$ID_pemesanan'");
                                            $row = mysqli_fetch_array($katalog); 
                                        ?>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; font-size: 14px; padding-top: 5px; margin-left: 50px; margin-top: 10px;"><b>KATALOG</b></label>
                                             <input type="text" name="txt_katalog" placeholder="Total Harga" style="margin-left: 50px; width: 70%;" value="<?php echo $row['nama_bangunan'] ?>" readonly/>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; font-size: 14px; padding-top: 5px; margin-left: 50px; margin-top: 10px;"><b>TANGGAL PEMESANAN</b></label>
                                             <input type="text" name="txt_tgl" style="margin-left: 50px; width: 70%;" value="<?php echo $tgl_pemesanan; ?>" readonly/>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; font-size: 14px; padding-top: 5px; margin-left: 50px; margin-top: 10px;"><b>BANYAK CICILAN</b></label>
                                             <select name="cicilan" style="margin-left: 50px; width: 100px; height: 30px;">
                                                <option value="" align="center">--Pilih--</option>
                                                <option value="3">3</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                             </select>
                                                <input type="submit" type="button" name="submit" value="Proses"></a>
                                             
                                         </p>
                                         <a href="pemesanan.php" style="text-decoration: none; color: black;">
                                            <button type="button" value="" class="btn btn-primary" style="width: 11%; margin-left: 83%; background-color: #1E3163;  color: white;">
                                            <b>KEMBALI</b></button>
                                         </a>       
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>                 
                     </div>
                 </div>
         <!-- /. WRAPPER  -->
 
             <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
             <!-- BOOTSTRAP SCRIPTS -->
             <script src="assets/js/bootstrap.min.js"></script>
             <!-- METISMENU SCRIPTS -->
             <script src="assets/js/jquery.metisMenu.js"></script>
             <!-- MORRIS CHART SCRIPTS -->
             <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
             <script src="assets/js/morris/morris.js"></script>
             <!-- CUSTOM SCRIPTS -->
             <script src="assets/js/custom.js"></script>
     </body>
 </html>
 <?php } ?>