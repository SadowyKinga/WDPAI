
<?php

require_once 'src/controllers/DefaultController.php';

class Routing {
    public static $routes; /*tablica przechowujaca URL oraz ścieżkę kontrolera który zostanie otwarty*/

    /*metoda, która pozwoli nam wstawić do tej tablicy  odpowiedni kontroler przydzielonydo określonego URLa*/
    public static function get($url, $controller){
        self::$routes[$url] = $controller;
    }

    /*metoda, która pozwoli nam uruchomić dane kontroller, które zostały przypisane pod oknem określonego URL*/
    public static function run($url){
        /*wyciągamy pierwszy moduł URLa*/
        $action = explode("/", $url)[0];  //explode - dzieli nam string wejściowy względem separatora, na szym przyadku separator to / 
    
        /*sprawdzamy czy w naszej tablicy istnieje taki element */
        if(!array_key_exists($action, self::$routes)){ //$action - klucz
            die("Wrong url");
        }
    
        //TODO call controller method - implemnetacja
        $controller = self::$routes[$action]; /*$action - klucz*/
        $object = new $controller;

        $object -> $action(); /*wywołanie akcji z kontrollera jest za pomoca strzałki*/
    }
}
