<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

include_once 'classes/database.php';
include_once 'classes/flats.php';

$database = new Database();
$db = $database->getConnection();


$flats = new Flats($db);

$flats->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $flats->read();

if($result->num_rows > 0){
    $flatRecords=array();
    $flatRecords["flats"]=array();
    
    while ($flat = $result->fetch_assoc()) {
        extract($flat);
        $flatDetails=array(
        "Id" => $Id,
        "DataDodania" => $DataDodania,
        "Region" => $Region,
        "IloscPokoi" => $IloscPokoi,
        "Ulica" => $Ulica,
        "Metraz" => $Metraz,
        "Model" => $Model,
        "RokBudowy" => $RokBudowy,
        "Cena" => $Cena,
        "StopaProcentowa" => $StopaProcentowa
        );
        array_push($flatRecords["flats"], $flatDetails);
    }
    http_response_code(200);
    echo json_encode($flatRecords);
}
else{
    http_response_code(404);
    echo json_encode(
    array("message" => "No item found.")
    );
}
?>