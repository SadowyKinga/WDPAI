<?php

require_once 'AppController.php'; /*importujemy klasę z której będziemy dziedziczyc*/
class DefaultController extends AppController{ /*extends - dziedziczenie po klasie AppController*/
    
    /*funckje do otwierania login i projects - wczesniej juz utworzone widoki*/
    public function login(){
        //TODO display login.html
        //die("index method");  //zatrzymanie interpretera
        $this ->render('login');//wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }

    public function profile(){
         //TODO display projects.html
         //die("projects method");  //zatrzymanie interpretera
         $this ->render('profile');//wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }
    
     public function strona(){
         //TODO display projects.html
         //die("projects method");  //zatrzymanie interpretera
         $this ->render('strona');//wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }
    public function account(){
         //TODO display projects.html
         //die("projects method");  //zatrzymanie interpretera
         $this ->render('account');//wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }
        public function messages(){
        //TODO display projects.html
        //die("projects method");  //zatrzymanie interpretera
        $this ->render('messages');//wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }
    public function graphic(){
        //TODO display projects.html
        //die("projects method");  //zatrzymanie interpretera
        $this ->render('graphic');//wywołujemy metodę z klasy bazowej i przekazujemy do niej nazwe naszego pliku
    }
}


