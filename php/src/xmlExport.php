<?php
require_once("./lib/getAllFlats.php");
		
$dir = "files";
$filename = "flats.xml";
$filepath = "./{$dir}/{$filename}";

saveFlatsAsXml($flats, 5, $filepath);
echo "Dane mieszkań zostały pomyślnie wyeksportowane do pliku XML w katalogu roboczym o nazwie {$dir}. Plik ma nazwę `{$filename}`<br>"; 
echo '<a href="index.php">
      			<input type="submit" value="Powrót do strony głównej"/>
  			</a><br>';
?>