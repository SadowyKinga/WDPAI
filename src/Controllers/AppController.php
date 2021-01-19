<?php
declare(strict_types=1);

class AppController 
{

    private $request;

    public function __construct()
    {
        session_start();
        $this->request = $_SERVER['REQUEST_METHOD']; /*z takiego klucza request_method mozemy pobrać wartosć czy jest to metoda get czy metoda post*/
    }

    protected function isGet(): bool /*protected bo używamy klas które bedą dziedziczyły kontroller*/
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool /*protected bo używamy klas które bedą dziedziczyły kontroller*/
    {
        return $this->request === 'POST';
    }
    
    /*wywołanie metody w controlerze - renderowanie szablonu htmlu*/
    protected function render(string $template = null, array $variables = [], string $redirectPath = null) //protected - funkcja dzielona z clasami dziedziczącymi, $variables - zmienne przekazywane na nasze widoki, które sa w folderze public views - zmienne prezkazywane w php jako tablica asocjacyjna
    {
        if(isset($redirectPath)) {
            header("Location: \?page={$redirectPath}");
        }
        
        $templatePath = $template ? dirname(__DIR__).'//Views//'.get_class($this).'//'. $template.'.php' : ''; //do nazwy szablonu doklejamy naszą ścieżkę, konkatynację stringu robimy za pomoca kropeczki(.)
        $output = 'File not found';
        if (file_exists($templatePath)) {
            extract($variables); //by zmienne przekazać na widok trzeba je wczśniej wypakować za pomocą extract($variables)
            ob_start(); //zapisujemy plik html do bufora
            include $templatePath; //include - wczytuje ścieżkę do pliku html
            $output = ob_get_clean(); //wrzucimy do zmiennej
        }
        print $output; //drukujemy output
    }
}
