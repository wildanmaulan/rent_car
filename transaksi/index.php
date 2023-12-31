<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>   Mobil</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- <div class="container"> -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#"> Mobil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../mobil/index.php">Mobil</a>
        <a class="nav-link" href="../pelanggan/index.php">pelanggan</a>
        <a class="nav-link active" aria-current="page" href="index.php">Transaksi</a>
      </div>
    </div>
  </div>
</nav>
<!-- </div> -->

<div class="container mt-3">
<h2>Data Transaksi Sewa</h2>


<a href="create.php" class="btn btn-primary mb-2 mt-1">Tambah</a>


<?php


   if(isset($_SESSION['success'])){
      echo "<div class='alert alert-primary'>".$_SESSION['success']."</div>";
   }


?>

   <div class="table-responsive">
      <table class="table table-striped table-hover">
         <tr>
            <th>Kode Transaksi</th>
            <th>ID Pembeli</th>
            <th>Nama Pembeli</th>
            <th>Nama Mobil</th>
            <th>Tahun Mobil</th>
            <th>Warna Mobil</th>
            <th>Harga Mobil</th>
            <th>Tanggal</th>
            <th>Action</th>
         </tr>
         <?php

            require '../config.php';
            $aggregate = [
                [
                    '$lookup' => [
                        'from' => 'pelanggan',
                        'localField' => 'pelanggan_id',
                        'foreignField' => '_id',
                        'as' => 'data_pelanggan'
                    ]
                ],
                [
                    '$lookup' => [
                        'from' => 'mobil',
                        'localField' => 'mobil_id',
                        'foreignField' => '_id',
                        'as' => 'data_mobil'
                    ]
                ],
                ['$unwind' => '$data_pelanggan'],
                ['$unwind' => '$data_mobil'],
                    
              ];
            $transaksi = $db->transaksi->aggregate($aggregate);

            foreach($transaksi as $tr) {
               echo "<tr>";
               echo "<td>".$tr->_id."</td>";
               echo "<td>".$tr->pelanggan_id."</td>";
               echo "<td>".$tr->data_pelanggan->nama."</td>";
               echo "<td>".$tr->data_mobil->merk."</td>";
               echo "<td>".$tr->data_mobil->tahun."</td>";
               echo "<td>".$tr->data_mobil->warna."</td>";
               echo "<td>".$tr->data_mobil->harga."</td>";
               echo "<td>".$tr->tanggal."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$tr->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$tr->_id."' class='btn btn-danger'>Hapus</a>";
               echo "</td>";
               echo "</tr>";
            };


         ?>
      </table>
   </div>
</div>
</body>
</html>