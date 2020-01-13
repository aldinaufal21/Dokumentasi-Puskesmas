<?php  
include('header.php');

?>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MENU</li>
  <li class="">
    <a href="beranda_dokumentasi.php?status=">
      <i class="fa fa-briefcase"></i> <span>Dokumentasi</span>
    </a>
  </li>
  <li class="active treeview">
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
      User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User profile</li>
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
    elseif ($status == "berhasileditpic") {
      echo '<div class="alert alert-success " role="alert">
              <strong>Berhasil mengubah gambar profile!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    elseif ($status == "berhasilubahpassword") {
      echo '<div class="alert alert-success " role="alert">
              <strong>Berhasil mengubah password!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    elseif ($status == "gagaleditpic") {
      echo '<div class="alert alert-success " role="alert">
              <strong>Gambar Tidak Boleh Lebih Dari 2 MB</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    }
    ?>
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="assets/dist/img/<?php echo $cek['gambar']; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $cek['nama']; ?></h3>

            <p class="text-muted text-center">Pegawai Puskesmas</p>

            <ul class="list-group list-group-unbordered">
              <form action="proses_akun.php?id_pegawai=<?php echo $id_pegawai; ?>&aksi=editpic" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="gambar_profile">Edit Gambar</label>
                  <input type="file" class="form-control" name="gambar" required="" placeholder="Name">
                  <p class="help-block">ukuran gambar tidak boleh lebih dari 2MB </p>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" name="edit" value="Edit Gambar">
                  <a href="ubahpassword.php?status=" class="btn btn-primary btn-block">Ubah Password</a>
                </div>
              </form>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" action="proses_akun.php?id_pegawai=<?php echo $id_pegawai; ?>&aksi=edit" method="post">
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?php echo $cek['nama']; ?>" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                      <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control">
                          <option value="laki-laki">Laki-Laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pangkat" class="col-sm-2 control-label">Pangkat</label>

                      <div class="col-sm-10">
                        <input type="text" name="pangkat" class="form-control" value="<?php echo $cek['pangkat']; ?>" placeholder="Pangkat">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>

                      <div class="col-sm-10">
                        <input type="text" name="jabatan" class="form-control" placeholder="jabatan" value="<?php echo $cek['jabatan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="unit_kerja" class="col-sm-2 control-label">Unit Kerja</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="unit_kerja" placeholder="Unit Kerja" value="<?php echo $cek['unit_kerja']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Simpan Data</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
    <?php  
    include('footer.php');
    ?>
    