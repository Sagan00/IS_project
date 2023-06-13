<?php

require 'vendor/autoload.php'; // Załaduj autoloader z biblioteki Eloquent

use Illuminate\Database\Capsule\Manager as Capsule;

// Konfiguracja połączenia z bazą danych
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'nazwa_bazy_danych',
    'username'  => 'uzytkownik',
    'password'  => 'haslo',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Przykładowa klasa reprezentująca tabelę w bazie danych
class User extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'users';
}

// Przykładowe użycie ORM
$users = User::all();

foreach ($users as $user) {
    echo $user->name . ' - ' . $user->email . '<br>';
}

?>