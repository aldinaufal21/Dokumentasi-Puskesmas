<?php  
	class akun
	{
		var $host = "localhost";
		var $user = "root";
		var $password = "";
		var $db = "puskesmas";

		function __construct()
		{
			$this->koneksi = new mysqli($this->host,$this->user,$this->password,$this->db);	
		}

		function daftar($nama, $username, $password){
			$sql = "insert into pegawai
					values
					('','$username','$password','$nama','','','','','user.jpg','pegawai')";

			$result = $this->koneksi->query($sql);
		}

		function login($username, $password){
			$sql = "select * from pegawai where username='$username' and password='$password'";

			$result = $this->koneksi->query($sql);

			$cek = mysqli_num_rows($result);

			$hasil = mysqli_fetch_assoc($result);

			$level = $hasil['level'];

			$id_pegawai = $hasil['id_pegawai'];

			if ($cek>0) {
				session_start();
				if ($level == "pegawai") {
					$_SESSION['username'] = $username;
					$_SESSION['id_pegawai'] = $id_pegawai;

					header("location: beranda_dokumentasi.php?status=");	
				}
				elseif ($level == "admin") {
				 	$_SESSION['username'] = $username;
				 	$_SESSION['id_pegawai'] = $id_pegawai;

				 	header("location: beranda_admin.php?status=");	
				} 
			}
			else{
				header("location: index.php?hasil=gagallogin");
			}
		}

		function tampil_akun($id_pegawai){
			$sql = "select * from pegawai where id_pegawai='$id_pegawai'";

			$result = $this->koneksi->query($sql);

			return $result; 
		}

		function tampil_pegawai(){
			$sql = "select * from pegawai where id_pegawai<>3 order by nama ASC";

			$result = $this->koneksi->query($sql);

			return $result;
		}

		function edit_akun($nama,$jenis_kelamin,$pangkat,$jabatan,$unit_kerja,$id_pegawai){
			$sql = "update pegawai 
					set nama='$nama',jenis_kelamin='$jenis_kelamin',pangkat='$pangkat',jabatan='$jabatan',unit_kerja='$unit_kerja' where id_pegawai='$id_pegawai'";

			$result = $this->koneksi->query($sql);
		}

		function edit_gambar($gambar,$id_pegawai){
			$sql = "update pegawai
					set gambar='$gambar'
					where id_pegawai='$id_pegawai'";

			$result = $this->koneksi->query($sql);
		}

		function edit_password($id_pegawai,$baru){
			$sql = "update pegawai
					set password='$baru'
					where id_pegawai='$id_pegawai'";

			$result = $this->koneksi->query($sql);
		}
	}
?>