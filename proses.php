<?php 
class DataSiswa {
	public $nama,
			$nis,
			$rayon;
  
	public function __construct($nama, $nis, $rayon)
	{
	  $this->nama = $nama;
	  $this->nis = $nis;
	  $this->rayon = $rayon;
	}
  
	public function getData()
	{
	  return $this->nama . $this->nis . $this->rayon;
	}
  
  
  }
  $error = null;
  $button = null;
  $kontakTerpilih = null;
  $print = null;
  $detail = null;
  
  class Proses extends DataSiswa {
	public function create() {
		global $error; 
  
		if (isset($_POST["btn"])) {
			$nama = $_POST["nama"];
			$nis = $_POST["nis"];
			$rayon = $_POST["rayon"];
  
			
  
			$dataSudahAda = false;
			foreach ($_SESSION["dataSiswa"] as $data) {
				if ($data["nama"] == $nama) {
					$dataSudahAda = true;
					break; 
				}
			}
  
			if ($dataSudahAda) {
				$error = '<div style="text-align: center;" class="alert alert-danger mt-3" role="alert">
						  Nama sudah ada
						  </div>';
			} else {
				$_SESSION["dataSiswa"][] = [
					"nama" => $nama,
					"nis" => $nis,
					"rayon" => $rayon
				];
			}
		}
	}
  
	public function Buttonhapus()
	{
	  global $button;
	  global $print;
	  if($_SESSION["dataSiswa"] != null){
		$button = ' <a class="btn btn-danger mt-2" href="hapusAll.php">Hapus</a>';
		$print = ' <a onclick="printPage()"  class="btn btn-success mt-2" href="print.php">Print</a>';
	  }

  
	}

	public function hapus()
	{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			unset($_SESSION["dataSiswa"][$id]);
			header("Location: index.php");
			exit;
		}
	}

	public function edit()
	
	{
		global $kontakTerpilih;
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$kontakTerpilih = null;
			foreach($_SESSION["dataSiswa"] as $key => $data){
				if($key == $id){
					$kontakTerpilih = $data;
					break;
				}
			}
		
			if($kontakTerpilih == null) {
				header('Location: index.php');
				exit();
			}
		}

		if(isset($_POST['btn'])) {
			foreach ($_SESSION['dataSiswa'] as $key => &$data) {
				if ($id == $key) {
					$data['nama'] = $_POST['nama'];
					$data['nis'] = $_POST['nis'];
					$data["rayon"] = $_POST["rayon"];
					break;
				}
			}
			header('Location: index.php');
			exit();
		}
		
		
	}

	public function hapusAll()
	{
		session_destroy();
		unset($_SESSION["dataSiswa"]);
		header("Location: index.php");
		exit;
	}

	public function detail()
	{
		global $detail;
		if(isset($_GET["id"])){
		    $id = $_GET["id"];
		    foreach($_SESSION["dataSiswa"] as $key => $data){
		        if($key == $id){
		            $detail = $data;
		            break;
		        }
		    }
		
		    if($detail == null){
		        header('Location: index.php');
		        exit();
		    }
		
		}

	}
  }
