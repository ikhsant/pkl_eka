<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php if($_SESSION['akses_level'] == 'admin'){ ?>
        <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="siswa.php"><i class="fa fa-users"></i> <span>Siswa</span></a></li>
        <li><a href="pengajuan.php"><i class="fa fa-bookmark"></i> <span>Pengajuan</span></a></li>
        <li><a href="pembimbing.php"><i class="fa fa-user"></i> <span>Pembimbing</span></a></li>
        <li><a href="perusahaan.php"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li>
        <li><a href="pengawas.php"><i class="fa fa-user-secret"></i> <span>Pengawas</span></a></li>
        <li><a href="user.php"><i class="fa fa-user"></i> <span>Data User</span></a></li>
        <li><a href="setting.php"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
        <?php } ?>
        <?php if($_SESSION['akses_level'] == 'pembimbing'){ ?>
        <li><a href="pembimbing_menu.php"><i class="fa fa-users"></i> <span>Siswa Dibimbing</span></a></li>
        <?php } ?>
        <?php if($_SESSION['akses_level'] == 'siswa'){ ?>
        <li><a href="siswa_list.php"><i class="fa fa-users"></i> <span>Data Diri</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <!-- <small>advanced tables</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">