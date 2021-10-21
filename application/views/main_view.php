
  <main id="main" >

<div  style="background-color: #3a9d23;color:white;height: 70px;padding:10px 25px;">
  <h5>ACCUEIL</h5>
  <p style="font-style: italic;font-size: 12px;text-transform:uppercase">Ecole des Sciences et de Medecine Veterinaire</p>
</div>


<div class="side" style="padding: 3px;float: left;border-right: 1px solid gray;">
  <div class="menu-div">
    <div class="menu-header">MENU</div>
    <ul class="menu">
      <li ><a href=""> ACCUEIL</a></li>
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
      <li ><a href="<?php echo base_url(); ?>main/concours/">Concours</a></li>
      <li ><a href="<?php echo base_url(); ?>main/admission/"> Admission</a></li>
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
      <div class=" content" >
        <h5 class="title">Bienvenue a l'ESMV de l'Universite de Ngaoundere</h5>
            <div id="demo" class="carousel slide" data-ride="carousel" >
              <!-- Indicators -->
              <ul class="carousel-indicators" >
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active slideimage" >
                  <img src="<?php echo base_url();?>assets/img/classroom.jpg" alt="Los Angeles" style="width: 100%;height: 100%;">
                </div>
                <div class="carousel-item slideimage">
                  <img src="<?php echo base_url();?>assets/img/6.jpg" alt="Chicago" style="width: 100%;height: 100%;">
                </div>
                <div class="carousel-item slideimage">
                  <img src="<?php echo base_url();?>assets/img/12.jpg" alt="New York" style="width: 100%;height: 100%;">
                </div>
              </div>         
              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            
        </div>
        <h5 class="title">Actualites</h5>
        <div>
       
   
          <div id="news_table"style="margin:0 10px;">
          </div>
          <div align="center" id="pagination_link"></div>
        </div>
        
        <a href="<?php echo base_url();?>main/all_news" style="margin-left: 10px;" class="mybutton link btn btn-sm btn-link">Plus d'actualites</a>

        <div class="row" style="margin: 0 10px;">
          <div class="col-sm-4" style="background-color: #f8f9fa;padding:10px; border: 1px solid teal;border-radius: 5px;margin: 0 5px;">
            <h6 class="titretrois">Notre agenda</h6>
            <ul class="ul-content">
              <li><i class="fas fa-arrow-right" style="color: yellow; margin-right: 10px;"></i> Presentation du site au Recteur, CDTIC, 2013-07-10</li>
              <li><i class="fas fa-arrow-right" style="color: yellow; margin-right: 10px;"></i> Presentation du site au Recteur, CDTIC, 2013-07-10</li>
              <li><i class="fas fa-arrow-right" style="color: yellow;margin-right: 10px;"></i> Presentation du site au Recteur, CDTIC, 2013-07-10</li>
              <li><i class="fas fa-arrow-right" style="color: yellow;margin-right: 10px;"></i> Presentation du site au Recteur, CDTIC, 2013-07-10</li>
            </ul>
            <a href="#" class="link btn btn-link mybutton">Tout suivre >>>></a>
          </div>
          <div class="col-sm-4" >
            <img id="classroom" src="<?php echo base_url();?>assets/img/5.jpg" alt="classe"/>
          </div>
        </div>
        <div class="link-list">
          <a  class="mybutton btn btn-link "><i class="fas fa-eye" ></i> Decouvrons les missions de l'etablissement</a>
          <br> 
          <a class="mybutton btn btn-link "><i class="fas fa-building" ></i>  Suivre l'etablissement en chiffres</a>
          <br> 
          <a  class="mybutton btn btn-link " href="organigramme.html"><i class="fas fa-eye" ></i>  Voir l'organigramme de l'etablissement</a>
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
   url:"<?php echo base_url(); ?>main/pagination/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#news_table').html(data.news_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 
 load_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_data(page);
 });

});
</script>