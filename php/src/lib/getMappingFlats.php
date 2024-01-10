<?php
	// Create connection
	include_once './classes/database.php';
	$database = new Database();
    $conn = $database->getConnection();
	// Check connection
	$conn->begin_transaction();

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	function getMapping($conn, $sql, $key, $value) {
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$array_ = array();
	
		while ($row = $result->fetch_assoc()) {
			$array_[$row[$key]] = $row[$value];
		}
	
		$stmt->close();
	
		return $array_;
	}

	//get all models
	$sql = "SELECT * FROM modele";
	$modelsMapping = getMapping($conn, $sql, "NazwaModelu", "IdModel");
	//get all rooms
	$sql = "SELECT * FROM pokoje";
	$iloscPokoiMapping = getMapping($conn, $sql, "IloscPokoi", "IdPokoje");
	//get all regions
	$sql = "SELECT * FROM regiony";
	$regionsMapping = getMapping($conn, $sql, "NazwaRegionu", "IdRegion");
	
	$conn->commit();
	$conn->close();
?>