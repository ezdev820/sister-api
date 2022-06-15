<?php

class Database {
	private $host = "localhost";
	private $db = "phpapidb";
	private $user= "root";
	private $password = "";
	public $konek;

	public function getKoneksi() {
		$this->konek = null;
		try{
			$this->konek = new PDO("mysql:host=".$this->host.";
			dbname=".$this->db, 
			$this->user, 
			$this->password);
			$this->konek->exec("set names utf8");
		}catch(PDOException $exception){
			echo "Basis data tidak dapat terhubung : " . 
			$exception->getMessage();
		}
		return $this->konek;
	}
} 
?>