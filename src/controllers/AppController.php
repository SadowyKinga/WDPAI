<?php

class AppController {

/*wywołanie metody w controlerze - renderowanie szablonu htmlu*/
    protected function render(string $template = null, array $variables = []) //protected - funkcja dzielona z clasami dziedziczącymi
    {
        $templatePath = 'public/views/'. $template.'.html'; //do nazwy szablonu doklejamy naszą ścieżkę, konkatynację stringu robimy za pomoca kropeczki(.) 
        $output = 'File not found';
                
        if(file_exists($templatePath)){
          //  extract($variables); 
            
            ob_start(); //zapisujemy plik html do bufora
            include $templatePath; //include - wczytuje ścieżkę do pliku html
            $output = ob_get_clean(); //wrzucsmy do zmiennej 
        }
        print $output; //drukujemy output
    }
}