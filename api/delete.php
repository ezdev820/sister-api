<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");

	include_once '../config/database.php';
	include_once '../class/Mahasiswa.php';

	$database = new Database();
	$db = $database->getKoneksi();
	$mhs = new Mahasiswa($db);
	$data = json_decode(file_get_contents("php://input"));
	
	$mhs->id = $data->id;
	if($mhs->hapusMahasiswa()){
		echo json_encode("Telah terhapus satu rekaman.");
	} else{
		echo json_encode("Data tidak ditemukan");
	}
?>