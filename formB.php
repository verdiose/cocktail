<?php
if (isset($_POST['bFoOr'])) {

	echo
	'<div id="naFoIn" class="formP" style="opacity:1;">'
	.'<form action="#" method="POST">'
	.'<h4>Étape 2 / 3</h4>'
	.'<meter value=".66" optimum="1">2 / 3</meter>'
	.'<fieldset><legend>INGRÉDIENTS</legend>';
	for ($i=1; $i <=$_POST['nbIn'] ; $i++) {
		echo
	'<label for="nbI">Ingrédient N°'.$i.'</label>'
	.'<input type="text" id="nbI" name="ing'.$i.'">';
	}
	echo '</fieldset>';

	if ($_POST['nbAg']!="0") {
		echo '<fieldset><legend>AGRÉMENTS</legend>';
		for ($j=1; $j <=$_POST['nbAg'] ; $j++) {
			echo
			'<label for="nbA">Agrément N°'.$j.'</label>'
			.'<input type="text" id="nbA" name="agr'.$j.'">';
		}
		echo '</fieldset>';
	}
	echo
	'<button value="N E X T" name="bFoIn" id="bFoIn" class="bSub">'
	.'N E X T</button>'
	.'</form>'
	.'</div>';
}
	?>
