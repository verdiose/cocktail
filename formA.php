<?php
if (isset($_POST['bNeo']))	{
	echo
	'<div id="naFoOr" class="formP" style="opacity: 1;">'
	.'<mark>Création d\'une nouvelle recette</mark>'
	.'<form action="#" method="POST">'
	.'<h4>Étape 1 / 3</h4>'
	.'<meter value=".33" optimum="1">1 / 3</meter>'
	.'<input type="text" name="intit" value="'.ucwords($_POST['denom']).'" disabled="disabled">'

	.'<fieldset><legend>ORIGINE</legend>'
		.'<label for="crea">Créateur</label>'
			.'<input type="text" name="crea" autofocus> '
		.'<label for="land">Pays</label>'
			.'<input type="text" name="land"> '
		.'<label for="year">Année</label>'
			.'<input type="text" name="year"></fieldset>'

	.'<fieldset><legend>COMPOSITION</legend>'
		.'<label for="nbI">Nombre d\'ingrédient</label>'
			.'<select id="nbI" name="nbIn">';
				for ($i=1; $i <11 ; $i++) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			echo
			'</select>'
		.'<label for="nbA">Nombre d\'agrément</label>'
			.'<select id="nbA" name="nbAg">';
			for ($j=0; $j <10 ; $j++) {
				echo '<option value="'.$j.'">'.$j.'</option>';
			}
			echo
			'</select>'
			.'</fieldset>'
			.'<button value="N E X T" name="bFoOr" id="bFoOr" class="bSub">'
			.'N E X T</button>'
		.'</form>'
	.'</div>';
	}
	?>
