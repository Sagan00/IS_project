<?php

	function printFlat($flats, $start, $end){

		$headers = [
	        'Id', 'DataDodania', 'Region', 'IloscPokoi', 'Ulica', 'Metraz',
	        'Model', 'RokBudowy', 'Cena', 'StopaProcentowa'
    	];

    	echo '<table>';
    	echo '<tr>';

	    foreach ($headers as $header) {
	        echo '<th>' . $header . '</th>';
	    }

	    echo '</tr>';
		
		for ($i = $start; $i < $end; $i++) {
	        $flat = $flats[$i];
	        echo '<tr>';
	        echo '<td>' . $flat->getId() . '</td>';
	        echo '<td>' . $flat->getDataDodania() . '</td>';
	        echo '<td>' . $flat->getRegion() . '</td>';
	        echo '<td>' . $flat->getIloscPokoi() . '</td>';
	        echo '<td>' . $flat->getUlica() . '</td>';
	        echo '<td>' . $flat->getMetraz() . '</td>';
	        echo '<td>' . $flat->getModel() . '</td>';
	        echo '<td>' . $flat->getRokBudowy() . '</td>';
	        echo '<td>' . $flat->getCena() . '</td>';
	        echo '<td>' . $flat->getStopaProcentowa() . '</td>';
	        echo '</tr>';
   		}

    	echo '</table>';

	}
?>