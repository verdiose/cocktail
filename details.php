<?php

	echo "<table><caption>{$target[0]['intit']}</caption>"
	."<tr><td>{$target[0]['annee']}</td>"
	."<td>{$target[0]['pays']}</td>"
	."<td>{$target[0]['createur']}</td></tr>";

	$lenT= count($target);
	for ($i=0; $i < $lenT; $i++) {
		echo "<tr><td>".$target[$i]["lib"]."</td>";
		echo "<td>".$target[$i]["quantI"]."</td>";
		echo "<td>".$target[$i]["denom"]."</td></tr>";
	}
	echo "</table><q>{$target[0]['realiz']}</q>";

	?>
