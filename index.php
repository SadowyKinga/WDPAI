<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); /*POZBYWAM SIE SLESZA I OTWARZAM SCIEZKE ODWOLUJAC SIE DO FUNKCJI SERWERA */
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController'); /*jeżeli nie mamy podanej zadnej ścieżki to odtwarzamy metode defaultcontroller*/
Routing::get('profile', 'DefaultController'); /*scieżka do naszej apliakcji dzieki niej otwieram ścieżke project z klasy defaultcontroller*/
Routing::get('strona', 'DefaultController'); /*scieżka do naszej apliakcji dzieki niej otwieram ścieżke project z klasy defaultcontroller*/
Routing::get('account', 'DefaultController');
Routing::get('messages', 'DefaultController');
Routing::get('graphic', 'DefaultController');
Routing::get('olderorders', 'DefaultController');
Routing::get('orders', 'DefaultController');
Routing::get('statements', 'DefaultController');
Routing::get('users', 'DefaultController');
Routing::get('workers', 'DefaultController');
Routing::run($path); /*$path - argument*/
