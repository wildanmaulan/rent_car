<?php


session_start();


if(isset($_POST['submit'])){


   require '../config.php';
   $mobil = $db->mobil;


   $result = $mobil->insertOne([
       '_id' => $_POST['_id'],
       'merk' => $_POST['merk'],
       'tahun' => $_POST['tahun'],
       'warna' => $_POST['warna'],
       'harga' => $_POST['harga'],
   ]);


   $_SESSION['success'] = "Data berhasil di tambah";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>Penjualan Mobil</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container mt-3">
   <form method="POST">
      <div class="form-group">
         <strong>Kode Barang:</strong>
         <input type="text" name="_id" required="" class="form-control" placeholder="Kode Mobil">
      </div>
      <div class="form-group">
         <strong>Merk Mobil:</strong>
         <input type="text" name="merk" required="" class="form-control" placeholder="Merk Mobil">
      </div>
      <div class="form-group">
         <strong>Tahun Mobil:</strong>
         <input type="text" name="tahun" required="" class="form-control" placeholder="Tahun Mobil">
      </div>
      <div class="form-group">
         <strong>Warna Mobil:</strong>
         <input type="warna" name="stok" required="" class="form-control" placeholder="Warna Mobil">
      </div>
      <div class="form-group">
         <strong>Harga:</strong>
         <input type="number" name="harga" required="" class="form-control" placeholder="Harga Mobil">
      </div>
      <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary mt-3">Tambah</button>
          <a href="index.php" class="btn btn-danger mt-3 ">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>