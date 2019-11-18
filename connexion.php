<?php
/*Créer des comptes phpmyadmin pour chacun des profils et leur attribuer les droits
correspondant...*/
if($_SESSION['profil'] == 'root'){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', $_SESSION['profil'], '');
	}
	catch(Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
elseif($_SESSION['profil'] == 'Assistant'){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
elseif($_SESSION['profil'] == 'Technicien'){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
?>
