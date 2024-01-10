<?php

try {
    // Tworzenie klienta SOAP
    $client = new SoapClient('http://www.dneonline.com/calculator.asmx?wsdl');

    echo '<strong>' . "Kalkulator dla nieruchomości". '</strong>' . '<br>' . '<br>';
    // Wywołanie metody usługi SOAP - Dodawanie
    $addResult = $client->Add(['intA' => 120000, 'intB' => 96000]);
    echo "Pierwsza metoda";
    echo '<br>'."Koszt zakupu 1. mieszkania: 120000$". '<br>';
    echo "Koszt zakupu 2. mieszkania: 96000$". '<br>';
    echo "Koszt zakupu dwóch mieszkań 2 ROOM w Bedok: " . $addResult->AddResult . '$<br>' . '<br>';

    // Wywołanie metody usługi SOAP - Odejmowanie
    $subtractResult = $client->Subtract(['intA' => 145000, 'intB' => 75000]);
    echo "Druga metoda";
    echo '<br>'."Koszt mieszkania 3 ROOM: 145000$". '<br>';
    echo "Koszt mieszkania 2 ROOM: 75000$". '<br>';
    echo "Różnica w cenie między 3 ROOM, 2 ROOM w Quennstown: " . $subtractResult->SubtractResult . '$<br>' . '<br>';

    // Wywołanie metody usługi SOAP - Mnożenie
    $multiplyResult = $client->Multiply(['intA' => 3, 'intB' => 535000]);
    echo "Trzecia metoda" . '<br' . '<br>';
    echo '<br>'."Cena mieszkaia 5 ROOM: 535000$". '<br>';
    echo "Koszt trzech mieszkań 5 ROOM: " . $multiplyResult->MultiplyResult . '$<br>' . '<br>';

    // Wywołanie metody usługi SOAP - Dzielenie
    $divideResult = $client->Divide(['intA' => 162000, 'intB' => 2]);
    echo "Czwarta metoda" . '<br' . '<br>';
    echo '<br>'."Cena mieszkania 2 ROOM w Central Area: 162000$". '<br>';
    echo "Koszt mieszkania 2 ROOM w Central Area dla pary: " . $divideResult->DivideResult . "<br>";

} catch (SoapFault $e) {
    // Obsługa błędów SOAP
    echo "Wystąpił błąd podczas komunikacji z usługą SOAP: " . $e->getMessage();
}

?>
