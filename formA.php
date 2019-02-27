<?php
$step=".33";

	echo
	'<meter value="'.$step.'" optimum="1">'.$step.'</meter>'
	.'<form action="" target="_top" method="POST">'
	.'<cite>Étape 1 / 3</cite>'
	.'<mark>Création d\'une nouvelle recette</mark>'
	.'<input type="text" name="intit" value="'
		.ucwords($_POST['denom']).' " disabled="disabled"> '

	.'<fieldset><legend>ORIGINE</legend>'
		.'<label for="crea">Créateur</label>'
			.'<input type="text" name="crea" autofocus> '
		.'<label for="land">Pays</label>'
			.'<input type="text" name="land"> '
		.'<label for="year">Année</label>'
			.'<input type="text" name="year"></fieldset>'

	.'<fieldset><legend>Composition</legend>'
		.'<label for="nbI">Nombre d\'ingrédient</label>'
			.'<select id="nbI" name="nbIn">';
				for ($i=1; $i <11 ; $i++) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			echo
			'</select>'
		.'<label for="nbA">Nombre d\'agrément</label>'
			.'<select id="nbA" name="nbAg">';
			for ($j=1; $j <11 ; $j++) {
				echo '<option value="'.$j.'">'.$j.'</option>';
			}
			echo
			'</select></fieldset>'
			.'<label for="real">Réalisation</label>'
			.'<textarea id="real" name="realiz">'
		.'<input type="submit" value="N E X T" name="formA">'
	.'</form>';

	?>
