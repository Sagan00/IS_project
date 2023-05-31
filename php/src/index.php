<?php
session_start();

// Sprawdzanie, czy użytkownik jest zalogowany
function isUserLoggedIn()
{
    return isset($_SESSION['user']) && isset($_SESSION['user']['token']);
}

// Wylogowywanie użytkownika
function logoutUser()
{
    unset($_SESSION['user']);
    session_destroy();
    header('Location: index.php');
}

// Obsługa wylogowywania użytkownika
if (isset($_POST['logout'])) {
    logoutUser();
    exit();
} else {
    // Obsługa logowania użytkownika
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Weryfikacja danych logowania
        if (authenticateUser($username, $password)) {
            // Generowanie tokena JWT
            require_once 'vendor/autoload.php';

            $secret = 'twój_tajny_klucz';
            $token = \Firebase\JWT\JWT::encode(['username' => $username], $secret, 'HS256');

            // Zapisanie tokenu w sesji
            $_SESSION['user'] = ['username' => $username, 'token' => $token];

            // Przekierowanie użytkownika na stronę główną
            header('Location: index.php');
            exit();
        } else {
            echo 'Nieprawidłowe dane logowania.';
        }
    }
}
// Sprawdzanie, czy token JWT jest prawidłowy
function validateJwtToken($token)
{
    require_once 'vendor/autoload.php';

    // Tworzenie sekretu - powinien być przechowywany w bezpiecznym miejscu
    $secret = 'twój_tajny_klucz';

    try {
        // Walidacja tokenu
        $decoded = \Firebase\JWT\JWT::decode($token, $secret, 'HS256');
        return $decoded;
    } catch (\Firebase\JWT\ExpiredException $e) {
        // Token wygasł
        return false;
    } catch (\Exception $e) {
        // Nieprawidłowy token
        return false;
    }
}
// Sprawdzanie, czy użytkownik przesłał poprawne dane logowania
function authenticateUser($username, $password)
{
    // Połączenie z bazą danych
    $host = 'db';
    $user = 'MYSQL_USER';
    $pass = 'MYSQL_PASSWORD';
    $mydatabase = 'MYSQL_DATABASE';

    $conn = new mysqli($host, $user, $pass, $mydatabase);

    if ($conn->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
    }

    // Zabezpieczenie przed SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Zapytanie sprawdzające poprawność danych logowania
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isUserLoggedIn()): ?>
        <h1>Witaj,
            <?= $_SESSION['user']['username'] ?>
        </h1>
        <form method="post" action="index.php">
            <button type="submit" name="logout">Wyloguj</button>
        </form>
        <?php include_once("showRecords.php"); ?>
    <?php else: ?>
        <h1>Strona główna</h1>
        <p>Aby uzyskać dostęp, zaloguj się:</p>
        <form method="post" action="index.php">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Zaloguj</button>
        </form>
    <?php endif; ?>









</body>

</html>