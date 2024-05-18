<?php
session_start();
require 'proses.php';

$proses = new Proses(null, null, null);
$proses->create();
$proses->hapus();
$proses->Buttonhapus();





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Aturan CSS khusus untuk lebar 200px */
    .form-control {
      width: 200px;
      border: 1px solid #ced4da;
      
    }

    /* Aturan CSS untuk mengurangi margin bottom pada kolom */
    .col.mb-3 {
      margin-bottom: 5px; /* Sesuaikan dengan kebutuhan Anda */
    }

    .input-all {
      display: flex;
      align-items: center;
      justify-content: center;

    }

    .container {
      max-width: 670px;
    }
    


  </style>
</head>
<body>
<h1 class="text-center">Masukan Data siswa</h1>
<div class="container">
  <div class="input-all">
  <form action="" method="post" class="row mx-auto">
    <div class="col-md-4">
      <input name="nama" type="text" class="form-control" required id="exampleFormControlInput1" placeholder="Masukkan Nama">
    </div>
    <div class="col-md-4">
      <input name="nis" type="text" class="form-control" required id="exampleFormControlInput2" placeholder="Masukkan NIS">
    </div>
    <div class="col-md-4">
      <input name="rayon" type="text" class="form-control" required id="exampleFormControlInput3" placeholder="Masukkan Rayon">
    </div>
    <div>
      <button name="btn" style="width: 120px;" type="submit" class="btn btn-primary mt-2 ">Tambah</button>
      <?= $button ;?>
      <?= $print ;?>
    </div>
  </div>
</form>
<?= $error;?>
<hr>
<?php $i = 1 ;?>
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">NIS</th>
      <th scope="col">Rayon</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>

 
  <?php if(empty($_SESSION["dataSiswa"])):?>

    <div style="text-align: center;" class="alert alert-danger" role="alert">
     Tidak ada data
    </div>
  <?php else :?>

  <?php foreach($_SESSION["dataSiswa"] as $key => $data) :?>
    <tr>
      <th scope="row"><?= $i++ ;?></th>

      <td><?= htmlspecialchars($data["nama"]);?></td>
      <td><?= htmlspecialchars($data["nis"]);?></td>
      <td><?= htmlspecialchars($data["rayon"]);?></td>
      <td>
        <a class="btn btn-danger" href="hapus.php?id=<?= $key ?>">Hapus</a>
        <a class="btn btn-warning" href="edit.php?id=<?= $key ?>">edit</a>
        <a class="btn btn-dark" href="detail.php?id=<?= $key ?>">detail</a>
      </td>
    </tr>
  <?php endforeach ;?>
  
  </tbody>
</table>
<?php endif ;?>


</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-SYyqXdpJnFDTLPQ4d+aCXOwkgxEV9vmV1Evr3fNfNEW0c8jweW0CKfdvuqQtkUfY" crossorigin="anonymous"></script>
</body>
</html>
