<?php  
include('header.php');

$id_pegawai = $_SESSION['id_pegawai'];

$result = $database->tampil_pegawai();

?>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <li class="">
    <a href="beranda_admin.php?status=">
      <i class="fa fa-briefcase"></i> <span>Dokumentasi Pegawai</span>
    </a>
  </li>
  <li class="active treeview">
    <a href="akun_pegawai.php?status=">
      <i class="fa fa-user"></i> <span>Data Pegawai</span>
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
      Data Pegawai
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Pegawai</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <?php  
    $status = $_GET['status'];
    if (!isset($_GET['status'])) {

    }
    elseif ($status == "berhasilhapus") {
      echo '<div class="alert alert-success " role="alert">
      <strong>Berhasil menghapus data!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pegawai</h3>
      </div>
      <!-- /.modal -->
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pegawai</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1; 
            while ($row = $result->fetch_assoc()) {
              $id = $row['id_pegawai'];
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jabatan']; ?></td>
                <td>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus">
                   <i class="fa fa-trash-o"></i> Hapus
                 </button>
                 <!-- modal -->
                 <div class="modal fade" id="modal-hapus">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                          <p>Anda Yakin Ingin Menghapus Data ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                          <a class="btn btn-danger" href="proses_akun.php?aksi=hapus&id=<?php echo $id; ?>">Hapus</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
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