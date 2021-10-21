<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $titre; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="<?= base_url() ?>assets/fonts/font.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/styles/admin.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/sweetalert2.css">
    <script src="<?php echo base_url();?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/canvasjs.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/css/styles/admin.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/all.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/sweetalert2.all.min.js"></script>
   
 
  </head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav"style="color:gray;"  >
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
        <li class="nav-item">
           <a class="nav-link" href="javascript:void(0)" id="logout" >
            <i class="fas fa-power-off"></i>
            Déconnexion
          </a>
        </li>
    </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link font-weight-light " style="background:#343a40;border-bottom:0.5px solid #4f5962;">
        ESMV
        <span class="brand-text font-weight-light">Ngaoundere</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url(); ?>assets/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block font-weight-light">
                <i style="height:13px;color: yellowgreen;" class="fas fa-circle" ></i>
                <?php if(!empty($_SESSION['nom']))
                  { echo $_SESSION['nom'];} 
                ?>
            </a>
          </div>
          <div style="display: none;" id="session_id" session_id="<?php echo $this->session->user_id ?>"></div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

            <!-- TITRE-->
            <li class="nav-header " style="font-size:16px">SITE WEB</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p class="font-weight-light">
                Publier du contenu
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/news" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="font-weight-home">Actualite</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/projet" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="font-weight">Projet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/concours" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="font-weight">Concours</p>
                </a>
              </li>
          </ul>
            </li>
                         
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p class="font-weight-light">
                  A propos de nous
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/formation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="font-weight-home">Formation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>admin/cooperation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="font-weight-home">Cooperation</p>
                </a>
              </li>
          </ul>
            </li>

            <li class="nav-header ">UTILISATEURS</li>
            <li class="nav-item">
                <a href="<?php echo base_url();?>user/index" class="nav-link">
                  <i class=" fas fa-users nav-icon"></i>
                  <p class="font-weight">Comptes d'utilisateurs</p>
                </a>
              </li>
            

                
          </ul>
          
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    
    
        
  <!-- ./content wrapper -->
<div class="content-wrapper" style="min-height: 721.5px;background:#f4f6f9;">
  
  
   




<script type="text/javascript" language="javascript">
//CONFIRMATION DE DECONNEXION
    $(document).ready(function(){
        $('#logout').click(function(){
    
    Swal.fire({
      title: 'Déconnexion',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
  }).then((result) => {
        if (result.value) {
          window.location="<?php echo base_url(); ?>login/logout"; 
    }
  })
        });
    });
</script>