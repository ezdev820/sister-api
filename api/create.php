<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../config/database.php';
	// include_once '../class/Pegawai.php';
	include_once '../class/Mahasiswa.php';

	$database = new Database();
	$db = $database->getKoneksi();
	// $peg= new Pegawai($db);
	$mhs = new Mahasiswa($db);
	$data = json_decode(file_get_contents("php://input"));
	
	$mhs->nim = $data->nim;
	$mhs->ktp = $data->ktp;
	$mhs->nama = $data->nama;
	$mhs->email = $data->email;
	$mhs->tmplahir = $data->tmplahir;
	$mhs->tgllahir = $data->tgllahir;
	$mhs->alamat = $data->alamat;
	$mhs->created = date('Y-m-d H:i:s');

	// $peg->nama = $data->nama;
	// $peg->email = $data->email;
	// $peg->umur = $data->umur;
	// $peg->jabatan = $data->jabatan;
	// $peg->created = date('Y-m-d H:i:s');

	if($mhs->tambahMahasiswa()){
		echo json_encode('Tambah rekaman mahasiswa successfully.');
	} else{
		echo json_encode('Terjadi kesalah data tidak direkam.');
	}
	
	// if($peg->tambahPegawai()){
	// 	echo json_encode('Tambah rekaman pegawai successfully.');
	// } else{
	// 	echo json_encode('Terjadi kesalah data tidak direkam.');
	// }
?>
