<?php

 if (isset($_POST['simpan'])) {
		$name = $_FILES['gambar']['name'];
		$file = $_FILES['gambar']['tmp_name'];
		move_uploaded_file($file, '../image/'.$name);

		$sql = mysqli_query($con, "INSERT INTO tb_menu VALUES('','$_POST[namaMenu]','$_POST[jenis]','$_POST[harga]','$name','$_POST[stok]')");
		if ($sql){
			echo "<script>alert('data berhasil disimpan');
			document.location.href='?menu=menu';</script>";
			}
	    else{
		    echo "<script>alert('data gagal disimpan');
			document.location.href='?menu=menu';</script>";
		
		}
 }
if (isset($_GET['hapus'])){
	$sql = mysqli_query($con, "DELETE FROM tb_menu WHERE id_menu = '$_GET[id]'");
if ($sql){
			echo "<script>alert('data berhasil dihapus');
			document.location.href='?menu=menu';</script>";
			}else{
		    echo "<script>alert('data gagal dihapus');
			document.location.href='?menu=menu';</script>";
        }
     }
?>







<html>
 <head>
 	<!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

 </head>
   <body>
   	<div class="container">
      <div class="row">
        <div class="col-md-7" >
        <!---PENAMBAHAN CARD--->
          <div class="card ">
            <div class="card-header" align="center" ><b>Data Menu </b></div>
              <div class="card-body">
                <div class="panel-body">
                  <form method="post">
				   	  
					      <div class="form-group col-md-5">
					         <label for="inputState">Nama Menu</label>
					         <input type="text" name="namaMenu" class="form-control" />
					      </div>

						  <div class="form-group col-md-5">
					       <label for="inputState">jenis</label>
					        <select id="inputState" class="form-control" name="jenis">
					           <option value="" disabled selected>         -- Pilih Jenis --        </option> 
					           <option value="Makanan">Makanan</option>
					           <option value="Minuman">Mainuman</option>  
					       </select>
					      </div>

						<div class="form-group col-md-5">
				         <label for="inputState">Harga</label>
				         <input type="text" name="harga" class="form-control" />
				       </div>

				       <div class="form-group col-md-8">
				       	   <label>foto :</label>
				           <input type="file" class="btn btn-info" name="gambar" > 
				       </div> 
			
						<div class="form-group col-md-5">
				         <label for="inputState">Stok</label>
				         <input type="text" name="stok" class="form-control" />
				       </div>
						<div class="form-group col-md-8">
		                     <input type="submit" class="btn btn-info" name="simpan" value="SIMPAN"> 
		                </div>
		         </div>
            </form>
          </div>
        </div>
              <br>

	<table class="table">
 	 <thead class="thead-dark">
 	 	<tr></tr>
	 	  <th scope="col">No</th>
	      <th scope="col">Nama Menu</th>
	      <th scope="col">jenis </th>
	      <th scope="col">harga</th>
	      <th scope="col">foto</th>
	      <th scope="col">stok</th>
	      <th scope="col">aksi
  	 </tr>
  </thead>
  
		    <?php 
			$no=0;
			$sql = mysqli_query($con, "SELECT * FROM tb_menu");
			while($r=mysqli_fetch_array($sql)){
			$no++;
			?>

			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r['nama_menu']; ?></td>
				<td><?php echo $r['jenis_menu']; ?></td>
				<td><?php echo $r['harga']; ?></td>
				<td><img src="../image/<?php echo $r['foto']; ?>" width="100px"></td>
				<td><?php echo $r['stok']; ?></td>
				<td><a href="?menu=menu&hapus&id=<?php echo $r ['id_menu']; ?>" onCLick="return confirm('anda yakin')"> hapus </a></td>
			</tr>
		<?php } ?> 
			
		

		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</form>
</html>
