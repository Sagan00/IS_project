<?php
	ini_set('memory_limit', '400M');
	require_once("./classes/newFlat.php");
	$flats = array();
	// Create connection
	require_once ('./classes/database.php');
	$database = new Database();
	$conn = $database->getConnection();
	// Check connection
	$conn->begin_transaction();

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = 
		"SELECT
			m.Id,
			m.DataDodania,
			r.NazwaRegionu AS Region,
			p.IloscPokoi,
			m.Ulica,
			m.Metraz,
			mo.NazwaModelu AS Model,
			m.RokBudowy,
			m.Cena,
			m.StopaProcentowa
		FROM
			mieszkania m
			LEFT JOIN modele mo ON m.Model = mo.IdModel
			LEFT JOIN regiony r ON m.Region = r.IdRegion
			LEFT JOIN pokoje p ON m.IloscPokoi = p.IdPokoje";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$flat = FlatFactory::createFlatFromDatabaseRow($row);
			$flats[] = $flat;
		}
	} else {
		echo "0 results";
	}
	$conn->commit();
	$conn->close();

	// Save flats as JSON
	function saveFlatsAsJSON($flats, $amount, $filePath){
		$flatDataJSON = array();
		for ($i = 0; $i < $amount; $i++) {
			$flat = $flats[$i];
			$flatDataJSON[] = array(
				'id' => $flat->getId(),
				'dataDodania' => $flat->getDataDodania(),
				'region' => $flat->getRegion(),
				'iloscPokoi' => $flat->getIloscPokoi(),
				'ulica' => $flat->getUlica(),
				'metraz' => $flat->getMetraz(),
				'model' => $flat->getModel(),
				'rokBudowy' => $flat->getRokBudowy(),
				'cena' => $flat->getCena(),
				'stopaProcentowa' => $flat->getStopaProcentowa(),
			);
		}

		$jsonString = json_encode($flatDataJSON);
		
		file_put_contents($filePath, $jsonString);
	}

	// Save flats as XML
	function saveFlatsAsXml($flats, $amount, $filePath){
		$xml = new SimpleXMLElement('<flats></flats>');
		for ($i = 0; $i < $amount; $i++) {
			$flat = $flats[$i];
			$flatXml = $xml->addChild('flat');
			#$flatXml->addChild('Id', htmlspecialchars($flat->getId()));
			$flatXml->addChild('DataDodania', htmlspecialchars($flat->getDataDodania()));
			$flatXml->addChild('Region', htmlspecialchars($flat->getRegion()));
			$flatXml->addChild('IloscPokoi', htmlspecialchars($flat->getIloscPokoi()));
			$flatXml->addChild('Ulica', htmlspecialchars($flat->getUlica()));
			$flatXml->addChild('Metraz', htmlspecialchars($flat->getMetraz()));
			$flatXml->addChild('Model', htmlspecialchars($flat->getModel()));
			$flatXml->addChild('RokBudowy', htmlspecialchars($flat->getRokBudowy()));
			$flatXml->addChild('Cena', htmlspecialchars($flat->getCena()));
			$flatXml->addChild('StopaProcentowa', htmlspecialchars($flat->getStopaProcentowa()));
		}
		
		$xml->asXML($filePath);
	}
?>