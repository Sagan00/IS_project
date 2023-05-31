<?php
require_once("./lib/getAllCoffee.php");
require_once("./lib/exportCoffeeToXML.php");
		
$dir = "xmlFiles";
$filename = "coffees.xml";
$filepath = "./{$dir}/{$filename}";
saveCoffeesAsXml($coffees, 15, $filepath);
echo "Coffee data exported to XML file succesfully to working directory into folder named `{$dir}` file has name `{$filename}`<br>"; 
echo '<a href="index.php">
      			<input type="submit" value="Back to main page"/>
  			</a><br>';
?>