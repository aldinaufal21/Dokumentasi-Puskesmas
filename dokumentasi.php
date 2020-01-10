<?php  
	class dokumentasi
	{
		var $host = "localhost";
		var $user = "root";
		var $pass = "";
		var $db = "puskesmas";

		function __construct()
		{
			$this->koneksi = new mysqli($this->host,$this->user,$this->pass,$this->db);
		}

		function tampil_data($id_pegawai){
			$sql = "select * from dokumentasi where id_pegawai='$id_pegawai' order by tanggal DESC";

			$result = $this->koneksi->query($sql);

			return $result;
		}

		function tambah_data($tanggal,$uraian_kegiatan,$namaFile,$id_pegawai){
			$sql = "insert into dokumentasi
					values
					('', '$tanggal','$uraian_kegiatan','$namaFile','Belum Dilihat','$id_pegawai')";

			$result = $this->koneksi->query($sql);
		}

		function hapus_data($id){
			$sql = "delete from dokumentasi where id=$id";

			$result = $this->koneksi->query($sql);
		}

		function edit_data($tanggal,$uraian_kegiatan,$id){
			$sql = "update dokumentasi
					set tanggal='$tanggal',
					uraian_kegiatan='$uraian_kegiatan'
					where id='$id'";

			$result = $this->koneksi->query($sql);
		}

		function tampil_data_admin(){
			$sql = "select id, nama, tanggal, uraian_kegiatan, keterangan, dokumentasi.gambar as gambardoc, id_pegawai from dokumentasi join pegawai using(id_pegawai) order by tanggal DESC";

			$result = $this->koneksi->query($sql);

			return $result;
		}

		function edit_verifikasi($id){
			$sql = "update dokumentasi
					set keterangan='Sudah Dilihat'
					where id='$id'";

			$result = $this->koneksi->query($sql);
		}
	}
?>