<?php  
	include('dokumentasi.php');

	$db = new dokumentasi();

	session_start();

	$id_pegawai = $_SESSION['id_pegawai'];
	$aksi = $_GET['aksi'];

	if ($aksi == 'tambah') {
		$tanggal = $_POST['tanggal'];
		$uraian_kegiatan = $_POST['uraian_kegiatan'];
		$namaFile	=	$_FILES['gambar']['name'];
		$file_tmp	=	$_FILES['gambar']['tmp_name'];

		move_uploaded_file($file_tmp, "assets/upload/$namaFile");

		$result = $db->tambah_data($tanggal,$uraian_kegiatan,$namaFile,$id_pegawai);

		header("location: beranda_dokumentasi.php?status=berhasiltambah");
	}
	elseif ($aksi == "hapus") {
		$id = $_GET['id'];

		$result = $db->hapus_data($id);

		header("location: beranda_dokumentasi.php?status=berhasilhapus");
	}
	elseif ($aksi == "edit") {
		$id = $_GET['id'];

		$tanggal = $_POST['tanggal'];

		$uraian_kegiatan = $_POST['uraian_kegiatan'];

		$result = $db->edit_data($tanggal,$uraian_kegiatan,$id);

		header("location: beranda_dokumentasi.php?status=berhasiledit");
	}

	elseif ($aksi == "verifikasi") { //merubah data menjadi dilihat (keterangan)
		$id = $_GET['id'];

		$result = $db->edit_verifikasi($id);

		header("location: beranda_admin.php?status=berhasilverifikasi");
	}

?>