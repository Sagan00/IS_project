<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
// Sprawdzanie, czy token JWT jest prawidłowy
function validateJwtToken($token)
{
    require_once 'vendor/autoload.php';

    // Tworzenie sekretu - powinien być przechowywany w bezpiecznym miejscu
    $secret = 'twoj_tajny_klucz';


    try {
        // Walidacja tokenu
        
        $decoded = JWT::decode($token, new Key($secret, 'HS256'));
        return true;
    } catch (\Firebase\JWT\ExpiredException $e) {
        // Token wygasł
        return false;
    } catch (\Exception $e) {
        // Nieprawidłowy token
        var_dump($e);
        return false;
    }
}


// Sprawdzanie, czy użytkownik przesłał poprawne dane logowania
function authenticateUser($username, $password)
{
    require_once('./classes/database.php');
    $database = new Database();
    $conn = $database->getConnection();
    

    if ($conn->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
    }

    // Zabezpieczenie przed SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Zapytanie sprawdzające poprawność danych logowania
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($query);

    $rola = '';
    if ($result) {
        // Pętla po wynikach zapytania i wyświetlanie ich za pomocą echo
        while ($row = mysqli_fetch_assoc($result)) {
            $rola = $row["role"];
        }
    } else {
        echo "Błąd wykonania zapytania SELECT: " . mysqli_error($conn);
    }
    
    $conn->close();
    
    if ($result->num_rows === 1) {
        return $rola;
    } else {
        return "";
    }

    
}

?>