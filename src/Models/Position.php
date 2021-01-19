<?php

class Position
{
    private $id_position;
    private $name;

    /*tworzymy konstruktor*/
    public function __construct(
        string $id_position,
        string $name)
        
    {
        //definiujemy jaki typ będzie zwracany
        $this->id_position = $id_position;
        $this->name = $name;
    }
}