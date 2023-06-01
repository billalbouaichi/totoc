<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->

<!DOCTYPE html>
    <!-- Coding by CodingLab | www.codinglabweb.com -->
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title>Responsive Card Slider</title>-->

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">



        <!-- CSS -->
        <link rel="stylesheet" href="pat.css">


        <link href="style_Rdv.css" rel="stylesheet"/>
    <link rel="stylesheet" href="vendors/bootstrap.min.css">

    <link rel="stylesheet" href="style-accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
                                        
    </head>
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
             
                </nav>
                
            </div>
        </div>
    </header> 
    <body>
    <?php
  session_start();
  $idUtilisateur = $_SESSION['id'];
  $lien = "./antecedentpat.php?id=" . $idUtilisateur;
  $lienOrdo = "./ordonnancepat.php?id=" . $idUtilisateur;
?>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="image/img_rdv.jpg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name"> prendre un rendez-vous</h2>
                            <a href="rendez_vous.php">
                             <button class="button">rendez-vous</button>   
                            </a>
                            
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                               <img src="image/ante.jpg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">affichage des antécédents médicaux  </h2>
                           
                            <a href="<?php echo $lien; ?>">
                            <button class="button">Antécédent</button>
                            </a>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="image/ordo.jpg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">affichage des ordonnances précedent</h2>
                            
                            <a href="<?php echo $lienOrdo; ?>">
                            <button class="button">affichage ordonnace </button>
                            </a>
                            
                        </div>
                    </div>
                   
                    
                   
                   
                </div>
               
            </div>
            
            <div class="swiper-button-next swiper-navBtn"><a href="./deconnexion.php">
                            <span class="icon"><i class="fa fa-power-off"></i></span>
                            <span class="text">Déconnexion</span>
                        </a></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
        
    </body>
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
        <a href="#">Connexion</a>
        <a href="#">A propos</a>
        <a href="#">Contact</a>
        <a href="#">Localisation</a>
    </div>
</div>

<div class="col" id="contact">
  <h3>Contact</h3>
  
 <div class="contact-details">

     <i class="fa fa-phone"></i>

     <p>+213-70895645</p>

            
 </div>
</div>
</div>



</div>
</footer>

    
</html>
