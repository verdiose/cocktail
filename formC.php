<?php
if (isset($_POST['bFoIn'])) {
	echo
	'<div id="naFoRe" class="formP" style="opacity: 1;">'
	.'<form action="#" method="POST">'
	.'<h4>Étape 3 / 3</h4>'
	.'<meter value=".99" optimum="1">3 / 3</meter>'
	.'<fieldset><legend>RECETTE</legend>'
	.'<label for="real">Réalisation</label>'
	.'<textarea name="real" id="realiz" wrap="hard" autofocus> ...</textarea>'
	.'</fieldset>'
	.'<input type="submit" value="O K" name="bFoRe" id="bFoRe" class="bSub">'
	.'</form>'
	.'</div>';
}
	?>
