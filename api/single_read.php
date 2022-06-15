<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../config/database.php';
	include_once '../class/Mahasiswa.php';

	$database = new Database();
	$db = $database->getKoneksi();
	$mhs = new Mahasiswa($db);
	
	$mhs->id = isset($_GET['id']) ? $_GET['id'] : die();
	$mhs->bacaSatuMahasiswa();
	if($mhs->nama != null){
	// membuat array
		$mhsArr = array(
		"id" => $mhs->id,
		"nim" => $mhs->nim,
		"ktp" => $mhs->ktp,
		"nama" => $mhs->nama,
		"email" => $mhs->email,
		"tmplahir" => $mhs->tmplahir,
		"tgllahir" => $mhs->tgllahir,
		"alamat" => $mhs->alamat,
		"created" => $mhs->created
		);
		http_response_code(200);
		echo json_encode($mhsArr);
	}
	else{
		http_response_code(404);
		echo json_encode("Mahasiswa tidak ditemukan.");
	}
?>