<?php  
include('header.php');

$id_pegawai = $_SESSION['id_pegawai'];

include("dokumentasi.php");

$db = new dokumentasi();

$result = $db->tampil_data_admin();

?>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <li class="active treeview">
    <a href="beranda_admin.php?status=">
      <i class="fa fa-briefcase"></i> <span>Dokumentasi pegawai</span>
    </a>
  </li>
  <li class="">
    <a href="akun_pegawai.php?status=">
      <i class="fa fa-users"></i> <span>Data Pegawai</span>
    </a>
  </li>
</ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <?php  
    $status = $_GET['status'];
    if (!isset($_GET['status'])) {

    }
    elseif ($status == "berhasilverifikasi") {
      echo '<div class="alert alert-success " role="alert">
      <strong>Berhasil verifikasi!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Dokumentasi</h3>
      </div>
      
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Uraian Dokumentasi</th>
              <th>Keterangan</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1; 
            while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['uraian_kegiatan']; ?></td>
                <td>
                  <?php 
                  if ($row['keterangan'] == "Belum Dilihat") {
                    echo "<span class='label label-danger'>Belum Dilihat</span>";
                  }
                  else {
                    echo "<span class='label label-success'>Sudah Dilihat</span>";
                  }
                  ?>
                </td>	
                <td><img width="100" src="assets/upload/<?php echo $row['gambardoc']; ?>"></td>
                <td>
                  <?php if ($row['keterangan'] == "Sudah Dilihat") {
                    echo '<a class="btn btn-success" href="#"><i class="fa fa-check"></i> sudah diverifikasi</a>';
                  }
                  elseif ($row['keterangan'] == "Belum Dilihat") {
                    echo "<a class='btn btn-warning' href='proses_dokumentasi.php?aksi=verifikasi&id=$id'><i class='fa fa-clock-o'></i> belum verifikasi</a>";
                  }
                  ?>
                </td>
              </tr>
              <?php
            }
            ?>

          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Uraian Dokumentasi</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>

<?php  
include('footer.php');
?>