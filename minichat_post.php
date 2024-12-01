<?php
session_start();
$pseudo = $_SESSION['pseudo'];
try{
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}
if (!trim($_POST['message'])==""){ //On vérifie si le message n'est pas vide
	$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo,:message)');
	$req->execute(array(
	'pseudo' => $pseudo,
	'message' => $_POST['message'],
	));
}

header('Location: minichat.php');
?>