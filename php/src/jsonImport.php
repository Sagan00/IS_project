<?php
require_once("./lib/getMappingFlats.php");
include_once './classes/database.php';
$database = new Database();
$conn = $database->getConnection();
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$dir = "files";
$filename = "flats.json";
$path = "./{$dir}/{$filename}";

if (!file_exists($path)) {
    echo "There is no file named {$filename} in directory {$dir}<br>";
} else {
    // Get data from JSON file
    $jsonString = file_get_contents($path);
    // Convert to associative array
    $flatData = json_decode($jsonString, true);

    // Set isolation level to READ UNCOMMITTED
    $conn->query("SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED");

    // Start transaction
    $conn->begin_transaction();

    foreach ($flatData as $flat) {
        $stmt = $conn->prepare("INSERT INTO mieszkania (DataDodania, Region, IloscPokoi, Ulica, Metraz, Model, RokBudowy, Cena, StopaProcentowa)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("siisiiiid",
            $flat['dataDodania'],
            $regionsMapping["{$flat['region']}"],
            $iloscPokoiMapping["{$flat['iloscPokoi']}"],
            $flat['ulica'],
            $flat['metraz'],
            $modelsMapping["{$flat['model']}"],
            $flat['rokBudowy'],
            $flat['cena'],
            $flat['stopaProcentowa']
        );

        $stmt->execute();
        $stmt->close();
    }

    // Commit the transaction
    $conn->commit();

    echo "Dane z pliku JSON zostały poprawnie wstawione do bazy danych.<br>";
}

echo '<a href="index.php">
        <input type="submit" value="Powrót do strony głównej"/>
    </a><br>';
?>
