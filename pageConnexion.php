<<?php
session_start();
$_SESSION = []; //Réinitialise les variables de sessions

//Connexion
if(!empty($_POST['login']) && !empty($_POST['pw'])){
  $bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');

  //Préparation de toutes les requêtes nécessaires
  $reqProfil = $bdd->prepare("SELECT profil FROM utilisateur WHERE login = ?");
  $reqLogin = $bdd->prepare("SELECT login FROM utilisateur WHERE login = ?");

  //Execution des requêtes
  $reqLogin->execute(array($_POST['login']));
  $reqProfil->execute(array($_POST['login']));

  /*
  $temp = $reqLogin->fetchall();
  var_dump($temp);
  */

  //Requete donnant le nombre de ligne avec le login dans la bdd
  $reqNbProfil = $reqLogin->rowCount();

  if($reqNbProfil == 1){
    $valProfil = $reqProfil->fetchall()[0][0];

    //Stockage des données dans des variables de sessions pour les utiliser dans d'autres pages
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['profil'] = $valProfil;

    //Redirection
    if ($_SESSION['profil']=="Assistant") {
      header('Location: pageAssistant.html');
    }
    elseif ($_SESSION['profil']=="Technicien") {
      header('Location: pageTechnicien.php');
    }
  }
  else{
    echo "Nom d'utilisateur ou mot de passe incorrect!";
  }
}
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

    <input type="text" name="login" placeholder="Entrer votre login"/>
    <input type="password" name="pw" placeholder="Entrer votre mot de passe ici" id="Utilisateur :" size="25" [b]style="width:400px;"[/b]/>
    <input type="submit" name="btn" value="Se connecter"/>
  </center>
</body>
 </html>
