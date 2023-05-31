<?php
require_once("./lib/getAllCoffee.php");
require_once("./lib/exportCoffeeToJSON.php");

$dir = "jsonFiles";
$filename = "coffees.json";
$filepath = "./{$dir}/{$filename}";

saveCoffeesAsJSON($coffees, 15, $filepath);
echo "Coffee data exported to JSON file succesfully to working directory into folder named `{$dir}` file has name `{$filename}`<br>"; 
echo '<a href="index.php">
      			<input type="submit" value="Back to main page"/>
  			</a><br>';
?>