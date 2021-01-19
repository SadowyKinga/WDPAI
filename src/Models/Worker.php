<?php

class Worker /*klasa pracowników*/
{
    private $id_worker;
    private $name_surname;
    private $email;
    private $id_position;
    private $path_to_pic;
    private $id_shop;
    private $payment;

    /*tworzymy konstruktor*/
    public function __construct(
        int $id_worker,
        string $name_surname,
        string $email,
        int $id_position,
        string $path_to_pic,
        int $id_shop,
        int $payment)
        
    {
        $this->id_worker = $id_worker;
        $this->name_surname = $name_surname;
        $this->email = $email;
        $this->id_role = $id_position;
        $this->path_to_pic = $path_to_pic;
        $this->id_shop = $id_shop;
        $this->payment = $payment;
    }

   
    public function getIdWorker() //definiujemy jaki typ będzie zwracany
    {
        return $this->id_worker;
    }

    public function getNameSurname()
    {
        return $this->name_surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getIdPosition()
    {
        return $this->id_position;
    }

    public function getPathToPic()
    {
        return $this->path_to_pic;
    }

    public function getIdShop()
    {
        return $this->id_shop;
    }

    public function getPayment()
    {
        return $this->payment;
    }
}