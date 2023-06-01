<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>rdv</title>
	<!-- CSS -->
	<link href="style_Rdv.css" rel="stylesheet"/>
	<link rel="stylesheet" href="vendors/bootstrap.min.css">

	<link rel="stylesheet" href="vendors/font-awesome.min.css">
	
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
<!-- end header -->

<body style="background: url('image/home2.jpg') no-repeat ; background-size: cover;">
	<div id="login">
		<!--<h3 class="text-center text-white pt-5"></h3>-->
		<div class="container" >
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-6">
					<div id="login-box" class="col-md-12">
						<form id="login-form" class="form" action="" method="post">
							<h3 class="text-center text-info"><b> Rendez-vous</b></h3>
							<div class="form-group">
								<label for="date" class="text-info " id="label2"><b> Date:</b></label><br>
								<input type="date" name="date" id="date" class="form-control">
							</div>
							<div class="form-group">
								<label for="heure" class="text-info " id="label2"><b> Horraire:</b></label><br>
								<input type="time" name="heure" id="heure" class="form-control">
							</div>

							<div class="form-group">
								<label for="datenaissance" class="text-info " id=""><b>Age :</b></label><br>
								<input type="text" name="datenaissance" id="datenaissance" class="form-control">
							</div>


							<div class="form-group">
								<input type="submit" name="formRDV"  class="btn btn-info btn-lg" value="valider">
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>

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