<?php  
 session_start(); 
 include '../koneksi.php'; 
 ?> 
<html> 
 <head> 
  <title>Kantin Digital  | Master</title> 
 </head> 
 <form method="post" enctype="multipart/form-data"> 
  <body> 
   <h1 align="center"><?php echo "Selamat Datang ".$_SESSION['nama']; ?></h1> 
   
   <nav class="navbar navbar-dark bg-dark">
    <li><a href="?menu=pengguna">Kelola Pengguna</a></li> 
    <li><a href="?menu=menu">Kelola Menu</a></li> 
    <li><a href="?menu=laporan">Laporan</a></li> 
    <li><a href="index.php">Logout</a></li> 
   </nav>
   <?php  
    switch (@$_GET['menu']) { 
     case 'pengguna': 
      include 'pengguna.php'; 
      break; 
     case 'menu': 
      include 'menu.php'; 
      break; 
     case 'laporan': 
      include 'laporan.php'; 
      break; 
     default: 
      include 'pengguna.php'; 
      break; 
      } 
    ?> 
  </body> 
 </form> 
</html> 