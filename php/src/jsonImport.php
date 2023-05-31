<?php
require_once("./lib/getMappingCoffee.php");
$conn = new mysqli($host, $user, $pass, $mydatabase);
// Check connection

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$dir = "jsonFiles";
$filename = "coffees.json";
$path = "./{$dir}/{$filename}";

if(!file_exists($path)){
	echo "There is no file named {$filename} in directory {$dir}<br>";
}else{
	//get data from file .json
	$jsonString = file_get_contents($path);
	//convert to associative array:
	$coffeeData = json_decode($jsonString, true);

	foreach ($coffeeData as $coffee) {
		$stmt = $conn->prepare("INSERT INTO kawy (Species, Owner, Country_of_Origin, Region, Producer, Haravest_Year, Grading_Date, Processing_Method, Aroma, Flavor, Aftertaste, Acidity, Body, Balance, Uniformity, Clean_Cup, Sweetnes, Cupper_Points, Total_Cup_Points, Moisture, Color, Certification, Altitude_Meters)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	    $stmt->bind_param("iiissssissssssssssssiss", 
	        $speciesMapping["{$coffee['species']}"], 
	        $ownersMapping["{$coffee['owner']}"], 
	        $countriesMapping["{$coffee['countryOfOrigin']}"], 
	        $coffee['region'], 
	        $coffee['producer'], 
	        $coffee['harvestYear'], 
	        $coffee['gradingDate'], 
	        $methodsMapping["{$coffee['processingMethod']}"], 
	        $coffee['aroma'], 
	        $coffee['flavor'], 
	        $coffee['aftertaste'], 
	        $coffee['acidity'], 
	        $coffee['body'], 
	        $coffee['balance'], 
	        $coffee['uniformity'], 
	        $coffee['cleanCup'], 
	        $coffee['sweetness'], 
	        $coffee['cupperPoints'], 
	        $coffee['totalCupPoints'], 
	        $coffee['moisture'], 
	        $colorsMapping["{$coffee['color']}"], 
	        $coffee['certification'], 
	        $coffee['altitudeMeters']
	    );

	    $stmt->execute();
	    $stmt->close();
	}
	echo "Data from JSON has been inserted into db correctly.<br>";
}
echo '<a href="index.php">
			<input type="submit" value="Back to main page"/>
		</a><br>';
?>
