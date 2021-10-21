<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $titre; ?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
        <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    </head>
    <body style="background:#f8f9fa">
        <div class='container'>
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm" >
                    <br/><br/><br/>
                    <img src="<?php echo base_url();?>assets/img/logoeco.PNG" alt="logo" style="margin:5px auto;display:block"/>
                    <h4 align="center">Connection sur ESMV</h4>
                    <br/>
                    <form method='post' action='<?php echo base_url(); ?>user/login_validation' >
                        <div class='form-group'>
                            <label style="font-weight:500">Login :</label>
                            <input type='text' name='username'class='form-control form-control-sm' placeholder="Entrez votre login"/>
                            <span class='text-danger' style="font-size:12px" ><?php echo form_error('username'); ?></span>
                        </div>
                        <div class='form-group'>
                            <label style="font-weight:500">Mot de passe : </label>
                            <input type='password' name='password' class='form-control form-control-sm'placeholder="Entrez votre mot de passe"/>
                            <span class='text-danger' style="font-size:12px" ><?php echo form_error('password'); ?></span>                    
                        </div>
                        <div class='form-group'>
                            <input type='submit' value='Connection' class='btn btn-info btn-sm'/><br>
                        <?php
                            echo $this->session->flashdata('error');
                        ?>

                        </div>
                    </form>
                </div>
                <div class="col-sm"></div>
                
            </div>
        </div>
    </body>
</html>
