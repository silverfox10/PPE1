<html lang="fr" dir="ltr">
  <head>
    <link type="text/css" rel="stylesheet" href="pageAssistant.css">
    <meta charset="utf-8">
    <title>CashCash - Page assistant</title>
  </head>
  <body>

                <?php
                session_start();
                $_SESSION = []; //Réinitialise les variables de sessions

                //Connexion
                try {
                  $bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');
                  echo("Connexion à la base de données : OK");
                }
                catch(PDOException $e){
                    die('Erreur : '.$e->getMessage());
                }

                if(isset($_POST['numclient'])){
                  $reqRechercher = $bdd->prepare("SELECT * FROM client WHERE NumeroClient = ?");
                  $reqRechercher->execute(array($_POST['numclient']))


                ?>




    <hr>
    <br/><br/><br/><br/><br/>

    <h1>Rechercher fiche client</h1>
    <br/>
    <p class="coordonnees">


      <form class = "center" action="pageAssistant.php" method="post">
    <input type="text" name="numclient" placeholder="Numero du client" id="Utilisateur :" size="25" [b]style="width:400px;"[/b]>
    <input type="submit" name="btn" value="Rechercher">
      </form>

      <table>
        <tr>
          <td>Numéro Client</td>
          <td>Raison Sociale</td>
          <td>Siren</td>
          <td>CodeAPE</td>
          <td>Adresse</td>
          <td>Téléphone client</td>
          <td>Fax client</td>
          <td>Email</td>
          <td>Durée Déplacement</td>
          <td>Distance (km)</td>
          <td>Numero Agence</td>
        </tr>

<?php while($affiche = $reqRechercher->fetch()){

?>


        <tr>
          <td><?php echo $affiche['NumeroClient']; ?></td>
          <td><?php echo $affiche['RaisonSociale']; ?></td>
          <td><?php echo $affiche['Siren']; ?></td>
          <td><?php echo $affiche['CodeAPE']; ?></td>
          <td><?php echo $affiche['Adresse']; ?></td>
          <td><?php echo $affiche['TelClient']; ?></td>
          <td><?php echo $affiche['FaxClient']; ?></td>
          <td><?php echo $affiche['Email']; ?></td>
          <td><?php echo $affiche['DureeDeplacement']; ?></td>
          <td><?php echo $affiche['DistanceKM']; ?></td>
          <td><?php echo $affiche['NumeroAgence']; ?></td>

        </tr>


      </table>

      <?php
      }
    }
      ?>

    </p>

    <!--Fin du RechercherClient-->

    <br/><br/><br/><br/>

    <!--début du AffecterVisiter-->

    <h1>Affecter une visite</h1>
    <form class ="choix2",method="post" action="">
      <p class="affecter">


        <form method="post" action="">
        		<select name="NomEmploye">

        			<?php


                $reqNomEmploye = $bdd->prepare('SELECT NomEmploye FROM employe');
                $reqNomEmploye->execute();
                $NomEmploye = $reqNomEmploye->fetchall();

                $nbLignesT = $reqNomEmploye->rowCount();

        			for($i = 0; $i<$nbLignesT; $i++){ ?>
        				<option><?php echo $NomEmploye[$i][0]; ?></option>
        			<?php
        			} ?>

<!--
            <select name="choix_agence">
              <option>Choix agence</option>
              <option>Lille</option>
              <option>Lens</option>
              <option>Paris</option>
            </select>

            <select name="choix_technicien">
              <option>Choix technicien</option>
              <option>Tech1</option>
              <option>Tech2</option>
              <option>Tech3</option>
            </select>
-->

  <input type="submit" name="btn_Affecter" value="Affecter">



</p>
<br/><br/>
<!--Fin du AffecterVisiter-->

<!--début du GenererFiche-->
<p class="center">
<input type="submit" name="generer_fiche" value="Générer une fiche d'intervention">
</p>
<br/><br/><br/><br/><br/><br/>

<h1>Consulter intervention</h1>
<p class = "center">
<input type="date" name="date">
<select name="choix_technicien">
  <option>Choix technicien</option>
  <option>Tech1</option>
  <option>Tech2</option>
  <option>Tech3</option>
</select>
<input type="submit" name="rechercher_intervention" value="Rechercher">
<p/>
  </body>
</html>
