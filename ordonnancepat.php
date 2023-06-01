<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lecture des antécédents</title>
  <link rel="stylesheet" href="antecedentpat.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
    }

    #history {
      width: 400px;
      height: 200px;
      padding: 5px;
      resize: none;
    }

    #display-btn {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Vos antécédents</h1>
    <table id="tableau" >
						<tr>
							
							<th scope="col">Ordonnance</th>
							<th scope="col">Date</th>
							<th scope="col">Heure</th>
                            <th scope="col">Action</th>
				<!--<th scope="col">Medecin traitant</th>
					<th scope="col">Antécédents médicaux</th>-->
				</tr>


        <?php
        session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "totoc";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
if(isset($_SESSION['id'])){
    $sql = "SELECT * FROM ordonnances WHERE iduser = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['id']);
    $stmt->execute();
    
    $ordonnances = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($ordonnances as $ordo) {
      echo "<tr>";
      echo "<td style='color: white;' id='UsageMe'>"; 
        
        $antecedentList = explode(",", $ordo['ordonnance']);
      
        foreach ($antecedentList as $word) {
            echo $word . "<br>";
        }
        
        echo "</td>";
        
        $dateAjout = strtotime($ordo['date_ajout']);
        $date = date("Y-m-d", $dateAjout);
        $heure = date("H:i:s", $dateAjout);
      
        echo "<td style='color: white;'>". $date . "</td>";
        echo "<td style='color: white;'>". $heure . "</td>";
    
      
        echo "</tr>";
    }
  
    
}




?>
        </table> 
        <br>
    <a href="./pat.php"><button>Retour</button></a>

  </div>
  

    <script>

    document.getElementById('display-btn').addEventListener('click', function() {
      var history = document.getElementById('history').value;
      alert(history);
    });
  </script>
</body>
</html>
