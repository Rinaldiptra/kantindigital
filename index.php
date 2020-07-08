<?php 
  session_start();
  if(isset($_POST['masuk'])){
  	$_SESSION['noMeja'] = 	$_POST['noMeja'];
  	echo "<script>alert('Selamat datang...');document.location.href ='pelanggan/';</script>";
  }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Kantin Digital</title>
 </head>
 <form method="post">
 <body>
 	<center>
 		<h1>Selamat datang</h1>
 		<table>
 			<tr>
 				<td colspan="3"> Masukan No.meja</td>
 			</tr>
 			<tr>
 				<td>No.meja</td>
 				<td>:</td>
 				<td><input type="text" name="noMeja"></td>
 			</tr>
 			<tr>
 				<td><input type="submit" name="masuk"></td>
 			</tr>
 		</table>

 	</center>
 </form>
 </body>
 </html>