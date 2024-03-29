<?php
session_start();
$_SESSION = array(); //Réinitialise les variables de sessions

//Connexion
if(!empty($_POST['Matricule']) && !empty($_POST['pw'])){
  $bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');

  //Préparation de toutes les requêtes nécessaires
  //$reqProfil = $bdd->prepare("SELECT Matricule FROM technicien WHERE Matricule = ?") or $reqProfil = $bdd->prepare("SELECT Matricule FROM assistanttel WHERE Matricule = ?") ;
  $reqLogin = $bdd->prepare("SELECT Matricule FROM employe WHERE Matricule = ? AND mdp=?");
  $matricule=$_POST['Matricule'];
  $mdp=$_POST['pw'];
  //Execution des requêtes

  $reqLogin->execute(array($matricule, $mdp));
  $datas = $reqLogin->fetchall();

  if($reqLogin->rowCount() > 0){
    $reqAssistant = $bdd->prepare('SELECT Count(*) FROM assistanttel WHERE Matricule=?');
    $reqAssistant->execute(array($matricule));
    $result = $reqAssistant->fetchall();

    if($result[0][0] > 0){
      $_SESSION['Matricule'] = $matricule;
      header('Location: pageAssistant.php');
    }

    else{
      $_SESSION['Matricule'] = $matricule;
      header('Location: pageTechnicien.php');
    }
  }
  else{
    echo 'Données eronnées';
  }
}

  /*

  if($reqLogin->execute(array($matricule,$mdp))){
    $datas = $reqLogin->fetchall();
    $mat = $datas[0]['Matricule'];
    $reqAssistant=$bdd->prepare("SELECT Matricule FROM assistanttel");
    $reqAssistant->execute();
    $reqTechnicien=$bdd->prepare("SELECT Matricule FROM technicien");
    $reqTechnicien->execute();
    while ($matricule!=$mat) {
      $resultat = $reqTechnicien->fetchall(PDO::FETCH_COLUMN,4)[0]['Matricule'];
      var_dump($resultat);
      $resultatAssistant= $reqAssistant->fetchall(PDO::FETCH_COLUMN,1)[0]['Matricule'];
      var_dump($resultatAssistant);
    }

    $_SESSION['Matricule'] = $mat;
    */
    //Redirection
    /*if ($_SESSION['Matricule']==$resultatAssistant) {
      header('Location: pageAssistant.php');
    }
    elseif ($_SESSION['Matricule']==$resultat) {
      header('Location: pageTechnicien.php');
    }
  }
    else{
      echo "Nom d'utilisateur ou mot de passe incorrect!";
    }*/
  //}
  //$reqProfil->execute(array($matricule));



  //Requete donnant le nombre de ligne avec le login dans la bdd
  //$reqNbProfil = $reqLogin->rowCount();

  //if($reqNbProfil == 1){
    //$valProfil = $reqProfil->fetchall()[0][0];

    //Stockage des données dans des variables de sessions pour les utiliser dans d'autres pages
//}
 ?>

 <html>
 <head>
 <link type="text/css" rel="stylesheet" href="pageConnexion.css">
 <meta charset="utf-8">
 <title>CashCash</title>
</head>
<body>
  <div class="container">
    <h1 class="my-4">Connectez-vous ci-dessous</h1>
  </div>
  <center>
<form class ="choix2" method="post" action="">

<!--  <select name="choix">
   <option>Invité</option>
   <option>Root</option>
   <option>Informaticien</option>
  </select>-->

    <input type="text" name="Matricule" placeholder="Entrer votre login"/>
    <input type="password" name="pw" placeholder="Entrer votre mot de passe ici" id="Utilisateur :" size="25" [b]style="width:400px;"[/b]/>
    <input type="submit" name="btn" value="Se connecter"/>
  </center>
</body>
 </html>
