<?php  
	session_start();
	include("akun.php");

	$db = new akun();

	$aksi = $_GET['aksi'];

	if ($aksi == "daftar") {
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$re_pass = $_POST['re_pass'];

		if ($password == $re_pass) {
			$result = $db->daftar($nama, $username, $password);

			header("location: index.php?hasil=berhasildaftar");
		}
		else{
			header("location: register.php?hasil=tidaksama");
		}
	}
	elseif($aksi == "login"){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$result = $db->login($username, $password);
	}
	elseif ($aksi == "logout") {
		session_destroy();
		unset($_SESSION);	

		header("location: index.php?hasil=logout");
	}
	elseif ($aksi == "edit") {
		$nama = $_POST['nama'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$pangkat = $_POST['pangkat'];
		$jabatan = $_POST['jabatan'];
		$unit_kerja = $_POST['unit_kerja'];
		$id_pegawai = $_GET['id_pegawai'];

		$result = $db->edit_akun($nama,$jenis_kelamin,$pangkat,$jabatan,$unit_kerja,$id_pegawai);
		
		header("location: profile.php?status=berhasiledit");
	}
	elseif ($aksi == "editpic") {
		$id_pegawai = $_GET['id_pegawai'];
		$gambar = $_FILES['gambar']['name'];
		$tmp_gambar = $_FILES['gambar']['tmp_name'];
		$ukuran = $_FILES['gambar']['size'];

		if ($ukuran < 2000000) {
			move_uploaded_file($tmp_gambar, "assets/dist/img/$gambar");

			$result = $db->edit_gambar($gambar,$id_pegawai);

			header("location: profile.php?status=berhasileditpic&ukuran=$ukuran");	
		}
		elseif ($ukuran == 0) {
			header("location: profile.php?status=gagaleditpic");
		}
		else{
		header("location: profile.php?status=gagaleditpic");			
		}
	}
	elseif ($aksi == "ubahpassword") {
		$lama = $_POST['lama'];
		$baru = $_POST['baru'];
		$re_baru = $_POST['re_baru'];
		$id_pegawai = $_GET['id_pegawai'];

		$result = $db->tampil_akun($id_pegawai);

		$hasil = mysqli_fetch_assoc($result);

		if ($hasil['password'] != $lama) {
			header("location: ubahpassword.php?status=notdatabase");
		}
		else{
			if ($baru != $re_baru) {
				header("location: ubahpassword.php?status=notnewpassword");
			}
			else{
				$proses = $db->edit_password($id_pegawai,$baru);

				header("location: profile.php?status=berhasilubahpassword");
			}
		}
	}
?>