<?php

	function printCoffee($coffees,$start, $end){

		$headers = [
	        'ID', 'Species', 'Owner', 'Country of Origin', 'Region', 'Producer',
	        'Harvest Year', 'Grading Date', 'Processing Method', 'Aroma', 'Flavor',
	        'Aftertaste', 'Acidity', 'Body', 'Balance', 'Uniformity', 'Clean Cup',
	        'Sweetness', 'Cupper Points', 'Total Cup Points', 'Moisture', 'Color',
	        'Certification', 'Altitude Meters'
    	];

    	echo '<table>';
    	echo '<tr>';

	    foreach ($headers as $header) {
	        echo '<th>' . $header . '</th>';
	    }

	    echo '</tr>';
		
		for ($i = $start; $i < $end; $i++) {
	        $coffee = $coffees[$i];
	        echo '<tr>';
	        echo '<td>' . $coffee->getId() . '</td>';
	        echo '<td>' . $coffee->getSpecies() . '</td>';
	        echo '<td>' . $coffee->getOwner() . '</td>';
	        echo '<td>' . $coffee->getCountryOfOrigin() . '</td>';
	        echo '<td>' . $coffee->getRegion() . '</td>';
	        echo '<td>' . $coffee->getProducer() . '</td>';
	        echo '<td>' . $coffee->getHarvestYear() . '</td>';
	        echo '<td>' . $coffee->getGradingDate() . '</td>';
	        echo '<td>' . $coffee->getProcessingMethod() . '</td>';
	        echo '<td>' . $coffee->getAroma() . '</td>';
	        echo '<td>' . $coffee->getFlavor() . '</td>';
	        echo '<td>' . $coffee->getAfterTaste() . '</td>';
	        echo '<td>' . $coffee->getAcidity() . '</td>';
	        echo '<td>' . $coffee->getBody() . '</td>';
	        echo '<td>' . $coffee->getBalance() . '</td>';
	        echo '<td>' . $coffee->getUniformity() . '</td>';
	        echo '<td>' . $coffee->getCleanCup() . '</td>';
	        echo '<td>' . $coffee->getSweetness() . '</td>';
	        echo '<td>' . $coffee->getCupperPoints() . '</td>';
	        echo '<td>' . $coffee->getTotalCupPoints() . '</td>';
	        echo '<td>' . $coffee->getMoisture() . '</td>';
	        echo '<td>' . $coffee->getColor() . '</td>';
	        echo '<td>' . $coffee->getCertification() . '</td>';
	        echo '<td>' . $coffee->getAltitudeMeters() . '</td>';
	        echo '</tr>';
   		}

    	echo '</table>';

	}
?>