
  <main id="main" >

<div  style="background-color: #3a9d23;color:white;height: 70px;padding:10px 25px;">
  <h5>FORMATION</h5>
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
    <img src="<?php echo base_url();?>assets/img/visite.png" alt="visite" style="height: 100%;width: 100%;">
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
      <div class=" content" >
         <p class="text-moving">
         L’École des sciences et de médecine vétérinaire forme des étudiants dans domaines des
sciences vétérinaire : 
    </p>
          <div id="news_table"style="margin:0 10px;">
          </div>
          <div align="center" id="pagination_link"></div>
        </div>

      </div>
     
    </div>
  </div>

</main><!-- End #main -->

<script>
$(document).ready(function(){

 function load_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>main/pagination_formation/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#news_table').html(data.news_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 load_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_data(page);
 });

});
</script>