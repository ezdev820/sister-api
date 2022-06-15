<?php 

class Mahasiswa{
	// var koneksi
	private $konek;
	// Tabel
	private $tabel = "mahasiswa";
	// Properti 
	public $id;
	public $nim;
	public $ktp;
	public $nama;
	public $email;
	public $tmplahir;
	public $tgllahir;
	public $alamat;
	public $created;
	// koneksi ke DB
	public function __construct($db) {
		$this->konek = $db;	
	}
	// Baca semaua rekaman
	public function bacaMahasiswa() {
		$sql = "SELECT * FROM " . $this->tabel ;
		$stmt = $this->konek->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	// Menambahkan rekaman
	public function tambahMahasiswa(){
		$sql = "INSERT INTO ". $this->tabel ." SET
		nim = :nim,
		ktp = :ktp,
		nama = :nama, 
		email = :email, 
		tmplahir = :tmplahir, 
		tgllahir = :tgllahir, 
		alamat = :alamat,
		created = :created";
		$stmt = $this->konek->prepare($sql);
		// sanitasi
		$this->nim =htmlspecialchars(strip_tags($this->nim));
		$this->ktp =htmlspecialchars(strip_tags($this->ktp));
		$this->nama =htmlspecialchars(strip_tags($this->nama));
		$this->email =htmlspecialchars(strip_tags($this->email));
		$this->tmplahir =htmlspecialchars(strip_tags($this->tmplahir));
		$this->tgllahir=htmlspecialchars(strip_tags($this->tgllahir));
		$this->alamat =htmlspecialchars(strip_tags($this->alamat));
		$this->created=htmlspecialchars(strip_tags($this->created));
		// bind data
		$stmt->bindParam(":nim", $this->nim);
		$stmt->bindParam(":ktp", $this->ktp);
		$stmt->bindParam(":nama", $this->nama);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":tmplahir", $this->tmplahir);
		$stmt->bindParam(":tgllahir", $this->tgllahir);
		$stmt->bindParam(":alamat", $this->alamat);
		$stmt->bindParam(":created", $this->created);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	// Baca satu rekaman
	public function bacaSatuMahasiswa(){
		$sql = "SELECT * FROM ". $this->tabel ." WHERE id = ? LIMIT 0,1";
		$stmt = $this->konek->prepare($sql);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->nim = $dataRow['nim'];
		$this->ktp = $dataRow['ktp'];
		$this->nama = $dataRow['nama'];
		$this->email = $dataRow['email'];
		$this->tmplahir = $dataRow['tmplahir'];
		$this->tgllahir = $dataRow['tgllahir'];
		$this->alamat = $dataRow['alamat'];
		$this->created = $dataRow['created'];
	} 
	// Mengubah Rekaman
	public function ubahMahasiswa(){
		$sql = "UPDATE ". $this->tabel ." SET nim= :nim, ktp= :ktp, nama= :nama, email= :email, 
		tmplahir= :tmplahir, tgllahir= :tgllahir, alamat= :alamat, created= :created WHERE id= :id";
		$stmt = $this->konek->prepare($sql);
		$this->nim =htmlspecialchars(strip_tags($this->nim));
		$this->ktp =htmlspecialchars(strip_tags($this->ktp));
		$this->nama =htmlspecialchars(strip_tags($this->nama));
		$this->email =htmlspecialchars(strip_tags($this->email));
		$this->tmplahir =htmlspecialchars(strip_tags($this->tmplahir));
		$this->tgllahir=htmlspecialchars(strip_tags($this->tgllahir));
		$this->alamat =htmlspecialchars(strip_tags($this->alamat));
		$this->created=htmlspecialchars(strip_tags($this->created));
		$this->id =htmlspecialchars(strip_tags($this->id));
		// bind data
		$stmt->bindParam(":nim", $this->nim);
		$stmt->bindParam(":ktp", $this->ktp);
		$stmt->bindParam(":nama", $this->nama);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":tmplahir", $this->tmplahir);
		$stmt->bindParam(":tgllahir", $this->tgllahir);
		$stmt->bindParam(":alamat", $this->alamat);
		$stmt->bindParam(":created", $this->created);
		$stmt->bindParam(":id",$this->id);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	// Menghapus 1 rekaman
	function hapusMahasiswa(){
		$sql = "DELETE FROM " . $this->tabel . " WHERE id = ?";
		$stmt = $this->konek->prepare($sql);
		$this->id=htmlspecialchars(strip_tags($this->id));
		$stmt->bindParam(1, $this->id);
		if($stmt->execute()){
			return true;
		}
		return false;
		}
	}

?>