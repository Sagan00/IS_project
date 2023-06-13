<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

include_once 'classes/database.php';
include_once 'classes/coffees.php';

$database = new Database();
$db = $database->getConnection();


$coffees = new Coffees($db);

$coffees->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $coffees->read();

if($result->num_rows > 0){
    $coffeeRecords=array();
    $coffeeRecords["coffees"]=array();
    
    while ($coffee = $result->fetch_assoc()) {
        extract($coffee);
        $coffeeDetails=array(
        "ID" => $ID,
        "Species" => $Species,
        "Owner" => $Owner,
        "Country_of_Origin" => $Country_of_Origin,
        "Region" => $Region,
        "Producer" => $Producer,
        "Haravest_Year" => $Haravest_Year,
        "Grading_Date" => $Grading_Date,
        "Processing_Method" => $Processing_Method,
        "Aroma" => $Aroma,
        "Flavor" => $Flavor,
        "Aftertaste" => $Aftertaste,
        "Acidity" => $Acidity,
        "Body" => $Body,
        "Balance" => $Balance,
        "Uniformity" => $Uniformity,
        "Clean_Cup" => $Clean_Cup,
        "Sweetnes" => $Sweetnes,
        "Cupper_Points" => $Cupper_Points,
        "Total_Cup_Points" => $Total_Cup_Points,
        "Moisture" => $Moisture,
        "Color" => $Color,
        "Certification" => $Certification,
        "Altitude_Meters" => $Altitude_Meters
        );
        array_push($coffeeRecords["coffees"], $coffeeDetails);
    }
    http_response_code(200);
    echo json_encode($coffeeRecords);
}
else{
    http_response_code(404);
    echo json_encode(
    array("message" => "No item found.")
    );
}
?>