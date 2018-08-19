<?php
session_start();
require '../include/database.php';
// query setting
$setting = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM setting LIMIT 1'));
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $setting['nama_website'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/adminlte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/adminlte/plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="../uploads/<?php echo $setting['logo'] ?>" width="100px">
      <br>  
      <a href="index.php"><b><?php echo $setting['nama_website'] ?></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan login terlebih dahulu</p>
        <?php
        if(isset($_POST['submit'])){
          $user = mysqli_real_escape_string($conn,$_POST["username"]);
          $pass = mysqli_real_escape_string($conn,sha1($_POST['password']));
          $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);

      // check untuk siswa
          $pass2 = mysqli_real_escape_string($conn,$_POST['password']);
          $result2 = mysqli_query($conn,"SELECT * FROM siswa WHERE nis = '$user' AND nis = '$pass2' ");
          $row2 = mysqli_fetch_assoc($result2);

          // check untuk pembimbing
          $result3 = mysqli_query($conn,"SELECT * FROM pembimbing WHERE username = '$user' AND password = '$pass' ");
          $row3 = mysqli_fetch_assoc($result3);

          // check untuk pengawas
          $result4 = mysqli_query($conn,"SELECT * FROM pengawas WHERE username = '$user' AND password = '$pass' ");
          $row4 = mysqli_fetch_assoc($result4);

          if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $user;
            $_SESSION['foto'] = $row['foto'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['akses_level'] = $row['akses_level'];
            $_SESSION['pesan'] = 'Selamat Datang '.$row['nama'].' !';
        // Redirect user to index.php
            header("Location: index.php");
          }elseif(mysqli_num_rows($result2) > 0){
            $_SESSION['id_siswa'] = $row2['id_siswa'];
            $_SESSION['nis'] = $row2['nis'];
            $_SESSION['nama'] = $row2['nama_siswa'];
            $_SESSION['foto'] = $row2['foto'];
            $_SESSION['akses_level'] = "siswa";
            $_SESSION['pesan'] = 'Selamat Datang '.$row2['nama_siswa'].' !';
        // redirect ke page siswa list
            header("Location: siswa_list.php");

          }elseif(mysqli_num_rows($result3) > 0){
            $_SESSION['id_pembimbing'] = $row3['id_pembimbing'];
            $_SESSION['nama'] = $row3['nama_pembimbing'];
            $_SESSION['akses_level'] = "pembimbing";
            $_SESSION['foto'] = $row3['foto'];
            $_SESSION['pesan'] = 'Selamat Datang '.$row3['nama_pembimbing'].' !';
        // redirect ke page pembimbing
            header("Location: pembimbing_menu.php");

            }elseif(mysqli_num_rows($result4) > 0){
            $_SESSION['id_pengawas'] = $row4['id_pengawas'];
            $_SESSION['nama'] = $row4['nama_pengawas'];
            $_SESSION['akses_level'] = "pengawas";
            $_SESSION['foto'] = $row4['foto'];
            $_SESSION['pesan'] = 'Selamat Datang '.$row4['nama_pengawas'].' !';
        // redirect ke page pengawas
            header("Location: pengawas_menu.php");

          }else{
            echo '
            <div class="alert alert-danger"><i class="fa fa-warning"></i> Username atau Password Salah</div>
            ';
            mysqli_close($conn);
          }
        }
        ?>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="username" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
<!--           <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-lock"></i> Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
