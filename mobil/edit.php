<?php


session_start();


require '../config.php';


if (isset($_GET['id'])) {
   $collection = $db->mobil;
   $mobil = $collection->findOne(['_id' => $_GET['id']]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => $_GET['id']],
       ['$set' => ['merk' => $_POST['merk'], 'tahun' => $_POST['tahun'], 'warna' => $_POST['warna'], 'harga' => $_POST['harga']]
   ]);


   $_SESSION['success'] = "Data berhasil di edit";
   header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
   <title>Aplikasi Penjualan Mobil</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container mt-3">
   <form method="POST">
      <div class="form-group">
         <strong>Kode Mobil:</strong>
         <input type="text" value="<?php echo $_GET['id']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
         <strong>Merk Mobil:</strong>
         <input type="text" name="merk" value="<?php echo $mobil->merk; ?>" required="" class="form-control" placeholder="Merk Mobil">
      </div>
      <div class="form-group">
         <strong>Tahun Mobil:</strong>
         <input type="text" name="tahun" value="<?php echo $mobil->tahun; ?>" required="" class="form-control" placeholder="Tahun Mobil">
      </div>
       <div class="form-group">
         <strong>Warna Mobil:</strong>
         <input type="text" name="warna" value="<?php echo $mobil->warna; ?>" required="" class="form-control" placeholder="Warna Mobil">
      </div>
      <div class="form-group">
         <strong>Harga:</strong>
         <input type="number" name="harga" value="<?php echo $mobil->harga; ?>" required="" class="form-control" placeholder="Harga Mobil">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Edit</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>