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
$_SESSION['admin'] = false;

// ___ Connexion BDD ___
try {
	$connexion = new PDO($dsn, $user, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}	catch (\Exception $e)	{
  echo $e->getMessage();
}
$com = new Commandator($connexion);

// ___CONDITIONS ADMIN ___


// ___ New or Check __ RECETTE ___
if (isset($_POST['denom']))	{	 // Si un libellé de recette est envoyé
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
// if (isset($_GET['info']))	{
// 	$target = $com->details($_GET['info']);
// }	else {
// 	$target="";}


$liRe = $com->liRe();		//Liste de Recette
$liOr = $com->liOr();		//Liste des Origines
$liIn = $com->liIn();		//Liste des Ingredients

?>

<!-- ___ S C R E E N ___ -->
<!DOCTYPE html>
<html>
<head>
	<title>Chef, 1 p'tit verre</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="cock.css">
</head>
<body>
	<!-- ___ ENTÊTE  ___ -->
	<div id="top">
		<?php
		if (isset($message))	{
			echo '<p><b style="font: 1.4em;">', $message, '</b></p>';
		}	?>
		<p><fieldset>Cocktails répertoriés  > <?= $com->count() ?>
		</fieldset></p>
	</div>

	<div id="body">
		<!-- ___ LISTE DES COCKTAILS ___ -->
	<div id="list">
		<?php
		if (empty($liRe))	{
			echo 'Pas de recette ___  :( ';
		}	else {
			foreach ($liRe as $value)	{
				echo '<a href="?info='.$value->idR().'">'.htmlentities($value->intit()). '</a></br>';
			}
		}	?>
	</div>

	<!-- ___Zone de recherche___ -->
	<div id="search" class="bosear">
		<form action="" method="post">
			<p id="formS">
				<label for="denom">dénomination</label>
					<input type="text" name="denom" id="denom"
					placeholder="__Intitulé"/></br>
					<select id="ingr" name="ingr">
						<option value="">- ingrédient -</option>
						<?php
						foreach($liIn as $ingre) {
							echo '<option value="'.$ingre->lib().'">'.$ingre->lib().'</option>';	}	?>
					</select>
					<select id="ori" name="ori">
						<option value="">- origine -</option>
						<?php
						foreach($liOr as $ori) {
							echo '<option value="'.$ori->pays().'">'.$ori->pays().'</option>';	}	?>
					</select></br>
			<input type="submit" value=" N E W " name="neo" />
			<input type="submit" value=" FIND " name="ret" />

		</p>
	</form>
	</div>

	<!-- ___Zone de RÉSULTAT___ -->

	<div id="propo">
		<div class="cadre">
		<article>
			<?php
			if (isset($_POST['neo'])) {
				include('formA.php');
			}	elseif (isset($_POST['formA'])) {
				include('formB.php');
			}	elseif (isset($_GET['info'])) {
				$target = $com->details($_GET['info']);
				include('details.php');
			}
			?>

		</article></div>
	</div></div>
</body>
</html>
