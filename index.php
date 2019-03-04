<?php

// ___ Données de connexion BDD __ & __ Implémentation des fichiers ___
$dsn='mysql:dbname=breuvage;host=127.0.0.1';
$user='root';
$password='';

function bourreMoiCa($classe)	{
	require $classe.'.php';
}
spl_autoload_register('bourreMoiCa');
session_start();

// ___ Connexion BDD ___
try {
	$connexion = new PDO($dsn, $user, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}	catch (\Exception $e)	{
  echo $e->getMessage();
}
$com = new Commandator($connexion);


$liRe = $com->liRe();		//Liste de Recette
$liOr = $com->liOr();		//Liste des Origines
$liIn = $com->liIn();		//Liste des Ingredients
$total = $com->count();	// Nombre de cocktails en BDD
$nav;
$logC = (empty($_SESSION['admin'])) ? '#133F79' : '#4AFF6E';
$log = (!$_SESSION) ? 'USER' : 'ADMIN';

// ___CONDITIONS ADMIN ___
if (!isset($_POST))	{
	$_SESSION['admin'] = false;
}	elseif (isset($_POST['code']))	{
	$com->login($_POST['code']);
}

// ___ New or Check __ RECETTE ___
if (isset($_POST['intit']))	{	 // Si un libellé de recette est envoyé
	// On crée un Objet RECETTE
	$neoC = new Recette(['intit' => ucwords(strtolower($_POST['denom']))]);
	if (isset($_POST['neo']))	{	// ...avec le bouton 'NEW'
		if ($com->dasBin($neoC->intit()))	{
				$message = 'Cette recette existe déjà.';
				unset($neoC);
		}	else	{
			$com->add($neoC);	}

	}	elseif (isset($_POST['ret']))	{	// ...avec le bouton 'FIND'
		if (!$neoC->valide())	{
			$message = 'Pas de recette '.$_POST['denom'];
			unset($neoC);
		}
	}
}
if (isset($_GET['info']))	{
	$target = $com->details($_GET['info']);
}	else {
	$target="";}

// __ GESTION  _  des  _  AFFICHAGES  __

include('screen.html');
if (isset($_POST['bNeo'])) {
	switchNav("naFoOr");
}	elseif (isset($_POST['bFoOr'])) {
	switchNav("naFoIn");
}	elseif (isset($_POST['bFoIn'])) {
	switchNav("naFoRe");
}	elseif (isset($_POST['bFoRe']) || !isset($_POST)) {
	switchNav("naLiRe");
}
