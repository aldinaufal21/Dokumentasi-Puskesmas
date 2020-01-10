<?php  
include('header.php');
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
      Tambah Data Dokumentasi
      <small>Pegawai</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tambah Data</li>
    </ol>
  </section>


  <!-- Main content -->
  <!-- form tambah Data -->
  <section class="content">
    <div class="box box-primary">
      <!-- /.box-header -->
      <!-- form start -->
      <form action="proses_dokumentasi.php?aksi=tambah" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label>Tanggal</label>
            <div class="input-group date">
              <div class="input-group-addon">
               <span class="glyphicon glyphicon-th"></span>
             </div>
             <input placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tanggal" required="">
           </div>
         </div>
         <div class="form-group">
          <label>Uraian Kegiatan</label>
          <textarea class="form-control" required="" rows="3" name="uraian_kegiatan"></textarea>
        </div>
        <div class="form-group">
          <label for="gambar">Input Gambar Dokumentasi</label>
          <input type="file" name="gambar" id="gambar" required="">
          <p class="help-block">ukuran gambar tidak boleh lebih dari 2MB </p>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <input type="submit" class="btn btn-primary" name="tambah" value="TAMBAH">
        <a href="beranda_dokumentasi.php" class="btn btn-primary">KEMBALI</a>
      </div>
    </form>
  </div>
</section>
<!-- /.content -->
</div>

<?php  
include('footer.php');
?>