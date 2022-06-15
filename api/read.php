<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include_once '../config/database.php';
	// include_once '../class/Pegawai.php';
	include_once '../class/Mahasiswa.php';


	$database = new Database();
	$db = $database->getKoneksi();
	
	// $peg = new Pegawai($db);
	$mhs = new Mahasiswa($db);
	// $stmt = $peg->bacaPegawai();
	$stmt = $mhs->bacaMahasiswa();
	// $jumlahPeg = $stmt->rowCount();
	$jumlahMhs = $stmt->rowCount();
	// echo json_encode($jumlahPeg);
	echo json_encode($jumlahMhs);

	if ($jumlahMhs > 0) {
		$mhsArr = array();
		$mhsArr["body"] = array();
		$mhsArr["jumlahMhs"] = $jumlahMhs;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			extract($row);
			$e = array(
			"id" => $id,
			"nim" => $nim,
			"ktp" => $ktp,
			"nama" => $nama,
			"email" => $email,
			"tmplahir" => $tmplahir,
			"tgllahir" => $tgllahir,
			"alamat" => $alamat,
			"created" => $created
			);
		array_push($mhsArr["body"], $e);
		}
		echo json_encode($mhsArr);
	}
	else{
		http_response_code(404);
		echo json_encode(
			array("message" => "Rekaman tidak.")
		);
	}
?>