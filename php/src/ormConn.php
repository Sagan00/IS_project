<?php

require 'vendor/autoload.php'; // Załaduj autoloader z biblioteki Eloquent

use Illuminate\Database\Capsule\Manager as Capsule;

// Konfiguracja połączenia z bazą danych
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'db',
    'database'  => 'MYSQL_DATABASE',
    'username'  => 'MYSQL_USER',
    'password'  => 'MYSQL_PASSWORD',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_0900_ai_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Przykładowa klasa reprezentująca tabelę w bazie danych
class Region extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'regiony';
}

// Przykładowe użycie ORM
$regiony = Region::all();

echo '<strong>' . "Przykładowe regiony w Singapurze". '</strong>' . '<br>' . '<br>';
foreach ($regiony as $region) {
    echo $region->NazwaRegionu . '<br>';
}

?>