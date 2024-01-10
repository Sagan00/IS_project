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
$filename = "flats.xml";
$path = "./{$dir}/{$filename}";

// Set isolation level to READ COMMITTED
$conn->query("SET TRANSACTION ISOLATION LEVEL READ COMMITTED");

// Disable autocommit
$conn->autocommit(false);

if (!file_exists($path)) {
    echo "There is no file named {$filename} in directory {$dir}<br>";
} else {
    $xml = simplexml_load_file($path);
    foreach ($xml->flat as $flat) {
        $stmt = $conn->prepare("INSERT INTO mieszkania (Id, DataDodania, Region, IloscPokoi, Ulica, Metraz, Model, RokBudowy, Cena, StopaProcentowa)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("isiisiiiid",
            $flat->Id,
            $flat->DataDodania,
            $regionsMapping[(string)$flat->Region],
            $iloscPokoiMapping[(string)$flat->IloscPokoi],
            $flat->Ulica,
            $flat->Metraz,
            $modelsMapping[(string)$flat->Model],
            $flat->RokBudowy,
            $flat->Cena,
            $flat->StopaProcentowa
        );

        $stmt->execute();
        $stmt->close();
    }
    
    // Commit the transaction
    $conn->commit();
    
    echo "Dane z pliku XML zostały poprawnie wstawione do bazy danych.<br>";
}

// Re-enable autocommit
$conn->autocommit(true);

echo '<a href="index.php">
        <input type="submit" value="Powrót do strony głównej"/>
    </a><br>';
?>
