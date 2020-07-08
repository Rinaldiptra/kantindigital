<?php  
 session_start(); 
 include '../koneksi.php';  
 if (isset($_POST['submit'])) { 
  $pass = md5($_POST['password']); 
  $sql = mysqli_query($con, "SELECT * FROM tb_pengguna 
   WHERE username = '$_POST[username]' &&  password = '$pass'"); 
   
  $cek = mysqli_num_rows($sql); 
  $f = mysqli_fetch_array($sql); 
  $_SESSION['nama'] = $f['nama_pengguna']; 
  if($cek > 0){ 
   if($f['level'] == "manager"){ 
    echo "<script>alert('Selamat Datang'); 
    document.location.href='manager.php';</script>"; 
   }else if($f['level'] == "admin"){ 
    echo "<script>alert('Selamat Datang'); 
    document.location.href='admin.php';</script>"; 
   }else if($f['level'] == "kasir"){ 
    echo "<script>alert('Selamat Datang'); 
    document.location.href='kasir.php';</script>"; 
   }else{ 
    echo "<script>alert('Gagal Login'); 
    document.location.href='index.php';</script>"; 
   } 
  }else{ 
   echo "<script>alert('Gagal Login'); 
    document.location.href='index.php';</script>"; 
  } 
 } 
 ?> 
<!doctype html>
<html lang="en">
  <head>
    <br>
    <br>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

  <title>Login Form</title>
  </head>
  <body>
    <div class="container">
     <div class="row">
     <div class="col-md-4">     
    </div>  
    
            <!-- Panel Login -->
  <div class="card" style="width: 25rem;">
   <div class="card-body">
    <div class="panel-body">
     <form method="post">
          <b>Username :
          <input type="text" name="username" class="form-control" />
          <b>Password :
          <input type="password" name="password" class="form-control" /><br />
          <button name="submit" type="submit" class="btn btn-primary" > Login</button>
     </form>
    </div>                  
   </div>
  </div>
            



            
            
            <!-- Panel Login -->
           
            <div class="col-md-4">
               
            </div>
        </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>