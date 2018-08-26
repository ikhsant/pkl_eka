<?php
$page = 'index';
$title 	= 'Dashboard';
include "../include/header.php";
include "../include/database.php";
?>

<?php 
// notif pesan
if (!empty($_SESSION['pesan'])) { ?>
  <div class="alert alert-success alert-dismissible">
    <i class="fa fa-check"></i> <?php echo $_SESSION['pesan']; ?>
  </div>
  <br>
  <?php 
  $_SESSION['pesan'] = '';
} 

// notif pesan ewrror
if (!empty($_SESSION['error'])) { ?>
  <div class="alert alert-danger alert-dismissible">
    <i class="fa fa-check"></i> <?php echo $_SESSION['error']; ?>
  </div>
  <br>
  <?php 
  $_SESSION['error'] = '';
} 
?>

<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php  
                $siswa = mysqli_query($conn, "SELECT * FROM siswa");
                echo mysqli_num_rows($siswa);
                ?>
              </h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="siswa.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php  
                $pengajuan = mysqli_query($conn, "SELECT * FROM pengajuan");
                echo mysqli_num_rows($pengajuan);
                ?>
              </h3>

              <p>Pengajuan</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="pengajuan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
<?php
include "../include/footer.php";
?>