<!DOCTYPE html>
<html>
    <head>
        <title>Page de connexion</title>
  

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/all.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style1.css" rel="stylesheet">
    </head>
	<style>
.login-page, .register-page {
    -ms-flex-align: center;
    align-items: center;
    background: #e9ecef;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    height: 100vh;
    -ms-flex-pack: center;
    justify-content: center;
}
.login-box, .register-box {
    width: 360px;
}
.login-logo, .register-logo {
    font-size: 2.1rem;
    font-weight: 300;
    margin-bottom: .9rem;
    text-align: center;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}
.login-box-msg, .register-box-msg {
    margin: 0;
    padding: 0 20px 20px;
    text-align: center;
}
.elevation-3 {
    box-shadow: 0 10px 20px rgba(0,0,0,.19),0 6px 6px rgba(0,0,0,.23)!important;
}

.img-circle {
    border-radius: 50%;
}
</style>

<body class="login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="text-center"><a href="">
        <img src="<?php echo base_url();?>assets/img/logoeco.PNG" class="img-rounded text-center img-circle elevation-3 w-25 h-25" alt=" Logo">
      </a>
    </p>
      <p class="login-box-msg">Connection sur ESMV</p>

      <form action="<?= base_url() ?>login/index" method="post">
        <div class="input-group mb-3 <?= empty(form_error('password'))?'':'has-error' ?>">
          <input type="text" class="form-control" name="email"  value="<?= set_value('email') ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 <?= empty(form_error('password'))?'':'has-error' ?>">
          <input type="password" class="form-control" name="password" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div style='background:#fff;font-weight:bold;' class="help-block  text-danger  <?= empty(validation_errors())?'':'alert-danger'?> <?= (!empty($msg))?'alert-danger':'' ?>" id="error">
          <small><?= validation_errors() ?></small><p><?= (!empty($msg))?$msg:'' ?></p>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Se souvenir
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-success btn-sm btn-block">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      </form>

      <p class="mb-1">
        <a href="Login/forgot_password">Mot de passe oublié?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
</div>
<!-- /.login-box -->

</body>
</html>