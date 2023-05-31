<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();

        // Sprawdzanie, czy użytkownik jest zalogowany
        function isUserLoggedIn()
        {
            return isset($_SESSION['user']);
        }
        
        // Wylogowywanie użytkownika
        function logoutUser()
        {
            unset($_SESSION['user']);
            session_destroy();
        }
        
        
        
        
        
        
        
        //include_once("showRecords.php")
    ?>
</body>
</html>