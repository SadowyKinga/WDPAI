<?php
require_once 'AppController.php'; /*importujemy klasę z której będziemy dziedziczyc*/

class PageController extends AppController
{
    public function show()
    {
        $this->render('page'); //wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }
}
