<?php 
require_once("./lib/getMappingCoffee.php");
include_once './classes/database.php';
    $database = new Database();
    $conn = $database->getConnection();
// Check connection

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$dir = "xmlFiles";
$filename = "coffees.xml";
$path = "./{$dir}/{$filename}";

$conn->begin_transaction();
if(!file_exists($path)){
	echo "There is no file named {$filename} in directory {$dir}<br>";
}else{
	$xml = simplexml_load_file($path);	
	foreach ($xml->coffee as $coffee) {

	    $stmt = $conn->prepare("INSERT INTO kawy (Species, Owner, Country_of_Origin, Region, Producer, Haravest_Year, Grading_Date, Processing_Method, Aroma, Flavor, Aftertaste, Acidity, Body, Balance, Uniformity, Clean_Cup, Sweetnes, Cupper_Points, Total_Cup_Points, Moisture, Color, Certification, Altitude_Meters)
	            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	    $stmt->bind_param("iiissssissssssssssssiss", 
	        $speciesMapping["$coffee->Species"], 
	        $ownersMapping["$coffee->Owner"], 
	        $countriesMapping["$coffee->Country_of_Origin"], 
	        $coffee->Region, 
	        $coffee->Producer, 
	        $coffee->Harvest_Year, 
	        $coffee->Grading_Date, 
	        $methodsMapping["$coffee->Processing_Method"], 
	        $coffee->Aroma, 
	        $coffee->Flavor, 
	        $coffee->Aftertaste, 
	        $coffee->Acidity, 
	        $coffee->Body, 
	        $coffee->Balance, 
	        $coffee->Uniformity, 
	        $coffee->Clean_Cup, 
	        $coffee->Sweetness, 
	        $coffee->Cupper_Points, 
	        $coffee->Total_Cup_Points, 
	        $coffee->Moisture, 
	        $colorsMapping["$coffee->Color"], 
	        $coffee->Certification, 
	        $coffee->Altitude_Meters
	    );

	    $stmt->execute();
	    $stmt->close();
	}
	$conn->commit();
	echo "Data from XML has been inserted into db correctly.<br>";
}
echo '<a href="index.php">
			<input type="submit" value="Back to main page"/>
		</a><br>';
?>