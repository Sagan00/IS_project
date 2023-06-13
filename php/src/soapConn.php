<?php

echo 'Połączenie z serwisem SOAP';
echo nl2br("\n\n");



$client = new SoapClient( 'http://localhost/php-create-soap-service/ctof.wsdl' );

try {
	$response = $client->showComps();
	echo 'Celsius to Fahrenheit: ' . $response;
} catch ( SoapFault $sf ) {
	//echo $sf;
	echo 'Error:: ' . $sf->getMessage();
}
?>