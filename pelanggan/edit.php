<?php


session_start();


require '../config.php';


if (isset($_GET['id'])) {
   $collection = $db->pelanggan;
   $pelanggan = $collection->findOne(['_id' => $_GET['id']]);
}


if(isset($_POST['submit'])){


   $collection->updateOne(
       ['_id' => $_GET['id']],
       ['$set' => ['nama' => $_POST['nama'], 'alamat' => $_POST['alamat'], 'no_tlp' => $_POST['no_tlp']]
   ]);


   $_SESSION['success'] = "Data berhasil di edit";
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
         <strong>ID Pelanggan:</strong>
         <input type="text" value="<?php echo $_GET['id']; ?>" class="form-control" readonly>
      </div>
      <div class="form-group">
         <strong>Nama:</strong>
         <input type="text" name="nama" value="<?php echo $pelanggan->nama; ?>" required="" class="form-control" placeholder="Nama">
      </div>
      <div class="form-group">
         <strong>Alamat:</strong>
         <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo $pelanggan->alamat; ?></textarea>
      </div>
       <div class="form-group">
         <strong>No Telepon:</strong>
         <input type="number" name="no_tlp" value="<?php echo $pelanggan->no_tlp; ?>" required="" class="form-control" placeholder="No Telepon">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-primary mt-3">Edit</button>
          <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
      </div>
   </form>
</div>


</body>
</html>