<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dane</title>
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
	<?php
	require_once("./lib/printFlat.php");
	require_once("./lib/getAllFlats.php");

	//anchor to import XML
	echo '<a href="./xmlImport.php" class="pliki">Import XML File</a>';

	//anchor to export XML
	echo '<a href="./xmlExport.php" class="pliki">Export to XML File</a>';

	//anchor to import JSON
	echo '<a href="./jsonImport.php" class="pliki">Import JSON File</a>';

	//anchor to export JSON
	echo '<a href="./jsonExport.php" class="pliki">Export to JSON File</a>' . '<br>' . '<br>';

	// Determine the current page
	$page = isset($_GET['page']) ? $_GET['page'] : 1;

	// Set the number of records to display per page
	$recordsPerPage = 500;

	// Count number of pages
	$totalPages = ceil(count($flats) / $recordsPerPage);

	// Display links
	echo '<div>';

	if ($page > 1) {
		echo '<a href="?page=1">&laquo;</a>';
	}


	if ($page > 1) {
		echo '<a href="?page=' . ($page - 1) . '">&lt;</a>';
	}
	if ($page > 2) {
		echo '<span class="ellipsis">...</span>';
	}

	$startPage = max(1, $page - 7);
	$endPage = min($startPage + 14, $totalPages);

	for ($i = $startPage; $i <= $endPage; $i++) {
		$active = ($i == $page) ? 'active' : '';
		echo '<a class="' . $active . '" href="?page=' . $i . '">' . $i . '</a>';
	}

	if ($page < $totalPages - 1) {
		echo '<span class="ellipsis">...</span>';
	}

	if ($page < $totalPages) {
		echo '<a href="?page=' . ($page + 1) . '">&gt;</a>';
	}


	if ($page < $totalPages) {
		echo '<a href="?page=' . $totalPages . '">&raquo;</a>';
	}

	echo '</div>';




	// Calculate the starting index of records for the current page
	$startIndex = ($page - 1) * $recordsPerPage;

	// Calculate the ending index of records for the current page
	$endIndex = $startIndex + $recordsPerPage;

	// Get the subset of flats for the current page
	$flatsSubset = array_slice($flats, $startIndex, $recordsPerPage);

	// Display the subset of flats
	printFlat($flatsSubset, 0, count($flatsSubset));

	// Display pagination links
	echo '<div>';

	if ($page > 1) {
		echo '<a href="?page=1">&laquo;</a>';
	}


	if ($page > 1) {
		echo '<a href="?page=' . ($page - 1) . '">&lt;</a>';
	}
	if ($page > 2) {
		echo '<span class="ellipsis">...</span>';
	}

	$startPage = max(1, $page - 7);
	$endPage = min($startPage + 14, $totalPages);

	for ($i = $startPage; $i <= $endPage; $i++) {
		$active = ($i == $page) ? 'active' : '';
		echo '<a class="' . $active . '" href="?page=' . $i . '">' . $i . '</a>';
	}

	if ($page < $totalPages - 1) {
		echo '<span class="ellipsis">...</span>';
	}

	if ($page < $totalPages) {
		echo '<a href="?page=' . ($page + 1) . '">&gt;</a>';
	}


	if ($page < $totalPages) {
		echo '<a href="?page=' . $totalPages . '">&raquo;</a>';
	}

	echo '</div>';


	?>
</body>

</body>

</html>