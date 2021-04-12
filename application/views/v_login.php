<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/images/parigimoutong.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo SITE_NAME ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

  <link href="<?php echo base_url('css/animate.css') ?>" rel="stylesheet">

</head>

<body class="" style="background : url('<?php echo base_url('img/BG.jpeg') ?>'); background-repeat: no-repeat;background-size: cover;height: 100%;background-position: center;">
    <div class="text-light mx-auto mt-5 text-center wow fadeInDown" >
      <img src="<?php echo site_url("assets/images/parigimoutong.png") ?>" height="128px" class="pb-2 mt-2" alt="logo">
      <h1 style="text-shadow: 1px 2px 2px black;">Sistem Informasi Pengolahan Data Penduduk<br><?php echo SITE_NAME ?></h1>
    </div>
  <div class="container">
    <div class="card card-login mx-auto mt-5 wow fadeInUp">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="login/aksi_login" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputUsername">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <td><input class="btn btn-primary btn-block" type="submit" value="Login"></td>
        </form>
      </div>
    </div>
    

  <!-- Bootstrap core JavaScript-->
  <script src="<?php base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php base_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <script src="<?php echo base_url('js/wow.min.js') ?>"></script>
  <script>new WOW().init();</script>

</body>

</html>
