<?php
/*
   +----------------------------------------------------------------------+
   | Mateusz Lipecki - LOGIN skrypt                                       |
   +----------------------------------------------------------------------+
   | Peter-Lacke Polska                                                   |
   +----------------------------------------------------------------------+
   | Version: 1.3.1                                                       |
   +----------------------------------------------------------------------+
*/

$config['db_host'] = 'localhost'; // Serwer bazy danych
$config['db_user'] = 'localshipping'; // Nazwa użytkownika
$config['db_pass'] = 'MWRK2XskJ1Hw3RY38jxX'; // Hasło
$config['db_name'] = 'wysylka'; // Nazwa bazy danych

$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

if ($db->errno) {
    die ('<p class="error">Nie udało się połączyć z bazą danych.</p>');
}

session_start();

require 'password.php';
require 'User.php';

$user = new User($db);
