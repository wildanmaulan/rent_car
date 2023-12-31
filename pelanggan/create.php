<?php


session_start();


if(isset($_POST['submit'])){


   require '../config.php';
   $pelanggan = $db->pelanggan;


   $hasil = $pelanggan->insertOne([
       '_id' => $_POST['_id'],
       'nama' => $_POST['nama'],
       'alamat' => $_POST['alamat'],
       'no_tlp' => $_POST['no_tlp'],
       
   ]);


   $_SESSION['success'] = "Data berhasil di tambah";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>Aplikasi Rental</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
   <form method="POST">
      <div class="form-group">
         <strong>ID Pembeli:</strong>
         <input type="text" name="_id" required="" class="form-control" placeholder="ID Pelanggan">
      </div>
      <div class="form-group">
         <strong>Nama Pelanggan:</strong>
         <input type="text" name="nama" required="" class="form-control" placeholder="Nama Pelanggan">
      </div>
      <div class="form-group">
         <strong>Alamat:</strong>
         <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
      </div>
      <div class="form-group">
         <strong>No Telepon:</strong>
         <input type="number" name="no_tlp" required="" class="form-control" placeholder="No Telepon">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>
</body>
</html>