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
	$data = json_decode(file_get_contents("php://input"));
	$mhs->id = $data->id;
	// Mengubah isi rek pagawai
	$mhs->nim = $data->nim;
	$mhs->ktp = $data->ktp;
	$mhs->nama = $data->nama;
	$mhs->email = $data->email;
	$mhs->tmplahir = $data->tmplahir;
	$mhs->tgllahir = $data->tgllahir;
	$mhs->alamat = $data->alamat;
	$mhs->created = date('Y-m-d H:i:s');
	if($mhs->ubahMahasiswa()){
		echo json_encode("Mahasiswa talah updated.");
	} else{
		echo json_encode("Data tidak ditemuakan");
	}
?>
