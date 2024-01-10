<?php
// Ustawienia dostępu do serwisu REST
$apiUrl = 'https://data.cityofchicago.org/resource/s6ha-ppgi.json';

// Wywołanie API i pobranie danych
$response = file_get_contents($apiUrl);

// Sprawdzenie, czy żądanie zakończyło się sukcesem
if ($response !== false) {
    // Przetworzenie odpowiedzi jako dane JSON
    $apartments = json_decode($response, true);

    // Sprawdzenie, czy udało się przetworzyć dane JSON
    if ($apartments !== null) {
        // Utworzenie tablicy tymczasowej na unikalne wartości property_type
        $uniquePropertyTypes = [];

        // Przetworzenie danych i dodanie unikalnych wartości do tablicy tymczasowej
        foreach ($apartments as $apartment) {
            $propertyType = $apartment['property_type'];

            if (!in_array($propertyType, $uniquePropertyTypes)) {
                $uniquePropertyTypes[] = $propertyType;
            }
        }

        // Wyświetlenie unikalnych wartości property_type
        echo '<strong>' . "Typy nieruchomości". '</strong>' . '<br>' . '<br>';
        foreach ($uniquePropertyTypes as $propertyType) {
            echo $propertyType . '<br>';
        }
    } else {
        echo 'Błąd: Nie można przetworzyć danych JSON.';
    }
} else {
    echo 'Błąd: Nie można uzyskać dostępu do serwisu REST.';
}
?>
