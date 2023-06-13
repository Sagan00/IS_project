<?php
include "./lib/userAuthJWT.php";
session_start();
use Firebase\JWT\JWT;
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
function restC(){
    header('Location: restConn.php');
}
// Obsługa wylogowywania użytkownika
if (isset($_POST['rest'])) {
    header('Location: restConn.php');
    exit();
}
if (isset($_POST['soap'])) {
    header('Location: soapConn.php');
    exit();
}
if (isset($_POST['orm'])) {
    header('Location: ormConn.php');
    exit();
}
if (isset($_POST['logout'])) {
    logoutUser();
    exit();
} else {
    // Obsługa logowania użytkownika
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Weryfikacja danych logowania
        if (authenticateUser($username, $password)=='ADMIN') {
            // Generowanie tokena JWT
            require_once 'vendor/autoload.php';

            $secret = 'twoj_tajny_klucz';
            $token = JWT::encode(['username' => $username,'role' => "admin"], $secret, 'HS256');

            // Zapisanie tokenu w sesji
            $_SESSION['user'] = ['username' => $username, 'role' => "admin", 'token' => $token];

            // Przekierowanie użytkownika na stronę główną
            header('Location: index.php');
            exit();
        } else if(authenticateUser($username, $password)=='USER'){
            // Generowanie tokena JWT
            require_once 'vendor/autoload.php';

            $secret = 'twoj_tajny_klucz';
            $token = JWT::encode(['username' => $username,'role' => "user"], $secret, 'HS256');

            // Zapisanie tokenu w sesji
            $_SESSION['user'] = ['username' => $username, 'role' => "user", 'token' => $token];

            // Przekierowanie użytkownika na stronę główną
            header('Location: index.php');
            exit();
        }else{
            echo 'Nieprawidłowe dane logowania.';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/form.css">
</head>

<body>
    <?php if (isUserLoggedIn() && ($_SESSION['user']['role'] == 'admin') && validateJwtToken($_SESSION['user']['token']))
        { ?>
        <h1>Witaj,<?php echo $_SESSION['user']['username'];?>
        </h1>
        <form method="post" action="index.php" class="login-form">
        <div class="form-group">
            <button type="submit" name="logout" class="submit-btn">Wyloguj</button>
        </div>
        </form>
        <?php include_once("showRecords.php"); 
        } else if (isUserLoggedIn() && ($_SESSION['user']['role'] == 'user') && validateJwtToken($_SESSION['user']['token'])){?>
        <h1>Witaj,<?php echo $_SESSION['user']['username'];?>
        </h1>
        <form method="post" action="index.php" class="login-form">
        <div class="form-group">
            <button type="submit" name="logout" class="submit-btn">Wyloguj</button>
        </div>
        </form>
        <?php 
            include_once('indexRestClient.html');
            }else{ ?>
        <div class="login-form">
        <h1>Strona główna</h1>
        <p>Aby uzyskać dostęp, zaloguj się:</p>
        </div>
        <form method="post" action="index.php" class="login-form">
        <div class="form-group">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required><br>
        </div>
        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required><br>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">Zaloguj</button>
            
        </div>
        </form>
        <div class="form-group">
        <form method="post">
            <button type="submit" name="rest" class="submit-btn">restC</button>
        </form>
        <form method="post">
            <button type="submit" name="soap" class="submit-btn">soapC</button>
        </form>
        <form method="post">
            <button type="submit" name="orm" class="submit-btn">soapC</button>
        </form>
        </div>
    <?php } ?>









</body>

</html>