<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $titre; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link rel="stylesheet"  href="<?= base_url() ?>assets/fonts/font.css">

  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/style1.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v2.3.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class=" header-inner-pages">
      <nav >
        <div class="container-fluid">
          <div class="row">
            <div class="col-7"></div>
            <div class="col-sm-3">
            <form method="post" action="#" class="form-inline" style="padding-bottom: 10px"> 
                  <div >
                    <input type="text" placeholder="Rechercher sur ESMV" class="form-control form-control-sm" style="font-size: 13px;display: inline;width: auto;">
                    <button type="submit" class="btn btn-success btn-sm" >Rechercher</button>
                  </div>
                </form>
            
            </div>
            <div class="col-sm-2" style="font-size: 12px;">
              <a href="<?php echo base_url();?>login/index" style="font-weight:bold">Se connecter</a>
            </div>
          </div>
        </div>
      </nav>

    <div class="container-fluid d-flex align-items-center">

      <h1 class="logo" style="margin-left: 30px;font-size: 28px;"><img src="<?php echo base_url();?>assets/img/logoeco.PNG"/></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li  class="active"><a href="<?php echo base_url();?>main">ACCUEIL</a></li>

      

          <li><a href="<?php echo base_url();?>main/formation">FORMATION</a></li>

          <li><a href="<?php echo base_url();?>main/cooperation">COOPERATION</a>
          </li>
          <li class="drop-down"><a href="#">ECOLE</a>
            <ul>
              <li><a href="<?php echo base_url();?>main/concours">CONCOURS</a></li>
              <li><a href="<?php echo base_url();?>main/projet">PROJET</a></li>

            </ul>
          </li>

          <li><a href="<?php echo base_url();?>main/etudiant">ETUDIANT</a></li>
          <li><a href="<?php echo base_url();?>main/us">A PROPOS</a></li>

        </ul>

      </nav><!-- .nav-menu -->
      <h1 class="logo" style="margin-left: 30px;font-size: 28px;"><img src="<?php echo base_url();?>assets/img/logoun.png"/></h1>

    </div>
  </header><!-- End Header -->
