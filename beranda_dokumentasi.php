<?php  
include('header.php');

$id_pegawai = $_SESSION['id_pegawai'];

include("dokumentasi.php");

$db = new dokumentasi();

$result = $db->tampil_data($id_pegawai);

?>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <li class="active treeview">
    <a href="beranda_dokumentasi.php?status=">
      <i class="fa fa-briefcase"></i> <span>Dokumentasi</span>
    </a>
  </li>
  <li class="">
    <a href="profile.php?status=">
      <i class="fa fa-user"></i> <span>Profile</span>
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
    elseif ($status == "berhasiledit") {
      echo '<div class="alert alert-success " role="alert">
              <strong>Berhasil mengubah data!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    elseif ($status == "berhasilhapus") {
      echo '<div class="alert alert-success " role="alert">
              <strong>Berhasil menghapus data!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    elseif ($status == "berhasiltambah") {
      echo '<div class="alert alert-success " role="alert">
              <strong>Berhasil menambah data!</strong>
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
      <a href="tambah_dokumentasi.php" class="btn btn-success" style="margin-left: 10px;">+ Tambah Data</a>
      <a class="btn btn-primary" data-toggle="modal" data-target="#modal-default" href=""><i class="fa fa-print"></i> Print Data</a>
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Tanggal</h4>
              </div>
              <div class="modal-body">
                <form method="post" action="print_dokumentasi.php?id_pegawai=<?php echo $id_pegawai; ?>">
                  <div class="form-group">
                   <label>Tgl Awal</label>
                   <div class="input-group date">
                    <div class="input-group-addon">
                     <span class="glyphicon glyphicon-th"></span>
                   </div>
                   <input placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal">
                 </div>
               </div>
               <div class="form-group">
                 <label>Tgl Akhir</label>
                 <div class="input-group date">
                  <div class="input-group-addon">
                   <span class="glyphicon glyphicon-th"></span>
                 </div>
                 <input placeholder="masukkan tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir">
               </div>
             </div>
             <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="print" name="">
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Uraian Kegiatan</th>
          <th>Keterangan</th>
          <th>Dokumentasi</th>
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
            <td><img width="100" src="assets/upload/<?php echo $row['gambar']; ?>"></td>
            <td>
              <a class="btn btn-warning" href="edit_dokumentasi.php?aksi=edit&id=<?php echo $id; ?>"><i class="fa fa-edit"></i> Edit</a>
              <a class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data ini?')" href="proses_dokumentasi.php?aksi=hapus&id=<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Hapus</a>
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
          <th>Gambar</th>
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