<?php
	require_once('db_connect.php');
	require_once("getMappingFunction.php");
	// Create connection
	$conn = new mysqli($host, $user, $pass, $mydatabase);
	// Check connection

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//get all colors
	$sql = "SELECT * FROM kolory";
	$colorsMapping = getMapping($conn, $sql, "Kolor", "ID");
	//get all countries
	$sql = "SELECT * FROM kraje";
	$countriesMapping = getMapping($conn, $sql, "Kraj", "ID");
	//get all methods
	$sql = "SELECT * FROM metody";
	$methodsMapping = getMapping($conn, $sql, "Metoda_Przetwarzania", "ID");
	//get all species
	$sql = "SELECT * FROM rodzaje";
	$speciesMapping = getMapping($conn, $sql, "Rodzaj_Kawy", "ID");
	//get all owners
	$sql = "SELECT * FROM wlasciciele";
	$ownersMapping = getMapping($conn, $sql, "Wlasciciel", "ID");
	
	$conn->close();
?>