<?php
/*Créer des comptes phpmyadmin pour chacun des profils et leur attribuer les droits
correspondant...*/
if($_SESSION['Matricule'] == 'root'){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', $_SESSION['Matricule'], '');
	}
	catch(Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
elseif($_SESSION['Matricule'] == "SELECT Matricule From assistanttel"){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
elseif($_SESSION['Matricule'] == "SELECT Matricule From technicien"){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe-CashCash;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
?>
