<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset="UTF8">
    
    <link rel="stylesheet" href="vendors/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome.min.css">
    <link rel="stylesheet" href="style-accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    
    
    <title>TicTic-Linic</title>
</head>
<script>
        //fonction de redirection vers la page d'inscription
    function fonctionInscription(){
        document.location.href="inscription.php";
    }

        //fonction de redirection vers la page de connexion
    function fonctionConnexion(){
        document.location.href="connexion_membre.php";
    }
    
</script>
<style>

</style>
<body>

    <!-- Hearder -->
    <header  class="container-fluid header">
        <div class="container">
            <!-- on va créer une ligne -->   
            <div class="row">
                <!-- Bars icon for nav -->
                <i class="icon far fa-bars"></i>  
                <!-- logo -->
                <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
                    <div  class="logo">
                        <!--<h2>Toc Toc Médoc</h2>-->
                        <img src="image/logo.png">
                    </div>
                </div>
                
                <!-- Navigation du site -->
                <nav class="col-md-9 col-xs-12 col-sm-12 col-lg-9">
                    <ul class="nav-list">
                        <li class="list" onclick="window.location.href='#localisation';"> Information</li>
                        <li class="list" onclick="window.location.href='#propos';">A propos</li>
                        <li class="list" onclick="window.location.href ='connexion/conxMed.php';" >Connexion</li>
                    </ul>
                </nav>
                
            </div>
        </div>
    </header> 
    
    <!-- end header -->
    
    <!-- Home -->
    <section class="sections home text-center">
        <div class="over-lay">
            <div class="container">
               <div class="home-content">
                <h3 class="home-title"> Bienvenue sur TIC TIC_LINIC</h3>
                <p class="lead home-desc" style="margin-left: 10%;">
                    TIC TIC LINIC, l'application qui vous accompagne et  enregistre vos informations médicaux !
                </p> <a href="connexion/conxInsPat.php">
                   <button class="btn button"> <strong>Patient</strong></button> 
               </a>
               <a href="connexion/conxMed.php">
                   <button class="btn button" > <strong>Médecin</strong></button>
               </a>


           </div>
       </div>
   </div>
</section>



<section class="container">

  <h2 style="margin-top: 20px;"> <strong>A propos </strong></h2>

  <div class="row">
    <div class="col-12 col-md-5">
      <h4>TICTIC-LINIC</h3> 
          <p id="propos">
            Notre équipe de professionnels de la santé est à votre disposition pour répondre à tous vos besoins en matière de santé. 
            <br>
            <br>
            Nous sommes fiers de fournir des soins complets et personnalisés pour chaque patient, en prenant en compte leur histoire médicale, leurs symptômes et leurs préférences.
            
            Nous offrons une large gamme de services médicaux, y compris les examens de routine, les soins préventifs, les dépistages de maladies, les soins chroniques et les urgences mineures. 
            <br><br>Nous utilisons les dernières technologies et pratiques médicales pour garantir que nos patients reçoivent les meilleurs soins possibles.</p>         
        </div>
        <div class="col-12 col-md-4">
            <h2 id="localisation"><strong>Localisation</strong></h2>
            <img class="imgheader" src="image/gps.jpg" alt="image de localisation ">
            <p>12, Rue Targa Ouzmour,<br>
            Béjaia, Algérie</p>
        </div>
    </div>
</section>

<br/><br/>
<!-- Footer -->

<footer>
    <div class="container">
        <div class="row">
          <div class="col" id="company">
              <img src="image/logo.png" alt="logo du cabinet" class="logo" style="height: 60px; width: 200px;">
              <p style="height:70px;">
                 La santé c'est comme la richesse, il ne suffit pas de l'avoir, il faut savoir la conserver.
             </p>
             <div class="social">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>


        <div class="col" id="services">
         <h3>Services</h3>
         <div class="links">
            <a href="#">Prise en charge globale du patient</a>
            <a href="#">Auscultation</a>
            <a href="#">Prescription d’analyses </a>
            <a href="#">Analyse et interprétation des résultats</a>
        </div>
    </div>

    <div class="col" id="useful-links">
     <h3>Links</h3>
     <div class="links">
        <a href="connexion/conxMed.php">Connexion</a>
        <a onclick="window.location.href='#propos';">A propos</a>
        <a onclick="window.location.href='#contact';">Contact</a>
        <a onclick="window.location.href='#localisation';">Localisation</a>
    </div>
</div>

<div class="col" id="contact">
  <h3>Contact</h3>
  
  <div class="contact-details">

     <i class="fa fa-phone"></i>

     <p>+213 70895645</p>


 </div>
</div>
</div>



</div>
</footer>


</body>
</html>