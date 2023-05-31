<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index IS</title>
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
	<?php
		require_once("./lib/printCoffee.php");
		require_once("./lib/getAllCoffee.php");

		//anchor to import XML:
		echo '<a href="./xmlImport.php">
				<input type="submit" value="Import XML File"/>
			</a>';

		//anchor to export XML:
		echo '<a href="./xmlExport.php">
				<input type="submit" value="Export to XML File"/>
			</a>';

		//anchor to import JSON:
		echo '<a href="./jsonImport.php">
				<input type="submit" value="Import JSON File"/>
			</a>';

		//anchor to export JSON:
		echo '<a href="./jsonExport.php">
				<input type="submit" value="Export to JSON File"/>
			</a><br><br>';
		

		// Determine the current page
		$page = isset($_GET['page']) ? $_GET['page'] : 1;

		// Set the number of records to display per page
		$recordsPerPage = 100;

		// Count number of pages
		$totalPages = ceil(count($coffees) / $recordsPerPage);

		// Display links
		echo '<div>';
		for ($i = 1; $i <= $totalPages; $i++) {
			$active = ($i == $page) ? 'active' : '';
			echo '<a class="' . $active . '" href="?page=' . $i . '">' . $i . '</a>';
		}
		echo '</div>';


		// Calculate the starting index of records for the current page
		$startIndex = ($page - 1) * $recordsPerPage;

		// Calculate the ending index of records for the current page
		$endIndex = $startIndex + $recordsPerPage;

		// Get the subset of coffees for the current page
		$coffeesSubset = array_slice($coffees, $startIndex, $recordsPerPage);

		// Display the subset of coffees
		printCoffee($coffeesSubset, 0, count($coffeesSubset));

		// Display pagination links
		echo '<div>';
		for ($i = 1; $i <= $totalPages; $i++) {
			$active = ($i == $page) ? 'active' : '';
			echo '<a class="' . $active . '" href="?page=' . $i . '">' . $i . '</a>';
		}
		echo '</div>';
	?>
</body>
	
</body>
</html>

