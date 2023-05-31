<?php
	require_once("db_connect.php");
	require_once("./classes/coffeeFactory.php");
	$coffees = array();
	// Create connection
	$conn = new mysqli($host, $user, $pass, $mydatabase);
	// Check connection

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = 
		"SELECT
		    k.ID,
		    r.Rodzaj_Kawy AS Species,
		    w.Wlasciciel AS Owner,
		    kr.Kraj AS Country_of_Origin,
		    k.Region,
		    k.Producer,
		    k.Haravest_Year,
		    k.Grading_Date,
		    m.Metoda_Przetwarzania AS Processing_Method,
		    k.Aroma,
		    k.Flavor,
		    k.Aftertaste,
		    k.Acidity,
		    k.Body,
		    k.Balance,
		    k.Uniformity,
		    k.Clean_Cup,
		    k.Sweetnes,
		    k.Cupper_Points,
		    k.Total_Cup_Points,
		    k.Moisture,
		    ko.Kolor AS Color,
		    k.Certification,
		    k.Altitude_Meters
		FROM
		    kawy k
		    LEFT JOIN rodzaje r ON k.Species = r.ID
		    LEFT JOIN wlasciciele w ON k.Owner = w.ID
		    LEFT JOIN kraje kr ON k.Country_of_Origin = kr.ID
		    LEFT JOIN metody m ON k.Processing_Method = m.ID
		    LEFT JOIN kolory ko ON k.Color = ko.ID";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				$coffee = CoffeeFactory::createCoffeeFromDatabaseRow($row);
				$coffees[] = $coffee;
			}
	} else {
		echo "0 results";
	}
	
	$conn->close();

?>