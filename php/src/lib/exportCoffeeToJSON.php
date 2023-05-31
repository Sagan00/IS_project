<?php
function saveCoffeesAsJSON($coffees, $amount, $filePath){
    $coffeeDataJSON = array();
    for ($i = 0; $i < $amount; $i++) {
    	$coffee = $coffees[$i];
    	$coffeeDataJSON[] = array(
			'id' => $coffee->getId(),
	        'species' => $coffee->getSpecies(),
	        'owner' => $coffee->getOwner(),
	        'countryOfOrigin' => $coffee->getCountryOfOrigin(),
	        'region' => $coffee->getRegion(),
	        'producer' => $coffee->getProducer(),
	        'harvestYear' => $coffee->getHarvestYear(),
	        'gradingDate' => $coffee->getGradingDate(),
	        'processingMethod' => $coffee->getProcessingMethod(),
	        'aroma' => $coffee->getAroma(),
	        'flavor' => $coffee->getFlavor(),
	        'aftertaste' => $coffee->getAfterTaste(),
	        'acidity' => $coffee->getAcidity(),
	        'body' => $coffee->getBody(),
	        'balance' => $coffee->getBalance(),
	        'uniformity' => $coffee->getUniformity(),
	        'cleanCup' => $coffee->getCleanCup(),
	        'sweetness' => $coffee->getSweetness(),
	        'cupperPoints' => $coffee->getCupperPoints(),
	        'totalCupPoints' => $coffee->getTotalCupPoints(),
	        'moisture' => $coffee->getMoisture(),
	        'color' => $coffee->getColor(),
	        'certification' => $coffee->getCertification(),
	        'altitudeMeters' => $coffee->getAltitudeMeters()
    	);
    }

    $jsonString = json_encode($coffeeDataJSON);
    
    file_put_contents($filePath, $jsonString);
}
?>
