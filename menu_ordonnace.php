<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interface Medcin</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu_ordonnace.css" />
    <link rel="stylesheet" href="vendors/bootstrap.min.css">


</head>
<body>
<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['id'])) {
  // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
  header('Location: login.php');
  exit;
}

// Récupérer l'id de l'utilisateur à partir de la session
$user_id = $_SESSION['id'];

// Se connecter à la base de données
$conn = new mysqli('localhost', 'root', '', 'totoc');

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Rechercher l'utilisateur dans la base de données
$sql = "SELECT * FROM user WHERE id = $user_id";
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé un résultat
if ($result->num_rows > 0) {
    // Récupérer le nom d'utilisateur
    $row = $result->fetch_assoc();
    $username = $row['username'];
	$nom = $row['nom'];
	$prenom = $row['prenom'];
}


?>
    <div class="wrapper">
        <div class="wrapper_inner">
            <div class="vertical_wrap">
                <div class="backdrop"></div>
                <div class="vertical_bar">
                    <div class="profile_info">
                        <div class="img_holder">
                            <img src="image/three.jpg" alt="profile_pic" class="three">
                        </div>
                        <p class="title"><?php echo $username; ?></p>
						<p class="sub_title"><?php echo $nom.' '.$prenom; ?> </p>
                    </div>
                    <ul class="menu">
                        <li><a href="menu_acceuil.php" >
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="text">Accueil</span>
                        </a></li>
                        <li><a href="menu_patient.php">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="text">Mes Patients</span>
                        </a></li>
                        <li><a href="menu_antecedent.php" >
                            <span class="icon"><i class="fas fa-file-alt"></i></span>
                            <span class="text">Antécédents</span>
                        </a></li>
                        <li><a href="menu_ordonnace.php" class="active">
                            <span class="icon"><i class="fas fa-heart"></i></span>
                            <span class="text">Ordonnances </span>
                        </a></li>

                        <li><a href="./deconnexion.php">
                            <span class="icon"><i class="fa fa-power-off"></i></span>
                            <span class="text">Déconnexion</span>
                        </a></li>
                    </ul>

                    <ul class="social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <?php
            if(isset($_GET['id'])){ 
                $idPatientt = $_GET['id'];
                $sql = "SELECT * FROM user WHERE id = $idPatientt";
                $result = $conn->query($sql);
                
                // Vérifier si la requête a renvoyé un résultat
                if ($result->num_rows > 0) {
                    // Récupérer le nom d'utilisateur
                    $row = $result->fetch_assoc();
                    $id = $row['id'];
                    $nom = $row['nom'];
                $prenom = $row['prenom'];
                
                }
                
                // Fermer la connexion à la base de données
                $conn->close();}else{ 
                    $civilite = "";
                    $nom =  "";
                $prenom = "";
                $adresse = "";
                $dateNaissance =  "";
                $lieuNaissance = "";$conn->close();}
                ?>
            
            
            <div class="main_container">


                <center style="margin-top: 5%;">
                    <table  style="width: 80%;" > 
                        <tr> 
                            <td style="width: 14%;">
                               <div id="custom-search" class="top-search-bar" style="margin-top:6%;" >
                                 <input id="RechercheCinOrd" style="margin-bottom: 8%;" class="form-control" type="text" placeholder="Recherche par  CIN">
                             </div></td>
                             <td style="width: 1%;"> </td>

                             <td style="width: 14%;">
                               <div id="custom-search" class="top-search-bar" style="margin-top:6%;">
                                 <input id="RechercheOrdoM" style="margin-bottom: 8%;" class="form-control" type="text" placeholder="Par Nom">
                             </div></td>
                               <td style="width: 1%;"> </td>

                             <td style="width: 14%;">
                               <div id="custom-search" class="top-search-bar" style="margin-top:6%;">
                                 <input id="RechercheOrdoM" style="margin-bottom: 8%;" class="form-control" type="text" placeholder="Par Prénom">
                             </div></td>
                               <td style="width: 10%;"><button class="btn btn-primay" onclick="functionRechercheMOrd();">Recherche</button> </td>

                           </tr> 
                       </table>
                   </center>

                   <input type="hidden" id="getId_Pat" value="">

                   <form id="form" data-parsley-validate="" novalidate="" style="margin-left:5%;margin-top:5%"; action="ajoutordonance.php" method="POST">
                   <input type="hidden" name="idPatient" value="<?php echo $idPatientt; ?>"> 
                   <div class="form-group row">
                        <label for="CIN" class="col-3 col-lg-3 col-form-label text-left">CIN</label>
                        <div class="col-8 col-lg-8">
                            <input  id="CIN" name="CIN" type="text" required="" data-parsley-type="CIN" placeholder="Numero social" value="<?php echo $id; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nomp" class="col-3 col-lg-3 col-form-label text-left">Nom</label>
                        <div class="col-8 col-lg-8">
                            <input  id="nompatient" name="nompatient" type="text" required="" value="<?php echo $nom; ?>" data-parsley-type="nomp" placeholder="Nom du patient" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Medicament1" class="col-3 col-lg-3 col-form-label text-left">Prénom</label>
                        <div class="col-8 col-lg-8">
                            <input  id="prenompatient" name="prenompatient" type="text" required="" value="<?php echo $prenom; ?>"  data-parsley-type="prenom" placeholder="Prénom du patient" class="form-control">
                        </div>
                    </div>
                    <!-- /<div class="form-group row">
                        <label for="Medicament1" class="col-2 col-lg-2 col-form-label text-left"><strong>Médicaments</strong></label>
                        <div class="select-wrapper col-8 col-lg-8">
                            <span class="autocomplete-select " ></span>
                        </div>

                    </div>  -->


                     


                    <div class="form-group row">
                        <label for="Medicament1" class="col-3 col-lg-3 col-form-label text-left">Médicaments </label>
                        <div class="col-8 col-lg-8">
                         <textarea class="form-control" id="UsageMe"  name="UsageMe[]" placeholder="EXP : Doliprane 1000 : 2f/j (5j)
                         Doliprane 500 : 2f/j (4j)"></textarea>
                     </div>
                 </div>


                 <div class="form-group row">
                    <label for="Medicament1" class="col-3 col-lg-3 col-form-label text-left">Observation</label>
                    <div class="col-8 col-lg-8">
                      <textarea class="form-control" id="Observation" name="Observation"></textarea>
                  </div>
              </div>
              <div class="form-group row">
        <div class="col-12">
            <button type="submit" onclick="functionAddOrdo();" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
        </form>                                        


        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" onclick="imprimer()">Imprimer</button>
            
        </div>



    </div >
    <!-- Le modèle HTML pour l'impression -->
    <div  class="classe_imprimer" id="modele-impression" style="display:none;">
      <h2 style="text-align:center;">Ordonnance de chez TIC TIC-LINIC</h2>
      <p><strong>CIN :</strong> <span id="CIN-rec"></span></p>
      <p><strong>Nom :</strong> <span id="nompatient-rec"></span></p>
      <p><strong>Prenom :</strong> <span id="prenompatient-rec"></span></p>
      <p> <strong>Médicament :</strong> <span id="UsageMe-rec"></span></p>
      <p><strong>Conseil :</strong> <span id="Observation-rec"></span></p>
      <label style="margin-top:90%;margin-left:60% ; ">signature :  Dr. selnissa <span id="photo-rec"> </span></label>


  </div>

  <script>
    function imprimer() {
  // Récupération des valeurs saisies dans le formulaire
        var CIN = document.getElementById("CIN").value;
        var nompatient = document.getElementById("nompatient").value;
        var prenompatient = document.getElementById("prenompatient").value;
        var UsageMe = document.getElementById("UsageMe").value;
        var Observation = document.getElementById("Observation").value;
        var photo = document.getElementById("photo");

  // Insertion des valeurs dans le modèle HTML pour l'impression
        document.getElementById("CIN-rec").innerHTML = CIN;
        document.getElementById("nompatient-rec").innerHTML = nompatient;
        document.getElementById("prenompatient-rec").innerHTML = prenompatient;
        document.getElementById("UsageMe-rec").innerHTML = UsageMe;
        document.getElementById("Observation-rec").innerHTML = Observation;
        document.getElementById("photo");
        
        

  // Affichage de la fenêtre d'impression avec le modèle HTML pré-conçu
        var modele = document.getElementById("modele-impression").innerHTML;
        var fenetreImpression = window.open('', 'Impression');
        fenetreImpression.document.write(modele);
        fenetreImpression.document.close();
        fenetreImpression.print();
    }
</script>



<script>
    var hamburger = document.querySelector(".hamburger");
    var wrapper  = document.querySelector(".wrapper");
    var backdrop = document.querySelector(".backdrop");
    const container = document.createElement('div');
    container.classList.add('container');

    hamburger.addEventListener("click", function(){
        wrapper.classList.add("active");
    })

    backdrop.addEventListener("click", function(){
        wrapper.classList.remove("active");
    })
</script>
</body>
</html>