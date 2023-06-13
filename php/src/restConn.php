<?php
// Ustawienia dostępu do serwisu REST
$apiUrl = 'https://restcountries.com/v2/all';

// Wywołanie API i pobranie danych
$response = file_get_contents($apiUrl);

// Sprawdzenie, czy żądanie zakończyło się sukcesem
if ($response !== false) {
    // Przetworzenie odpowiedzi jako dane JSON
    $countries = json_decode($response, true);

    // Sprawdzenie, czy udało się przetworzyć dane JSON
    if ($countries !== null) {
        // Przetworzenie danych i wyświetlenie nazw państw
        foreach ($countries as $country) {
            echo $country['name'] . '<br>';
        }
    } else {
        echo 'Błąd: Nie można przetworzyć danych JSON.';
    }
} else {
    echo 'Błąd: Nie można uzyskać dostępu do serwisu REST.';
}
?>