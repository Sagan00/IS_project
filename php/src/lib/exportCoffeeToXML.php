<?php
function saveCoffeesAsXml($coffees, $amount, $filePath){
    $xml = new SimpleXMLElement('<coffees></coffees>');
    //$i = 0 -> $i = $start
    for ($i = 0; $i < $amount; $i++) {
    	$coffee = $coffees[$i];
        $coffeeXml = $xml->addChild('coffee');
        #$coffeeXml->addChild('ID', htmlspecialchars($coffee->getId()));
        $coffeeXml->addChild('Species', htmlspecialchars($coffee->getSpecies()));
        $coffeeXml->addChild('Owner', htmlspecialchars($coffee->getOwner()));
        $coffeeXml->addChild('Country_of_Origin', htmlspecialchars($coffee->getCountryOfOrigin()));
        $coffeeXml->addChild('Region', htmlspecialchars($coffee->getRegion()));
        $coffeeXml->addChild('Producer', htmlspecialchars($coffee->getProducer()));
        $coffeeXml->addChild('Harvest_Year', htmlspecialchars($coffee->getHarvestYear()));
        $coffeeXml->addChild('Grading_Date', htmlspecialchars($coffee->getGradingDate()));
        $coffeeXml->addChild('Processing_Method', htmlspecialchars($coffee->getProcessingMethod()));
        $coffeeXml->addChild('Aroma', htmlspecialchars($coffee->getAroma()));
        $coffeeXml->addChild('Flavor', htmlspecialchars($coffee->getFlavor()));
        $coffeeXml->addChild('Aftertaste', htmlspecialchars($coffee->getAfterTaste()));
        $coffeeXml->addChild('Acidity', htmlspecialchars($coffee->getAcidity()));
        $coffeeXml->addChild('Body', htmlspecialchars($coffee->getBody()));
        $coffeeXml->addChild('Balance', htmlspecialchars($coffee->getBalance()));
        $coffeeXml->addChild('Uniformity', htmlspecialchars($coffee->getUniformity()));
        $coffeeXml->addChild('Clean_Cup', htmlspecialchars($coffee->getCleanCup()));
        $coffeeXml->addChild('Sweetness', htmlspecialchars($coffee->getSweetness()));
        $coffeeXml->addChild('Cupper_Points', htmlspecialchars($coffee->getCupperPoints()));
        $coffeeXml->addChild('Total_Cup_Points', htmlspecialchars($coffee->getTotalCupPoints()));
        $coffeeXml->addChild('Moisture', htmlspecialchars($coffee->getMoisture()));
        $coffeeXml->addChild('Color', htmlspecialchars($coffee->getColor()));
        $coffeeXml->addChild('Certification', htmlspecialchars($coffee->getCertification()));
        $coffeeXml->addChild('Altitude_Meters', htmlspecialchars($coffee->getAltitudeMeters()));
    }
    
    $xml->asXML($filePath);
}
?>
