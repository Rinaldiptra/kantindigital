<?php 
		session_start();
		include '../koneksi.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
 <title></title>
 </head>
 <body onload="window.print()">
 	<center>
 		<h1>kantin digital</h1>
 		<h3>laporan penjualan</h3>

 	<table class="table">
 		<thead class=""bg-warning"">
           <tr>
 			<td scope="col">no</td>
			<td scope="col">id transaksi</td>
			<td scope="col">nama menu</td>
			<td scope="col">jumlah</td>
			<td scope="col">tanggal pesan</td>
 		</tr>
 		   </thead>

 		<?php 
 		$no=0;
		$sql = mysqli_query($con, "SELECT * FROM qw_laporan WHERE tgl_pesanan BETWEEN '$_SESSION[awal]' AND '$_SESSION[akhir]' AND status = '1'");

			while($r=mysqli_fetch_array($sql)){
				$no++;
		 ?>
		 <tr>
		 	<td><?php echo $no; ?></td>
				<td><?php echo $r['id_transaksi']; ?></td>
				<td><?php echo $r['nama_menu']; ?></td>
				<td><?php echo $r['jumlah']; ?></td>
				<td><?php echo $r['tgl_pesanan']; ?></td>
		 </tr>
		<?php } ?>
 	</table>
 	</center>
 			
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
 </body>
 </html>
 