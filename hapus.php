<?php 
session_start();
require 'proses.php';
$proses = new Proses(null, null, null);
$proses->hapus();
