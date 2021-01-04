<?php
declare(strict_types=1);

class AppController 
{

    private $request;

    public function __construct()
    {
        session_start();
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }
/*wywołanie metody w controlerze - renderowanie szablonu htmlu*/
    protected function render(string $template = null, array $variables = []) //protected - funkcja dzielona z clasami dziedziczącymi
    {
        $templatePath = $template ? dirname(__DIR__).'//Views//'.get_class($this).'//'. $template.'.php' : ''; //do nazwy szablonu doklejamy naszą ścieżkę, konkatynację stringu robimy za pomoca kropeczki(.) 
        $output = 'File not found';
                
        if(file_exists($templatePath)){
            extract($variables); 
            
            ob_start(); //zapisujemy plik html do bufora
            include $templatePath; //include - wczytuje ścieżkę do pliku html
            $output = ob_get_clean(); //wrzucsmy do zmiennej 
        }
        print $output; //drukujemy output
    }
}
