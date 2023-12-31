<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Penjualan Mobil</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- <div class="container"> -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Mobil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../mobil/index.php">Mobil</a>
        <a class="nav-link active" aria-current="page" href="index.php">Pelanggan</a>
        <a class="nav-link" href="../transaksi/index.php">Transaksi</a>
      </div>
    </div>
  </div>
</nav>
<!-- </div> -->

<div class="container mt-3">
<h2>Data Pembeli</h2>


<a href="create.php" class="btn btn-primary mb-2 mt-1">Tambah</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-primary'>".$_SESSION['success']."</div>";
   }


?>


<table class="table table-striped table-hover">
   <tr>
      <th>ID Pembeli</th>
      <th>Nama Pembeli</th>
      <th>Alamat Pembeli</th>
      <th>No Telepon</th>
      <th>Action</th>
   </tr>
   <?php


      require '../config.php';

      $pelanggan = $db->pelanggan->find([]);
      // $no = 1;

      foreach($pelanggan as $p) {
         echo "<tr>";
         echo "<td>".$p->_id."</td>";
         echo "<td>".$p->nama."</td>";
         echo "<td>".$p->alamat."</td>";
         echo "<td>".$p->no_tlp."</td>";
         echo "<td>";
         echo "<a href='edit.php?id=".$p->_id."' class='btn btn-primary'>Edit</a>";
         echo "<a href='delete.php?id=".$p->_id."' class='btn btn-danger'>Hapus</a>";
         echo "</td>";
         echo "</tr>";
         // $no++;
      };


   ?>
</table>
</div>
</body>
</html>