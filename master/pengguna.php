<?php 
  include '../koneksi.php';
  error_reporting(0);
  if (isset($_POST['simpan']))
  {

    $pas = md5($_POST['password']);
    $sql = mysqli_query($con, "INSERT INTO tb_pengguna VALUES ('','$_POST[nama_pengguna]','$_POST[level]','$_POST[username]','$pas')");
    if ($sql){
      echo "<script>alert('data berhasil disimpan');
      document.location.href='?menu=pengguna';</script>";
    }else{
        echo "<script>alert('data gagal disimpan');
      document.location.href='?menu=pengguna';</script>";
    }
}
  if (isset($_GET['edit']))
{
    $sql = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$_GET[id]'");
    $isi = mysqli_fetch_array ($sql);
  
}
  if (isset($_GET['hapus']))
{
    $sql = mysqli_query($con, "DELETE FROM tb_pengguna WHERE id_pengguna = '$_GET[id]'");
    if ($sql)
    {
      echo "<script>alert('data berhasil dihapus');
      document.location.href='?menu=pengguna';</script>";
    }
      else{
        echo "<script>alert('data gagal dihapus');
      document.location.href='?menu=pengguna';</script>";
     }
}
  if (isset($_POST['update']))
{
    $sql = mysqli_query($con, "UPDATE  tb_pengguna SET id_pengguna = '$_POST[id_pengguna]',nama_pengguna = '$_POST[nama_pengguna]',level = '$_POST[level]',username = '$_POST[username]',password= '$_POST[password]' WHERE id_pengguna ='GET[id_pengguna]'");
    if ($sql)
    {
      echo "<script>alert('data berhasil diubah');document.location.href='pengguna.php';</script>";
    }
}
    
 ?>
 <!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

      <title>user form</title>
  </head>

  <body> 
    <div class="container">
      <div class="row">
        <div class="col-md-7" >
        <!---PENAMBAHAN CARD--->
          <div class="card ">
            <div class="card-header" align="center" ><b>Input Pengguna</div>
              <div class="card-body">
                <div class="panel-body">
                  <form method="post">

                    <div class="form-group col-md-8">
                     <label for="inputState">Nama Pengguna</label>
                     <input type="text" name="nama_pengguna" class="form-control" />
                    </div>

                    <div class="form-group col-md-8">
                      <label for="inputState">Jabatan</label>
                      <select id="inputState" class="form-control" name="level">
                       <option value="" disabled selected>         -- Pilih Jabatan --        </option> 
                       <option value="Admin">Admin</option>
                       <option value="Manager">Manager</option>  
                       <option value="Kasir">Kasir</option> 
                      </select>
                    </div>

                    <div class="form-group col-md-8">
                     <label for="inputState">Username</label>
                     <input type="text" name="username" class="form-control" />
                    </div>

                    <div class="form-group col-md-8">
                     <label for="inputState">Password</label>
                     <input type="password" name="password" class="form-control" />
                    </div>

                    <div class="form-group col-md-8">
                     <input type="submit" class="btn btn-info" name="simpan" value="SIMPAN"> 
                    </div>
              </div>
            </form>
          </div>
        </div>
              <br>
              <table class="table table-hover table-dark">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama pengguna</th>
                    <th scope="col">jabatan</th>
                    <th scope="col">username</th>
                    <th scope="col">password</th>
                    <td colspan="2">Aksi</td> 
                  </tr>
                </thead>
                  <?php  
                  $no=0; 
                  $sql= mysqli_query($con, "SELECT * FROM tb_pengguna"); 
                  while($r=mysqli_fetch_array($sql)){  
                   $no++; ?> 
                  <tr> 
                    <td><?php echo $no; ?></td> 
                    <td><?php echo $r['nama_pengguna']; ?></td> 
                    <td><?php echo $r['level']; ?></td> 
                    <td><?php echo $r['username']; ?></td> 
                    <td><?php echo $r['password']; ?></td> 
                    <td><a href="?menu=pengguna&hapus&id=<?php echo 
                    $r['id_pengguna'] ?>" onClick="return confirm('Anda Yakin')">Hapus</a></td> 
                  </tr> 
                  <?php } ?> 
              </table> 
            </div>
          </div>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body> 
 </form> 
</html
 