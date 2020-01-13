<?php  
  //koneksi database
  include('koneksi.php');

  //nampilin tabel

  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];

  $id_pegawai = $_GET['id_pegawai'];

  $sql = "select * from dokumentasi where tanggal between '$tgl_awal' and '$tgl_akhir' and id_pegawai=$id_pegawai";

  $result = $koneksi->query($sql);

  // untuk menampilkan pegawai
        
  $sql3 = "select * from pegawai where id_pegawai=$id_pegawai";

  $hasilpegawai = $koneksi->query($sql3);

  $hasil = mysqli_fetch_assoc($hasilpegawai);

?>

<!doctype html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style_print.css">
</head>
<body>
  <header>
    <div id="container_gambar" style="padding-top: 20px;">
      <img class="logo" src="assets/images/lebak.png">
    </div>
    <div id="container_header">

      <h3 style="letter-spacing: 5px; ">PEMERINTAH KABUPATEN LEBAK<br>PUSKESMAS BAROS</h3>
      <p>
      <i>Jl.Raya Rangkasbitung-Pandeglang KM 14 Ds.Baros-Warunggunung</i></br>
      Telp.:<i>(0253) 203534</i> | Email.: <i>pkm.baros1004@gmail.com</i>
    </p>
  </div>
</header>

<span id="tebal" class="garis_kop"></span>
<span id="tipis" class="garis_kop"></span>

<main>
  <h3>Laporan Dokumentasi</h3>

  <h4>Data Pegawai</h4>
  <p>Nama : <?php echo $hasil['nama']; ?></p>
  <p>Jenis Kelamin : <?php echo $hasil['jenis_kelamin']; ?></p>
  <p>pangkat/gol : <?php echo $hasil['pangkat']; ?></p>
  <p>jabatan : <?php echo $hasil['jabatan']; ?></p>
  <p>Unit Kerja : <?php echo $hasil['unit_kerja']; ?></p>
  <br>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Uraian Kegiatan</th>
      <th>  Dokumentasi</th>
    </tr>

    <tbody>
      <?php
      $no=1;  
      while ($row = $result -> fetch_assoc()) {                
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['tanggal']; ?></td>
          <td><?php echo $row['uraian_kegiatan']; ?></td>
          <td><img width="250" src="assets/upload/<?php echo $row['gambar']; ?>"></td>
        </tr>
      <?php
      }
      ?>
    </tbody>        
  </table>

  <div class="ttd" style="margin-right: 80px; width: 250px;">
   <?php
   $sql2 = "select date_format(NOW(), '%e %M %Y') as tanggal1 from dokumentasi";  
   $result2 = $koneksi->query($sql2);
   $hasil = mysqli_fetch_assoc($result2); 
   ?>
   <h4 class="ket1">warunggunung, <?php echo $hasil['tanggal1']; ?></h4>
   <h4 class="ket2">Kepala Puskesmas</h4>
   <br> <br>
   <h4>Aldy Naufal Alyyafi</h4>
 </div>
</main>

<script>
  window.print();
</script>
</body>
</html>