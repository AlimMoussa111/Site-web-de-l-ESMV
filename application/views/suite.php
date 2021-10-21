
  <main id="main" >

<div  style="background-color: #3a9d23;color:white;height: 70px;padding:10px 25px;">
  <h5>ACTUALITE</h5>
  <p style="font-style: italic;font-size: 12px;text-transform:uppercase">Ecole des Sciences et de Medecine Veterinaire</p>
</div>


<div class="side" style="padding: 3px;float: left;border-right: 1px solid gray;">
  <div class="menu-div">
    <div class="menu-header">MENU</div>
    <ul class="menu">
      <li ><a href="#"> ACCUEIL</a></li>
      <li ><a href="#"> FORMATION</a></li>
      <li ><a href="#">RECHERCHE</a></li>
      <li ><a href="#">COOPERATION</a></li>
      <li ><a href="#"> SERVICE</a></li>
      <li ><a href="#"> ETUDIANT</a></li>
    </ul>
  </div>

  <div class="menu-div">
    <div class="menu-header">ADMISSIONS</div>
    <ul class="menu">
      <li ><a href="#">Fiche concours</a></li>
      <li ><a href="#"> Prospectus de l'etablissement</a></li>
    </ul>
  </div>

  <div class="menu-div">
    <div class="menu-header">VISITE</div>
    <img src="assets/img/visite.png" alt="visite" style="height: 100%;width: 100%;">
  </div>
  
  <div class="menu-div">
    <div class="menu-header">SITES RATTACHES</div>
    <ul class="menu">
      <li ><a href="#" style="font-size:11px">UNIVERSITE DE NGAOUNDERE</a></li>
      <li ><a href="#"> LESIA</a></li>
      <li ><a href="#"> UDF PAI</a></li>
      <li ><a href="#"> IUT</a></li>
      <li ><a href="#"> EGEM</a></li>
      <li ><a href="#"> FACULTE DES SCIENCES</a></li>
      <li ><a href="#"> FALSH</a></li>
    </ul>
  </div>

  <div class="menu-div">
    <div class="menu-header">CONTACT</div>
    <ul class="menu">
      <li class="list"><i class="fas fa-briefcase"></i> Secretariat du directeur : <br/>Tel. :(+237) 22254022</li>
      <li class="list"><i class="fas fa-phone"></i> Scolarité :  <br/> Tel. :(+237) 699454372 / 22254080</li>
      <li class="list"><i class="fas fa-laptop"></i> Service Informatique : <br/>Tel. :(+237) 696121136</li>
      <li class="list"><i class="fas fa-envelope"></i> Email : ensai@univ-ndere.cm</li>
    </ul>
  </div>
</div>

<div  class=" side" style="padding: 3px;float: right; border-left: 1px solid gray;">

  <div class="menu-div">
    <div class="menu-header">AGENDA</div>
    <ul class="menu">
        <div>
          <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="1" direction="up" >
            <!-- Vos News du Site -->
            <p class="text-moving">
              Concours d'entrée en première année du cycle des docteurs vétérinaires de l'Ecole des Sciences et de Medecine Vétérinaire (année academique 2021/2022)
              date: Venderdi 05 et Samedi 06 Septembre 2021. </p>
              <div class="line"></div>
              <p class="text-moving">
              Les membres du projet de conception et de realisation des sites web des etablissements.
            </p>
          </marquee>
        </div>
      
      </li>
    </ul>
  </div>

  <div class="menu-div">
    <div class="menu-header">INFO RAPIDE </div>
    <ul class="menu">
      <li ><a href="#" style="color: #0066bf;font-weight: bold;">Tweets de @univNdere</a>
    </ul>
  </div>

  <div class="menu-div">
    <div class="menu-header">SITES EXTERNES </div>
    <ul class="menu">
      <li ><a href="#"> MINESUP</a></li>
    </ul>
  </div>

</div>



  <div class="container-fluid">


    <div class="row">
      <div class=" content" style="background:#fff" >
      <p class='text-moving'> DETAIL SUR L'EVENEMENT</p>

      <?php 
                    if($full_info->num_rows() > 0)
                    {
                       foreach($full_info->result() as $row)
                        {
                ?>                    
                            
                            <h7 class="titre-actualite" style="text-transform:capitalize"><?php echo $row->titre; ?></h7>
                            <p class="text-moving" ><?php echo $row->description; ?></p>
                            <a class='btn btn-sm btn-primary' href="<?php echo base_url(); ?>main/index">Retour</a>
                            
                <?php
                        }

                  
                    }
                ?>

        </div>
        
      </div>
     
    </div>
  </div>

</main><!-- End #main -->

<script>
$(document).ready(function(){


});
</script>