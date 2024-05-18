<?php 

session_start();
require 'proses.php';
$proses = new Proses(null, null, null);
$proses->detail();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h1 {
        font-family: sans-serif;
        margin-top: 20px;
    }
</style>
<body>
    <h1 style="text-align: center;"><?= $detail["nama"];?></h1>
    <h1 style="text-align: center;"><?= $detail["nis"];?></h1>
    <h1 style="text-align: center;"><?= $detail["rayon"];?></h1>

</body>
</html>
